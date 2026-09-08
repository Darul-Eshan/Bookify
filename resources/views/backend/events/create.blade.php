@extends('backend.layout.master')

@section('content')

<div class="p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">Create Event</h1>
        <p class="text-gray-400 text-sm mt-1">Create a new event</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500 rounded-xl p-4 mb-6">
            <ul class="text-red-400 text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.events.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="bg-[#111126] border border-gray-800 rounded-2xl p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Event Title --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Event Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter event title"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('title') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                    @error('title')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Category --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Category
                    </label>

                    <select
                        name="category_id"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('category_id') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                            Select Category
                        </option>

                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Date & Time --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Date & Time
                    </label>

                    <input
                        type="datetime-local"
                        name="date_time"
                        value="{{ old('date_time') }}"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('date_time') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                    @error('date_time')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Venue --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Venue
                    </label>

                    <input
                        type="text"
                        name="venue"
                        value="{{ old('venue') }}"
                        placeholder="Enter venue"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('venue') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                    @error('venue')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Price --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Price
                    </label>

                    <input
                        type="number"
                        name="price"
                        value="{{ old('price') }}"
                        step="0.01"
                        min="0"
                        placeholder="Enter price"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('price') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                    @error('price')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Capacity --}}
                <div>
                    <label class="block text-sm text-gray-300 mb-2">
                        Capacity
                    </label>

                    <input
                        type="number"
                        name="capacity"
                        value="{{ old('capacity') }}"
                        min="1"
                        placeholder="Enter capacity"
                        required
                        class="w-full bg-[#18182f] text-sm text-gray-200 border @error('capacity') border-red-500 @else border-gray-800 @enderror rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500 transition">

                    @error('capacity')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>


            {{-- Image --}}
            <div class="mt-6">
                <label class="block text-sm text-gray-300 mb-2">
                    Event Image
                </label>

                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    class="w-full bg-[#18182f] text-sm text-gray-300 border border-gray-800 rounded-xl px-4 py-3">

                @error('image')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            {{-- Buttons --}}
            <div class="flex items-center gap-3 mt-8">

                <button
                    type="submit"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl text-sm font-medium transition">
                    Create Event
                </button>

                <a
                    href="{{ route('admin.events') }}"
                    class="bg-gray-800 hover:bg-gray-700 text-gray-200 px-6 py-3 rounded-xl text-sm font-medium transition">
                    Cancel
                </a>

            </div>

        </div>

    </form>

</div>

@endsection