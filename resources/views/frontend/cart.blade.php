@extends('frontend.layout.master')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12 text-white">
    <h1 class="text-3xl font-bold mb-8 flex items-center gap-3">
        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        Your Shopping Cart
    </h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-4">
            <!-- Sample Cart Item Card -->
            <div class="bg-[#161626] border border-gray-800 rounded-2xl p-4 flex items-center justify-between gap-4 shadow-lg">
                <div class="flex items-center gap-4">
                    <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80" alt="Event" class="w-20 h-20 object-cover rounded-xl">
                    <div>
                        <span class="text-xs font-semibold px-2 py-0.5 bg-purple-900 text-purple-200 rounded-md">Dhaka</span>
                        <h3 class="text-lg font-semibold mt-1">Coke Studio Bangla Live Concert 2026</h3>
                        <p class="text-purple-400 font-bold mt-1">৳1,200</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-400">Qty: 1</span>
                    <button class="p-2 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                    </button>
                </div>
            </div>
            
            <!-- যদি কার্ট খালি থাকে তবে এটি দেখানোর জন্য (Conditional check করতে পারেন) -->
            <!-- <p class="text-gray-400">Your cart is currently empty.</p> -->
        </div>

        <!-- Cart Summary / Checkout Box -->
        <div class="bg-[#161626] border border-gray-800 rounded-2xl p-6 h-fit shadow-lg">
            <h2 class="text-xl font-bold mb-4 border-b border-gray-800 pb-3">Order Summary</h2>
            
            <div class="space-y-3 text-sm text-gray-300 mb-6">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span class="font-semibold text-white">৳1,200</span>
                </div>
                <div class="flex justify-between">
                    <span>Processing Fee</span>
                    <span class="font-semibold text-white">৳0</span>
                </div>
                <div class="border-t border-gray-800 pt-3 flex justify-between text-base font-bold text-white">
                    <span>Total</span>
                    <span class="text-purple-400">৳1,200</span>
                </div>
            </div>

            <button class="w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition text-center">
                Proceed to Checkout
            </button>
        </div>
    </div>
</div>
@endsection
