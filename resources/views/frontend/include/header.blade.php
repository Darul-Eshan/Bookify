<nav class="sticky top-0 z-50 bg-[#0B0B14]/90 backdrop-blur-md border-b border-gray-800/50 px-6 py-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
        
        <!-- Left: Brand Logo & Main Nav -->
        <div class="flex items-center gap-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-white font-bold text-xl tracking-tight">
                <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2 rounded-xl text-white shadow-lg shadow-purple-600/30">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                </span>
                E-Ticket
            </a>
            
            <!-- Navigation Links -->
            <div class="hidden lg:flex items-center gap-1.5 bg-[#161626] border border-gray-800 rounded-xl px-2 py-1 text-sm">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'bg-[#232338] text-white px-3 py-1.5 rounded-lg transition font-medium' : 'text-gray-400 hover:text-white px-3 py-1.5 transition' }}">Home</a>
                
                <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'text-purple-400 font-semibold px-3 py-1.5 bg-[#232338] rounded-lg' : 'text-gray-400 hover:text-white px-3 py-1.5 transition' }}">All Events</a>

               <!-- Offers & Promos -->
<a href="{{ route('offers') }}" class="{{ request()->routeIs('offers') ? 'text-purple-400 font-semibold px-3 py-1.5 bg-[#232338] rounded-lg' : 'text-gray-400 hover:text-white px-3 py-1.5 transition' }}">Offers</a>

<!-- Support / Contact -->
<a href="{{ route('support') }}" class="{{ request()->routeIs('support') ? 'text-purple-400 font-semibold px-3 py-1.5 bg-[#232338] rounded-lg' : 'text-gray-400 hover:text-white px-3 py-1.5 transition' }}">Support</a>
            </div>
        </div>

        <!-- Center: Search Bar -->
        <div class="flex-1 max-w-md hidden sm:block">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" placeholder="Search events, artists, cities..." class="w-full bg-[#141424] text-sm text-gray-200 border border-gray-800 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:border-purple-500 placeholder-gray-500 transition">
            </div>
        </div>

        <!-- Right: Cart & Sign In Actions -->
        <div class="flex items-center gap-4">
            
            <!-- Cart Dropdown Menu -->
            <div class="relative" x-data="{ open: false }">
                <!-- Cart Button (Click to Toggle) -->
                <button @click="open = !open" @click.away="open = false" class="relative text-gray-300 hover:text-white p-2.5 rounded-xl bg-[#161626] border border-gray-800 transition flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    
                    <!-- Item Badge -->
                    <span class="absolute -top-1 -right-1 bg-purple-600 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">2</span>
                </button>

                <!-- Professional Large Popup Box (Dropdown) -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                     style="display: none;"
                     class="absolute right-0 mt-3 w-96 bg-[#121222] border border-gray-800/80 rounded-2xl shadow-2xl p-5 z-50 text-white backdrop-blur-xl">
                    
                    <!-- Header -->
                    <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                        <div class="flex items-center gap-2">
                            <h3 class="font-bold text-base">Shopping Cart</h3>
                            <span class="text-xs px-2 py-0.5 bg-purple-950 text-purple-300 border border-purple-500/30 rounded-full font-semibold">2 Items</span>
                        </div>
                        <span class="text-xs text-gray-400 cursor-pointer hover:text-white transition">Clear All</span>
                    </div>

                    <!-- Scrollable Items List -->
                    <div class="py-3 max-h-64 overflow-y-auto space-y-3 pr-1 scrollbar-thin scrollbar-thumb-purple-600">
                        <!-- Item 1 -->
                        <div class="flex items-center justify-between gap-3 bg-[#18182f] p-2.5 rounded-xl border border-gray-800/50">
                            <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=600&auto=format&fit=crop&q=80" alt="Event" class="w-14 h-14 object-cover rounded-lg">
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-bold text-white truncate">Coke Studio Bangla Live Concert 2026</h4>
                                <p class="text-[11px] text-gray-400">Qty: 1 x <span class="text-purple-400 font-semibold">৳1,200</span></p>
                            </div>
                            <button class="text-gray-400 hover:text-red-400 p-1.5 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                            </button>
                        </div>

                        <!-- Item 2 -->
                        <div class="flex items-center justify-between gap-3 bg-[#18182f] p-2.5 rounded-xl border border-gray-800/50">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&auto=format&fit=crop&q=80" alt="Event" class="w-14 h-14 object-cover rounded-lg">
                            <div class="flex-1 min-w-0">
                                <h4 class="text-xs font-bold text-white truncate">Coldplay: Music of the Spheres</h4>
                                <p class="text-[11px] text-gray-400">Qty: 1 x <span class="text-purple-400 font-semibold">৳2,500</span></p>
                            </div>
                            <button class="text-gray-400 hover:text-red-400 p-1.5 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Footer Summary & Actions -->
                    <div class="pt-3 border-t border-gray-800 space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-400 font-medium">Subtotal:</span>
                            <span class="font-extrabold text-white text-base">৳3,700</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('cart.view') }}" class="block text-center py-2.5 bg-[#1f1f38] hover:bg-[#282848] text-white text-xs font-semibold rounded-xl border border-gray-700/60 transition">
                                View Cart
                            </a>
                            <a href="{{ route('checkout.view') }}" class="block text-center py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sign In Button -->
            <a href="{{ route('login') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-medium text-sm px-5 py-2.5 rounded-xl shadow-lg shadow-purple-600/20 hover:opacity-95 transition">
                Sign In
            </a>
        </div>
    </div>
</nav>