@extends('backend.layout.master')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Event Organizers</h1>
            <p class="text-sm text-gray-400 mt-1">Manage all event organizers, partners, and permissions.</p>
        </div>
        <button class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Organizer
        </button>
    </div>

    <!-- Organizers Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach([1, 2, 3] as $item)
        <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between hover:border-purple-500/50 transition">
            <div>
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-purple-600/20 text-purple-400 flex items-center justify-center font-bold text-lg">
                            AO
                        </div>
                        <div>
                            <h3 class="text-white font-semibold text-base">Nexus Events Ltd.</h3>
                            <p class="text-xs text-gray-400">Joined Mar 2025</p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 text-xs font-semibold rounded-full">Active</span>
                </div>
                <div class="mt-4 space-y-2 text-sm text-gray-300">
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        contact@nexusevents.com
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        +880 1712-345678
                    </div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-gray-800/80 flex items-center justify-between text-xs">
                <span class="text-gray-400 font-medium">Total Events: <strong class="text-white">12</strong></span>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600 text-purple-400 hover:text-white rounded-lg font-semibold transition">Edit</button>
                    <button class="px-3 py-1.5 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-lg font-semibold transition">Block</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection