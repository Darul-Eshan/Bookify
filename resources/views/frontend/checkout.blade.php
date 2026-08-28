@extends('frontend.layout.master')

@section('section')
<div class="max-w-7xl mx-auto px-6 py-12" x-data="{ selectedPayment: 'bkash' }">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white tracking-tight">Secure Checkout</h1>
        <p class="text-sm text-gray-400 mt-1">Complete your ticket booking with instant digital payment.</p>
    </div>

    <form action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        
        <!-- Left Side: Billing & Payment Information -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Personal Information Box -->
            <div class="bg-[#121222] border border-gray-800/80 rounded-2xl p-6 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 rounded-lg bg-purple-600/20 text-purple-400 flex items-center justify-center text-sm border border-purple-500/30">1</span>
                    Personal Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 mb-1.5">Full Name</label>
                        <input type="text" name="name" value="Tanvir Ahmed" required class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500 transition">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 mb-1.5">Email Address (for e-ticket PDF)</label>
                        <input type="email" name="email" value="tanvir@example.com" required class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500 transition">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-400 mb-1.5">Phone Number (for SMS confirmation)</label>
                        <input type="text" name="phone" value="+880 1712-345678" required class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500 transition">
                    </div>
                </div>
            </div>

            <!-- Payment Method Selection Box -->
            <div class="bg-[#121222] border border-gray-800/80 rounded-2xl p-6 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 rounded-lg bg-purple-600/20 text-purple-400 flex items-center justify-center text-sm border border-purple-500/30">2</span>
                    Select Payment Method
                </h3>

                <!-- Payment Options Grid with Official Logo Backgrounds/Images -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                    
                    <!-- bKash -->
                    <div @click="selectedPayment = 'bkash'" 
                         :class="selectedPayment === 'bkash' ? 'border-pink-500 bg-pink-950/20 shadow-lg shadow-pink-500/10 ring-2 ring-pink-500/50' : 'border-gray-800/80 bg-[#1a1a2e]'"
                         class="cursor-pointer border-2 rounded-xl p-4 flex flex-col items-center justify-center gap-3 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-b from-pink-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="w-14 h-10 rounded-lg bg-white p-1.5 flex items-center justify-center shadow-md">
                            <img src="https://www.logo.wine/a/logo/BKash/BKash-Logo.wine.svg" alt="bKash" class="w-full h-full object-contain">
                        </div>
                        <span class="text-white font-bold text-xs tracking-wide">bKash</span>
                    </div>

                    <!-- Nagad -->
                    <div @click="selectedPayment = 'nagad'" 
                         :class="selectedPayment === 'nagad' ? 'border-orange-500 bg-orange-950/20 shadow-lg shadow-orange-500/10 ring-2 ring-orange-500/50' : 'border-gray-800/80 bg-[#1a1a2e]'"
                         class="cursor-pointer border-2 rounded-xl p-4 flex flex-col items-center justify-center gap-3 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-b from-orange-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="w-14 h-10 rounded-lg bg-white p-1.5 flex items-center justify-center shadow-md">
                            <img src="https://freelogopng.com/images/all_img/1656234857nagad-logo-png.png" alt="Nagad" class="w-full h-full object-contain">
                        </div>
                        <span class="text-white font-bold text-xs tracking-wide">Nagad</span>
                    </div>

                    <!-- Card / Visa / MasterCard -->
                    <div @click="selectedPayment = 'card'" 
                         :class="selectedPayment === 'card' ? 'border-purple-500 bg-purple-950/20 shadow-lg shadow-purple-500/10 ring-2 ring-purple-500/50' : 'border-gray-800/80 bg-[#1a1a2e]'"
                         class="cursor-pointer border-2 rounded-xl p-4 flex flex-col items-center justify-center gap-3 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-b from-purple-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="w-14 h-10 rounded-lg bg-white p-1.5 flex items-center justify-center shadow-md gap-1">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa" class="w-6 object-contain">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="w-5 object-contain">
                        </div>
                        <span class="text-white font-bold text-xs tracking-wide">Debit / Credit Card</span>
                    </div>

                    <!-- COD / Cash -->
                    <div @click="selectedPayment = 'cod'" 
                         :class="selectedPayment === 'cod' ? 'border-emerald-500 bg-emerald-950/20 shadow-lg shadow-emerald-500/10 ring-2 ring-emerald-500/50' : 'border-gray-800/80 bg-[#1a1a2e]'"
                         class="cursor-pointer border-2 rounded-xl p-4 flex flex-col items-center justify-center gap-3 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-b from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="w-14 h-10 rounded-lg bg-emerald-600/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 shadow-md">
                            <i class="fa-solid fa-wallet text-lg"></i>
                        </div>
                        <span class="text-white font-bold text-xs tracking-wide">Cash on Delivery</span>
                    </div>

                </div>

                <!-- Dynamic Payment Instruction Box -->
                <div class="bg-[#16162a] border border-gray-800 rounded-xl p-5">
                    
                    <!-- bKash Details -->
                    <template x-if="selectedPayment === 'bkash'">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-pink-400 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-pink-500 animate-pulse"></span> bKash Online Payment
                                </span>
                                <span class="text-xs bg-pink-500/20 text-pink-300 px-2.5 py-0.5 rounded-full border border-pink-500/30">Automated</span>
                            </div>
                            <p class="text-xs text-gray-400">Clicking 'Confirm' will redirect you to the secure bKash payment gateway.</p>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1">bKash Account Number</label>
                                <input type="text" placeholder="017XXXXXXXX" class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-pink-500">
                            </div>
                        </div>
                    </template>

                    <!-- Nagad Details -->
                    <template x-if="selectedPayment === 'nagad'">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-orange-400 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span> Nagad Online Payment
                                </span>
                                <span class="text-xs bg-orange-500/20 text-orange-300 px-2.5 py-0.5 rounded-full border border-orange-500/30">Automated</span>
                            </div>
                            <p class="text-xs text-gray-400">Enter your active Nagad wallet number to receive OTP confirmation.</p>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1">Nagad Account Number</label>
                                <input type="text" placeholder="018XXXXXXXX" class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-orange-500">
                            </div>
                        </div>
                    </template>

                    <!-- Card Details -->
                    <template x-if="selectedPayment === 'card'">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm font-bold text-purple-400 flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></span> SSLCommerz Secure Gateway
                                </span>
                                <span class="text-xs bg-purple-500/20 text-purple-300 px-2.5 py-0.5 rounded-full border border-purple-500/30">256-bit SSL</span>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="col-span-2">
                                    <label class="block text-xs font-semibold text-gray-400 mb-1">Card Number</label>
                                    <input type="text" placeholder="4111 2222 3333 4444" class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 mb-1">Expiry Date</label>
                                    <input type="text" placeholder="MM/YY" class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 mb-1">CVV / CVC</label>
                                    <input type="password" placeholder="123" maxlength="4" class="w-full bg-[#1a1a2e] border border-gray-800 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none focus:border-purple-500">
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- COD Details -->
                    <template x-if="selectedPayment === 'cod'">
                        <div class="space-y-2">
                            <span class="text-sm font-bold text-emerald-400 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Cash at Venue / Booth
                            </span>
                            <p class="text-xs text-gray-400">You can pay cash directly when collecting your paper tickets at the event venue ticket counter before entry.</p>
                        </div>
                    </template>

                </div>

            </div>

        </div>

        <!-- Right Side: Order Summary -->
        <div class="bg-[#121222] border border-gray-800/80 rounded-2xl p-6 h-fit space-y-6 shadow-xl">
            <h3 class="text-xl font-bold text-white border-b border-gray-800 pb-4">Order Summary</h3>
            
            <div class="space-y-4">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-400">Coke Studio Bangla (1x)</span>
                    <span class="font-semibold text-white">৳1,200</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-400">Coldplay: Music (1x)</span>
                    <span class="font-semibold text-white">৳2,500</span>
                </div>
            </div>

            <div class="space-y-3 pt-4 border-t border-gray-800 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-400">Subtotal</span>
                    <span class="font-semibold text-white">৳3,700</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-400">Platform Charge</span>
                    <span class="font-semibold text-emerald-400">FREE</span>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-4 flex justify-between items-center">
                <span class="text-base font-bold text-white">Total Payable</span>
                <span class="text-2xl font-extrabold text-purple-400">৳3,700</span>
            </div>

            <div class="space-y-3 pt-2">
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
                    Confirm & Complete Order <i class="fa-solid fa-lock text-xs"></i>
                </button>
                <a href="{{ route('cart.viewgit add .') }}" class="w-full bg-[#1a1a2e] hover:bg-[#22223b] text-gray-300 font-semibold py-3 px-4 rounded-xl border border-gray-800 transition flex items-center justify-center">
                    Back to Cart
                </a>
            </div>
        </div>

    </form>
</div>
@endsection