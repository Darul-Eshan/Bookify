<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // ১. চেকআউট ফর্মে ক্লিক করলে পেমেন্ট পেজে পাঠানোর মেথড
    public function checkout(Request $request)
    {
        $request->validate([
            'event_id' => 'required',
            'event_title' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = $request->price * $request->quantity;

        // Pending অর্ডার ডাটাবেজে স্টোর করা
        $order = Order::create([
            'user_id' => Auth::id(),
            'event_id' => $request->event_id,
            'event_title' => $request->event_title,
            'amount' => $totalAmount,
            'quantity' => $request->quantity,
            'payment_status' => 'pending',
            'payment_method' => 'stripe'
        ]);

        return view('backend.payment.payments', compact('order'));
    }

    // ২. Stripe পেমেন্ট কমপ্লিট এবং অর্ডার আপডেট করার মেথড
    public function processPayment(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'stripeToken' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);

        Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));

        try {
            // Stripe সেন্ট/পয়সায় চার্জ হিসাব করে (তাই amount * 100 দেওয়া হয়েছে)
            $charge = Charge::create([
                'amount' => $order->amount * 100, 
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Event Ticket: ' . $order->event_title,
            ]);

            // পেমেন্ট সফল হলে Database আপডেট
            $order->update([
                'payment_status' => 'completed',
                'transaction_id' => $charge->id,
            ]);

            return redirect()->route('home')->with('success_message', 'পেমেন্ট সফল হয়েছে! আপনার টিকিট বুক করা হয়েছে।');

        } catch (\Exception $e) {

            // পেমেন্ট ফেইল করলে Status Update
            $order->update([
                'payment_status' => 'failed',
            ]);

            return back()->with('error_message', 'পেমেন্ট ব্যর্থ হয়েছে: ' . $e->getMessage());
        }
    }
}
