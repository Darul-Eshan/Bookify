<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - E-Ticket</title>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0B14] text-gray-200 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Include -->
        @include('backend.include.sidebar')

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">
            <!-- Header Include -->
            @include('backend.include.header')

            <!-- Main Dynamic Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">
                
                <!-- Page Header Title -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-white tracking-tight">Dashboard Overview</h1>
                    <p class="text-sm text-gray-400 mt-1">Here is what's happening with your platform today.</p>
                </div>

                <!-- Statistics Cards Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Users</p>
                                <h3 class="text-2xl font-bold text-white mt-1">1,245</h3>
                            </div>
                            <span class="p-3 bg-purple-600/10 text-purple-400 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </span>
                        </div>
                        <span class="text-xs text-emerald-400 font-medium mt-3 inline-block">+12% from last month</span>
                    </div>

                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Events</p>
                                <h3 class="text-2xl font-bold text-white mt-1">48</h3>
                            </div>
                            <span class="p-3 bg-indigo-600/10 text-indigo-400 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </span>
                        </div>
                        <span class="text-xs text-emerald-400 font-medium mt-3 inline-block">+4 new this week</span>
                    </div>

                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Tickets Sold</p>
                                <h3 class="text-2xl font-bold text-white mt-1">3,840</h3>
                            </div>
                            <span class="p-3 bg-emerald-600/10 text-emerald-400 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            </span>
                        </div>
                        <span class="text-xs text-emerald-400 font-medium mt-3 inline-block">+18% growth</span>
                    </div>

                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Revenue</p>
                                <h3 class="text-2xl font-bold text-white mt-1">$24,500</h3>
                            </div>
                            <span class="p-3 bg-amber-600/10 text-amber-400 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                        </div>
                        <span class="text-xs text-emerald-400 font-medium mt-3 inline-block">+8.4% this month</span>
                    </div>
                </div>

                <!-- Recent Bookings Table -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">
                    <h3 class="text-lg font-bold text-white mb-4">Recent Bookings</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-300">
                            <thead class="bg-[#161628] text-gray-400 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="p-3 rounded-l-xl">User</th>
                                    <th class="p-3">Event Name</th>
                                    <th class="p-3">Tickets</th>
                                    <th class="p-3">Amount</th>
                                    <th class="p-3 rounded-r-xl">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                <tr>
                                    <td class="p-3 font-medium text-white">John Doe</td>
                                    <td class="p-3">Rock Concert 2026</td>
                                    <td class="p-3">2</td>
                                    <td class="p-3">$120.00</td>
                                    <td class="p-3"><span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">Completed</span></td>
                                </tr>
                                <tr>
                                    <td class="p-3 font-medium text-white">Sarah Smith</td>
                                    <td class="p-3">Tech Summit</td>
                                    <td class="p-3">1</td>
                                    <td class="p-3">$75.00</td>
                                    <td class="p-3"><span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

            <!-- Footer Include -->
            @include('backend.include.footer')
        </div>
    </div>

</body>
</html>