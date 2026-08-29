@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    selectedTab: 'all', 
    settingsModal: false, 
    editModal: false, 
    activeUser: {} 
}">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Website Users & Organizers Management</h1>
        </div>
    
    </div>


    <!-- Main Content Card -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
        <!-- Category Filter & Search Header -->
        <div class="p-4 border-b border-gray-800 flex flex-col sm:flex-row items-center justify-between gap-4 bg-[#18182f]/30">
            <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto">
                <button @click="selectedTab = 'all'" :class="selectedTab === 'all' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">All Accounts</button>
                <button @click="selectedTab = 'organizer'" :class="selectedTab === 'organizer' ? 'bg-blue-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Event Organizers</button>
                <button @click="selectedTab = 'customer'" :class="selectedTab === 'customer' ? 'bg-purple-600 text-white' : 'bg-[#18182f] text-gray-400 hover:text-white'" class="px-4 py-2 rounded-xl text-xs font-semibold transition">Website Customers</button>
            </div>
            <div class="w-full sm:w-72">
                <input type="text" placeholder="Search profile name, email..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
        </div>

        <!-- Users & Organizers Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 bg-[#18182f]/50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        <th class="p-4">Profile Info</th>
                        <th class="p-4">Account Category</th>
                        <th class="p-4">Joined Date</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Profile Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800 text-sm text-gray-300">
                    <!-- Row 1: Event Organizer -->
                    <tr x-show="selectedTab === 'all' || selectedTab === 'organizer'" class="hover:bg-[#18182f]/30 transition">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-600/20 text-blue-400 font-bold flex items-center justify-center border border-blue-500/30">RC</div>
                                <div>
                                    <p class="text-white font-medium">Rahim Chowdhury</p>
                                    <p class="text-xs text-gray-400">rahim@eventsbd.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full text-xs font-semibold">Event Organizer</span>
                        </td>
                        <td class="p-4 text-gray-400 text-xs">15 Feb, 2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold">Active</span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="editModal = true; activeUser = {name: 'Rahim Chowdhury', email: 'rahim@eventsbd.com', category: 'Organizer', status: 'Active'}" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #3b82f6; color: #fff;">
                                    Manage Profile
                                </button>
                                <form action="#" method="POST" onsubmit="return confirm('Suspend this account?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #dc2626;">
                                        Suspend
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 2: Website Customer -->
                    <tr x-show="selectedTab === 'all' || selectedTab === 'customer'" class="hover:bg-[#18182f]/30 transition">
                        <td class="p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-purple-600/20 text-purple-400 font-bold flex items-center justify-center border border-purple-500/30">KM</div>
                                <div>
                                    <p class="text-white font-medium">Karim Mia</p>
                                    <p class="text-xs text-gray-400">karim.customer@gmail.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-full text-xs font-semibold">Website Customer</span>
                        </td>
                        <td class="p-4 text-gray-400 text-xs">20 Feb, 2026</td>
                        <td class="p-4">
                            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold">Active</span>
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="editModal = true; activeUser = {name: 'Rahim Chowdhury', email: 'rahim@eventsbd.com', category: 'Organizer', status: 'Active'}" class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #3b82f6; color: #fff;">
                                    Manage Profile
                                </button>
                                <form action="#" method="POST" onsubmit="return confirm('Suspend this account?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md transition" style="background-color: #dc2626;">
                                        Suspend
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Manage Profile / Edit Modal (Only Organizer & Customer Options) -->
    <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="editModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-md p-6 shadow-2xl text-white space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-gray-800">
                <h3 class="font-bold text-lg text-white">Manage User & Organizer Profile</h3>
                <button @click="editModal = false" class="text-gray-400 hover:text-white">✕</button>
            </div>
            <form action="#" method="POST" class="space-y-4 text-sm">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Profile Name</label>
                    <input type="text" x-model="activeUser.name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Email Address</label>
                    <input type="email" x-model="activeUser.email" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Account Category</label>
                    <select class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                        <option value="Organizer">Event Organizer</option>
                        <option value="Customer">Website Customer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-400 mb-1">Account Status</label>
                    <select class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
                        <option value="Active">Active</option>
                        <option value="Pending">Pending Approval</option>
                        <option value="Suspended">Suspended</option>
                    </select>
                </div>
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                    <button type="button" @click="editModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl text-xs font-semibold hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded-xl text-xs font-semibold hover:bg-purple-700">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection