@extends('backend.layout.master')

@section('content')
<div class="space-y-6">
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
                        <th class="p-4">Speaker / Host</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800 text-sm text-gray-300">
                    @foreach([1, 2, 3, 4] as $item)
                    <tr class="hover:bg-[#18182f]/30 transition">
                        <td class="p-4 font-semibold text-white">Tech Startup Summit 2026</td>
                        <td class="p-4 text-gray-300">Opening Keynote & AI Future</td>
                        <td class="p-4 text-gray-400">15 Sep 2026, 10:00 AM</td>
                        <td class="p-4 text-purple-400 font-medium">Dr. Zunaid Ahmed</td>
                        <td class="p-4 text-right">
                            <div class="flex items-center justify-end gap-1.5">
                                <button class="px-3 py-1 bg-purple-600/10 hover:bg-purple-600 text-purple-400 hover:text-white rounded-lg text-xs font-semibold transition">Edit</button>
                                <button class="px-3 py-1 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-lg text-xs font-semibold transition">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection