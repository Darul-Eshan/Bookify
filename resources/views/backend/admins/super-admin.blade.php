@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    search: '',
    showCreateForm: false,
    auditModal: false,
    selectedAdmin: null,
    formName: '',
    formEmail: '',
    formPassword: '',
    superAdmins: [
        { id: 1, name: 'Tanvir Ahmed', email: 'tanvir.super@bookify.com', accessLevel: 'Level 1 (Full Access)', status: 'active', ip: '192.168.1.15', joined: '01 Jan, 2025', avatar: 'TA' },
        { id: 2, name: 'Sabbir Hossain', email: 'sabbir.admin@bookify.com', accessLevel: 'Level 1 (Full Access)', status: 'active', ip: '192.168.1.42', joined: '15 Mar, 2025', avatar: 'SH' }
    ],
    get filteredAdmins() {
        return this.superAdmins.filter(admin => {
            return admin.name.toLowerCase().includes(this.search.toLowerCase()) || 
                   admin.email.toLowerCase().includes(this.search.toLowerCase());
        });
    },
    createAdmin() {
        if(this.formName && this.formEmail && this.formPassword) {
            let initials = this.formName.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
            this.superAdmins.push({
                id: Date.now(),
                name: this.formName,
                email: this.formEmail,
                accessLevel: 'Level 1 (Full Access)',
                status: 'active',
                ip: '192.168.1.100',
                joined: 'Just now',
                avatar: initials
            });
            this.formName = '';
            this.formEmail = '';
            this.formPassword = '';
            this.showCreateForm = false;
        }
    },
    viewLogs(admin) {
        this.selectedAdmin = admin;
        this.auditModal = true;
    },
    revokeAccess(id) {
        if(confirm('Are you sure you want to revoke Super Admin privileges from this account?')) {
            this.superAdmins = this.superAdmins.filter(a => a.id !== id);
        }
    }
}">
    <!-- Page Header & Action Toggle Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-0.5 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-full text-[10px] font-bold uppercase tracking-wider">Restricted Area</span>
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight mt-1">Super Administrator Accounts</h1>
        </div>
        
        <div class="flex items-center gap-3">
            <!-- Security Badge Widget -->
            <div class="bg-[#121222] border border-purple-500/30 px-4 py-2.5 rounded-2xl hidden md:flex items-center gap-3 shadow-xl">
                <div class="w-8 h-8 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold">🔒</div>
                <div>
                    <p class="text-[10px] text-gray-400 uppercase font-semibold">Security Status</p>
                    <p class="text-sm font-bold text-emerald-400">2FA Enforced</p>
                </div>
            </div>

            <!-- Toggle Create Form Button -->
            <button @click="showCreateForm = !showCreateForm" class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl text-xs font-semibold shadow-lg shadow-purple-600/30 transition flex items-center gap-2">
                <svg class="w-4 h-4 transition-transform duration-200" :class="showCreateForm ? 'rotate-45' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span x-text="showCreateForm ? 'Close Form' : 'Add Super Admin'"></span>
            </button>
        </div>
    </div>

    <!-- Inline Create Super Admin Form Box (Appears at the Top) -->
    <div x-show="showCreateForm" x-transition.origin.top.duration.300ms class="bg-[#121222] border border-purple-500/30 rounded-2xl p-6 shadow-2xl space-y-4" style="display: none;">
        <div class="flex items-center justify-between pb-3 border-b border-gray-800">
            <h3 class="font-bold text-sm text-white flex items-center gap-2">
                <span>⚡ Register New Root Administrator</span>
            </h3>
            <button @click="showCreateForm = false" class="text-gray-400 hover:text-white text-xs">✕ Cancel</button>
        </div>

        <form @submit.prevent="createAdmin" class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Administrator Name</label>
                <input type="text" x-model="formName" placeholder="Full name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" required>
            </div>
            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Secure Email</label>
                <input type="email" x-model="formEmail" placeholder="admin@bookify.com" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" required>
            </div>
            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Master Password</label>
                <input type="password" x-model="formPassword" placeholder="••••••••••••" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" required>
            </div>

            <div class="sm:col-span-3 flex justify-end gap-3 pt-2">
                <button type="button" @click="showCreateForm = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl font-semibold transition">Cancel</button>
                <button type="submit" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold shadow-lg shadow-purple-600/30 transition">Authorize Root</button>
            </div>
        </form>
    </div>

    <!-- Super Admins Table Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#161628]/50">
                        <th class="py-4 px-6">Root User Info</th>
                        <th class="py-4 px-6">Access Privilege</th>
                        <th class="py-4 px-6">Last Active IP</th>
                        <th class="py-4 px-6">Status</th>
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
                                    <p class="text-xs text-gray-400 font-mono" x-text="admin.email"></p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-xl text-xs font-semibold inline-block" x-text="admin.accessLevel"></span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-300 font-mono" x-text="admin.ip"></td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full text-xs font-semibold capitalize inline-block" x-text="admin.status"></span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <!-- Security Logs Button -->
                                <button @click="viewLogs(admin)" class="px-3 py-1.5 bg-blue-600/20 hover:bg-blue-600/30 text-blue-400 border border-blue-500/30 rounded-xl text-xs font-semibold transition">
                                    Logs
                                </button>
                                <!-- Revoke Access Button -->
                                <button @click="revokeAccess(admin.id)" class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 border border-red-500/30 rounded-xl text-xs font-semibold transition">
                                    Revoke
                                </button>
                            </td>
                        </tr>
                    </template>
                    <template x-if="filteredAdmins.length === 0">
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500 text-sm">No super admin accounts found.</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Security Audit Logs Modal -->
    <div x-show="auditModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="auditModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-lg p-6 shadow-2xl text-white space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                <div>
                    <h3 class="font-bold text-base text-white">Security Audit Activity</h3>
                    <p class="text-xs text-purple-400 font-mono" x-text="selectedAdmin?.name + ' (' + selectedAdmin?.email + ')'"></p>
                </div>
                <button @click="auditModal = false" class="w-8 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center text-gray-400 hover:text-white transition">✕</button>
            </div>

            <div class="space-y-3 text-xs bg-[#18182f] p-4 rounded-2xl border border-gray-800/60 max-h-60 overflow-y-auto">
                <div class="flex items-center justify-between py-2 border-b border-gray-800/60">
                    <div>
                        <p class="font-semibold text-white">Successfully Authenticated via 2FA</p>
                        <p class="text-[10px] text-gray-400">IP: 192.168.1.15</p>
                    </div>
                    <span class="text-[10px] text-gray-400 font-mono">Today, 03:45 PM</span>
                </div>
                <div class="flex items-center justify-between py-2 border-b border-gray-800/60">
                    <div>
                        <p class="font-semibold text-emerald-400">Updated Gateway Credentials</p>
                        <p class="text-[10px] text-gray-400">SSLCommerz API Key Modified</p>
                    </div>
                    <span class="text-[10px] text-gray-400 font-mono">Yesterday, 11:20 AM</span>
                </div>
                <div class="flex items-center justify-between py-2">
                    <div>
                        <p class="font-semibold text-amber-400">Exported User Database</p>
                        <p class="text-[10px] text-gray-400">CSV Backup Downloaded</p>
                    </div>
                    <span class="text-[10px] text-gray-400 font-mono">28 Aug, 2026</span>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="button" @click="auditModal = false" class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-xs font-semibold transition">Close Logs</button>
            </div>
        </div>
    </div>
</div>
@endsection