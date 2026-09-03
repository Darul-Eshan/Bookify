<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Event - Admin Dashboard</title>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0B14] text-gray-200 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Include -->
        @include('backend.include.sidebar')

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">
            <!-- Header Include -->
            @include('backend.include.header')

            <!-- Main Dynamic Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">
                
                <!-- Page Navigation Header -->
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <a href="{{ route('admin.events') }}" class="text-xs text-purple-400 hover:text-purple-300 font-semibold flex items-center gap-1 mb-1 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            Back to Event Directory
                        </a>
                        <h1 class="text-2xl font-bold text-white tracking-tight">Create New Event</h1>
                    </div>
                </div>

                <!-- Alert Messages -->
                @if (session('success'))
                    <div class="max-w-4xl mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl text-emerald-400 text-sm flex items-center gap-3 shadow-lg">
                        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="max-w-4xl mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-2xl text-red-400 text-sm shadow-lg">
                        <div class="font-semibold mb-2 flex items-center gap-2">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>There were some problems with your input:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-xs opacity-90 pl-7">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Create Event Form Container -->
                <div class="max-w-4xl bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-2xl">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Event Title & Category -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Event Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Rock Fest 2026" class="w-full bg-[#18182f] text-sm text-gray-200 border @error('title') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Category</label>
                                <select name="category" required class="w-full bg-[#18182f] text-sm text-gray-200 border @error('category') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                                    <option value="" disabled {{ old('category') ? '' : 'selected' }}>Select Category</option>
                                    <option value="Concert" {{ old('category') == 'Concert' ? 'selected' : '' }}>Concert</option>
                                    <option value="Music" {{ old('category') == 'Music' ? 'selected' : '' }}>Music</option>
                                    <option value="Tech Summit" {{ old('category') == 'Tech Summit' ? 'selected' : '' }}>Tech Summit</option>
                                    <option value="Sports" {{ old('category') == 'Sports' ? 'selected' : '' }}>Sports</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date/Time & Venue -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Date & Time</label>
                                <input type="datetime-local" name="date_time" value="{{ old('date_time') }}" required class="w-full bg-[#18182f] text-sm text-gray-200 border @error('date_time') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Venue / Location</label>
                                <input type="text" name="venue" value="{{ old('venue') }}" required placeholder="e.g. Army Stadium, Dhaka" class="w-full bg-[#18182f] text-sm text-gray-200 border @error('venue') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            </div>
                        </div>

                        <!-- Price & Capacity -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Ticket Price (৳)</label>
                                <input type="number" name="price" step="0.01" value="{{ old('price') }}" required placeholder="1200" class="w-full bg-[#18182f] text-sm text-gray-200 border @error('price') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Total Capacity</label>
                                <input type="number" name="capacity" value="{{ old('capacity') }}" required placeholder="1500" class="w-full bg-[#18182f] text-sm text-gray-200 border @error('capacity') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">
                            </div>
                        </div>

                        <!-- Image Upload Box with Preview & Delete (Alpine.js) -->
                        <div x-data="{ imagePreview: null }">
                            <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">Event Banner Image (Optional)</label>
                            
                            <!-- State 1: Upload Box (Show when no image selected) -->
                            <div x-show="!imagePreview" class="relative border-2 border-dashed border-gray-700 hover:border-purple-500/80 bg-[#18182f] rounded-2xl p-6 text-center cursor-pointer transition group">
                                <input type="file" name="image" id="imageInput" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                    @change="
                                        const file = $event.target.files[0];
                                        if (file) {
                                            imagePreview = URL.createObjectURL(file);
                                        }
                                    ">
                                <div class="flex flex-col items-center justify-center space-y-2 pointer-events-none">
                                    <div class="p-3 bg-purple-600/10 rounded-xl text-purple-400 group-hover:scale-110 transition">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                    <p class="text-xs font-semibold text-gray-200">Click or drag image to upload</p>
                                    <p class="text-[11px] text-gray-500">Supports PNG, JPG, WEBP (Max 5MB)</p>
                                </div>
                            </div>

                            <!-- State 2: Image Preview & Delete Action (Show when image selected) -->
                            <div x-show="imagePreview" x-cloak class="relative rounded-2xl overflow-hidden border border-gray-700 bg-[#18182f] group">
                                <img :src="imagePreview" class="w-full h-56 object-cover rounded-2xl">
                                
                                <!-- Overlay Controls -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                    <button type="button" @click="imagePreview = null; document.getElementById('imageInput').value = ''" class="px-4 py-2 bg-red-600/90 hover:bg-red-600 text-white text-xs font-semibold rounded-xl backdrop-blur-md shadow-lg transition flex items-center gap-1.5" title="Remove image">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                                        Remove Image
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Form Submit Buttons -->
                        <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                            <a href="{{ route('admin.events') }}" class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-xs font-semibold rounded-xl transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                                Save Event
                            </button>
                        </div>
                    </form>
                </div>

            </main>

            <!-- Footer Include -->
            @include('backend.include.footer')
        </div>
    </div>

</body>
</html>