@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    search: '',
    statusFilter: 'all',
    selectedTxn: null,
    detailsModal: false,
    transactions: [
        { id: 'TXN-982341', user: 'Tanvir Ahmed', email: 'tanvir@gmail.com', event: 'Tech & Startup Summit', amount: '৳2,500', method: 'BKash', phone: '01711223344', status: 'success', date: '29 Aug, 2026 04:30 PM' },
        { id: 'TXN-982342', user: 'Rahim Khan', email: 'rahim@gmail.com', event: 'Music & Concerts Night', amount: '৳1,200', method: 'Nagad', phone: '01811223344', status: 'pending', date: '30 Aug, 2026 10:15 AM' },
        { id: 'TXN-982343', user: 'Sadia Sultana', email: 'sadia@gmail.com', event: 'UI/UX Design Workshop', amount: '৳3,000', method: 'SSLCommerz', phone: '01911223344', status: 'success', date: '30 Aug, 2026 01:20 PM' },
        { id: 'TXN-982344', user: 'Karim Uddin', email: 'karim@gmail.com', event: 'Digital Marketing Mastery', amount: '৳1,500', method: 'Rocket', phone: '01511223344', status: 'failed', date: '28 Aug, 2026 06:40 PM' }
    ],
    get filteredTransactions() {
        return this.transactions.filter(txn => {
            let matchesSearch = txn.id.toLowerCase().includes(this.search.toLowerCase()) || 
                                txn.user.toLowerCase().includes(this.search.toLowerCase()) || 
                                txn.event.toLowerCase().includes(this.search.toLowerCase());
            let matchesStatus = this.statusFilter === 'all' || txn.status === this.statusFilter;
            return matchesSearch && matchesStatus;
        });
    },
    viewDetails(txn) {
        this.selectedTxn = txn;
        this.detailsModal = true;
    }
}">
    <!-- Page Header & Analytics Widgets -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Transactions & Payments</h1>
        </div>
    </div>

    <!-- Filters & Search Toolbar Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-4 shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Search Input -->
        <div class="w-full sm:w-80 relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" x-model="search" placeholder="Search by Txn ID, User or Event..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white focus:outline-none focus:border-purple-500">
        </div>

        <!-- Status Filter Tabs -->
        <div class="flex items-center gap-1.5 w-full sm:w-auto overflow-x-auto pb-1 sm:pb-0">
            <button @click="statusFilter = 'all'" :class="statusFilter === 'all' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">All</button>
            <button @click="statusFilter = 'success'" :class="statusFilter === 'success' ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Success</button>
            <button @click="statusFilter = 'pending'" :class="statusFilter === 'pending' ? 'bg-amber-600 text-white shadow-lg shadow-amber-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Pending</button>
            <button @click="statusFilter = 'failed'" :class="statusFilter === 'failed' ? 'bg-red-600 text-white shadow-lg shadow-red-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Failed</button>
        </div>
    </div>

    <!-- Transactions Table Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#161628]/50">
                        <th class="py-4 px-6">Txn ID</th>
                        <th class="py-4 px-6">User Name</th>
                        <th class="py-4 px-6">Event Name</th>
                        <th class="py-4 px-6">Amount</th>
                        <th class="py-4 px-6">Gateway</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm">
                    <template x-for="txn in filteredTransactions" :key="txn.id">
                        <tr class="hover:bg-[#18182f]/40 transition">
                            <td class="py-4 px-6 font-mono text-xs font-bold text-purple-400" x-text="txn.id"></td>
                            <td class="py-4 px-6">
                                <p class="font-medium text-white" x-text="txn.user"></p>
                                <p class="text-[11px] text-gray-400" x-text="txn.email"></p>
                            </td>
                            <td class="py-4 px-6 text-gray-300 text-xs font-medium" x-text="txn.event"></td>
                            <td class="py-4 px-6 font-bold text-white" x-text="txn.amount"></td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 bg-gray-800/80 text-gray-300 border border-gray-700 rounded-lg text-xs font-medium" x-text="txn.method"></span>
                            </td>
                            <td class="py-4 px-6">
                                <span :class="{
                                    'bg-emerald-500/10 text-emerald-400 border-emerald-500/20': txn.status === 'success',
                                    'bg-amber-500/10 text-amber-400 border-amber-500/20': txn.status === 'pending',
                                    'bg-red-500/10 text-red-400 border-red-500/20': txn.status === 'failed'
                                }" class="px-3 py-1 border rounded-full text-xs font-semibold capitalize inline-block" x-text="txn.status"></span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <!-- Details / Receipt Button -->
                                <button @click="viewDetails(txn)" class="px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 border border-blue-500/30 rounded-xl text-xs font-semibold transition">
                                    Details
                                </button>
                            </td>
                        </tr>
                    </template>
                    <!-- Empty State -->
                    <template x-if="filteredTransactions.length === 0">
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500 text-sm">No transactions found matching your criteria.</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Transaction Details Modal -->
    <div x-show="detailsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="detailsModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-lg p-6 shadow-2xl text-white space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-xl bg-purple-600/20 text-purple-400 flex items-center justify-center font-bold">💳</div>
                    <div>
                        <h3 class="font-bold text-base text-white">Transaction Details</h3>
                        <p class="text-xs text-gray-400 font-mono" x-text="selectedTxn?.id"></p>
                    </div>
                </div>
                <button @click="detailsModal = false" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-gray-400 hover:text-white transition">✕</button>
            </div>

            <!-- Modal Content Grid -->
            <div class="grid grid-cols-2 gap-4 text-xs bg-[#18182f] p-4 rounded-2xl border border-gray-800/60">
                <div>
                    <span class="text-gray-500 block mb-0.5">Customer Name</span>
                    <span class="font-semibold text-white text-sm" x-text="selectedTxn?.user"></span>
                </div>
                <div>
                    <span class="text-gray-500 block mb-0.5">Phone Number</span>
                    <span class="font-semibold text-white text-sm" x-text="selectedTxn?.phone"></span>
                </div>
                <div class="col-span-2 pt-2 border-t border-gray-800">
                    <span class="text-gray-500 block mb-0.5">Booked Event</span>
                    <span class="font-semibold text-purple-400 text-sm" x-text="selectedTxn?.event"></span>
                </div>
                <div class="pt-2 border-t border-gray-800">
                    <span class="text-gray-500 block mb-0.5">Paid Amount</span>
                    <span class="font-bold text-emerald-400 text-base" x-text="selectedTxn?.amount"></span>
                </div>
                <div class="pt-2 border-t border-gray-800">
                    <span class="text-gray-500 block mb-0.5">Payment Method</span>
                    <span class="font-semibold text-white uppercase" x-text="selectedTxn?.method"></span>
                </div>
                <div class="col-span-2 pt-2 border-t border-gray-800">
                    <span class="text-gray-500 block mb-0.5">Timestamp Date</span>
                    <span class="text-gray-300 font-mono" x-text="selectedTxn?.date"></span>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <button type="button" @click="detailsModal = false" class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-xs font-semibold transition">Close</button>
                <button type="button" onclick="window.print();" class="px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-semibold shadow-lg shadow-purple-600/30 transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Print Receipt
                </button>
            </div>
        </div>
    </div>
</div>
@endsection