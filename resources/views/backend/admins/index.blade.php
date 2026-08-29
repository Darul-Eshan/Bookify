@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    search: '',
    roleFilter: 'all',
    addModal: false,
    admins: [
        { id: 1, name: 'Tanvir Ahmed', email: 'superadmin@bookify.com', role: 'Super Admin', badgeColor: 'bg-purple-500/10 text-purple-400 border-purple-500/20', status: 'active', lastLogin: 'Today, 03:45 PM', avatar: 'TA' },
        { id: 2, name: 'Ashikur Rahman', email: 'editor@bookify.com', role: 'Content Editor', badgeColor: 'bg-blue-500/10 text-blue-400 border-blue-500/20', status: 'active', lastLogin: 'Yesterday, 11:20 AM', avatar: 'AR' },
        { id: 3, name: 'Nusrat Jahan', email: 'moderator@bookify.com', role: 'Event Moderator', badgeColor: 'bg-amber-500/10 text-amber-400 border-amber-500/20', status: 'active', lastLogin: '28 Aug, 2026', avatar: 'NJ' },
        { id: 4, name: 'Fahim Faisal', email: 'support@bookify.com', role: 'Support Admin', badgeColor: 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20', status: 'inactive', lastLogin: '20 Aug, 2026', avatar: 'FF' }
    ],
    get filteredAdmins() {
        return this.admins.filter(admin => {
            let matchesSearch = admin.name.toLowerCase().includes(this.search.toLowerCase()) || 
                                admin.email.toLowerCase().includes(this.search.toLowerCase());
            let matchesRole = this.roleFilter === 'all' || admin.role.toLowerCase().includes(this.roleFilter.toLowerCase());
            return matchesSearch && matchesRole;
        });
    },
    toggleStatus(admin) {
        admin.status = admin.status === 'active' ? 'inactive' : 'active';
    }
}">
    <!-- Page Header & Action Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Admin & Staff Categories</h1>
            <p class="text-sm text-gray-400 mt-1">Manage administrative roles, permissions, and system access levels.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Total Admins Badge -->
            <div class="bg-[#121222] border border-gray-800 px-4 py-2.5 rounded-2xl flex items-center gap-3 shadow-xl">
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold">🛡️</div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-semibold">Total Admins</p>
                    <p class="text-sm font-bold text-white">4 Members</p>
                </div>
            </div>

            <!-- Add Admin Button -->
            <button @click="addModal = true" class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl text-xs font-semibold shadow-lg shadow-purple-600/30 transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Add New Admin
            </button>
        </div>
    </div>

    <!-- Search & Category Filter Toolbar -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-4 shadow-xl flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Search Input -->
        <div class="w-full sm:w-80 relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
            <input type="text" x-model="search" placeholder="Search admin by name or email..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl pl-10 pr-4 py-2.5 text-xs text-white focus:outline-none focus:border-purple-500">
        </div>

        <!-- Category/Role Filter Tabs -->
        <div class="flex items-center gap-1.5 w-full sm:w-auto overflow-x-auto pb-1 sm:pb-0">
            <button @click="roleFilter = 'all'" :class="roleFilter === 'all' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">All Categories</button>
            <button @click="roleFilter = 'Super Admin'" :class="roleFilter === 'Super Admin' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Super Admin</button>
            <button @click="roleFilter = 'Editor'" :class="roleFilter === 'Editor' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Editors</button>
            <button @click="roleFilter = 'Moderator'" :class="roleFilter === 'Moderator' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Moderators</button>
            <button @click="roleFilter = 'Support'" :class="roleFilter === 'Support' ? 'bg-purple-600 text-white shadow-lg shadow-purple-600/30' : 'bg-[#18182f] text-gray-400 hover:text-white border border-gray-800'" class="px-3.5 py-2 rounded-xl text-xs font-semibold transition whitespace-nowrap">Support</button>
        </div>
    </div>

    <!-- Admins Table Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#161628]/50">
                        <th class="py-4 px-6">Admin Profile</th>
                        <th class="py-4 px-6">Admin Category (Role)</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Last Login</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm">
                    <template x-for="admin in filteredAdmins" :key="admin.id">
                        <tr class="hover:bg-[#18182f]/40 transition">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-purple-600/20 text-purple-400 font-bold border border-purple-500/30 flex items-center justify-center text-xs" x-text="admin.avatar"></div>
                                <div>
                                    <p class="font-bold text-white text-sm" x-text="admin.name"></p>
                                    <p class="text-xs text-gray-400" x-text="admin.email"></p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 border rounded-xl text-xs font-semibold inline-block" :class="admin.badgeColor" x-text="admin.role"></span>
                            </td>
                            <td class="py-4 px-6">
                                <span :class="admin.status === 'active' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-amber-500/10 text-amber-400 border-amber-500/20'" 
                                      class="px-3 py-1 border rounded-full text-xs font-semibold capitalize inline-block" 
                                      x-text="admin.status"></span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-400 font-mono" x-text="admin.lastLogin"></td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <!-- Status Toggle -->
                                <button @click="toggleStatus(admin)" 
                                        :class="admin.status === 'active' ? 'bg-amber-500/20 text-amber-400 border-amber-500/30 hover:bg-amber-500/30' : 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/30'" 
                                        class="px-3 py-1.5 border rounded-xl text-xs font-semibold transition">
                                    <span x-text="admin.status === 'active' ? 'Suspend' : 'Activate'"></span>
                                </button>
                                <!-- Edit Permissions -->
                                <button class="px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 border border-blue-500/30 rounded-xl text-xs font-semibold transition">
                                    Permissions
                                </button>
                            </td>
                        </tr>
                    </template>
                    <!-- Empty State -->
                    <template x-if="filteredAdmins.length === 0">
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500 text-sm">No admin accounts found matching your filter.</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Admin Modal -->
    <div x-show="addModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="addModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-md p-6 shadow-2xl text-white space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                <h3 class="font-bold text-base text-white">Assign New Admin Category</h3>
                <button @click="addModal = false" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-gray-400 hover:text-white transition">✕</button>
            </div>

            <form class="space-y-4 text-xs">
                <div>
                    <label class="block text-gray-400 mb-1 font-medium">Full Name</label>
                    <input type="text" placeholder="Enter staff name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                </div>
                <div>
                    <label class="block text-gray-400 mb-1 font-medium">Email Address</label>
                    <input type="email" placeholder="admin@bookify.com" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                </div>
                <div>
                    <label class="block text-gray-400 mb-1 font-medium">Select Admin Category (Role)</label>
                    <select class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                        <option value="super">Super Admin (Full Access)</option>
                        <option value="editor">Content Editor</option>
                        <option value="moderator">Event Moderator</option>
                        <option value="support">Support Admin</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-400 mb-1 font-medium">Temporary Password</label>
                    <input type="password" placeholder="••••••••" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                    <button type="button" @click="addModal = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl font-semibold transition">Cancel</button>
                    <button type="button" @click="addModal = false" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold shadow-lg shadow-purple-600/30 transition">Create Admin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection