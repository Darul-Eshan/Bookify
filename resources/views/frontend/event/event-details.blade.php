@extends('frontend.layout.master')

@section('section')
<div class="max-w-6xl mx-auto px-6 py-12">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-400 hover:text-white bg-[#121222] border border-gray-800 px-4 py-2 rounded-xl transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Events
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Side: Event Main Details & Features -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Banner Card -->
            <div class="bg-[#121222] border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">
                <div class="relative h-80 w-full">
                    <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#121222] via-transparent to-transparent"></div>
                    <span class="absolute top-4 left-4 px-3 py-1.5 rounded-full text-xs font-semibold bg-purple-950/90 text-purple-300 border border-purple-500/30 backdrop-blur-md flex items-center gap-1">
                        🎵 {{ $event['category'] }}
                    </span>
                    <span class="absolute top-4 right-4 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-950/90 text-emerald-300 border border-emerald-500/30 backdrop-blur-md">
                        🟢 Tickets Available
                    </span>
                </div>

                <div class="p-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">{{ $event['title'] }}</h1>
                    <p class="text-purple-400 font-medium text-lg mb-6">Performers: {{ $event['artist'] }}</p>

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 bg-[#1a1a2e] p-4 rounded-2xl border border-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-purple-400 border border-purple-500/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400 block">Date & Time</span>
                                <strong class="text-white text-sm">{{ $event['date'] }} (6:00 PM)</strong>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-purple-400 border border-purple-500/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400 block">Location</span>
                                <strong class="text-white text-sm">{{ $event['location'] }}</strong>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-yellow-400 border border-purple-500/20">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>
                            <div>
                                <span class="text-xs text-gray-400 block">User Rating</span>
                                <strong class="text-white text-sm">★ {{ $event['rating'] }} (1.2k Reviews)</strong>
                            </div>
                        </div>
                    </div>

                    <!-- About Description -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-white mb-3">About This Event</h3>
                        <p class="text-gray-300 leading-relaxed mb-4">{{ $event['description'] }}</p>
                        <p class="text-gray-400 text-sm leading-relaxed">Prepare yourself for an unforgettable night filled with high-energy music, mesmerizing lights, and world-class sound engineering. Secure your entry passes early before slots run out!</p>
                    </div>

                    <!-- Event Features / Highlights -->
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Event Highlights & Amenities</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                🎸 Live Sound & Stage
                            </div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                🛡️ Secure Entry (QR Code)
                            </div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                🍔 Food & Beverages Zone
                            </div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                🅿️ Free Parking Space
                            </div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                📸 Media & Photography
                            </div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300 flex items-center gap-2">
                                🚻 Restroom Facilities
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side: Real-Time Ticket Booking Box & Process -->
        <div class="lg:col-span-1">
            <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 shadow-2xl sticky top-6">
                <h3 class="text-xl font-bold text-white mb-4 pb-3 border-b border-gray-800">Book Your Ticket</h3>
                
                <!-- Ticket Tier -->
                <div class="mb-4">
                    <label class="block text-xs text-gray-400 mb-1.5 font-medium">Select Ticket Category</label>
                    <select class="w-full bg-[#1a1a2e] border border-gray-700 text-white text-sm rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">
                        <option>Regular Pass - {{ $event['price'] }}</option>
                        <option>VIP Pass - BDT 2,500</option>
                        <option>VVIP Front Row - BDT 4,500</option>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label class="block text-xs text-gray-400 mb-1.5 font-medium">Number of Tickets</label>
                    <div class="flex items-center justify-between bg-[#1a1a2e] border border-gray-700 px-4 py-2.5 rounded-xl">
                        <span class="text-sm text-white font-medium">Quantity</span>
                        <div class="flex items-center gap-3">
                            <button class="w-7 h-7 rounded-lg bg-gray-800 text-white font-bold hover:bg-purple-600 transition">-</button>
                            <span class="text-white font-bold">1</span>
                            <button class="w-7 h-7 rounded-lg bg-gray-800 text-white font-bold hover:bg-purple-600 transition">+</button>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="mb-6">
                    <label class="block text-xs text-gray-400 mb-1.5 font-medium">Select Payment Gateway</label>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="border border-purple-500 bg-purple-950/30 text-white text-xs font-semibold py-2.5 rounded-xl text-center cursor-pointer">
                            bKash
                        </div>
                        <div class="border border-gray-800 bg-[#1a1a2e] text-gray-400 hover:text-white text-xs font-semibold py-2.5 rounded-xl text-center cursor-pointer transition">
                            Nagad
                        </div>
                        <div class="border border-gray-800 bg-[#1a1a2e] text-gray-400 hover:text-white text-xs font-semibold py-2.5 rounded-xl text-center cursor-pointer transition">
                            Card / Bank
                        </div>
                    </div>
                </div>

                <!-- Pricing Summary -->
                <div class="space-y-2 mb-6 text-sm border-t border-gray-800 pt-4">
                    <div class="flex justify-between text-gray-400">
                        <span>Base Price</span>
                        <span class="text-white font-medium">{{ $event['price'] }}</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>VAT & Gateway Fee</span>
                        <span class="text-white font-medium">BDT 50</span>
                    </div>
                    <div class="flex justify-between text-base font-bold text-white pt-2 border-t border-gray-800/60">
                        <span>Total Payable</span>
                        <span class="text-purple-400">{{ $event['price'] }}</span>
                    </div>
                </div>

                <!-- Confirm Action -->
                <button onclick="alert('Redirecting to secure payment gateway...')" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold shadow-lg shadow-purple-600/30 hover:from-purple-500 hover:to-indigo-500 transition text-center block">
                    Proceed to Checkout
                </button>

                <p class="text-[11px] text-gray-500 text-center mt-3">🔒 100% Secure Transaction & Instant Digital E-Ticket Generation</p>
            </div>
        </div>
    </div>
</div>
@endsection