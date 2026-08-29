@extends('backend.layout.master')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Venues & Locations</h1>
            <p class="text-sm text-gray-400 mt-1">Manage physical locations and auditoriums for events.</p>
        </div>
        <button class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition">
            + Add New Venue
        </button>
    </div>

    <!-- Venues Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([
            ['name' => 'Bangabandhu International Conference Center', 'city' => 'Dhaka', 'cap' => '5,000 Seats'],
            ['name' => 'Army Golf Club Convention Hall', 'city' => 'Dhaka', 'cap' => '2,500 Seats'],
            ['name' => 'Radisson Blu Water Garden', 'city' => 'Dhaka', 'cap' => '1,200 Seats']
        ] as $venue)
        <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between hover:border-purple-500/50 transition">
            <div>
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-1 bg-purple-600/10 text-purple-400 text-xs font-semibold rounded-lg">{{ $venue['city'] }}</span>
                    <span class="text-xs text-gray-400">Capacity: <strong class="text-white">{{ $venue['cap'] }}</strong></span>
                </div>
                <h3 class="text-white font-semibold text-base mt-3">{{ $venue['name'] }}</h3>
                <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Airport Road, Dhaka, Bangladesh
                </p>
            </div>
            <div class="mt-6 pt-4 border-t border-gray-800 flex items-center justify-end gap-2">
                <button class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600 text-purple-400 hover:text-white rounded-lg text-xs font-semibold transition">Edit</button>
                <button class="px-3 py-1.5 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-lg text-xs font-semibold transition">Remove</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection