@extends('backend.layout.master')

@section('content')
<div class="space-y-8" x-data="{ 
    categories: [
        { id: 1, name: 'Tech & Startup', slug: 'tech-startup', events: 42, status: 'active', date: '10 Jan, 2026', icon: '🚀' },
        { id: 2, name: 'Music & Concerts', slug: 'music-concerts', events: 28, status: 'inactive', date: '12 Jan, 2026', icon: '🎵' }
    ],
    toggleStatus(category) {
        category.status = category.status === 'active' ? 'inactive' : 'active';
    }
}">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Event Categories Management</h1>
        </div>
    </div>

    <!-- 1. Top Section: Create Category Form Box -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-xl">
        <div class="mb-4 pb-3 border-b border-gray-800">
            <h3 class="text-base font-bold text-white flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Create New Event Category
            </h3>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            @csrf
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-1.5">Category Name</label>
                <input type="text" name="name" placeholder="e.g. Workshop & Training" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-300 mb-1.5">Slug (URL friendly)</label>
                <input type="text" name="slug" placeholder="e.g. workshop-training" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
            <div>
                <button type="submit" class="w-full px-5 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Save Category
                </button>
            </div>
        </form>
    </div>

    <!-- 2. Bottom Section: Category Boxes / Cards Grid -->
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">All Categories List</h3>
            <span class="text-xs px-3 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 rounded-full font-semibold">Total: 2 Categories</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <template x-for="cat in categories" :key="cat.id">
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-xl flex flex-col justify-between space-y-4 hover:border-purple-500/50 transition">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="w-10 h-10 rounded-xl bg-purple-600/20 text-purple-400 font-bold flex items-center justify-center border border-purple-500/30 text-lg" x-text="cat.icon"></div>
                            
                            <!-- Status Badge -->
                            <span :class="cat.status === 'active' ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-amber-500/10 text-amber-400 border-amber-500/20'" 
                                  class="px-2.5 py-1 border rounded-full text-xs font-semibold capitalize" 
                                  x-text="cat.status"></span>
                        </div>
                        <h4 class="text-base font-bold text-white" x-text="cat.name"></h4>
                        <p class="text-xs font-mono text-gray-400 mt-1">Slug: <span x-text="cat.slug"></span></p>
                    </div>

                    <div class="flex items-center justify-between pt-3 border-t border-gray-800">
                        <span class="text-xs text-gray-500" x-text="cat.date"></span>
                        
                        <div class="flex items-center gap-2">
                            <!-- Active/Deactive Toggle Button (Replaced View) -->
                            <button @click="toggleStatus(cat)" 
                                    :class="cat.status === 'active' ? 'bg-amber-500/20 text-amber-400 border-amber-500/30 hover:bg-amber-500/30' : 'bg-emerald-500/20 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/30'" 
                                    class="px-3 py-1.5 border rounded-xl text-xs font-semibold transition flex items-center gap-1">
                                <span x-text="cat.status === 'active' ? 'Deactive' : 'Active'"></span>
                            </button>

                            <!-- Delete Button -->
                            <form action="#" method="POST" onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 border border-red-500/30 rounded-xl text-xs font-semibold transition flex items-center gap-1" style="background-color: rgba(220, 38, 38, 0.15); color: #f87171;">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
@endsection