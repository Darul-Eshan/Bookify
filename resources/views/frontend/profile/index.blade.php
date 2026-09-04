@extends('frontend.layout.master')

@section('section')
<div class="min-h-screen bg-[#0B0B14] py-12 px-4 sm:px-6 lg:px-8 text-white">
    <div class="max-w-6xl mx-auto space-y-8">
        
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="bg-emerald-950/60 border border-emerald-500/40 text-emerald-300 px-4 py-3 rounded-2xl text-sm flex items-center justify-between">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Profile Header Card --}}
        <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 sm:p-8 shadow-xl relative overflow-hidden backdrop-blur-xl">
            <div class="absolute top-0 right-0 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl pointer-events-none"></div>
            
            <div class="flex flex-col md:flex-row items-center gap-6 relative z-10">
                {{-- Avatar --}}
                <div class="relative group">
                    @if(!empty($user->profile_picture))
                        <img src="{{ asset($user->profile_picture) }}" alt="{{ $user->name }}" class="w-28 h-28 rounded-2xl object-cover border-2 border-purple-500/50 shadow-lg shadow-purple-600/20">
                    @else
                        <div class="w-28 h-28 rounded-2xl bg-gradient-to-tr from-purple-600 to-indigo-500 flex items-center justify-center text-white font-bold text-3xl shadow-lg shadow-purple-600/30">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                    @endif
                </div>

                {{-- User Meta --}}
                <div class="flex-1 text-center md:text-left space-y-2">
                    <div class="flex flex-col md:flex-row md:items-center gap-3">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">{{ $user->name }}</h1>
                        <span class="inline-flex items-center justify-center px-3 py-1 bg-purple-950 text-purple-300 border border-purple-500/30 rounded-full text-xs font-semibold uppercase tracking-wider">
                            {{ $user->role ?? 'Customer' }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-400">{{ $user->email }}</p>
                    <p class="text-xs text-gray-500">Member since {{ $user->created_at ? $user->created_at->format('F Y') : 'N/A' }}</p>
                </div>

                {{-- Quick Stats Action --}}
                <div class="flex gap-3">
                    <div class="bg-[#18182f] border border-gray-800 rounded-2xl p-4 text-center min-w-[100px]">
                        <span class="block text-xl font-extrabold text-purple-400">{{ $user->bookings_count ?? 0 }}</span>
                        <span class="text-[11px] text-gray-400 font-medium">My Bookings</span>
                    </div>
                    <div class="bg-[#18182f] border border-gray-800 rounded-2xl p-4 text-center min-w-[100px]">
                        <span class="block text-xl font-extrabold text-indigo-400">৳0</span>
                        <span class="text-[11px] text-gray-400 font-medium">Wallet Balance</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Grid Content Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Left/Main Forms (Present Info Overview & Change Options) --}}
            <div class="lg:col-span-2 space-y-8">
                
                {{-- 1. Present Information Overview Card --}}
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Current Account Information
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-[#18182f] border border-gray-800/80 rounded-2xl p-4">
                        <div>
                            <span class="block text-[11px] uppercase tracking-wider text-gray-400 font-semibold">Current Name</span>
                            <span class="text-sm font-bold text-white mt-0.5 block">{{ $user->name }}</span>
                        </div>
                        <div>
                            <span class="block text-[11px] uppercase tracking-wider text-gray-400 font-semibold">Current Email</span>
                            <span class="text-sm font-bold text-white mt-0.5 block">{{ $user->email }}</span>
                        </div>
                        <div>
                            <span class="block text-[11px] uppercase tracking-wider text-gray-400 font-semibold">Current Phone</span>
                            <span class="text-sm font-bold text-white mt-0.5 block">{{ $user->phone_number ?? 'Not Added' }}</span>
                        </div>
                    </div>
                </div>

                {{-- 2. Personal Information Update Form --}}
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Update Personal Information
                    </h3>

                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">New Full Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">New Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">New Phone Number</label>
                                <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number ?? '') }}" placeholder="+880 1XXXXXXXXX" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">Upload New Profile Picture</label>
                                <input type="file" name="profile_picture" class="w-full bg-[#18182f] text-xs text-gray-400 border border-gray-800 rounded-xl px-3 py-2 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-500 transition">
                            </div>
                        </div>

                        <div class="pt-2 flex justify-end">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/30 transition">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                {{-- 3. Security & Password Update --}}
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 sm:p-8 shadow-xl backdrop-blur-xl">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Change Password
                    </h3>

                    <form action="{{ route('user.password.update') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1.5">Current Password</label>
                            <input type="password" name="current_password" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" required>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">New Password</label>
                                <input type="password" name="password" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" required>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1.5">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" required>
                            </div>
                        </div>

                        <div class="pt-2 flex justify-end">
                            <button type="submit" class="px-6 py-2.5 bg-[#1f1f38] hover:bg-[#282848] text-white text-xs font-semibold rounded-xl border border-gray-700/60 transition">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            {{-- Right Sidebar (Quick Shortcuts & Settings/Preferences) --V>
            <div class="space-y-6">
                
                {{-- Navigation Shortcuts --}}
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 shadow-xl backdrop-blur-xl space-y-3">
                    <h4 class="text-sm font-bold text-gray-300 tracking-wider uppercase mb-2">Quick Menu</h4>
                    
                    <a href="{{ route('user.tickets') }}" class="flex items-center justify-between p-3 rounded-2xl bg-[#18182f] hover:bg-[#1f1f38] border border-gray-800/60 transition">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-xl bg-purple-950 text-purple-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold text-white">My Booked Tickets</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>

                    <a href="{{ route('user.transaction.history') }}" class="flex items-center justify-between p-3 rounded-2xl bg-[#18182f] hover:bg-[#1f1f38] border border-gray-800/60 transition">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-xl bg-indigo-950 text-indigo-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            </div>
                            <span class="text-xs font-semibold text-white">Transaction History</span>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>

                {{-- Notification & Preferences Settings --}}
                <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 shadow-xl backdrop-blur-xl space-y-4">
                    <h4 class="text-sm font-bold text-gray-300 tracking-wider uppercase mb-2">Preferences & Alerts</h4>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-300 font-medium">Email Notifications</span>
                        <input type="checkbox" checked class="w-4 h-4 accent-purple-600 rounded bg-gray-800 border-gray-700">
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-300 font-medium">SMS Ticket Alerts</span>
                        <input type="checkbox" checked class="w-4 h-4 accent-purple-600 rounded bg-gray-800 border-gray-700">
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-xs text-gray-300 font-medium">Promotional Offers</span>
                        <input type="checkbox" class="w-4 h-4 accent-purple-600 rounded bg-gray-800 border-gray-700">
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection