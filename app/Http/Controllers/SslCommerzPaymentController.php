<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class SslCommerzPaymentController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'event_title' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = $request->price * $request->quantity;
        $tran_id = 'SSLC_' . uniqid();

        // ১. পেন্ডিং অর্ডার তৈরি করুন
        $order = Order::create([
            'user_id'        => Auth::id(),
            'event_id'       => $request->event_id,
            'event_title'    => $request->event_title,
            'amount'         => $totalAmount,
            'quantity'       => $request->quantity,
            'payment_status' => 'pending',
            'transaction_id' => $tran_id,
            'payment_method' => 'sslcommerz',
        ]);

        $user = Auth::user();

        // ২. SSLCommerz API তে ডাটা পাঠানো
        $post_data = [
            'store_id'         => env('SSLC_STORE_ID', 'testbox'),
            'store_passwd'     => env('SSLC_STORE_PASSWORD', 'qwerty'),
            'total_amount'     => $totalAmount,
            'currency'         => 'BDT',
            'tran_id'          => $tran_id,
            'success_url'      => route('user.sslcommerz.success'),
            'fail_url'         => route('user.sslcommerz.fail'),
            'cancel_url'       => route('user.sslcommerz.cancel'),
            
            // কাস্টমার তথ্য
            'cus_name'         => $user->name ?? 'Customer Name',
            'cus_email'        => $user->email ?? 'customer@mail.com',
            'cus_add1'         => 'Dhaka',
            'cus_city'         => 'Dhaka',
            'cus_country'      => 'Bangladesh',
            'cus_phone'        => '01700000000',
            
            'shipping_method'  => 'NO',
            'product_name'     => $request->event_title,
            'product_category' => 'Event Ticket',
            'product_profile'  => 'non-physical-goods',
        ];

        $apiUrl = env('SSLC_IS_SANDBOX', true) 
            ? 'https://sandbox.sslcommerz.com/gwprocess/v4/api.php' 
            : 'https://securepay.sslcommerz.com/gwprocess/v4/api.php';

        $response = Http::asForm()->post($apiUrl, $post_data)->json();

        if (isset($response['status']) && $response['status'] == 'SUCCESS') {
            return redirect()->away($response['GatewayPageURL']);
        }

        return back()->with('error_message', 'SSLCommerz Gateway Error: ' . ($response['failedreason'] ?? 'Unable to connect'));
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $val_id  = $request->input('val_id');

        $order = Order::where('transaction_id', $tran_id)->first();

        if (!$order) {
            return redirect()->route('events')->with('error_message', 'Order not found!');
        }

        // SSLCommerz Server Validation API
        $valUrl = env('SSLC_IS_SANDBOX', true) 
            ? "https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id={$val_id}&store_id=" . env('SSLC_STORE_ID', 'testbox') . "&store_passwd=" . env('SSLC_STORE_PASSWORD', 'qwerty') . "&format=json"
            : "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id={$val_id}&store_id=" . env('SSLC_STORE_ID') . "&store_passwd=" . env('SSLC_STORE_PASSWORD') . "&format=json";

        $validation = Http::get($valUrl)->json();

        if (isset($validation['status']) && ($validation['status'] == 'VALID' || $validation['status'] == 'VALIDATED')) {
            $order->update([
                'payment_status' => 'completed',
                'transaction_id' => $tran_id . ' (' . $request->input('card_type', 'SSLCommerz') . ')',
            ]);

            return redirect()->route('user.tickets')->with('success_message', 'পেমেন্ট সফল হয়েছে! আপনার টিকিট বুক করা হয়েছে।');
        }

        $order->update(['payment_status' => 'failed']);
        return redirect()->route('events')->with('error_message', 'Payment validation failed!');
    }

    public function fail(Request $request)
    {
        $order = Order::where('transaction_id', $request->input('tran_id'))->first();
        if ($order) {
            $order->update(['payment_status' => 'failed']);
        }

        return redirect()->route('events')->with('error_message', 'পেমেন্ট ব্যর্থ হয়েছে!');
    }

    public function cancel(Request $request)
    {
        $order = Order::where('transaction_id', $request->input('tran_id'))->first();
        if ($order) {
            $order->update(['payment_status' => 'canceled']);
        }

        return redirect()->route('events')->with('error_message', 'পেমেন্ট বাতিল করা হয়েছে!');
    }
}
