@extends('frontend.layout.master')

@section('section')

    <!-- Main Content Area -->
    <main class="flex-grow">

        <!-- Hero Search Banner -->
        <section class="relative py-12 lg:py-16 overflow-hidden">

            <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/15 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-600/15 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="text-center max-w-3xl mx-auto mb-10">
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Discover & Book
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-indigo-300 to-purple-500">
                            Events in Bangladesh
                        </span>
                    </h1>
                </div>

                <!-- Search & Filter Controls -->
                <div class="glass-card rounded-2xl p-4 sm:p-6 shadow-2xl max-w-5xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">

                        <!-- Search -->
                        <div class="md:col-span-5 relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input
                                type="text"
                                id="searchInput"
                                placeholder="Search events by title, venue, or band..."
                                class="w-full bg-[#11111e] text-gray-100 placeholder-gray-500 pl-11 pr-4 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm">
                        </div>

                        <!-- Location -->
                        <div class="md:col-span-3 relative">
                            <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select
                                id="locationSelect"
                                class="w-full bg-[#11111e] text-gray-100 pl-11 pr-8 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm appearance-none cursor-pointer">
                                <option value="all">All Locations</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="coxs-bazar">Cox's Bazar</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Date -->
                        <div class="md:col-span-2 relative">
                            <i class="fa-solid fa-calendar-days absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select
                                id="dateSelect"
                                class="w-full bg-[#11111e] text-gray-100 pl-11 pr-8 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm appearance-none cursor-pointer">
                                <option value="any">Anytime</option>
                                <option value="today">Today</option>
                                <option value="weekend">This Weekend</option>
                                <option value="month">This Month</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                        </div>

                        <!-- Sort -->
                        <div class="md:col-span-2 relative">
                            <i class="fa-solid fa-arrow-down-wide-short absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select
                                id="sortSelect"
                                class="w-full bg-[#11111e] text-gray-100 pl-11 pr-8 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm appearance-none cursor-pointer">
                                <option value="upcoming">Upcoming First</option>
                                <option value="popular">Most Popular</option>
                                <option value="low">Price: Low to High</option>
                                <option value="high">Price: High to Low</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Category Filtering & Event Grid -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20">

            <!-- Category Navigation -->
            <div class="flex items-center justify-between border-b border-gray-800/80 mb-8 pb-4">
                <div class="flex items-center gap-3 overflow-x-auto custom-scrollbar pb-2 sm:pb-0 w-full">

                    <!-- All Events -->
                    <button
                        type="button"
                        onclick="filterCategory('all', this)"
                        class="category-btn active px-5 py-2.5 rounded-xl text-sm font-semibold transition flex items-center gap-2.5 whitespace-nowrap bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-lg shadow-purple-600/20">
                        <i class="fa-solid fa-grid-2"></i>
                        All Events
                    </button>

                    <!-- Dynamic Categories -->
                    @foreach($categories as $category)
                        <button
                            type="button"
                            onclick="filterCategory('{{ $category->id }}', this)"
                            class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                            <i class="fa-solid fa-layer-group text-purple-400"></i>
                            {{ $category->name }}
                        </button>
                    @endforeach

                </div>
            </div>

            <!-- Sorting & Result Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        Showing
                        <span id="categoryNameTitle" class="text-purple-400">All Events</span>
                    </h2>
                    <p class="text-xs text-gray-400 mt-0.5">Verified e-tickets for events across Bangladesh</p>
                </div>
            </div>

            <!-- Event Cards Grid -->
            <div id="eventsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($events as $event)
                    @php
                        /*
                        |--------------------------------------------------------------------------
                        | Category
                        |--------------------------------------------------------------------------
                        | Use categoryRelation because "category" is also an existing
                        | database column in the events table.
                        */
                        $category = $event->categoryRelation;
                        $categoryName = $event->categoryRelation?->name ?? $event->category ?? 'Event';
                        $categoryColor = 'purple';
                        $categoryIcon = 'fa-calendar';
                    @endphp

                    <!-- Dynamic Event Card -->
                    <div
                        class="event-card glass-card rounded-2xl overflow-hidden group hover:border-{{ $categoryColor }}-500/50 transition duration-300 flex flex-col justify-between"
                        data-category="{{ $event->category_id ?? '' }}">

                        <div>
                            <!-- Event Image -->
                            <div class="relative h-52 overflow-hidden">

                                @if($event->image)
                                    <img
                                        src="{{ $event->image_url }}"
                                        alt="{{ $event->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                                @else
                                    <div class="w-full h-full bg-[#161626] flex items-center justify-center">
                                        <i class="fa-solid fa-calendar-days text-4xl text-gray-600"></i>
                                    </div>
                                @endif

                                <!-- Image Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>

                                <!-- Category Badge -->
                                <span class="absolute top-4 left-4 bg-purple-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                    <i class="fa-solid {{ $categoryIcon }} mr-1"></i>
                                    {{ $categoryName }}
                                </span>

                                <!-- Bookmark -->
                                <button
                                    type="button"
                                    onclick="toggleBookmark(this)"
                                    class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                    <i class="fa-regular fa-bookmark"></i>
                                </button>

                                <!-- Date -->
                                @if($event->date_time)
                                    <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                        <span class="block text-xs font-bold text-purple-400 uppercase">
                                            {{ \Carbon\Carbon::parse($event->date_time)->format('M') }}
                                        </span>
                                        <span class="block text-base font-extrabold text-white">
                                            {{ \Carbon\Carbon::parse($event->date_time)->format('d') }}
                                        </span>
                                    </div>
                                @endif

                            </div>

                            <!-- Event Information -->
                            <div class="p-5">

                                <!-- Time + Location -->
                                <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                    @if($event->date_time)
                                        <span>
                                            <i class="fa-regular fa-clock text-purple-400 mr-1"></i>
                                            {{ \Carbon\Carbon::parse($event->date_time)->format('h:i A') }}
                                        </span>
                                    @endif

                                    @if($event->venue)
                                        <span>•</span>
                                        <span class="truncate">
                                            <i class="fa-solid fa-location-dot text-purple-400 mr-1"></i>
                                            {{ $event->venue }}
                                        </span>
                                    @endif
                                </div>

                                <!-- Event Title -->
                                <h3 class="text-lg font-bold text-white group-hover:text-purple-300 transition line-clamp-1">
                                    {{ $event->title }}
                                </h3>

                                <!-- Event Description -->
                                <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                    {{ $event->description ?? 'No description available for this event.' }}
                                </p>

                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="p-5 pt-2 border-t border-gray-800/60 mt-2 flex items-center justify-between">

                            <!-- Price -->
                            <div>
                                <span class="block text-[10px] text-gray-400 uppercase font-semibold">
                                    Ticket Price
                                </span>

                                @if((float) $event->price > 0)
                                    <span class="text-lg font-extrabold text-white">
                                        BDT {{ number_format($event->price, 0) }}
                                    </span>
                                @else
                                    <span class="text-lg font-extrabold text-emerald-400">
                                        FREE
                                    </span>
                                @endif
                            </div>

                            <!-- Get Ticket -->
                            <a
                                href="{{ route('events.details', $event->id) }}"
                                class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-bold text-ls px-9 py-3 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                                Get Ticket
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>

                        </div>

                    </div>

                @empty

                    <!-- No Events -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 glass-card rounded-2xl">
                        <div class="w-16 h-16 bg-purple-600/10 text-purple-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-purple-500/20 text-2xl">
                            <i class="fa-solid fa-calendar-xmark"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white">No Events Found</h3>
                        <p class="text-xs text-gray-400 mt-1">Please create an event from the Admin Dashboard.</p>
                    </div>

                @endforelse

            </div>

            <!-- Empty State -->
            <div id="noResults" class="hidden text-center py-16 glass-card rounded-2xl my-6">
                <div class="w-16 h-16 bg-purple-600/10 text-purple-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-purple-500/20 text-2xl">
                    <i class="fa-solid fa-calendar-xmark"></i>
                </div>
                <h3 class="text-lg font-bold text-white">No Events Found</h3>
                <p class="text-xs text-gray-400 mt-1 max-w-sm mx-auto">
                    We couldn't find any Bangladeshi events matching your criteria.
                </p>
                <button
                    type="button"
                    onclick="filterCategory('all', document.querySelector('.category-btn'))"
                    class="mt-4 px-4 py-2 bg-purple-600/20 border border-purple-500/40 text-purple-300 text-xs font-semibold rounded-xl hover:bg-purple-600 hover:text-white transition">
                    Reset Filters
                </button>
            </div>

            <!-- Pagination / Load More -->
            <div class="mt-12 text-center">
                <button
                    type="button"
                    class="px-8 py-3.5 bg-[#161626] hover:bg-purple-600/20 text-purple-300 hover:text-white border border-gray-800 hover:border-purple-500/40 text-sm font-semibold rounded-xl transition shadow-lg">
                    Load More Events
                    <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
                </button>
            </div>

        </section>

    </main>

    <!-- Interactive Filter Script -->
    <script>
        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */
        function filterCategory(category, element) {
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove(
                    'active', 'bg-gradient-to-r', 'from-purple-600', 'to-indigo-600',
                    'text-white', 'shadow-lg', 'shadow-purple-600/20'
                );
                btn.classList.add(
                    'bg-[#161626]', 'text-gray-400', 'hover:text-white',
                    'hover:bg-gray-800', 'border', 'border-gray-800'
                );
            });

            element.classList.remove(
                'bg-[#161626]', 'text-gray-400', 'hover:text-white',
                'hover:bg-gray-800', 'border-gray-800'
            );

            element.classList.add(
                'active', 'bg-gradient-to-r', 'from-purple-600', 'to-indigo-600',
                'text-white', 'shadow-lg', 'shadow-purple-600/20'
            );

            /*
            |--------------------------------------------------------------------------
            | Category Title
            |--------------------------------------------------------------------------
            */
            const categoryTitle = element.innerText.trim();
            document.getElementById('categoryNameTitle').innerText = category === 'all' ? 'All Events' : categoryTitle;

            /*
            |--------------------------------------------------------------------------
            | Filter Event Cards
            |--------------------------------------------------------------------------
            */
            const cards = document.querySelectorAll('.event-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');

                if (category === 'all' || String(cardCategory) === String(category)) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            /*
            |--------------------------------------------------------------------------
            | No Results
            |--------------------------------------------------------------------------
            */
            const noResultsDiv = document.getElementById('noResults');
            if (visibleCount === 0) {
                noResultsDiv.classList.remove('hidden');
            } else {
                noResultsDiv.classList.add('hidden');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.event-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const text = card.innerText.toLowerCase();

                if (text.includes(searchTerm)) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            const noResultsDiv = document.getElementById('noResults');
            if (visibleCount === 0) {
                noResultsDiv.classList.remove('hidden');
            } else {
                noResultsDiv.classList.add('hidden');
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Bookmark
        |--------------------------------------------------------------------------
        */
        function toggleBookmark(btn) {
            const icon = btn.querySelector('i');

            if (icon.classList.contains('fa-regular')) {
                icon.classList.remove('fa-regular');
                icon.classList.add('fa-solid', 'text-purple-400');
            } else {
                icon.classList.remove('fa-solid', 'text-purple-400');
                icon.classList.add('fa-regular');
            }
        }
    </script>

@endsection