@extends('backend.layout.master')

@section('content')
    <!-- Page Header & Back Button -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Add New Organizer</h1>
        </div>
        <div>
            <a href="{{ route('admin.event.organizers') }}" class="px-4 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-sm font-semibold transition-all flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Organizers
            </a>
        </div>
    </div>

    <!-- Add Organizer Form Card -->
    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 sm:p-8 shadow-lg">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Organizer Name -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Organizer / Company Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" placeholder="e.g. Nexus Events Ltd." required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all">
                </div>

                <!-- Email Address -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Email Address <span class="text-rose-500">*</span></label>
                    <input type="email" name="email" placeholder="e.g. contact@nexusevents.com" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all">
                </div>

                <!-- Phone Number -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Phone Number <span class="text-rose-500">*</span></label>
                    <input type="text" name="phone" placeholder="e.g. +880 1712-345678" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all">
                </div>

                <!-- Website / Portfolio -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Website (Optional)</label>
                    <input type="url" name="website" placeholder="e.g. https://nexusevents.com" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all">
                </div>

                <!-- Status Selection -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Account Status <span class="text-rose-500">*</span></label>
                    <select name="status" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-gray-300 focus:outline-none focus:border-purple-500 transition-all">
                        <option value="active">Active & Verified</option>
                        <option value="pending">Pending Approval</option>
                        <option value="suspended">Suspended</option>
                    </select>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Password <span class="text-rose-500">*</span></label>
                    <input type="password" name="password" placeholder="••••••••" required class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all">
                </div>

            </div>

            <!-- Profile Logo / Image Upload -->
            <div class="mt-6">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Organizer Logo / Brand Avatar</label>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-purple-600/10 border border-purple-500/30 flex items-center justify-center text-purple-400 font-bold text-lg">
                        LOGO
                    </div>
                    <div class="flex-1">
                        <input type="file" name="avatar" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-600/20 file:text-purple-400 hover:file:bg-purple-600/30 transition-all">
                        <p class="text-xs text-gray-500 mt-1">Recommended size: 300x300px (PNG, JPG, WEBP)</p>
                    </div>
                </div>
            </div>

            <!-- Office Address -->
            <div class="mt-6">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Office Address</label>
                <textarea name="address" rows="2" placeholder="e.g. House 12, Road 5, Banani, Dhaka" class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all"></textarea>
            </div>

            <!-- Short Bio / Description -->
            <div class="mt-6">
                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Organizer Bio / Description</label>
                <textarea name="bio" rows="3" placeholder="Write a brief overview about the organizer's background and experience..." class="w-full bg-[#18182f] border border-gray-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-purple-500 transition-all"></textarea>
            </div>

            <!-- Submit Button Section -->
            <div class="mt-8 flex items-center justify-end gap-4 border-t border-gray-800/60 pt-6">
                <a href="{{ route('admin.event.organizers') }}" class="px-6 py-3 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-sm font-semibold transition-all">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-sm font-semibold transition-all shadow-lg shadow-purple-600/20">
                    Save Organizer
                </button>
            </div>

        </form>
    </div>
@endsection