@extends('frontend.layout.master')

@section('section')

<div class="max-w-6xl mx-auto px-6 py-12" x-data="{ qty: 1, basePrice: {{ $event->price ?? 0 }} }">

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('events') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-400 hover:text-white bg-[#121222] border border-gray-800 px-4 py-2 rounded-xl transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Events
        </a>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/20 border border-emerald-500/50 text-emerald-400 rounded-xl text-sm flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <a href="{{ route('cart.view') }}" class="underline font-bold">View Cart</a>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- LEFT SIDE -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-[#121222] border border-gray-800 rounded-3xl overflow-hidden shadow-2xl">
                <!-- Banner -->
                <div class="relative h-80 w-full">
                    <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#121222] via-transparent to-transparent"></div>

                    <!-- Category -->
                    <span class="absolute top-4 left-4 px-3 py-1.5 rounded-full text-xs font-semibold bg-purple-950/90 text-purple-300 border border-purple-500/30 backdrop-blur-md flex items-center gap-1">
                        🎵 {{ $event->categoryRelation?->name ?? $event->category ?? 'General' }}
                    </span>

                    <!-- Availability -->
                    <span class="absolute top-4 right-4 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-950/90 text-emerald-300 border border-emerald-500/30 backdrop-blur-md">
                        🟢 Tickets Available
                    </span>
                </div>

                <!-- Main Content -->
                <div class="p-8">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-6">{{ $event->title }}</h1>

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8 bg-[#1a1a2e] p-4 rounded-2xl border border-gray-800">
                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-purple-400 border border-purple-500/20">📅</div>
                            <div>
                                <span class="text-xs text-gray-400 block">Date & Time</span>
                                <strong class="text-white text-sm">
                                    {{ $event->date_time ? $event->date_time->format('M d, Y - h:i A') : 'Not available' }}
                                </strong>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-purple-400 border border-purple-500/20">📍</div>
                            <div>
                                <span class="text-xs text-gray-400 block">Location</span>
                                <strong class="text-white text-sm">{{ $event->venue ?: 'Not available' }}</strong>
                            </div>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="p-2.5 rounded-xl bg-purple-950/50 text-yellow-400 border border-purple-500/20">🎟️</div>
                            <div>
                                <span class="text-xs text-gray-400 block">Capacity</span>
                                <strong class="text-white text-sm">{{ $event->capacity }} seats</strong>
                            </div>
                        </div>
                    </div>

                    <!-- About This Event -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-white mb-3">About This Event</h3>
                        <div class="text-gray-300 leading-relaxed space-y-3">
                            @if(!empty($event->description))
                                {!! nl2br(e($event->description)) !!}
                            @else
                                <p>Join us for <strong>{{ $event->title }}</strong> and experience an unforgettable event.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Highlights -->
                    <div>
                        <h3 class="text-xl font-bold text-white mb-4">Event Highlights & Amenities</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">🎸 Live Event</div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">🛡️ Secure Entry</div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">🎟️ Digital Ticket</div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">📸 Photography</div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">🚻 Facilities</div>
                            <div class="bg-[#1a1a2e] p-3 rounded-xl border border-gray-800 text-sm text-gray-300">🔒 Secure Booking</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE: BOOKING & CART FORM -->
        <div class="lg:col-span-1">
            <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 shadow-2xl sticky top-6">
                <h3 class="text-xl font-bold text-white mb-4 pb-3 border-b border-gray-800">Book Your Ticket</h3>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <!-- Hidden Form Inputs -->
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="event_title" value="{{ $event->title }}">
                    <input type="hidden" name="event_image" value="{{ $event->image_url }}">
                    <input type="hidden" name="location" value="{{ $event->venue }}">
                    <input type="hidden" name="price" value="{{ $event->price }}">
                    <input type="hidden" name="quantity" :value="qty">

                    <!-- Ticket Price -->
                    <div class="mb-5">
                        <span class="text-xs text-gray-400 block mb-1">Ticket Price</span>
                        <span class="text-2xl font-bold text-purple-400">
                            @if($event->price > 0)
                                BDT {{ number_format($event->price, 2) }}
                            @else
                                FREE
                            @endif
                        </span>
                    </div>

                    <!-- Quantity Controls -->
                    <div class="mb-4">
                        <label class="block text-xs text-gray-400 mb-1.5 font-medium">Number of Tickets</label>
                        <div class="flex items-center justify-between bg-[#1a1a2e] border border-gray-700 px-4 py-2.5 rounded-xl">
                            <span class="text-sm text-white font-medium">Quantity</span>
                            <div class="flex items-center gap-3">
                                <button type="button" @click="if(qty > 1) qty--" class="w-7 h-7 rounded-lg bg-gray-800 text-white font-bold hover:bg-purple-600 transition flex items-center justify-center">-</button>
                                <span class="text-white font-bold" x-text="qty">1</span>
                                <button type="button" @click="qty++" class="w-7 h-7 rounded-lg bg-gray-800 text-white font-bold hover:bg-purple-600 transition flex items-center justify-center">+</button>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Summary -->
                    <div class="space-y-2 mb-6 text-sm border-t border-gray-800 pt-4">
                        <div class="flex justify-between text-gray-400">
                            <span>Base Price</span>
                            <span class="text-white font-medium" x-text="'BDT ' + (basePrice * qty).toLocaleString()">
                                BDT {{ number_format($event->price, 2) }}
                            </span>
                        </div>
                        <div class="flex justify-between text-gray-400">
                            <span>VAT & Gateway Fee</span>
                            <span class="text-white font-medium">BDT 50</span>
                        </div>
                        <div class="flex justify-between text-base font-bold text-white pt-2 border-t border-gray-800/60">
                            <span>Total Payable</span>
                            <span class="text-purple-400" x-text="'BDT ' + ((basePrice * qty) + 50).toLocaleString()">
                                BDT {{ number_format($event->price + 50, 2) }}
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button type="submit" class="w-full py-3 bg-purple-600 hover:bg-purple-500 text-white font-semibold rounded-xl transition flex items-center justify-center gap-2 shadow-lg shadow-purple-600/30">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Add to Cart
                        </button>

                        <!-- Temporarily Disabled Checkout Button -->
                        <button type="button" onclick="alert('Checkout function is currently disabled.')" class="w-full py-3 bg-gray-800/80 text-gray-500 font-semibold rounded-xl cursor-not-allowed border border-gray-700/50 text-center">
                            Proceed to Checkout (Disabled)
                        </button>
                    </div>
                </form>

                <p class="text-[11px] text-gray-500 text-center mt-3">
                    🔒 100% Secure Transaction & Instant Digital E-Ticket Generation
                </p>
            </div>
        </div>

    </div>

</div>

@endsection