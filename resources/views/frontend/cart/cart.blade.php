@extends('frontend.layout.master')

@section('section')
<div class="max-w-7xl mx-auto px-6 py-12 text-white" x-data="cartManager()">
    <h1 class="text-3xl font-bold mb-8 flex items-center gap-3">
        <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        Your Shopping Cart
        <span class="text-sm font-normal text-gray-400" x-text="`(${cartItems.length} items)`"></span>
    </h1>

    <!-- Cart With Items -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8" x-show="cartItems.length > 0">
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-4">
            <template x-for="(item, index) in cartItems" :key="item.id">
                <div class="bg-[#161626] border border-gray-800 rounded-2xl p-4 sm:p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-lg hover:border-purple-500/30 transition">
                    <div class="flex items-center gap-4">
                        <img :src="item.image" :alt="item.title" class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-xl flex-shrink-0">
                        <div>
                            <span class="text-xs font-semibold px-2.5 py-0.5 bg-purple-950 text-purple-300 border border-purple-500/30 rounded-full" x-text="item.category"></span>
                            <h3 class="text-base sm:text-lg font-semibold mt-1 text-white" x-text="item.title"></h3>
                            <p class="text-purple-400 font-bold mt-1" x-text="`৳${item.price.toLocaleString()}`"></p>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between w-full sm:w-auto gap-4 pt-3 sm:pt-0 border-t sm:border-t-0 border-gray-800">
                        <!-- Quantity Control -->
                        <div class="flex items-center gap-2 bg-[#121222] border border-gray-800 rounded-xl p-1">
                            <button @click="decreaseQty(index)" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition">−</button>
                            <span class="w-8 text-center text-sm font-semibold" x-text="item.qty"></span>
                            <button @click="increaseQty(index)" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition">+</button>
                        </div>

                        <!-- Remove Button -->
                        <button @click="removeItem(index)" class="p-2.5 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl transition" title="Remove item">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                        </button>
                    </div>
                </div>
            </template>

            <!-- Clear Cart Option -->
            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('events') }}" class="text-sm text-purple-400 hover:text-purple-300 flex items-center gap-1.5 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Continue Shopping
                </a>
                <button @click="clearCart()" class="text-sm text-gray-400 hover:text-red-400 transition">Clear Cart</button>
            </div>
        </div>

        <!-- Cart Summary / Checkout Box -->
        <div class="bg-[#161626] border border-gray-800 rounded-2xl p-6 h-fit shadow-lg space-y-5">
            <h2 class="text-xl font-bold border-b border-gray-800 pb-3">Order Summary</h2>
            
            <!-- Coupon Input Section -->
            <div class="space-y-2">
                <label class="text-xs text-gray-400 font-medium">Have a Promo Code?</label>
                <div class="flex gap-2">
                    <input type="text" x-model="couponCode" placeholder="e.g. DISCOUNT100" class="w-full bg-[#121222] text-sm text-gray-200 border border-gray-800 rounded-xl px-3 py-2 focus:outline-none focus:border-purple-500 uppercase">
                    <button @click="applyCoupon()" class="px-4 py-2 bg-purple-600 hover:bg-purple-500 text-white text-xs font-semibold rounded-xl transition">Apply</button>
                </div>
                <p class="text-xs text-green-400" x-show="couponApplied" x-text="couponMessage"></p>
                <p class="text-xs text-red-400" x-show="couponError" x-text="couponMessage"></p>
            </div>

            <!-- Price Breakdown -->
            <div class="space-y-3 text-sm text-gray-300 border-t border-gray-800 pt-4">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span class="font-semibold text-white" x-text="`৳${subtotal().toLocaleString()}`"></span>
                </div>
                <div class="flex justify-between" x-show="discount > 0">
                    <span>Discount</span>
                    <span class="font-semibold text-green-400" x-text="`-৳${discount.toLocaleString()}`"></span>
                </div>
                <div class="flex justify-between">
                    <span>Processing Fee</span>
                    <span class="font-semibold text-white">৳60</span>
                </div>
                <div class="border-t border-gray-800 pt-3 flex justify-between text-base font-bold text-white">
                    <span>Total Amount</span>
                    <span class="text-purple-400" x-text="`৳${total().toLocaleString()}`"></span>
                </div>
            </div>

            <a href="{{ route('checkout.view') }}" class="block w-full py-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition text-center">
                Proceed to Checkout
            </a>
        </div>
    </div>

    <!-- Empty Cart State -->
    <div class="text-center py-16 bg-[#161626] border border-gray-800 rounded-2xl shadow-lg max-w-xl mx-auto" x-show="cartItems.length === 0" style="display: none;">
        <div class="w-16 h-16 bg-purple-950/50 border border-purple-500/20 text-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <h2 class="text-xl font-bold text-white mb-2">Your cart is empty</h2>
        <p class="text-gray-400 text-sm mb-6">Looks like you haven't added any event tickets to your cart yet.</p>
        <a href="{{ route('events') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg shadow-purple-600/30 hover:opacity-95 transition text-sm">
            Explore Events Now
        </a>
    </div>
</div>

<!-- Alpine.js Logic for Interactive Cart -->
<script>
    function cartManager() {
        return {
            cartItems: [
                {
                    id: 1,
                    title: 'Coke Studio Bangla Live Concert 2026',
                    category: 'Dhaka',
                    price: 1200,
                    qty: 1,
                    image: 'https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80'
                },
                {
                    id: 2,
                    title: 'Coldplay: Music of the Spheres World Tour',
                    category: 'Sylhet',
                    price: 2500,
                    qty: 1,
                    image: 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&auto=format&fit=crop&q=80'
                }
            ],
            couponCode: '',
            couponApplied: false,
            couponError: false,
            couponMessage: '',
            discount: 0,

            increaseQty(index) {
                this.cartItems[index].qty++;
            },

            decreaseQty(index) {
                if (this.cartItems[index].qty > 1) {
                    this.cartItems[index].qty--;
                }
            },

            removeItem(index) {
                this.cartItems.splice(index, 1);
            },

            clearCart() {
                this.cartItems = [];
                this.discount = 0;
            },

            subtotal() {
                return this.cartItems.reduce((acc, item) => acc + (item.price * item.qty), 0);
            },

            applyCoupon() {
                if (this.couponCode.trim() === 'DISCOUNT100' || this.couponCode.trim() === 'E-TICKET50') {
                    this.discount = 200; 
                    this.couponApplied = true;
                    this.couponError = false;
                    this.couponMessage = 'Coupon applied successfully!';
                } else {
                    this.couponApplied = false;
                    this.couponError = true;
                    this.couponMessage = 'Invalid promo code. Try "DISCOUNT100"';
                }
            },

            total() {
                let sub = this.subtotal();
                if (sub === 0) return 0;
                let final = sub - this.discount + 60; 
                return final > 0 ? final : 60;
            }
        }
    }
</script>
@endsection