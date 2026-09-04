@extends('backend.layout.master')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Admin Profile & Settings</h1>
            <p class="text-sm text-gray-400 mt-1">View your profile details and manage your account security and configurations.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl text-xs font-semibold flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Fully Verified
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Profile Card -->
        <div class="space-y-6">
            <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 text-center shadow-xl backdrop-blur-xl">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    @if(!empty($admin->profile_picture))
                        <img src="{{ asset($admin->profile_picture) }}" alt="{{ $admin->name }}" class="w-full h-full rounded-2xl object-cover border-2 border-purple-500/50 shadow-lg">
                    @else
                        <div class="w-full h-full rounded-2xl bg-gradient-to-tr from-purple-600 to-indigo-500 flex items-center justify-center text-white font-bold text-4xl shadow-lg">
                            {{ strtoupper(substr($admin->name, 0, 1)) }}
                        </div>
                    @endif
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-emerald-500 border-2 border-[#121222] rounded-full"></span>
                </div>

                <h2 class="text-lg font-bold text-white">{{ $admin->name }}</h2>
                <p class="text-xs text-gray-400 mt-0.5">{{ $admin->email }}</p>
                
                <div class="mt-3 inline-block">
                    <span class="px-3 py-1 bg-purple-950 text-purple-300 border border-purple-500/30 rounded-full text-xs font-bold uppercase tracking-wider">
                        Administrator
                    </span>
                </div>

                <div class="mt-6 pt-6 border-t border-gray-800 text-left space-y-3 text-xs text-gray-300">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Account Status:</span>
                        <span class="text-emerald-400 font-semibold">Active</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Member Since:</span>
                        <span class="text-white">{{ $admin->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Last Login:</span>
                        <span class="text-white">Today, 12:24 AM</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- 1. Overview / Information Display Box -->
            <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 shadow-xl backdrop-blur-xl">
                <h3 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Profile Information Overview
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-[#18182f] border border-gray-800/80 p-4 rounded-2xl text-xs">
                    <div>
                        <span class="text-gray-500 block mb-1">Full Name</span>
                        <span class="text-white font-semibold text-sm">{{ $admin->name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1">Email Address</span>
                        <span class="text-white font-semibold text-sm">{{ $admin->email }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1">Phone Number</span>
                        <span class="text-white font-semibold text-sm">{{ $admin->phone ?? '+880 1700-000000' }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1">Role / Designation</span>
                        <span class="text-purple-400 font-semibold text-sm">System Administrator</span>
                    </div>
                    <div class="sm:col-span-2 pt-2 border-t border-gray-800/60">
                        <span class="text-gray-500 block mb-1">Bio</span>
                        <p class="text-gray-300 leading-relaxed">{{ $admin->bio ?? 'Lead Administrator handling security, user roles, and overall platform management.' }}</p>
                    </div>
                </div>
            </div>

            <!-- 2. Update Information & Change Password Inside One Box -->
            <div class="bg-[#121222] border border-gray-800/80 rounded-3xl p-6 shadow-xl backdrop-blur-xl">
                <h3 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Update Profile Information
                </h3>

                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1">Full Name</label>
                            <input type="text" name="name" value="{{ $admin->name }}" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1">Phone Number</label>
                            <input type="text" name="phone" value="{{ $admin->phone ?? '+880 1700-000000' }}" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 mb-1">Profile Picture</label>
                        <input type="file" name="profile_picture" class="w-full bg-[#18182f] text-xs text-gray-400 border border-gray-800 rounded-xl px-3 py-2 file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-600 file:text-white hover:file:bg-purple-500 transition cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 mb-1">Short Bio</label>
                        <textarea name="bio" rows="2" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition" placeholder="Write something about yourself...">{{ $admin->bio ?? 'Lead Administrator handling security and event operations.' }}</textarea>
                    </div>

                    <!-- Action Buttons Bar inside Profile Update Box -->
                    <div class="flex flex-col sm:flex-row items-center justify-between pt-4 border-t border-gray-800 gap-4">
                        <!-- Change Password Toggle Button -->
                        <button type="button" onclick="togglePasswordSection()" class="w-full sm:w-auto px-4 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 border border-gray-700 text-xs font-bold rounded-xl transition flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <span id="passwordBtnText">Change Password</span>
                        </button>

                        <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-purple-600 hover:bg-purple-500 text-white text-xs font-bold rounded-xl shadow-lg shadow-purple-600/30 transition">
                            Save Changes
                        </button>
                    </div>
                </form>

                <!-- Hidden Change Password Form inside the same box -->
                <div id="passwordSection" class="hidden mt-6 pt-6 border-t border-gray-800">
                    <h4 class="text-sm font-bold text-white mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                        Update Your Password
                    </h4>

                    <form action="{{ route('user.password.update') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-xs font-semibold text-gray-400 mb-1">Current Password</label>
                            <input type="password" name="current_password" placeholder="••••••••" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1">New Password</label>
                                <input type="password" name="password" placeholder="••••••••" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 mb-1">Confirm New Password</label>
                                <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                            </div>
                        </div>

                        <div class="flex justify-end pt-2">
                            <button type="submit" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold rounded-xl shadow-lg shadow-indigo-600/30 transition">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- JavaScript to toggle Password Form -->
<script>
    function togglePasswordSection() {
        const section = document.getElementById('passwordSection');
        const btnText = document.getElementById('passwordBtnText');
        if (section.classList.contains('hidden')) {
            section.classList.remove('hidden');
            btnText.innerText = 'Hide Password Form';
        } else {
            section.classList.add('hidden');
            btnText.innerText = 'Change Password';
        }
    }
</script>
@endsection