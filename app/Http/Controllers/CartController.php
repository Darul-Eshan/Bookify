<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    // Cart View Page
    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->latest()->get();
        $subtotal = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('frontend.cart', compact('cartItems', 'subtotal'));
    }

    // Add Item to Cart
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to add items to your cart.');
        }

        $request->validate([
            'event_id' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price'    => 'required|numeric',
        ]);

        $cart = Cart::where('user_id', Auth::id())
                    ->where('event_id', $request->event_id)
                    ->first();

        if ($cart) {
            $cart->quantity += $request->quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id'     => Auth::id(),
                'event_id'    => $request->event_id,
                'event_title' => $request->event_title,
                'event_image' => $request->event_image,
                'location'    => $request->location ?? 'N/A',
                'ticket_tier' => $request->ticket_tier ?? 'Regular',
                'quantity'    => $request->quantity,
                'price'       => $request->price,
            ]);
        }

        return redirect()->back()->with('success', 'Event successfully added to cart!');
    }

    // Update Quantity
    public function updateCart(Request $request, $id)
    {
        $cart = Cart::where('user_id', Auth::id())->where('id', $id)->firstOrFail();
        $cart->quantity = max(1, (int)$request->quantity);
        $cart->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // Remove Item
    public function deleteCart($id)
    {
        Cart::where('user_id', Auth::id())->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    // Clear All Items
    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
}
