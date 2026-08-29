@extends('backend.layout.master')

@section('content')

    <!-- Main Container with Alpine.js State -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14]" x-data="{ viewModal: false, activeOrganizer: {} }">
        
        <!-- Page Header Title -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-white tracking-tight">Event Organizers</h1>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.organizers.create') }}" class="px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold transition-all shadow-lg shadow-purple-600/20 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add New Organizer
                </a>
            </div>
        </div>

        <!-- Organizer Quick Stats -->
        <div class="flex flex-col lg:flex-row gap-6 mb-8">
            <div class="flex-1 bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Organizers</p>
                    <h3 class="text-2xl font-bold text-white mt-1">24</h3>
                </div>
                <span class="p-3 bg-purple-600/10 text-purple-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </span>
            </div>
            
            <div class="flex-1 bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Active & Verified</p>
                    <h3 class="text-2xl font-bold text-white mt-1">21</h3>
                </div>
                <span class="p-3 bg-emerald-600/10 text-emerald-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </span>
            </div>
            
            <div class="flex-1 bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Pending Approvals</p>
                    <h3 class="text-2xl font-bold text-white mt-1">3</h3>
                </div>
                <span class="p-3 bg-amber-600/10 text-amber-400 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
            </div>
        </div>

        <!-- Search & Filter Bar -->
        <div class="bg-[#121222] border border-gray-800 rounded-2xl p-4 mb-6 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="w-full sm:w-96 relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" placeholder="Search organizer by name or email..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl pl-10 pr-4 py-2 text-sm text-white focus:outline-none focus:border-purple-500">
            </div>
            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <select class="bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-gray-300 focus:outline-none focus:border-purple-500">
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Pending</option>
                    <option>Blocked</option>
                </select>
            </div>
        </div>

        <!-- Organizers Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Organizer Card 1 -->
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg flex flex-col justify-between hover:border-purple-500/50 transition-all">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-purple-600/20 text-purple-400 font-bold flex items-center justify-center text-lg border border-purple-500/30">
                                NE
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-white">Nexus Events Ltd.</h3>
                                <p class="text-xs text-gray-400">Joined Mar 2025</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg text-xs font-semibold">Active</span>
                    </div>

                    <div class="space-y-2.5 text-sm text-gray-300 border-t border-b border-gray-800/60 py-4 my-4">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Email:</span>
                            <span class="text-gray-300 truncate">contact@nexusevents.com</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Phone:</span>
                            <span class="text-gray-300">+880 1712-345678</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-1">
                            <span class="text-gray-500">Total Events Hosted:</span>
                            <span class="text-purple-400 font-bold">12 Events</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Total Revenue Gen:</span>
                            <span class="text-emerald-400 font-bold">৳1,45,000</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <button @click="viewModal = true; activeOrganizer = { name: 'Nexus Events Ltd.', initials: 'NE', joined: 'Mar 2025', email: 'contact@nexusevents.com', phone: '+880 1712-345678', revenue: '৳1,45,000', eventsCount: '12' }" class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600/20 text-purple-400 rounded-xl text-xs font-semibold transition-all">
                        View Details
                    </button>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-xs font-medium transition-all">Edit</button>
                        <button class="px-3 py-1.5 bg-rose-600/10 hover:bg-rose-600/20 text-rose-400 rounded-xl text-xs font-medium transition-all">Block</button>
                    </div>
                </div>
            </div>

            <!-- Organizer Card 2 -->
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg flex flex-col justify-between hover:border-purple-500/50 transition-all">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-indigo-600/20 text-indigo-400 font-bold flex items-center justify-center text-lg border border-indigo-500/30">
                                SE
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-white">Spark Entertainment</h3>
                                <p class="text-xs text-gray-400">Joined Jan 2026</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg text-xs font-semibold">Active</span>
                    </div>

                    <div class="space-y-2.5 text-sm text-gray-300 border-t border-b border-gray-800/60 py-4 my-4">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Email:</span>
                            <span class="text-gray-300 truncate">info@sparkent.bd</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Phone:</span>
                            <span class="text-gray-300">+880 1819-987654</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-1">
                            <span class="text-gray-500">Total Events Hosted:</span>
                            <span class="text-purple-400 font-bold">8 Events</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Total Revenue Gen:</span>
                            <span class="text-emerald-400 font-bold">৳98,500</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('admin.organizers.details', $organizer->id ?? 1) }}" class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600/20 text-purple-400 rounded-xl text-xs font-semibold transition-all">
                    View Details
                    </a>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-xs font-medium transition-all">Edit</button>
                        <button class="px-3 py-1.5 bg-rose-600/10 hover:bg-rose-600/20 text-rose-400 rounded-xl text-xs font-medium transition-all">Block</button>
                    </div>
                </div>
            </div>

            <!-- Organizer Card 3 -->
            <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg flex flex-col justify-between hover:border-purple-500/50 transition-all">
                <div>
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-xl bg-amber-600/20 text-amber-400 font-bold flex items-center justify-center text-lg border border-amber-500/30">
                                DM
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-white">Dhaka Music Club</h3>
                                <p class="text-xs text-gray-400">Joined Feb 2026</p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 bg-amber-500/10 text-amber-400 rounded-lg text-xs font-semibold">Pending</span>
                    </div>

                    <div class="space-y-2.5 text-sm text-gray-300 border-t border-b border-gray-800/60 py-4 my-4">
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Email:</span>
                            <span class="text-gray-300 truncate">support@dhakamusic.club</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <span class="text-gray-500">Phone:</span>
                            <span class="text-gray-300">+880 1552-112233</span>
                        </div>
                        <div class="flex items-center justify-between text-xs pt-1">
                            <span class="text-gray-500">Total Events Hosted:</span>
                            <span class="text-purple-400 font-bold">0 Events</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-500">Total Revenue Gen:</span>
                            <span class="text-emerald-400 font-bold">৳0</span>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-2">
                    <button @click="viewModal = true; activeOrganizer = { name: 'Dhaka Music Club', initials: 'DM', joined: 'Feb 2026', email: 'support@dhakamusic.club', phone: '+880 1552-112233', revenue: '৳0', eventsCount: '0' }" class="px-3 py-1.5 bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 rounded-xl text-xs font-semibold transition-all">
                        View Details
                    </button>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-xs font-medium transition-all">Edit</button>
                        <button class="px-3 py-1.5 bg-rose-600/10 hover:bg-rose-600/20 text-rose-400 rounded-xl text-xs font-medium transition-all">Reject</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Organizer Profile & Launched Events Details Modal (Alpine.js) -->
        <div x-show="viewModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4 overflow-y-auto" style="display: none;">
            <div @click.away="viewModal = false" class="bg-[#121222] border border-gray-800 rounded-3xl w-full max-w-4xl p-6 shadow-2xl text-white my-8 max-h-[90vh] overflow-y-auto">
                
                <!-- Modal Header -->
                <div class="flex items-center justify-between pb-4 border-b border-gray-800">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-purple-600/20 text-purple-400 font-bold flex items-center justify-center text-lg border border-purple-500/30" x-text="activeOrganizer.initials || 'OR'">
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-white" x-text="activeOrganizer.name">Organizer Name</h3>
                            <p class="text-xs text-gray-400" x-text="'Joined: ' + (activeOrganizer.joined || 'N/A')">Joined Date</p>
                        </div>
                    </div>
                    <button @click="viewModal = false" class="text-gray-400 hover:text-white p-2 rounded-xl bg-gray-800/50 hover:bg-gray-800 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Organizer Profile Info Section -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 my-6">
                    <div class="bg-[#18182f] border border-gray-800/60 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 uppercase font-semibold">Email Address</p>
                        <p class="text-sm font-bold text-white mt-1 truncate" x-text="activeOrganizer.email">email@domain.com</p>
                    </div>
                    <div class="bg-[#18182f] border border-gray-800/60 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 uppercase font-semibold">Phone Number</p>
                        <p class="text-sm font-bold text-white mt-1" x-text="activeOrganizer.phone">+880 1XXXXXXXXX</p>
                    </div>
                    <div class="bg-[#18182f] border border-gray-800/60 rounded-2xl p-4">
                        <p class="text-xs text-gray-400 uppercase font-semibold">Total Revenue Generated</p>
                        <p class="text-sm font-bold text-emerald-400 mt-1" x-text="activeOrganizer.revenue || '৳0'">৳0</p>
                    </div>
                </div>

                <!-- SEPARATE SECTION: Launched Events by this Organizer -->
                <div class="mt-8 pt-6 border-t border-gray-800">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-md font-bold text-white flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Events Launched by <span class="text-purple-400" x-text="activeOrganizer.name"></span>
                        </h4>
                        <span class="text-xs px-2.5 py-1 bg-purple-600/10 text-purple-300 rounded-lg font-semibold" x-text="(activeOrganizer.eventsCount || '0') + ' Events'"></span>
                    </div>

                    <!-- Launched Events List -->
                    <div class="space-y-3">
                        <div class="bg-[#18182f] border border-gray-800 rounded-2xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-purple-900/40 border border-purple-700/50 flex items-center justify-center text-purple-300 font-bold text-xs">
                                    EVENT
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-white">Sample Live Event Profile</h5>
                                    <p class="text-xs text-gray-400">Venue: Convention Center • Date: Upcoming</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 w-full sm:w-auto justify-between sm:justify-end">
                                <span class="text-xs px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-lg font-semibold">Active</span>
                                <span class="text-xs font-bold text-white">৳1,500 / Ticket</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-end pt-6 mt-6 border-t border-gray-800">
                    <button type="button" @click="viewModal = false" class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-xs font-semibold rounded-xl transition">
                        Close Profile
                    </button>
                </div>

            </div>
        </div>

    </main>
@endsection