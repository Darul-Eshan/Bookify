@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ 
    search: '',
    showCreateForm: false,
    editMode: false,
    editId: null,
    name: '',
    email: '',
    password: '',
    access_level: 'Community Moderator',
    assigned_section: 'User Reports',
    status: 'active',
    
    moderators: @json($moderators),

    get filteredModerators() {
        return this.moderators.filter(mod => {
            return mod.name.toLowerCase().includes(this.search.toLowerCase()) || 
                   mod.email.toLowerCase().includes(this.search.toLowerCase());
        });
    },

    resetForm() {
        this.name = '';
        this.email = '';
        this.password = '';
        this.access_level = 'Community Moderator';
        this.assigned_section = 'User Reports';
        this.status = 'active';
        this.editMode = false;
        this.editId = null;
        this.showCreateForm = false;
    },

    editModerator(mod) {
        this.editMode = true;
        this.editId = mod.id;
        this.name = mod.name;
        this.email = mod.email;
        this.access_level = mod.access_level;
        this.assigned_section = mod.assigned_section;
        this.status = mod.status;
        this.showCreateForm = true;
    },

    revokeAccess(id) {
        if(confirm('Are you sure you want to revoke/delete this Moderator account?')) {
            fetch(`/admin/moderators/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json()).then(data => {
                if(data.success) {
                    this.moderators = this.moderators.filter(m => m.id !== id);
                }
            });
        }
    }
}">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="px-2.5 py-0.5 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-full text-[10px] font-bold uppercase tracking-wider">Moderation Control</span>
            <h1 class="text-2xl font-bold text-white tracking-tight mt-1">Moderator Accounts</h1>
        </div>
        <div>
            <button @click="resetForm(); showCreateForm = !showCreateForm" class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-2xl text-xs font-semibold shadow-lg transition flex items-center gap-2">
                <span x-text="showCreateForm ? 'Close Form' : '+ Register New Moderator'"></span>
            </button>
        </div>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl text-xs font-semibold">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl text-xs font-semibold">
            <ul class="list-disc pl-4 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Panel -->
    <div x-show="showCreateForm" x-transition class="bg-[#121222] border border-purple-500/30 rounded-2xl p-6 shadow-2xl space-y-4" style="display: none;">
        <div class="flex items-center justify-between pb-3 border-b border-gray-800">
            <h3 class="font-bold text-sm text-white" x-text="editMode ? '✏️ Edit Moderator Account' : '📝 Register New Moderator'"></h3>
            <button @click="showCreateForm = false" class="text-gray-400 hover:text-white text-xs">✕</button>
        </div>

        <form :action="editMode ? `/admin/moderators/${editId}` : '{{ route('admin.moderators.store') }}'" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
            @csrf
            <template x-if="editMode">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Name</label>
                <input type="text" x-model="name" name="name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" required>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Email Address</label>
                <input type="email" x-model="email" name="email" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" required>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Password <span x-show="editMode" class="text-gray-500">(Leave blank to keep)</span></label>
                <input type="password" name="password" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500" :required="!editMode">
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Access Privilege</label>
                <select x-model="access_level" name="access_level" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                    <option value="Community Moderator">Community Moderator</option>
                    <option value="Senior Moderator">Senior Moderator</option>
                    <option value="Chat Moderator">Chat Moderator</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Assigned Section</label>
                <select x-model="assigned_section" name="assigned_section" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                    <option value="User Reports">User Reports</option>
                    <option value="Comments & Reviews">Comments & Reviews</option>
                    <option value="Live Chat">Live Chat</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Status</label>
                <select x-model="status" name="status" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-purple-500">
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>

            <div class="sm:col-span-2 lg:col-span-3 flex justify-end gap-3 pt-2">
                <button type="button" @click="showCreateForm = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl font-semibold">Cancel</button>
                <button type="submit" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold shadow-lg" x-text="editMode ? 'Update Changes' : 'Save Moderator'"></button>
            </div>
        </form>
    </div>

    <!-- Search Bar -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-4 shadow-xl flex items-center justify-between">
        <input type="text" x-model="search" placeholder="Search moderators..." class="w-full sm:w-80 bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-purple-500">
        <div class="text-xs text-gray-400 font-medium">Total: <span class="text-white font-bold" x-text="moderators.length"></span></div>
    </div>

    <!-- Table -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#161628]/50">
                        <th class="py-4 px-6">Moderator Info</th>
                        <th class="py-4 px-6">Access Privilege</th>
                        <th class="py-4 px-6">Assigned Section</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm">
                    <template x-for="mod in filteredModerators" :key="mod.id">
                        <tr class="hover:bg-[#18182f]/40 transition">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-purple-600/20 text-purple-400 font-bold border border-purple-500/30 flex items-center justify-center text-xs" x-text="mod.name.substring(0,2).toUpperCase()"></div>
                                <div>
                                    <p class="font-bold text-white text-sm" x-text="mod.name"></p>
                                    <p class="text-xs text-gray-400 font-mono" x-text="mod.email"></p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-xl text-xs font-semibold" x-text="mod.access_level"></span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-300 font-medium" x-text="mod.assigned_section"></td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize" :class="mod.status === 'active' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20'" x-text="mod.status"></span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <button @click="editModerator(mod)" class="px-3 py-1.5 bg-amber-500/20 text-amber-400 border border-amber-500/30 rounded-xl text-xs font-semibold">Edit</button>
                                <button @click="revokeAccess(mod.id)" class="px-3 py-1.5 bg-red-600/20 text-red-400 border border-red-500/30 rounded-xl text-xs font-semibold">Revoke</button>
                            </td>
                        </tr>
                    </template>
                    <template x-if="filteredModerators.length === 0">
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-400 text-xs">📭 No moderator accounts found.</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection