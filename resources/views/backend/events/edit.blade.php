<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Event - Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

    </style>

</head>


<body class="bg-[#0B0B14] text-gray-200 antialiased">


<div class="flex h-screen overflow-hidden">


    <!-- Sidebar -->

    @include('backend.include.sidebar')


    <!-- Main -->

    <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">


        <!-- Header -->

        @include('backend.include.header')


        <!-- Content -->

        <main class="flex-1 overflow-y-auto bg-[#0B0B14] p-6">


            <!-- Page Header -->

            <div class="mb-6 flex items-center justify-between">

                <div>

                    <h1 class="text-2xl font-bold text-white">
                        Edit Event
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Update event information
                    </p>

                </div>


                <a href="{{ route('admin.events') }}" 
                    class="px-4 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 font-semibold text-sm rounded-xl border border-gray-800 transition">

                    ← Back to Events

                </a>

            </div>



            <!-- Main Card -->

            <div class="max-w-4xl">

                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">


                    <!-- EDIT FORM -->

                    <form action="{{ route('admin.events.update', $event->id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        @method('PUT')


                        <!-- IMAGE SECTION -->

                        <div class="mb-8">


                            <label class="block text-xs font-semibold text-gray-400 uppercase mb-3">

                                Event Image

                            </label>


                            <div class="flex flex-col sm:flex-row items-start gap-5">


                                <!-- Current Image -->

                                <div>

                                    @if($event->image)

                                        <img src="{{ asset('storage/' . $event->image) }}"
                                            class="w-40 h-40 object-cover rounded-2xl border border-gray-700"
                                            alt="Current Event Image">

                                    @else

                                        <div
                                            class="w-40 h-40 rounded-2xl bg-[#18182f] border border-gray-700 flex items-center justify-center text-gray-500">

                                            No Image

                                        </div>

                                    @endif

                                </div>


                                <!-- Upload -->

                                <div class="flex-1">


                                    <label class="block text-sm font-semibold text-white mb-2">

                                        Change Event Image

                                    </label>


                                    <input type="file"
                                        name="image"
                                        accept="image/png,image/jpeg,image/jpg,image/webp"
                                        class="block w-full text-sm text-gray-400
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-xl file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-purple-600 file:text-white
                                        hover:file:bg-purple-500
                                        cursor-pointer">


                                    <p class="text-xs text-gray-500 mt-2">

                                        Upload JPG, JPEG, PNG or WEBP image.

                                    </p>


                                    <p class="text-xs text-gray-600 mt-1">

                                        Leave empty if you don't want to change the current image.

                                    </p>

                                </div>

                            </div>

                        </div>



                        <!-- TITLE + CATEGORY -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">


                            <!-- Title -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Event Title

                                </label>


                                <input type="text"
                                    name="title"
                                    value="{{ old('title', $event->title) }}"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">


                                @error('title')

                                    <p class="text-red-400 text-xs mt-1">
                                        {{ $message }}
                                    </p>

                                @enderror

                            </div>



                            <!-- Category -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Category

                                </label>


                                <select name="category"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">


                                    <option value="Concert"
                                        {{ old('category', $event->category) == 'Concert' ? 'selected' : '' }}>

                                        Concert

                                    </option>


                                    <option value="Music"
                                        {{ old('category', $event->category) == 'Music' ? 'selected' : '' }}>

                                        Music

                                    </option>


                                    <option value="Tech Summit"
                                        {{ old('category', $event->category) == 'Tech Summit' ? 'selected' : '' }}>

                                        Tech Summit

                                    </option>


                                    <option value="Sports"
                                        {{ old('category', $event->category) == 'Sports' ? 'selected' : '' }}>

                                        Sports

                                    </option>


                                </select>

                            </div>

                        </div>



                        <!-- DATE + VENUE -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">


                            <!-- Date -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Date & Time

                                </label>


                                <input type="datetime-local"
                                    name="date_time"
                                    value="{{ old('date_time', \Carbon\Carbon::parse($event->date_time)->format('Y-m-d\TH:i')) }}"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">

                            </div>



                            <!-- Venue -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Venue / Location

                                </label>


                                <input type="text"
                                    name="venue"
                                    value="{{ old('venue', $event->venue) }}"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">

                            </div>

                        </div>



                        <!-- PRICE + CAPACITY -->

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">


                            <!-- Price -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Ticket Price (৳)

                                </label>


                                <input type="number"
                                    name="price"
                                    step="0.01"
                                    min="0"
                                    value="{{ old('price', $event->price) }}"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">

                            </div>



                            <!-- Capacity -->

                            <div>

                                <label class="block text-xs font-semibold text-gray-400 uppercase mb-2">

                                    Total Capacity

                                </label>


                                <input type="number"
                                    name="capacity"
                                    min="1"
                                    value="{{ old('capacity', $event->capacity) }}"
                                    required
                                    class="w-full bg-[#18182f] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-3 focus:outline-none focus:border-purple-500">

                            </div>

                        </div>



                        <!-- BUTTONS -->

                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-5 border-t border-gray-800">


                            <!-- Delete -->

                            <button type="button"
                                onclick="document.getElementById('delete-event-form').submit();"
                                class="px-5 py-2.5 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-xl text-sm font-semibold transition">

                                Delete Event

                            </button>


                            <div class="flex gap-3">


                                <!-- Cancel -->

                                <a href="{{ route('admin.events') }}"
                                    class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-xl text-sm font-semibold transition">

                                    Cancel

                                </a>


                                <!-- Save -->

                                <button type="submit"
                                    class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white rounded-xl text-sm font-semibold shadow-lg shadow-purple-600/30 transition">

                                    Save Changes

                                </button>

                            </div>

                        </div>


                    </form>


                    <!-- DELETE FORM -->

                    <form id="delete-event-form"
                        action="{{ route('admin.events.delete', $event->id) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">

                        @csrf

                        @method('DELETE')

                    </form>


                </div>

            </div>


        </main>


        <!-- Footer -->

        @include('backend.include.footer')


    </div>

</div>


</body>

</html>