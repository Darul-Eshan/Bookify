@extends('backend.layout.master')

@section('content')

<div class="p-6">

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Categories</h1>
            <p class="text-gray-400 mt-1">Manage your event categories</p>
        </div>

        <button
            onclick="openCreateModal()"
            class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-xl font-semibold">
            + Add Category
        </button>
    </div>

    @if(session('success'))
        <div class="mb-5 bg-green-500/20 border border-green-500/30 text-green-300 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-5 bg-red-500/20 border border-red-500/30 text-red-300 px-4 py-3 rounded-xl">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="bg-[#121222] border border-gray-800 rounded-2xl overflow-hidden">

        <div class="px-6 py-4 border-b border-gray-800">
            <h2 class="text-lg font-semibold text-white">Category List</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-400 text-sm border-b border-gray-800">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Slug</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                        <tr class="border-b border-gray-800/60">
                            <td class="px-6 py-4 text-gray-400">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 text-white font-medium">
                                {{ $category->name }}
                            </td>

                            <td class="px-6 py-4 text-gray-400">
                                {{ $category->slug }}
                            </td>

                            <td class="px-6 py-4">
                                @if($category->status)
                                    <span class="px-3 py-1 rounded-full text-xs bg-green-500/20 text-green-300">
                                        Active
                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full text-xs bg-red-500/20 text-red-300">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">

                                    <button
                                        onclick="openEditModal(
                                            {{ $category->id }},
                                            '{{ addslashes($category->name) }}',
                                            '{{ addslashes($category->slug) }}'
                                        )"
                                        class="px-3 py-1.5 rounded-lg bg-blue-500/20 text-blue-300 hover:bg-blue-500/30">
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('admin.categories.delete', $category->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-500/20 text-red-300 hover:bg-red-500/30">
                                            Delete
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                No categories found.
                            </td>
                        </tr>

                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>


<!-- Create Modal -->
<div
    id="createModal"
    class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-[#121222] border border-gray-800 rounded-2xl w-full max-w-md p-6">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold text-white">Create Category</h2>

            <button
                onclick="closeCreateModal()"
                class="text-gray-400 hover:text-white text-xl">
                ×
            </button>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">

            @csrf

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Category Name</label>

                <input
                    type="text"
                    name="name"
                    required
                    placeholder="Example: Music"
                    class="w-full bg-[#0B0B14] border border-gray-700 rounded-xl px-4 py-3 text-white outline-none">
            </div>

            <div class="mb-5">
                <label class="block text-gray-300 mb-2">Slug</label>

                <input
                    type="text"
                    name="slug"
                    required
                    placeholder="Example: music"
                    class="w-full bg-[#0B0B14] border border-gray-700 rounded-xl px-4 py-3 text-white outline-none">
            </div>

            <button
                type="submit"
                class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl font-semibold">
                Create Category
            </button>

        </form>
    </div>
</div>


<!-- Edit Modal -->
<div
    id="editModal"
    class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">

    <div class="bg-[#121222] border border-gray-800 rounded-2xl w-full max-w-md p-6">

        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-bold text-white">Edit Category</h2>

            <button
                onclick="closeEditModal()"
                class="text-gray-400 hover:text-white text-xl">
                ×
            </button>
        </div>

        <form id="editForm" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-300 mb-2">Category Name</label>

                <input
                    id="editName"
                    type="text"
                    name="name"
                    required
                    class="w-full bg-[#0B0B14] border border-gray-700 rounded-xl px-4 py-3 text-white outline-none">
            </div>

            <div class="mb-5">
                <label class="block text-gray-300 mb-2">Slug</label>

                <input
                    id="editSlug"
                    type="text"
                    name="slug"
                    required
                    class="w-full bg-[#0B0B14] border border-gray-700 rounded-xl px-4 py-3 text-white outline-none">
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold">
                Update Category
            </button>

        </form>
    </div>
</div>


<script>

function openCreateModal() {
    const modal = document.getElementById('createModal');

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeCreateModal() {
    const modal = document.getElementById('createModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

function openEditModal(id, name, slug) {

    const modal = document.getElementById('editModal');

    document.getElementById('editName').value = name;
    document.getElementById('editSlug').value = slug;

    document.getElementById('editForm').action =
        '/admin/categories/update/' + id;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditModal() {
    const modal = document.getElementById('editModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

</script>

@endsection