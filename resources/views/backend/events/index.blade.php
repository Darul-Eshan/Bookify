<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Events - Admin Dashboard</title>

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
<body class="bg-[#0B0B14] text-gray-200 antialiased" x-data="{ sidebarOpen: false, addEventModal: false, editEventModal: false, activeEvent: {} }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Include -->
        @include('backend.include.sidebar')

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">
            <!-- Header Include -->
            @include('backend.include.header')

            <!-- Main Dynamic Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">
                
                <!-- Page Header & Action Buttons -->
                <div class="mb-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-white tracking-tight">Manage Events</h1>
                        <p class="text-sm text-gray-400 mt-1">Full control over event listings, capacities, pricing, and schedules.</p>
                    </div>
                    
                    <!-- Action Buttons Group -->
                    <div class="flex flex-wrap items-center gap-3">
                        <button onclick="window.location.reload()" class="px-3.5 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 font-semibold text-xs rounded-xl border border-gray-800 transition flex items-center gap-2" title="Refresh List">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                            Refresh
                        </button>
                        
                        <a href="#" class="px-3.5 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 font-semibold text-xs rounded-xl border border-gray-800 transition flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Export CSV
                        </a>

                        <!-- Create New Event Button -->
                        <button @click="addEventModal = true" class="px-4 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold text-sm rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Create New Event
                        </button>
                    </div>
                </div>

                <!-- Event Stats Summary Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Events</p>
                        <h3 class="text-2xl font-bold text-white mt-1">{{ isset($events) ? count($events) : 0 }}</h3>
                        <span class="text-xs text-purple-400 font-medium mt-2 inline-block">All active & past</span>
                    </div>
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Live / Ongoing</p>
                        <h3 class="text-2xl font-bold text-white mt-1">0</h3>
                        <span class="text-xs text-emerald-400 font-medium mt-2 inline-block">Happening now</span>
                    </div>
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Upcoming</p>
                        <h3 class="text-2xl font-bold text-white mt-1">{{ isset($events) ? count($events) : 0 }}</h3>
                        <span class="text-xs text-indigo-400 font-medium mt-2 inline-block">Tickets on sale</span>
                    </div>
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Sold Out</p>
                        <h3 class="text-2xl font-bold text-white mt-1">0</h3>
                        <span class="text-xs text-amber-400 font-medium mt-2 inline-block">100% booked</span>
                    </div>
                </div>

                <!-- Events Table Section with Filters -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
                        <h3 class="text-lg font-bold text-white">Event Directory</h3>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <!-- Search Bar -->
                            <input type="text" placeholder="Search event title or venue..." class="w-full sm:w-64 bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-3 py-2.5 focus:outline-none focus:border-purple-500 placeholder-gray-500 transition">
                            <!-- Filter Dropdown -->
                            <select class="bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-3 py-2.5 focus:outline-none focus:border-purple-500 transition">
                                <option value="">All Categories</option>
                                <option value="concert">Concert</option>
                                <option value="music">Music</option>
                                <option value="tech">Tech Summit</option>
                                <option value="sports">Sports</option>
                            </select>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-300">
                            <thead class="bg-[#161628] text-gray-400 uppercase text-xs tracking-wider">
                                <tr>
                                    <th class="p-3 rounded-l-xl">Event Details</th>
                                    <th class="p-3">Category</th>
                                    <th class="p-3">Date & Time</th>
                                    <th class="p-3">Ticket Sales / Capacity</th>
                                    <th class="p-3">Price</th>
                                    <th class="p-3">Status</th>
                                    <th class="p-3 rounded-r-xl text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                @forelse($events as $event)
                                    <tr>
                                        <td class="p-3">
                                            <div class="flex items-center gap-3">
                                                <img src="{{ $event->image }}" class="w-12 h-12 rounded-xl object-cover border border-gray-700" alt="Event">
                                                <div>
                                                    <h4 class="text-sm font-bold text-white">{{ $event->title }}</h4>
                                                    <p class="text-xs text-gray-400">{{ $event->venue }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3"><span class="text-xs px-2.5 py-1 bg-purple-950 text-purple-300 rounded-lg font-semibold">{{ $event->category }}</span></td>
                                        <td class="p-3 text-xs text-gray-300">
                                            {{ \Carbon\Carbon::parse($event->date_time)->format('d M, Y') }}<br>
                                            <span class="text-gray-500">{{ \Carbon\Carbon::parse($event->date_time)->format('h:i A') }}</span>
                                        </td>
                                        <td class="p-3 text-xs">
                                            <div class="flex justify-between mb-1">
                                                <span class="text-gray-300">0 / {{ $event->capacity }}</span>
                                                <span class="text-purple-400 font-bold">0%</span>
                                            </div>
                                            <div class="w-32 bg-gray-800 h-1.5 rounded-full overflow-hidden">
                                                <div class="bg-purple-600 h-full rounded-full" style="width: 0%"></div>
                                            </div>
                                        </td>
                                        <td class="p-3 font-semibold text-white">৳{{ number_format($event->price, 2) }}</td>
                                        <td class="p-3"><span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">Upcoming</span></td>
                                     <td class="p-3 text-right">
    <div class="flex items-center justify-end gap-1.5">
        <!-- Edit Button -->
        <button @click="editEventModal = true; activeEvent = {{ json_encode($event) }}" class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600 text-purple-400 hover:text-white rounded-lg text-xs font-semibold transition flex items-center gap-1" title="Edit Event Details">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            Edit
        </button>

        <!-- Delete Form -->
        <form action="{{ route('admin.events.delete', $event->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this event?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-3 py-1.5 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-lg text-xs font-semibold transition flex items-center gap-1" title="Delete Event">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 2 0 00-2-2h-4a1 2 0 00-2 2v3m4 0H6m6 0h6"></path></svg>
                Delete
            </button>
        </form>
    </div>
</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="p-8 text-center text-gray-400 text-sm">
                                            <div class="flex flex-col items-center justify-center space-y-3">
                                                <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <p>No events found in the database.</p>
                                                <button @click="addEventModal = true" class="text-xs px-3 py-1.5 bg-purple-600 text-white rounded-lg hover:bg-purple-500 transition">Create Your First Event</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Create New Event Modal (Alpine.js) -->
                <div x-show="addEventModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4 overflow-y-auto" style="display: none;">
                    <div @click.away="addEventModal = false" class="bg-[#121222] border border-gray-800 rounded-2xl w-full max-w-2xl p-6 shadow-2xl text-white my-8">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                            <h3 class="font-bold text-lg">Create New Event</h3>
                            <button @click="addEventModal = false" class="text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        
                        <form action="{{ route('admin.events.store') }}" method="POST" class="py-4 space-y-4">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Event Title</label>
                                    <input type="text" name="title" required placeholder="e.g. Rock Fest 2026" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Category</label>
                                    <select name="category" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                        <option value="Concert">Concert</option>
                                        <option value="Music">Music</option>
                                        <option value="Tech Summit">Tech Summit</option>
                                        <option value="Sports">Sports</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Date & Time</label>
                                    <input type="datetime-local" name="date_time" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Venue / Location</label>
                                    <input type="text" name="venue" required placeholder="e.g. Army Stadium, Dhaka" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Ticket Price (৳)</label>
                                    <input type="number" name="price" step="0.01" required placeholder="1200" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Total Capacity</label>
                                    <input type="number" name="capacity" required placeholder="1500" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Event Banner Image URL</label>
                                <input type="text" name="image" placeholder="https://images.unsplash.com/..." class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                            </div>

                            <div class="flex justify-end gap-3 pt-3 border-t border-gray-800">
                                <button type="button" @click="addEventModal = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 text-xs font-semibold rounded-xl transition">
                                    Cancel
                                </button>
                                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                                    Save Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Event Modal (Alpine.js) -->
                <div x-show="editEventModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm p-4 overflow-y-auto" style="display: none;">
                    <div @click.away="editEventModal = false" class="bg-[#121222] border border-gray-800 rounded-2xl w-full max-w-2xl p-6 shadow-2xl text-white my-8">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                            <h3 class="font-bold text-lg">Edit Event Details</h3>
                            <button @click="editEventModal = false" class="text-gray-400 hover:text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>
                        
                        <form :action="'/admin/events/update/' + activeEvent.id" method="POST" class="py-4 space-y-4">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Event Title</label>
                                    <input type="text" name="title" x-model="activeEvent.title" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Category</label>
                                    <select name="category" x-model="activeEvent.category" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                        <option value="Concert">Concert</option>
                                        <option value="Music">Music</option>
                                        <option value="Tech Summit">Tech Summit</option>
                                        <option value="Sports">Sports</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Date & Time</label>
                                    <input type="datetime-local" name="date_time" x-model="activeEvent.date_time" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Venue / Location</label>
                                    <input type="text" name="venue" x-model="activeEvent.venue" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Ticket Price (৳)</label>
                                    <input type="number" name="price" step="0.01" x-model="activeEvent.price" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Total Capacity</label>
                                    <input type="number" name="capacity" x-model="activeEvent.capacity" required class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-1">Event Banner Image URL</label>
                                <input type="text" name="image" x-model="activeEvent.image" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-purple-500">
                            </div>

                            <div class="flex justify-end gap-3 pt-3 border-t border-gray-800">
                                <button type="button" @click="editEventModal = false" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 text-xs font-semibold rounded-xl transition">
                                    Cancel
                                </button>
                                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                                    Update Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </main>

            <!-- Footer Include -->
            @include('backend.include.footer')
        </div>
    </div>

</body>
</html>