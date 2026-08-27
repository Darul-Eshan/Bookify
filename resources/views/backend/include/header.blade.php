<header class="bg-[#121222] border-b border-gray-800 h-16 flex items-center justify-between px-6 sticky top-0 z-30">
    <!-- Left: Toggle & Search -->
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="text-gray-400 hover:text-white focus:outline-none lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="relative hidden md:block">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" placeholder="Search anything..." class="bg-[#161628] text-sm text-gray-200 border border-gray-800 rounded-xl pl-10 pr-4 py-2 focus:outline-none focus:border-purple-500 w-64 transition">
        </div>
    </div>

    <!-- Right: Profile & Notifications -->
    <div class="flex items-center gap-4">
        <button class="relative text-gray-400 hover:text-white p-2 rounded-xl bg-[#161628] border border-gray-800 transition">
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-purple-500 rounded-full animate-pulse"></span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </button>

        <div class="flex items-center gap-3 pl-3 border-l border-gray-800">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-purple-600 to-indigo-500 flex items-center justify-center font-bold text-white shadow-lg shadow-purple-600/30">
                A
            </div>
            <div class="hidden sm:block text-left">
                <h4 class="text-sm font-semibold text-white leading-tight">Admin User</h4>
                <span class="text-xs text-purple-400 font-medium">Administrator</span>
            </div>
        </div>
    </div>
</header>