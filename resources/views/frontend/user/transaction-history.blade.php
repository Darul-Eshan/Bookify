@extends('frontend.layout.master')

@section('section')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Transaction History</h1>
            <p class="text-sm text-gray-400 mt-1">View all your ticket purchases, payments, and refund logs.</p>
        </div>

        <!-- Quick Stats or Filters -->
        <div class="flex items-center gap-3">
            <div class="bg-[#121222] border border-gray-800 rounded-xl px-4 py-2 text-xs text-gray-300">
                Total Spent: <span class="text-purple-400 font-bold">৳3,700</span>
            </div>
            <div class="bg-[#121222] border border-gray-800 rounded-xl px-4 py-2 text-xs text-gray-300">
                Total Transactions: <span class="text-white font-bold">2</span>
            </div>
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="bg-[#121222] border border-gray-800/80 rounded-3xl shadow-2xl overflow-hidden backdrop-blur-xl">
        
        <!-- Table Header / Filters bar -->
        <div class="p-5 border-b border-gray-800/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h2 class="text-base font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                Recent Transactions
            </h2>
            
            <!-- Search / Filter input -->
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" placeholder="Search transaction ID..." class="w-full sm:w-64 bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl pl-9 pr-4 py-2 focus:outline-none focus:border-purple-500 transition">
            </div>
        </div>

        <!-- Transactions Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#16162a]/50">
                        <th class="py-4 px-6">Transaction ID</th>
                        <th class="py-4 px-6">Event / Purpose</th>
                        <th class="py-4 px-6">Gateway</th>
                        <th class="py-4 px-6">Amount</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Date & Time</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm">
                    
                    <!-- Row 1 -->
                    <tr class="hover:bg-[#18182f]/50 transition">
                        <td class="py-4 px-6 font-mono text-xs font-bold text-purple-400">TXN-85920341</td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-white text-xs">Coke Studio Bangla Live Concert 2026</div>
                            <div class="text-[11px] text-gray-400">1x Regular Ticket</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 bg-pink-500/10 text-pink-400 border border-pink-500/20 rounded-lg text-xs font-semibold">Bkash</span>
                        </td>
                        <td class="py-4 px-6 font-extrabold text-white">৳1,200</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Completed
                            </span>
                        </td>
                        <td class="py-4 px-6 text-xs text-gray-400">04 Sep 2026, 10:45 PM</td>
                        <td class="py-4 px-6 text-right">
                            <button class="px-3 py-1.5 bg-[#1f1f38] hover:bg-[#282848] text-gray-300 hover:text-white text-xs font-semibold rounded-xl border border-gray-700/60 transition">
                                Invoice
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2 -->
                    <tr class="hover:bg-[#18182f]/50 transition">
                        <td class="py-4 px-6 font-mono text-xs font-bold text-purple-400">TXN-74129038</td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-white text-xs">Coldplay: Music of the Spheres</div>
                            <div class="text-[11px] text-gray-400">1x VIP Seated Ticket</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-lg text-xs font-semibold">SSLCommerz</span>
                        </td>
                        <td class="py-4 px-6 font-extrabold text-white">৳2,500</td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> Completed
                            </span>
                        </td>
                        <td class="py-4 px-6 text-xs text-gray-400">02 Sep 2026, 03:15 PM</td>
                        <td class="py-4 px-6 text-right">
                            <button class="px-3 py-1.5 bg-[#1f1f38] hover:bg-[#282848] text-gray-300 hover:text-white text-xs font-semibold rounded-xl border border-gray-700/60 transition">
                                Invoice
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="p-4 border-t border-gray-800 flex items-center justify-between text-xs text-gray-400">
            <span>Showing 2 of 2 entries</span>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1.5 bg-[#18182f] text-gray-500 rounded-lg cursor-not-allowed" disabled>Previous</button>
                <button class="px-3 py-1.5 bg-purple-600 text-white font-semibold rounded-lg">1</button>
                <button class="px-3 py-1.5 bg-[#18182f] text-gray-300 hover:bg-[#22223b] rounded-lg transition">Next</button>
            </div>
        </div>

    </div>
</div>
@endsection