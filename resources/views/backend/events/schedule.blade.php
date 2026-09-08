@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ editModal: false, activeSchedule: {} }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Event Schedule</h1>
        </div>
    </div>

    <!-- Schedule Table (With Image & View Button) -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-800 bg-[#18182f]/50 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        <th class="p-4">Event Name</th>
                        <th class="p-4">Session Title</th>
                        <th class="p-4">Date & Time</th>
                        <th class="p-4">Host</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800 text-sm text-gray-300">
                    @forelse($events ?? [] as $event)
                    <tr class="hover:bg-[#18182f]/30 transition">
                        <!-- Event Name with Image -->
                        <td class="p-4 font-semibold text-white">
                            <div class="flex items-center gap-3">
                                <img src="{{ $event->image_url ?? asset('uploads/default.png') }}" alt="{{ $event->title }}" class="w-10 h-10 rounded-lg object-cover border border-gray-700">
                                <span class="line-clamp-1">{{ $event->title }}</span>
                            </div>
                        </td>
                        <td class="p-4 text-gray-300">{{ $event->categoryRelation?->name ?? $event->category ?? 'General' }}</td>
                        <td class="p-4 text-gray-400">
                            {{ $event->date_time ? \Carbon\Carbon::parse($event->date_time)->format('M d, Y, h:i A') : 'Not available' }}
                        </td>
                        <td class="p-4 text-purple-400 font-medium">{{ $event->venue ?: 'TBD' }}</td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <!-- View Button with Route -->
                                <a href="{{ route('events.details', $event->id) }}" target="_blank" class="px-3 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-emerald-600/20 transition">
                                    View
                                </a>

                                <!-- Blue Edit Button -->
                                <button @click="editModal = true; activeSchedule = {{ json_encode($event) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-blue-600/20 transition">
                                    Edit
                                </button>

                                <!-- Red Delete Form -->
                                <form action="{{ route('admin.events.delete', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc2626;" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-red-600/20 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <!-- No Data Found Message -->
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-400 text-sm">
                            No events found in the database. Please add an event first.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="editModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-lg p-6 shadow-2xl text-white">
            <div class="flex items-center justify-between pb-4 border-b border-gray-800 mb-4">
                <h3 class="font-bold text-lg text-white">Edit Event Details</h3>
                <button @click="editModal = false" class="text-gray-400 hover:text-white">✕</button>
            </div>

            <form :action="'/admin/events/update/' + (activeSchedule.id || '')" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Event Name</label>
                    <input type="text" name="title" x-model="activeSchedule.title" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Session Title / Category</label>
                    <input type="text" name="category" x-model="activeSchedule.category" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Date & Time</label>
                    <input type="text" name="date_time" x-model="activeSchedule.date_time" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Venue / Host</label>
                    <input type="text" name="venue" x-model="activeSchedule.venue" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                    <button type="button" @click="editModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl text-xs font-semibold hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-semibold hover:bg-blue-700">Update Event</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection