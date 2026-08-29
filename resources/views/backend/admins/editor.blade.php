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
    access_level: 'Content Editor',
    assigned_section: 'General Content',
    status: 'active',
    
    editors: @json($editors),

    get filteredEditors() {
        return this.editors.filter(editor => {
            return editor.name.toLowerCase().includes(this.search.toLowerCase()) || 
                   editor.email.toLowerCase().includes(this.search.toLowerCase());
        });
    },

    resetForm() {
        this.name = '';
        this.email = '';
        this.password = '';
        this.access_level = 'Content Editor';
        this.assigned_section = 'General Content';
        this.status = 'active';
        this.editMode = false;
        this.editId = null;
        this.showCreateForm = false;
    },

    editEditor(editor) {
        this.editMode = true;
        this.editId = editor.id;
        this.name = editor.name;
        this.email = editor.email;
        this.access_level = editor.access_level;
        this.assigned_section = editor.assigned_section;
        this.status = editor.status;
        this.showCreateForm = true;
    },

    revokeAccess(id) {
        if(confirm('Are you sure you want to revoke/delete this Editor account?')) {
            fetch(`/admin/editors/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(res => res.json()).then(data => {
                if(data.success) {
                    this.editors = this.editors.filter(e => e.id !== id);
                }
            });
        }
    }
}">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="px-2.5 py-0.5 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-full text-[10px] font-bold uppercase tracking-wider">Editorial Management</span>
            <h1 class="text-2xl font-bold text-white tracking-tight mt-1">Editor Accounts Control</h1>
        </div>
        
        <div>
            <button @click="resetForm(); showCreateForm = !showCreateForm" class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl text-xs font-semibold shadow-lg transition flex items-center gap-2">
                <span x-text="showCreateForm ? 'Close Form' : '+ Register New Editor'"></span>
            </button>
        </div>
    </div>

    <!-- Success / Error Message Alert -->
    @if(session('success'))
        <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between">
            <span>✅ {{ session('success') }}</span>
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

    <!-- Inline Create / Edit Form -->
    <div x-show="showCreateForm" x-transition class="bg-[#121222] border border-blue-500/30 rounded-2xl p-6 shadow-2xl space-y-4" style="display: none;">
        <div class="flex items-center justify-between pb-3 border-b border-gray-800">
            <h3 class="font-bold text-sm text-white flex items-center gap-2">
                <span x-text="editMode ? '✏️ Edit Editor Account' : '📝 Register New Content Editor'"></span>
            </h3>
            <button @click="showCreateForm = false" class="text-gray-400 hover:text-white text-xs">✕</button>
        </div>

        <form :action="editMode ? `/admin/editors/${editId}` : '{{ route('admin.editors.store') }}'" method="POST" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-xs">
            @csrf
            <template x-if="editMode">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Editor Name</label>
                <input type="text" x-model="name" name="name" placeholder="Full name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Email Address</label>
                <input type="email" x-model="email" name="email" placeholder="editor@bookify.com" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Password <span x-show="editMode" class="text-gray-500">(Leave blank to keep current)</span></label>
                <input type="password" name="password" placeholder="••••••••••••" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500" :required="!editMode">
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Access Privilege</label>
                <select x-model="access_level" name="access_level" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                    <option value="Content Editor">Content Editor</option>
                    <option value="Senior Editor">Senior Editor</option>
                    <option value="Managing Editor">Managing Editor</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Assigned Section</label>
                <select x-model="assigned_section" name="assigned_section" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                    <option value="General Content">General Content</option>
                    <option value="Events & Shows">Events & Shows</option>
                    <option value="Blogs & News">Blogs & News</option>
                    <option value="Media Gallery">Media Gallery</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-400 mb-1.5 font-medium">Account Status</label>
                <select x-model="status" name="status" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-blue-500">
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>

            <div class="sm:col-span-2 lg:col-span-3 flex justify-end gap-3 pt-2">
                <button type="button" @click="showCreateForm = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl font-semibold transition">Cancel</button>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-semibold shadow-lg transition" x-text="editMode ? 'Update Changes' : 'Save Editor'"></button>
            </div>
        </form>
    </div>

    <!-- Search Toolbar -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-4 shadow-xl flex items-center justify-between gap-4">
        <div class="w-full sm:w-80 relative">
            <input type="text" x-model="search" placeholder="Search by name or email..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-blue-500">
        </div>
        <div class="text-xs text-gray-400 font-medium">Total Editors: <span class="text-white font-bold" x-text="editors.length"></span></div>
    </div>

    <!-- Editors Table -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 text-[11px] font-semibold text-gray-400 uppercase tracking-wider bg-[#161628]/50">
                        <th class="py-4 px-6">Editor Info</th>
                        <th class="py-4 px-6">Access Privilege</th>
                        <th class="py-4 px-6">Assigned Section</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 text-sm">
                    <template x-for="editor in filteredEditors" :key="editor.id">
                        <tr class="hover:bg-[#18182f]/40 transition">
                            <td class="py-4 px-6 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-600/20 text-blue-400 font-bold border border-blue-500/30 flex items-center justify-center text-xs" x-text="editor.name.substring(0,2).toUpperCase()"></div>
                                <div>
                                    <p class="font-bold text-white text-sm" x-text="editor.name"></p>
                                    <p class="text-xs text-gray-400 font-mono" x-text="editor.email"></p>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 rounded-xl text-xs font-semibold inline-block" x-text="editor.access_level"></span>
                            </td>
                            <td class="py-4 px-6 text-xs text-gray-300 font-medium" x-text="editor.assigned_section"></td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold capitalize inline-block" 
                                      :class="editor.status === 'active' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-red-500/20'" 
                                      x-text="editor.status"></span>
                            </td>
                            <td class="py-4 px-6 text-right space-x-2">
                                <button @click="editEditor(editor)" class="px-3 py-1.5 bg-amber-500/20 hover:bg-amber-500/30 text-amber-400 border border-amber-500/30 rounded-xl text-xs font-semibold transition">Edit</button>
                                <button @click="revokeAccess(editor.id)" class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 border border-red-500/30 rounded-xl text-xs font-semibold transition">Revoke</button>
                            </td>
                        </tr>
                    </template>
                    
                    <!-- Empty State -->
                    <template x-if="filteredEditors.length === 0">
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-400 text-xs">
                                📭 No editor accounts found. Click on "Register New Editor" to add one.
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection