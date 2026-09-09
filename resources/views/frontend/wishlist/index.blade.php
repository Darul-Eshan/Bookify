@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#0B0B14] text-white py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-800">
            <div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight flex items-center gap-3">
                    <span class="p-2.5 bg-purple-950/60 border border-purple-500/30 rounded-2xl text-purple-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </span>
                    My Wishlist
                </h1>
                <p class="text-sm text-gray-400 mt-1">Manage your saved events and book tickets whenever you're ready.</p>
            </div>
            
            <!-- Dynamic Count Badge -->
            <span class="text-xs font-semibold px-3 py-1.5 bg-[#161626] border border-gray-800 rounded-xl text-purple-300">
                {{ isset($wishlists) ? count($wishlists) : 2 }} Items Saved
            </span>
        </div>

        <!-- Success Message Alert (Flash Message) -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-xl text-emerald-400 text-sm flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Wishlist Content Grid -->
        @if(isset($wishlists) && count($wishlists) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-[#121222] border border-gray-800/80 rounded-2xl overflow-hidden shadow-xl hover:border-purple-500/50 transition flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80" alt="Event" class="w-full h-full object-cover">
                            
                            <!-- Remove Form/Button -->
                            <form action="#" method="POST" class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-[#121222]/80 backdrop-blur-md border border-gray-700/60 rounded-xl text-gray-300 hover:text-red-400 transition" title="Remove from Wishlist">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                                </button>
                            </form>

                            <span class="absolute bottom-3 left-3 px-2.5 py-1 bg-purple-600/95 backdrop-blur-md text-white text-[11px] font-semibold rounded-lg shadow">
                                Live Concert
                            </span>
                        </div>

                        <div class="p-5 space-y-2">
                            <p class="text-xs text-purple-400 font-medium">15 October, 2026 • Dhaka Arena</p>
                            <h3 class="font-bold text-base text-white truncate">Coke Studio Bangla Live Concert 2026</h3>
                            <p class="text-sm font-extrabold text-white">৳1,200 <span class="text-xs text-gray-400 font-normal">onwards</span></p>
                        </div>
                    </div>

                    <!-- Add to Cart Form / Button -->
                    <div class="p-5 pt-0">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="1">
                            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#121222] border border-gray-800/80 rounded-2xl overflow-hidden shadow-xl hover:border-purple-500/50 transition flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&auto=format&fit=crop&q=80" alt="Event" class="w-full h-full object-cover">
                            
                            <form action="#" method="POST" class="absolute top-3 right-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-[#121222]/80 backdrop-blur-md border border-gray-700/60 rounded-xl text-gray-300 hover:text-red-400 transition" title="Remove from Wishlist">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                                </button>
                            </form>

                            <span class="absolute bottom-3 left-3 px-2.5 py-1 bg-purple-600/95 backdrop-blur-md text-white text-[11px] font-semibold rounded-lg shadow">
                                World Tour
                            </span>
                        </div>

                        <div class="p-5 space-y-2">
                            <p class="text-xs text-purple-400 font-medium">22 November, 2026 • Army Stadium</p>
                            <h3 class="font-bold text-base text-white truncate">Coldplay: Music of the Spheres</h3>
                            <p class="text-sm font-extrabold text-white">৳2,500 <span class="text-xs text-gray-400 font-normal">onwards</span></p>
                        </div>
                    </div>

                    <div class="p-5 pt-0">
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="2">
                            <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        @endif

        <!-- Empty State Design  -->
        <!-- 
        <div class="text-center py-20 bg-[#121222] border border-gray-800 rounded-3xl mt-6">
            <div class="w-16 h-16 bg-purple-950/50 border border-purple-500/20 text-purple-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <h3 class="text-lg font-bold text-white">Your wishlist is empty</h3>
            <p class="text-sm text-gray-400 mt-1 mb-6">Explore amazing concerts and events and save your favorites here.</p>
            <a href="{{ route('events') }}" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                Browse Events
            </a>
        </div> 
        -->

    </div>
</div>
@endsection