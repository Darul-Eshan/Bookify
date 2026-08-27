    
<nav class="sticky top-0 z-50 bg-[#0B0B14]/80 backdrop-blur-md border-b border-gray-800/50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <div class="flex items-center gap-8">
                <a href="#" class="flex items-center gap-2 text-white font-bold text-xl tracking-tight">
                    <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2 rounded-xl text-white shadow-lg shadow-purple-600/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </span>
                    E-Ticket
                </a>
                
                <div class="hidden md:flex items-center gap-2 bg-[#161626] border border-gray-800 rounded-lg px-3 py-1.5 text-sm">
                    <a href="{{route('home')}}" class="bg-[#232338] text-white px-3 py-1 rounded-md transition font-medium">Home</a>
                    <a href="{{ route('events') }}" class="{{ request()->routeIs('events') ? 'text-purple-400 font-semibold border-b-2 border-purple-500 pb-1' : 'hover:text-purple-400 transition' }}">
    All Events
</a>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="flex-1 max-w-md hidden sm:block">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" placeholder="Search events, artists, cities..." class="w-full bg-[#141424] text-sm text-gray-200 border border-gray-800 rounded-full pl-10 pr-4 py-2 focus:outline-none focus:border-purple-500 placeholder-gray-500 transition">
                </div>
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-4">
                <button class="text-gray-300 hover:text-white p-2 rounded-lg bg-[#161626] border border-gray-800/80">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"></path></svg>
                </button>
                <a href="{{route('login')}}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-medium text-sm px-5 py-2 rounded-xl shadow-lg shadow-purple-600/20 hover:opacity-95 transition">
                    Sign In
                </a>
            </div>
        </div>
    </nav>