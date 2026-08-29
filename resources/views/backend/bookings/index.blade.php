@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    selectedTab: 'all', 
    settingsModal: false, 
    detailsModal: false, 
    activeBooking: {} 
}">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Bookings & Tickets Management</h1>
        </div>
        <div class="flex items-center gap-3">
        
        </div>
    </div>

<!-- Main Content Card -->
<div class="bg-[#121222] border border-gray-800 rounded-2xl overflow-hidden shadow-xl" x-data="{ search: '' }">
    <!-- Table Filter / Search Header -->
    <div class="p-4 border-b border-gray-800 flex flex-col sm:flex-row items-center justify-between gap-4 bg-[#18182f]/30">
        <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto">
            <button @click="selectedTab = 'all'" :class="selectedTab === 'all' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">All Bookings</button>
            <button @click="selectedTab = 'paid'" :class="selectedTab === 'paid' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Paid</button>
            <button @click="selectedTab = 'pending'" :class="selectedTab === 'pending' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Pending</button>
            <button @click="selectedTab = 'cancelled'" :class="selectedTab === 'cancelled' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Cancelled</button>
        </div>
        <div class="w-full sm:w-72">
            <input type="text" x-model="search" placeholder="Search ticket ID, buyer name..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
        </div>
    </div>

    <!-- Bookings Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-gray-800 bg-[#18182f]/50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                    <th class="p-4">Ticket ID</th>
                    <th class="p-4">Event Name</th>
                    <th class="p-4">Customer Info</th>
                    <th class="p-4">Type / Qty</th>
                    <th class="p-4">Amount</th>
                    <th class="p-4">Status</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800 text-sm text-gray-300">
    <!-- Row 1: Paid -->
    <tr x-show="(selectedTab === 'all' || selectedTab === 'paid')" class="hover:bg-[#18182f]/30 transition">
        <td class="p-4 font-mono text-purple-400 font-semibold">#TCK-98231</td>
        <td class="p-4 font-medium text-white">Tech Startup Summit 2026</td>
        <td class="p-4">
            <p class="text-white font-medium">Tanvir Ahmed</p>
            <p class="text-xs text-gray-400">tanvir@gmail.com</p>
        </td>
        <td class="p-4">VIP Pass <span class="text-xs text-gray-500">(x2)</span></td>
        <td class="p-4 font-semibold text-white">BDT 3,000</td>
        <td class="p-4">
            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold">Paid</span>
        </td>
        <td class="p-4 text-right">
            <div class="flex items-center justify-end gap-2">
                <!-- View Button -->
                <button @click="detailsModal = true; activeBooking = {id: '#TCK-98231', event: 'Tech Startup Summit 2026', name: 'Tanvir Ahmed', email: 'tanvir@gmail.com', type: 'VIP Pass', qty: 2, amount: 'BDT 3,000', status: 'Paid'}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #eab308; color: #000;">
                    View
                </button>
                <!-- Delete Button -->
                <form action="#" method="POST" onsubmit="return confirm('Delete this booking record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #dc2626;">
                        Delete
                    </button>
                </form>
            </div>
        </td>
    </tr>

    <!-- Row 2: Pending -->
    <tr x-show="(selectedTab === 'all' || selectedTab === 'pending')" class="hover:bg-[#18182f]/30 transition">
        <td class="p-4 font-mono text-purple-400 font-semibold">#TCK-98232</td>
        <td class="p-4 font-medium text-white">Dhaka Rock Fest 2026</td>
        <td class="p-4">
            <p class="text-white font-medium">Rahim Chowdhury</p>
            <p class="text-xs text-gray-400">rahim@yahoo.com</p>
        </td>
        <td class="p-4">General <span class="text-xs text-gray-500">(x1)</span></td>
        <td class="p-4 font-semibold text-white">BDT 1,200</td>
        <td class="p-4">
            <span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 border border-amber-500/20 rounded-full text-xs font-semibold">Pending</span>
        </td>
        <td class="p-4 text-right">
            <div class="flex items-center justify-end gap-2">
                <!-- View Button -->
                <button @click="detailsModal = true; activeBooking = {id: '#TCK-98232', event: 'Dhaka Rock Fest 2026', name: 'Rahim Chowdhury', email: 'rahim@yahoo.com', type: 'General', qty: 1, amount: 'BDT 1,200', status: 'Pending'}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #eab308; color: #000;">
                    View
                </button>
                <!-- Delete Button -->
                <form action="#" method="POST" onsubmit="return confirm('Delete this booking record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #dc2626;">
                        Delete
                    </button>
                </form>
            </div>
        </td>
    </tr>

    <!-- Row 3: Cancelled -->
    <tr x-show="(selectedTab === 'all' || selectedTab === 'cancelled')" class="hover:bg-[#18182f]/30 transition">
        <td class="p-4 font-mono text-purple-400 font-semibold">#TCK-98233</td>
        <td class="p-4 font-medium text-white">Folk Festival</td>
        <td class="p-4">
            <p class="text-white font-medium">Karim Mia</p>
            <p class="text-xs text-gray-400">karim@gmail.com</p>
        </td>
        <td class="p-4">General <span class="text-xs text-gray-500">(x1)</span></td>
        <td class="p-4 font-semibold text-white">BDT 500</td>
        <td class="p-4">
            <span class="px-2.5 py-1 bg-red-500/10 text-red-400 border border-red-500/20 rounded-full text-xs font-semibold">Cancelled</span>
        </td>
        <td class="p-4 text-right">
            <div class="flex items-center justify-end gap-2">
                <!-- View Button -->
                <button @click="detailsModal = true; activeBooking = {id: '#TCK-98233', event: 'Folk Festival', name: 'Karim Mia', email: 'karim@gmail.com', type: 'General', qty: 1, amount: 'BDT 500', status: 'Cancelled'}" class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-black rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #eab308; color: #000;">
                    View
                </button>
                <!-- Delete Button -->
                <form action="#" method="POST" onsubmit="return confirm('Delete this booking record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #dc2626;">
                        Delete
                    </button>
                </form>
            </div>
        </td>
    </tr>
</tbody>
    </div>
</div>

    <!-- Ticket Details Modal -->
    <div x-show="detailsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="detailsModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-md p-6 shadow-2xl text-white space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                <h3 class="font-bold text-lg text-white">Ticket & Booking Details</h3>
                <button @click="detailsModal = false" class="text-gray-400 hover:text-white">✕</button>
            </div>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Ticket ID:</span>
                    <span class="font-mono text-purple-400 font-semibold" x-text="activeBooking.id"></span>
                </div>
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Event Name:</span>
                    <span class="font-medium text-white" x-text="activeBooking.event"></span>
                </div>
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Customer Name:</span>
                    <span class="text-white" x-text="activeBooking.name"></span>
                </div>
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Email:</span>
                    <span class="text-gray-300" x-text="activeBooking.email"></span>
                </div>
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Ticket Type & Qty:</span>
                    <span class="text-white" x-text="activeBooking.type + ' (' + activeBooking.qty + ')'"></span>
                </div>
                <div class="flex justify-between py-1 border-b border-gray-800/50">
                    <span class="text-gray-400">Total Amount:</span>
                    <span class="font-bold text-emerald-400" x-text="activeBooking.amount"></span>
                </div>
                <div class="flex justify-between py-1">
                    <span class="text-gray-400">Payment Status:</span>
                    <span class="px-2 py-0.5 bg-emerald-500/10 text-emerald-400 rounded-md text-xs font-semibold" x-text="activeBooking.status"></span>
                </div>
            </div>
            <div class="pt-4 border-t border-gray-800 flex justify-end">
                <button @click="detailsModal = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-xl text-xs font-semibold">Close</button>
            </div>
        </div>
    </div>

    <!-- Ticket Settings Modal -->
    <div x-show="settingsModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="settingsModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-lg p-6 shadow-2xl text-white space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                <h3 class="font-bold text-lg text-white">Booking & Ticketing Settings</h3>
                <button @click="settingsModal = false" class="text-gray-400 hover:text-white">✕</button>
            </div>
            <form action="#" method="POST" class="space-y-4 text-sm">
                @csrf
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Tax / VAT Percentage (%)</label>
                    <input type="number" value="5" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Service Fee per Ticket (BDT)</label>
                    <input type="number" value="50" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                </div>
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-medium text-white">Auto-Confirm Free Tickets</p>
                        <p class="text-xs text-gray-400">Automatically mark free event registrations as paid.</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 accent-purple-600 rounded">
                </div>
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-medium text-white">Allow Ticket Cancellations</p>
                        <p class="text-xs text-gray-400">Enable users to request refunds before the event.</p>
                    </div>
                    <input type="checkbox" checked class="w-4 h-4 accent-purple-600 rounded">
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                    <button type="button" @click="settingsModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl text-xs font-semibold hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-xl text-xs font-semibold hover:bg-purple-700">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection