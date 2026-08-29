@extends('backend.layout.master')

@section('content')
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">
        
        <!-- Back Button & Page Title -->
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.event.organizers') }}" class="p-2.5 bg-[#121222] border border-gray-800 hover:bg-gray-800 text-gray-300 rounded-xl transition flex items-center gap-2 text-xs font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Organizers
                </a>
                <h1 class="text-xl font-bold text-white">Organizer Profile Details</h1>
            </div>
        </div>

        <!-- Organizer Profile Header Card -->
        <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 shadow-xl mb-8 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-purple-600/20 text-purple-400 font-bold flex items-center justify-center text-xl border border-purple-500/30">
                    {{ strtoupper(substr($organizer->name ?? 'Nexus Events', 0, 2)) }}
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white">{{ $organizer->name ?? 'Nexus Events Ltd.' }}</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Joined: {{ isset($organizer->created_at) ? $organizer->created_at->format('M d, Y') : 'Mar 2025' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1.5 bg-emerald-500/10 text-emerald-400 rounded-xl text-xs font-semibold border border-emerald-500/20">Active Partner</span>
            </div>
        </div>

        <!-- Organizer Info Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                <p class="text-xs text-gray-400 uppercase font-semibold">Email Address</p>
                <p class="text-sm font-bold text-white mt-1">{{ $organizer->email ?? 'contact@nexusevents.com' }}</p>
            </div>
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                <p class="text-xs text-gray-400 uppercase font-semibold">Phone Number</p>
                <p class="text-sm font-bold text-white mt-1">{{ $organizer->phone ?? '+880 1712-345678' }}</p>
            </div>
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">
                <p class="text-xs text-gray-400 uppercase font-semibold">Total Revenue Generated</p>
                <p class="text-sm font-bold text-emerald-400 mt-1">৳{{ $organizer->revenue ?? '1,45,000' }}</p>
            </div>
        </div>

        <!-- SEPARATE SECTION: Events Launched by this Organizer -->
        <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 shadow-xl">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-800">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Events Launched by {{ $organizer->name ?? 'Nexus Events Ltd.' }}
                </h3>
                <span class="text-xs px-3 py-1 bg-purple-600/10 text-purple-300 rounded-xl font-semibold border border-purple-500/20">
                    {{ isset($organizer->events) ? count($organizer->events) : '2' }} Events
                </span>
            </div>

            <!-- Launched Events List -->
            <div class="space-y-4">
                @if(isset($organizer->events) && count($organizer->events) > 0)
                    @foreach($organizer->events as $event)
                        <div class="bg-[#18182f] border border-gray-800/80 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-700/50 flex items-center justify-center text-purple-300 font-bold text-xs">
                                    LIVE
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-white">{{ $event->title }}</h4>
                                    <p class="text-xs text-gray-400">Venue: {{ $event->venue }} • Date: {{ $event->date ?? 'Upcoming' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="text-xs px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg font-semibold">Active</span>
                                <span class="text-xs font-bold text-white">৳{{ $event->price ?? '1,200' }} / Ticket</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Static Demo Events if no relation data passed -->
                    <div class="bg-[#18182f] border border-gray-800/80 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-700/50 flex items-center justify-center text-purple-300 font-bold text-xs">LIVE</div>
                            <div>
                                <h4 class="text-sm font-bold text-white">Rock Fest 2026</h4>
                                <p class="text-xs text-gray-400">Venue: Army Stadium, Dhaka • Date: 15 Oct, 2026</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-xs px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg font-semibold">Active</span>
                            <span class="text-xs font-bold text-white">৳1,200 / Ticket</span>
                        </div>
                    </div>

                    <div class="bg-[#18182f] border border-gray-800/80 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-700/50 flex items-center justify-center text-purple-300 font-bold text-xs">LIVE</div>
                            <div>
                                <h4 class="text-sm font-bold text-white">DJ Night Live Concert</h4>
                                <p class="text-xs text-gray-400">Venue: International Convention City • Date: 22 Nov, 2026</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-xs px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg font-semibold">Active</span>
                            <span class="text-xs font-bold text-white">৳800 / Ticket</span>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </main>
@endsection