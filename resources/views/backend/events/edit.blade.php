@extends('backend.layout.master')

@section('content')

<div class="p-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">
            Edit Event
        </h1>

        <p class="text-gray-400 text-sm mt-1">
            Update event information
        </p>
    </div>


    <form action="{{ route('admin.events.update', $event->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-[#111122] border border-gray-800 rounded-2xl p-6">

        @csrf
        @method('PUT')


        {{-- Title --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Event Title
            </label>

            <input
                type="text"
                name="title"
                value="{{ old('title', $event->title) }}"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

            @error('title')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Category --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Category
            </label>

            <select
                name="category_id"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            @error('category_id')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Date & Time --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Date & Time
            </label>

            <input
                type="datetime-local"
                name="date_time"
                value="{{ old('date_time', $event->date_time ? $event->date_time->format('Y-m-d\TH:i') : '') }}"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

            @error('date_time')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Venue --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Venue
            </label>

            <input
                type="text"
                name="venue"
                value="{{ old('venue', $event->venue) }}"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

            @error('venue')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Price --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Price
            </label>

            <input
                type="number"
                name="price"
                step="0.01"
                value="{{ old('price', $event->price) }}"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

            @error('price')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Capacity --}}
        <div class="mb-5">

            <label class="block text-sm text-gray-300 mb-2">
                Capacity
            </label>

            <input
                type="number"
                name="capacity"
                value="{{ old('capacity', $event->capacity) }}"
                required
                class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500"
            >

            @error('capacity')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Current Image --}}
        @if($event->image)

            <div class="mb-5">

                <label class="block text-sm text-gray-300 mb-2">
                    Current Image
                </label>

                <img
                    src="{{ $event->image_url }}"
                    alt="{{ $event->title }}"
                    class="w-40 h-28 object-cover rounded-xl border border-gray-800"
                >

            </div>

        @endif


        {{-- New Image --}}
        <div class="mb-6">

            <label class="block text-sm text-gray-300 mb-2">
                Change Image
            </label>

            <input
                type="file"
                name="image"
                accept="image/*"
                class="w-full bg-[#18182f] text-sm text-gray-300 border border-gray-800 rounded-xl px-4 py-3"
            >

            @error('image')
                <p class="text-red-400 text-xs mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Remove Image --}}
        @if($event->image)

            <div class="mb-6">

                <label class="flex items-center gap-2 text-sm text-gray-300">

                    <input
                        type="checkbox"
                        name="remove_image"
                        value="1"
                        class="rounded"
                    >

                    Remove current image

                </label>

            </div>

        @endif


        {{-- Buttons --}}
        <div class="flex gap-3">

            <button
                type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-medium transition"
            >
                Update Event
            </button>

            <a
                href="{{ route('admin.events') }}"
                class="bg-gray-700 hover:bg-gray-600 text-white px-6 py-3 rounded-xl font-medium transition"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection