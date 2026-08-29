@extends('backend.layout.master')

@section('content')
<div class="space-y-6" x-data="{ editModal: false, activeSchedule: {} }">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Event Schedule</h1>
            <p class="text-sm text-gray-400 mt-1">Timeline and session schedules for upcoming events.</p>
        </div>
        <button class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition">
            + Add Schedule Slot
        </button>
    </div>

    <!-- Schedule Table -->
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
                    @forelse($schedules ?? [] as $schedule)
                    <tr class="hover:bg-[#18182f]/30 transition">
                        <td class="p-4 font-semibold text-white">{{ $schedule->event_name }}</td>
                        <td class="p-4 text-gray-300">{{ $schedule->session_title }}</td>
                        <td class="p-4 text-gray-400">{{ $schedule->date_time }}</td>
                        <td class="p-4 text-purple-400 font-medium">{{ $schedule->speaker }}</td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <!-- Blue Edit Button -->
                                <button @click="editModal = true; activeSchedule = {{ json_encode($schedule) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-blue-600/20 transition">
                                    Edit
                                </button>

                                <!-- Red Delete Form & Button with Inline Style Fallback -->
                                <form action="{{ route('admin.schedules.delete', $schedule->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this schedule?');">
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
                    <!-- Sample Row with Blue and Red Buttons -->
                    <tr class="hover:bg-[#18182f]/30 transition">
                        <td class="p-4 font-semibold text-white">Tech Startup Summit 2026</td>
                        <td class="p-4 text-gray-300">Opening Keynote & AI Future</td>
                        <td class="p-4 text-gray-400">15 Sep 2026, 10:00 AM</td>
                        <td class="p-4 text-purple-400 font-medium">Dr. Zunaid Ahmed</td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button @click="editModal = true; activeSchedule = {id: 1, event_name: 'Tech Startup Summit 2026', session_title: 'Opening Keynote & AI Future', date_time: '2026-09-15 10:00:00', speaker: 'Dr. Zunaid Ahmed'}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-blue-600/20 transition">
                                    Edit
                                </button>
                                <button onclick="alert('Are you sure you want to delete this schedule?')" style="background-color: #dc2626;" class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-semibold shadow-md shadow-red-600/20 transition">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Schedule Modal -->
    <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4" style="display: none;">
        <div @click.away="editModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-lg p-6 shadow-2xl text-white">
            <div class="flex items-center justify-between pb-4 border-b border-gray-800 mb-4">
                <h3 class="font-bold text-lg text-white">Edit Event Schedule</h3>
                <button @click="editModal = false" class="text-gray-400 hover:text-white">✕</button>
            </div>

            <form :action="'/admin/event-schedules/update/' + (activeSchedule.id || 1)" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Event Name</label>
                    <input type="text" name="event_name" x-model="activeSchedule.event_name" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Session Title</label>
                    <input type="text" name="session_title" x-model="activeSchedule.session_title" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Date & Time</label>
                    <input type="text" name="date_time" x-model="activeSchedule.date_time" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div>
                    <label class="block text-xs text-gray-400 mb-1">Speaker / Host</label>
                    <input type="text" name="speaker" x-model="activeSchedule.speaker" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500" required>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">
                    <button type="button" @click="editModal = false" class="px-4 py-2 bg-gray-800 text-gray-300 rounded-xl text-xs font-semibold hover:bg-gray-700">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-semibold hover:bg-blue-700">Update Schedule</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection