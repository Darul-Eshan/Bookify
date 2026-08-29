<aside class="w-64 bg-[#121222] border-r border-gray-800 flex flex-col fixed inset-y-0 left-0 z-40 transition-transform duration-300 lg:translate-x-0 overflow-hidden" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    <!-- Logo Area -->
    <div class="h-16 flex items-center gap-2 px-6 border-b border-gray-800">
        <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2 rounded-xl text-white shadow-lg shadow-purple-600/30">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
        </span>
        <span class="text-white font-bold text-xl tracking-tight">Admin Dashboard</span>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5">
    
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628] font-medium' }} text-sm transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        <!-- Events Manager with Dropdown (Alpine.js) -->
        <div x-data="{ open: {{ request()->routeIs('admin.events*') ? 'true' : 'false' }} }" class="space-y-1">
            <button @click="open = !open" 
                    class="w-full flex items-center justify-between px-4 py-3 rounded-xl {{ request()->routeIs('admin.events*') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628] font-medium' }} text-sm transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Events Manager</span>
                </div>
                <!-- Dropdown Arrow Icon -->
                <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Sub-menu Items -->
<div x-show="open" x-transition.origin.top.duration.200ms class="pl-11 pr-2 space-y-1 py-1" style="display: none;">
    <a href="{{ route('admin.events') }}" class="block px-3 py-2 rounded-lg text-xs font-medium {{ request()->routeIs('admin.events') ? 'text-purple-400 bg-purple-600/10' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} transition">
        Manage Events
    </a>
    <a href="{{ route('admin.event.organizers') }}" class="block px-3 py-2 rounded-lg text-xs font-medium {{ request()->routeIs('admin.event.organizers') ? 'text-purple-400 bg-purple-600/10' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} transition">
        Event Organizers
    </a>
    <a href="{{ route('admin.event.schedules') }}" class="block px-3 py-2 rounded-lg text-xs font-medium {{ request()->routeIs('admin.event.schedules') ? 'text-purple-400 bg-purple-600/10' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} transition">
        Event Schedule
    </a>
</div>
        </div>

        <!-- Users List -->
     <a href="{{ route('admin.users') }}" 
     class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.users') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} font-medium text-sm transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
    Users List
    </a>

        <!-- Bookings & Tickets -->
       <a href="{{ route('admin.bookings') }}" class="flex items-center gap-3 px-3 py-2 text-sm text-gray-400 hover:text-white rounded-xl hover:bg-gray-800/50 transition">
       <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
       </svg>
       All Bookings
       </a>

       <!-- Categories Menu -->
    <a href="{{ route('admin.categories') }}" 
   class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.categories') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} font-medium text-sm transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
    </svg>
    Categories
    </a>

        <!-- Coupons & Offers -->
        <a href="{{ route('admin.coupons') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.coupons') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} font-medium text-sm transition">
       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
       Coupons & Promos
       </a>

        <!-- Transactions & Payments -->
        <a href="{{ route('admin.transactions') }}" 
       class="flex items-center gap-3 px-4 py-3 rounded-xl {{ request()->routeIs('admin.transactions') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} font-medium text-sm transition">
       <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
        Transactions
       </a>

       
       <!-- Settings Dropdown Menu with Admin Categories -->
<div class="space-y-1" x-data="{ openSettings: {{ request()->routeIs('admin.settings*') || request()->routeIs('admin.admins*') ? 'true' : 'false' }} }">
    <!-- Main Settings Button -->
    <button @click="openSettings = !openSettings" 
            class="w-full flex items-center justify-between px-4 py-3 rounded-xl {{ request()->routeIs('admin.settings*') || request()->routeIs('admin.admins*') ? 'bg-purple-600/10 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} font-medium text-sm transition">
        <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </div>
        <!-- Arrow Icon -->
        <svg class="w-4 h-4 transition-transform duration-200" :class="openSettings ? 'rotate-180 text-purple-400' : 'text-gray-500'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <!-- Dropdown Sub-menu Items -->
    <div x-show="openSettings" x-transition.origin.top.duration.200ms class="pl-11 pr-2 space-y-1 py-1" style="display: none;">
        <!-- Main Admin List Link -->
        <a href="{{ route('admin.admins.index') }}" class="block px-3 py-2 rounded-lg text-xs font-medium {{ request()->routeIs('admin.admins.*') ? 'bg-purple-600/20 text-purple-400 font-semibold' : 'text-gray-400 hover:text-white hover:bg-[#161628]' }} transition">
            🛡️ All Admins
        </a>
        
        <!-- Admin Categories Sub-options -->
        <a href="{{ route('admin.admins.index') }}?role=Super Admin" class="block px-3 py-1.5 rounded-lg text-[11px] font-medium text-gray-400 hover:text-purple-400 hover:bg-[#161628] transition pl-6">
            • Super Admin
        </a>
        <a href="{{ route('admin.admins.index') }}?role=Editor" class="block px-3 py-1.5 rounded-lg text-[11px] font-medium text-gray-400 hover:text-purple-400 hover:bg-[#161628] transition pl-6">
            • Editor
        </a>
        <a href="{{ route('admin.admins.index') }}?role=Moderator" class="block px-3 py-1.5 rounded-lg text-[11px] font-medium text-gray-400 hover:text-purple-400 hover:bg-[#161628] transition pl-6">
            • Moderator
        </a>
        <a href="{{ route('admin.admins.index') }}?role=Support Admin" class="block px-3 py-1.5 rounded-lg text-[11px] font-medium text-gray-400 hover:text-purple-400 hover:bg-[#161628] transition pl-6">
            • Support Admin
        </a>

    </div>
</div>

    </div>

    <!-- Back to Website Option -->
    <div class="p-4 border-t border-gray-800">
        <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 font-medium text-sm transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            Back to Website
        </a>
    </div>
</aside>