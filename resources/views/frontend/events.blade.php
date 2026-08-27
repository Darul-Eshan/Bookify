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
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-300 text-xs font-medium mb-4">
                        <i class="fa-solid fa-sparkles text-purple-400"></i> Trending Events Across Bangladesh
                    </span>
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Discover & Book <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-indigo-300 to-purple-500">Bangladeshi Events</span>
                    </h1>
                    <p class="mt-4 text-gray-400 text-base sm:text-lg">
                        Concerts in Dhaka, tech summits, cultural fests, esports tournaments & business expos.
                    </p>
                </div>

                <!-- Search & Filter Controls -->
                <div class="glass-card rounded-2xl p-4 sm:p-6 shadow-2xl max-w-5xl mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-5 relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <input type="text" id="searchInput" placeholder="Search events by title, venue, or band..." 
                                class="w-full bg-[#11111e] text-gray-100 placeholder-gray-500 pl-11 pr-4 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm">
                        </div>

                        <div class="md:col-span-3 relative">
                            <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select id="locationSelect" class="w-full bg-[#11111e] text-gray-100 pl-11 pr-8 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm appearance-none cursor-pointer">
                                <option value="all">All Locations</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="sylhet">Sylhet</option>
                                <option value="coxs-bazar">Cox's Bazar</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                        </div>

                        <div class="md:col-span-2 relative">
                            <i class="fa-solid fa-calendar-days absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            <select id="dateSelect" class="w-full bg-[#11111e] text-gray-100 pl-11 pr-8 py-3 rounded-xl border border-gray-800 focus:outline-none focus:border-purple-500 transition text-sm appearance-none cursor-pointer">
                                <option value="any">Anytime</option>
                                <option value="today">Today</option>
                                <option value="weekend">This Weekend</option>
                                <option value="month">This Month</option>
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-xs text-gray-400 pointer-events-none"></i>
                        </div>

                        <div class="md:col-span-2">
                            <button class="w-full h-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold py-3 px-4 rounded-xl shadow-lg shadow-purple-600/30 transition flex items-center justify-center gap-2 text-sm">
                                <i class="fa-solid fa-sliders"></i> Filter
                            </button>
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
                    <button onclick="filterCategory('all', this)" class="category-btn active px-5 py-2.5 rounded-xl text-sm font-semibold transition flex items-center gap-2.5 whitespace-nowrap bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-lg shadow-purple-600/20">
                        <i class="fa-solid fa-grid-2"></i> All Events
                    </button>
                    <button onclick="filterCategory('music', this)" class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                        <i class="fa-solid fa-music text-purple-400"></i> Rock & Concerts
                    </button>
                    <button onclick="filterCategory('tech', this)" class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                        <i class="fa-solid fa-laptop-code text-indigo-400"></i> Tech Summits
                    </button>
                    <button onclick="filterCategory('esports', this)" class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                        <i class="fa-solid fa-gamepad text-pink-400"></i> Gaming & Esports
                    </button>
                    <button onclick="filterCategory('arts', this)" class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                        <i class="fa-solid fa-palette text-amber-400"></i> Cultural Fests
                    </button>
                    <button onclick="filterCategory('business', this)" class="category-btn px-5 py-2.5 rounded-xl text-sm font-medium transition flex items-center gap-2.5 whitespace-nowrap bg-[#161626] text-gray-400 hover:text-white hover:bg-gray-800 border border-gray-800">
                        <i class="fa-solid fa-briefcase text-emerald-400"></i> Startup & Business
                    </button>
                </div>
            </div>

            <!-- Sorting & Result Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-xl font-bold text-white flex items-center gap-2">
                        Showing <span id="categoryNameTitle" class="text-purple-400">All Events</span>
                    </h2>
                    <p class="text-xs text-gray-400 mt-0.5">Verified e-tickets for events across Bangladesh</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-400 font-medium">Sort By:</span>
                    <select class="bg-[#161626] text-gray-300 text-xs font-medium px-3 py-2 rounded-lg border border-gray-800 focus:outline-none focus:border-purple-500 cursor-pointer">
                        <option value="upcoming">Upcoming First</option>
                        <option value="popular">Most Popular</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <!-- Event Cards Grid (Bangladeshi Context with Images) -->
            <div id="eventsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Bangladeshi Event 1: Concert -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-purple-500/50 transition duration-300 flex flex-col justify-between" data-category="music">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=800&q=80" 
                                 alt="Dhaka Rock Fest" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-purple-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-music mr-1"></i> Rock Concert
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-purple-400 uppercase">NOV</span>
                                <span class="block text-base font-extrabold text-white">14</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-purple-400 mr-1"></i> 04:00 PM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-purple-400 mr-1"></i> Army Stadium, Dhaka</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-purple-300 transition line-clamp-1">
                                Dhaka Rock Fest 2026
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Experience live performances by top Bangladeshi rock bands including Nagar Baul, Artcell, and Warfaze.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Starting From</span>
                            <span class="text-lg font-extrabold text-white">BDT 1,200</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Bangladeshi Event 2: Tech Summit -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-indigo-500/50 transition duration-300 flex flex-col justify-between" data-category="tech">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80" 
                                 alt="Digital Bangladesh Tech Summit" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-indigo-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-laptop-code mr-1"></i> Tech Summit
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-indigo-400 uppercase">DEC</span>
                                <span class="block text-base font-extrabold text-white">02</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-indigo-400 mr-1"></i> 09:00 AM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-indigo-400 mr-1"></i> BICC, Dhaka</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-indigo-300 transition line-clamp-1">
                                Bangladesh Tech Expo & AI Conference
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Discover emerging software trends, AI innovations, and IT career avenues presented by national industry pioneers.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Pass Type</span>
                            <span class="text-lg font-extrabold text-emerald-400">FREE</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Register Now <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Bangladeshi Event 3: Cultural Fest -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-amber-500/50 transition duration-300 flex flex-col justify-between" data-category="arts">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80" 
                                 alt="Dhaka Folk Fest" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-amber-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-palette mr-1"></i> Cultural Fest
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-amber-400 uppercase">NOV</span>
                                <span class="block text-base font-extrabold text-white">28</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-amber-400 mr-1"></i> 05:00 PM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-amber-400 mr-1"></i> Shilpakala Academy, Dhaka</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-amber-300 transition line-clamp-1">
                                International Folk & Heritage Festival
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Celebrate authentic Baul songs, traditional dance performances, and artisanal handicrafts.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Entry Ticket</span>
                            <span class="text-lg font-extrabold text-white">BDT 500</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Bangladeshi Event 4: Esports Tournament -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-pink-500/50 transition duration-300 flex flex-col justify-between" data-category="esports">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800&q=80" 
                                 alt="Dhaka Gaming Expo" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-pink-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-gamepad mr-1"></i> Esports
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-pink-400 uppercase">DEC</span>
                                <span class="block text-base font-extrabold text-white">10</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-pink-400 mr-1"></i> 11:00 AM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-pink-400 mr-1"></i> Jamuna Future Park Arena, Dhaka</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-pink-300 transition line-clamp-1">
                                Bangladesh Esports Premier Championship
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Top Bangladeshi squads battle in PUBG Mobile and Valorant LAN finals for the grand trophy.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Starting From</span>
                            <span class="text-lg font-extrabold text-white">BDT 350</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Bangladeshi Event 5: Business Conference -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-emerald-500/50 transition duration-300 flex flex-col justify-between" data-category="business">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?auto=format&fit=crop&w=800&q=80" 
                                 alt="Startup Summit Dhaka" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-emerald-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-briefcase mr-1"></i> Startup & VC
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-emerald-400 uppercase">DEC</span>
                                <span class="block text-base font-extrabold text-white">18</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-emerald-400 mr-1"></i> 10:00 AM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-emerald-400 mr-1"></i> The Westin, Gulshan, Dhaka</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-emerald-300 transition line-clamp-1">
                                Dhaka Startup & Investor Summit
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Connect with local venture capitalists, angel investors, and successful tech founders across the country.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Delegate Pass</span>
                            <span class="text-lg font-extrabold text-white">BDT 2,500</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Bangladeshi Event 6: Cox's Bazar Music Festival -->
                <div class="event-card glass-card rounded-2xl overflow-hidden group hover:border-purple-500/50 transition duration-300 flex flex-col justify-between" data-category="music">
                    <div>
                        <div class="relative h-52 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80" 
                                 alt="Beach Festival Coxs Bazar" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#161626] via-transparent to-transparent"></div>
                            
                            <span class="absolute top-4 left-4 bg-purple-600/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                                <i class="fa-solid fa-music mr-1"></i> Beach Fest
                            </span>

                            <button onclick="toggleBookmark(this)" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-black/40 backdrop-blur-md text-gray-300 hover:text-purple-400 flex items-center justify-center transition">
                                <i class="fa-regular fa-bookmark"></i>
                            </button>

                            <div class="absolute bottom-3 left-4 bg-[#0c0c14]/90 backdrop-blur-md border border-gray-700/60 text-center px-3 py-1 rounded-xl">
                                <span class="block text-xs font-bold text-purple-400 uppercase">DEC</span>
                                <span class="block text-base font-extrabold text-white">31</span>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-400 mb-2">
                                <span><i class="fa-regular fa-clock text-purple-400 mr-1"></i> 06:00 PM</span>
                                <span>•</span>
                                <span class="truncate"><i class="fa-solid fa-location-dot text-purple-400 mr-1"></i> Laboni Beach, Cox's Bazar</span>
                            </div>

                            <h3 class="text-lg font-bold text-white group-hover:text-purple-300 transition line-clamp-1">
                                Cox's Bazar Beach Carnival & Music Night
                            </h3>
                            <p class="text-xs text-gray-400 mt-2 line-clamp-2 leading-relaxed">
                                Celebrate New Year's Eve on the world's longest sea beach with live DJ sets, acoustic music, and fireworks.
                            </p>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-gray-800/60 mt-2 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] text-gray-400 uppercase font-semibold">Pass Price</span>
                            <span class="text-lg font-extrabold text-white">BDT 1,800</span>
                        </div>
                        <a href="#" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-semibold text-xs px-4 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Empty State -->
            <div id="noResults" class="hidden text-center py-16 glass-card rounded-2xl my-6">
                <div class="w-16 h-16 bg-purple-600/10 text-purple-400 rounded-full flex items-center justify-center mx-auto mb-4 border border-purple-500/20 text-2xl">
                    <i class="fa-solid fa-calendar-xmark"></i>
                </div>
                <h3 class="text-lg font-bold text-white">No Events Found</h3>
                <p class="text-xs text-gray-400 mt-1 max-w-sm mx-auto">We couldn't find any Bangladeshi events matching your criteria.</p>
                <button onclick="filterCategory('all', document.querySelector('.category-btn'))" class="mt-4 px-4 py-2 bg-purple-600/20 border border-purple-500/40 text-purple-300 text-xs font-semibold rounded-xl hover:bg-purple-600 hover:text-white transition">
                    Reset Filters
                </button>
            </div>

            <!-- Pagination / Load More -->
            <div class="mt-12 text-center">
                <button class="px-8 py-3.5 bg-[#161626] hover:bg-purple-600/20 text-purple-300 hover:text-white border border-gray-800 hover:border-purple-500/40 text-sm font-semibold rounded-xl transition shadow-lg">
                    Load More Events <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
                </button>
            </div>
        </section>

    </main>

    <!-- Interactive Filter Script -->
    <script>
        function filterCategory(category, element) {
            document.querySelectorAll('.category-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-gradient-to-r', 'from-purple-600', 'to-indigo-600', 'text-white', 'shadow-lg');
                btn.classList.add('bg-[#161626]', 'text-gray-400', 'hover:text-white', 'hover:bg-gray-800', 'border', 'border-gray-800');
            });

            element.classList.remove('bg-[#161626]', 'text-gray-400', 'hover:text-white', 'hover:bg-gray-800', 'border-gray-800');
            element.classList.add('active', 'bg-gradient-to-r', 'from-purple-600', 'to-indigo-600', 'text-white', 'shadow-lg');

            const titleMap = {
                'all': 'All Events',
                'music': 'Rock & Concerts',
                'tech': 'Tech Summits',
                'esports': 'Gaming & Esports',
                'arts': 'Cultural Fests',
                'business': 'Startup & Business'
            };
            document.getElementById('categoryNameTitle').innerText = titleMap[category] || 'Events';

            const cards = document.querySelectorAll('.event-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const cardCat = card.getAttribute('data-category');
                if (category === 'all' || cardCat === category) {
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
        }

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