<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Events - Admin Dashboard</title>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font -->
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


        <!-- Main Content -->
        <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">

            <!-- Header -->
            @include('backend.include.header')


            <!-- Main Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">


                <!-- Page Header -->
                <div class="mb-6 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                    <div>

                        <h1 class="text-2xl font-bold text-white tracking-tight">
                            Manage Events
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage, edit and delete your events
                        </p>

                    </div>


                    <!-- Action Buttons -->
                    <div class="flex flex-wrap items-center gap-3">


                        <!-- Refresh -->
                        <button onclick="window.location.reload()"
                            class="px-3.5 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 font-semibold text-xs rounded-xl border border-gray-800 transition flex items-center gap-2"
                            title="Refresh List">

                            <svg class="w-4 h-4 text-purple-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                </path>

                            </svg>

                            Refresh

                        </button>


                        <!-- Export -->
                        <a href="#"
                            class="px-3.5 py-2.5 bg-[#18182f] hover:bg-gray-800 text-gray-300 font-semibold text-xs rounded-xl border border-gray-800 transition flex items-center gap-2">

                            <svg class="w-4 h-4 text-emerald-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                </path>

                            </svg>

                            Export CSV

                        </a>


                        <!-- Create Event -->
                        <a href="{{ route('admin.events.create') }}"
                            class="px-4 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold text-sm rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center gap-2">

                            <svg class="w-5 h-5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4v16m8-8H4">
                                </path>

                            </svg>

                            Create New Event

                        </a>

                    </div>

                </div>


                <!-- Event Stats -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">


                    <!-- Total Events -->
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">

                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Total Events
                        </p>

                        <h3 class="text-2xl font-bold text-white mt-1">
                            {{ isset($events) ? count($events) : 0 }}
                        </h3>

                        <span class="text-xs text-purple-400 font-medium mt-2 inline-block">
                            All active & past
                        </span>

                    </div>


                    <!-- Live -->
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">

                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Live / Ongoing
                        </p>

                        <h3 class="text-2xl font-bold text-white mt-1">
                            0
                        </h3>

                        <span class="text-xs text-emerald-400 font-medium mt-2 inline-block">
                            Happening now
                        </span>

                    </div>


                    <!-- Upcoming -->
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">

                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Upcoming
                        </p>

                        <h3 class="text-2xl font-bold text-white mt-1">
                            {{ isset($events) ? count($events) : 0 }}
                        </h3>

                        <span class="text-xs text-indigo-400 font-medium mt-2 inline-block">
                            Tickets on sale
                        </span>

                    </div>


                    <!-- Sold Out -->
                    <div class="bg-[#121222] border border-gray-800 rounded-2xl p-5 shadow-lg">

                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">
                            Total Sold Out
                        </p>

                        <h3 class="text-2xl font-bold text-white mt-1">
                            0
                        </h3>

                        <span class="text-xs text-amber-400 font-medium mt-2 inline-block">
                            100% booked
                        </span>

                    </div>

                </div>


                <!-- Event Directory -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 shadow-lg">


                    <!-- Search / Filter -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">

                        <h3 class="text-lg font-bold text-white">
                            Event Directory
                        </h3>


                        <div class="flex items-center gap-3 w-full sm:w-auto">

                            <input type="text"
                                placeholder="Search event title or venue..."
                                class="w-full sm:w-64 bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-3 py-2.5 focus:outline-none focus:border-purple-500 placeholder-gray-500 transition">


                            <select
                                class="bg-[#18182f] text-xs text-gray-200 border border-gray-800 rounded-xl px-3 py-2.5 focus:outline-none focus:border-purple-500 transition">

                                <option value="">
                                    All Categories
                                </option>

                                <option value="concert">
                                    Concert
                                </option>

                                <option value="music">
                                    Music
                                </option>

                                <option value="tech">
                                    Tech Summit
                                </option>

                                <option value="sports">
                                    Sports
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Table -->
                    <div class="overflow-x-auto">

                        <table class="w-full text-left text-sm text-gray-300">


                            <!-- Table Header -->
                            <thead class="bg-[#161628] text-gray-400 uppercase text-xs tracking-wider">

                                <tr>

                                    <th class="p-3 rounded-l-xl">
                                        Event Details
                                    </th>

                                    <th class="p-3">
                                        Category
                                    </th>

                                    <th class="p-3">
                                        Date & Time
                                    </th>

                                    <th class="p-3">
                                        Ticket Sales / Capacity
                                    </th>

                                    <th class="p-3">
                                        Price
                                    </th>

                                    <th class="p-3">
                                        Status
                                    </th>

                                    <th class="p-3 rounded-r-xl text-right">
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <!-- Table Body -->
                            <tbody class="divide-y divide-gray-800">


                                @forelse($events as $event)

                                    <tr class="hover:bg-[#18182f]/50 transition">


                                        <!-- Event Details -->
                                        <td class="p-3">

                                            <div class="flex items-center gap-3">


                                                @if($event->image)

                                                    <img src="{{ asset('storage/' . $event->image) }}"
                                                        class="w-12 h-12 rounded-xl object-cover border border-gray-700"
                                                        alt="Event">

                                                @else

                                                    <div
                                                        class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center text-gray-500 text-xs">

                                                        No Image

                                                    </div>

                                                @endif


                                                <div>

                                                    <h4 class="text-sm font-bold text-white">
                                                        {{ $event->title }}
                                                    </h4>

                                                    <p class="text-xs text-gray-400">
                                                        {{ $event->venue }}
                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        <!-- Category -->
                                        <td class="p-3">

                                            <span
                                                class="text-xs px-2.5 py-1 bg-purple-950 text-purple-300 rounded-lg font-semibold">

                                                {{ $event->category }}

                                            </span>

                                        </td>


                                        <!-- Date -->
                                        <td class="p-3 text-xs text-gray-300">

                                            {{ \Carbon\Carbon::parse($event->date_time)->format('d M, Y') }}

                                            <br>

                                            <span class="text-gray-500">

                                                {{ \Carbon\Carbon::parse($event->date_time)->format('h:i A') }}

                                            </span>

                                        </td>


                                        <!-- Capacity -->
                                        <td class="p-3 text-xs">

                                            <div class="flex justify-between mb-1">

                                                <span class="text-gray-300">
                                                    0 / {{ $event->capacity }}
                                                </span>

                                                <span class="text-purple-400 font-bold">
                                                    0%
                                                </span>

                                            </div>


                                            <div class="w-32 bg-gray-800 h-1.5 rounded-full overflow-hidden">

                                                <div class="bg-purple-600 h-full rounded-full"
                                                    style="width: 0%">
                                                </div>

                                            </div>

                                        </td>


                                        <!-- Price -->
                                        <td class="p-3 font-semibold text-white">

                                            ৳{{ number_format($event->price, 2) }}

                                        </td>


                                        <!-- Status -->
                                        <td class="p-3">

                                            <span
                                                class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 rounded-full text-xs font-semibold">

                                                Upcoming

                                            </span>

                                        </td>


                                        <!-- Actions -->
                                        <td class="p-3 text-right">

                                            <div class="flex items-center justify-end gap-2">


                                                <!-- EDIT -->
                                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                                    class="px-3 py-1.5 bg-purple-600/10 hover:bg-purple-600 text-purple-400 hover:text-white rounded-lg text-xs font-semibold transition flex items-center gap-1">

                                                    <svg class="w-3.5 h-3.5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>

                                                    </svg>

                                                    Edit

                                                </a>


                                                <!-- DELETE -->
                                                <form action="{{ route('admin.events.delete', $event->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this event?');">

                                                    @csrf

                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="px-3 py-1.5 bg-red-600/10 hover:bg-red-600 text-red-400 hover:text-white rounded-lg text-xs font-semibold transition flex items-center gap-1">

                                                        <svg class="w-3.5 h-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-2-2h-4a1 1 0 00-2 2v3m4 0h6">
                                                            </path>

                                                        </svg>

                                                        Delete

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td colspan="7"
                                            class="p-8 text-center text-gray-400 text-sm">

                                            <div
                                                class="flex flex-col items-center justify-center space-y-3">

                                                <svg class="w-12 h-12 text-gray-600"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>

                                                </svg>


                                                <p>
                                                    No events found in the database.
                                                </p>


                                                <a href="{{ route('admin.events.create') }}"
                                                    class="text-xs px-3 py-1.5 bg-purple-600 text-white rounded-lg hover:bg-purple-500 transition">

                                                    Create Your First Event

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>

            </main>


            <!-- Footer -->
            @include('backend.include.footer')

        </div>

    </div>

</body>

</html>