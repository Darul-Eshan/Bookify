@extends('backend.layout.master')

@section('content')
    <!-- Page Header Title -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Dashboard Overview</h1>
          
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1.5 bg-[#161628] border border-gray-800 rounded-xl text-xs text-gray-300 font-medium">
                Live System Active 🚀
            </span>
        </div>
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
                    <h3 class="text-2xl font-bold text-white mt-1">৳2,45,000</h3>
                </div>
                <span class="p-3 bg-amber-600/10 text-amber-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
            </div>
            <span class="text-xs text-emerald-400 font-medium mt-3 inline-block">+8.4% this month</span>
        </div>
    </div>

    <!-- Secondary Grid: Trending Events & Payment Method Breakdown -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        
        <!-- Trending Events (Takes 2 Columns) -->
        <div class="lg:col-span-2 bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-white">Trending Top Events</h3>
                <a href="#" class="text-xs text-purple-400 hover:underline">View All</a>
            </div>
            <div class="space-y-4">
                <!-- Event 1 -->
                <div class="flex items-center justify-between p-3 bg-[#18182f] rounded-xl border border-gray-800/50">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?w=100&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-lg object-cover" alt="Event">
                        <div>
                            <h4 class="text-sm font-bold text-white">Coke Studio Bangla Live 2026</h4>
                            <p class="text-xs text-gray-400">Sold: <span class="text-purple-400 font-semibold">1,250 / 1,500 Tickets</span></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 bg-purple-600/20 text-purple-300 rounded-lg text-xs font-bold">83% Sold</span>
                </div>

                <!-- Event 2 -->
                <div class="flex items-center justify-between p-3 bg-[#18182f] rounded-xl border border-gray-800/50">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=100&auto=format&fit=crop&q=80" class="w-12 h-12 rounded-lg object-cover" alt="Event">
                        <div>
                            <h4 class="text-sm font-bold text-white">Coldplay Music of the Spheres</h4>
                            <p class="text-xs text-gray-400">Sold: <span class="text-purple-400 font-semibold">980 / 1,000 Tickets</span></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 bg-emerald-600/20 text-emerald-300 rounded-lg text-xs font-bold">98% Sold</span>
                </div>
            </div>
        </div>

        <!-- Payment Method Breakdown (Takes 1 Column) -->
        <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">
            <h3 class="text-lg font-bold text-white mb-4">Payment Methods</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-300 font-medium">bKash</span>
                        <span class="text-purple-400 font-bold">45%</span>
                    </div>
                    <div class="w-full bg-gray-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-pink-600 h-full rounded-full" style="width: 45%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-300 font-medium">Nagad</span>
                        <span class="text-purple-400 font-bold">25%</span>
                    </div>
                    <div class="w-full bg-gray-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-orange-500 h-full rounded-full" style="width: 25%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-300 font-medium">Credit / Debit Card</span>
                        <span class="text-purple-400 font-bold">20%</span>
                    </div>
                    <div class="w-full bg-gray-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-indigo-500 h-full rounded-full" style="width: 20%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-gray-300 font-medium">Cash on Delivery</span>
                        <span class="text-purple-400 font-bold">10%</span>
                    </div>
                    <div class="w-full bg-gray-800 h-2 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full rounded-full" style="width: 10%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Recent Bookings Table -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-white">Recent Bookings</h3>
            <span class="text-xs text-gray-400">Showing latest transactions</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-300">
                <thead class="bg-[#161628] text-gray-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-3 rounded-l-xl">User</th>
                        <th class="p-3">Event Name</th>
                        <th class="p-3">Method</th>
                        <th class="p-3">Tickets</th>
                        <th class="p-3">Amount</th>
                        <th class="p-3 rounded-r-xl">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    <tr>
                        <td class="p-3 font-medium text-white">John Doe</td>
                        <td class="p-3">Rock Concert 2026</td>
                        <td class="p-3"><span class="text-xs px-2 py-0.5 bg-pink-950 text-pink-300 rounded-md font-semibold">bKash</span></td>
                        <td class="p-3">2</td>
                        <td class="p-3">৳1,200</td>
                        <td class="p-3"><span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">Completed</span></td>
                    </tr>
                    <tr>
                        <td class="p-3 font-medium text-white">Sarah Smith</td>
                        <td class="p-3">Tech Summit</td>
                        <td class="p-3"><span class="text-xs px-2 py-0.5 bg-orange-950 text-orange-300 rounded-md font-semibold">Nagad</span></td>
                        <td class="p-3">1</td>
                        <td class="p-3">৳2,500</td>
                        <td class="p-3"><span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection