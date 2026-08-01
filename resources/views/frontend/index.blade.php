@extends('frontend.layout.master')

@section('section')
@php
    // Mock Data for Events
    $categories = ['All', 'Music', 'Sports', 'Theater', 'Comedy'];
    
    $events = [
        [
            'title' => 'Coldplay: Music of the Spheres',
            'artist' => 'Coldplay',
            'date' => 'Aug 15, 2026',
            'location' => 'London, UK',
            'price' => '$89',
            'rating' => '4.9',
            'category' => 'Music',
            'featured' => true,
            'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'NBA Finals 2026 — Game 7',
            'artist' => 'Golden State Warriors vs. Boston Celtics',
            'date' => 'Jul 20, 2026',
            'location' => 'San Francisco, CA',
            'price' => '$199',
            'rating' => '4.8',
            'category' => 'Sports',
            'featured' => true,
            'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Hamilton — The Musical',
            'artist' => 'Original Broadway Cast',
            'date' => 'Sep 3, 2026',
            'location' => 'New York, NY',
            'price' => '$149',
            'rating' => '4.9',
            'category' => 'Theater',
            'featured' => false,
            'image' => 'https://images.unsplash.com/photo-1469488865564-c2de10f69f96?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Taylor Swift: The Eras Tour',
            'artist' => 'Taylor Swift',
            'date' => 'Oct 12, 2026',
            'location' => 'Los Angeles, CA',
            'price' => '$129',
            'rating' => '5.0',
            'category' => 'Music',
            'featured' => true,
            'image' => 'https://images.unsplash.com/photo-1501386761578-eac5c94b800a?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Dave Chappelle: Stand-Up Special',
            'artist' => 'Dave Chappelle',
            'date' => 'Aug 28, 2026',
            'location' => 'New York, NY',
            'price' => '$95',
            'rating' => '4.7',
            'category' => 'Comedy',
            'featured' => false,
            'image' => 'https://images.unsplash.com/photo-1585699324551-f6c309eedeca?auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'UFC 310: World Championship Night',
            'artist' => 'Mixed Martial Arts',
            'date' => 'Nov 5, 2026',
            'location' => 'Las Vegas, NV',
            'price' => '$175',
            'rating' => '4.8',
            'category' => 'Sports',
            'featured' => false,
            'image' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?auto=format&fit=crop&w=800&q=80'
        ],
    ];
@endphp

<!-- Hero Section -->
<section class="relative min-h-[520px] flex items-end pb-12 overflow-hidden border-b border-gray-800/30">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?auto=format&fit=crop&w=1920&q=80" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0B0B14] via-[#0B0B14]/75 to-[#0B0B14]/40"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B0B14] via-[#0B0B14]/80 to-transparent"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 w-full">
        <div class="max-w-2xl">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-950/80 border border-purple-500/40 text-purple-300 backdrop-blur-md mb-4">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                Featured Event
            </span>

            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-2">
                Coldplay: Music of the Spheres
            </h1>
            <p class="text-purple-300 font-medium mb-4 text-lg">Coldplay</p>

            <div class="flex flex-wrap items-center gap-6 text-sm text-gray-300 mb-8">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Aug 15, 2026
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    London, UK
                </span>
                <span class="flex items-center gap-1 text-yellow-400 font-semibold">
                    ★ 4.9
                </span>
            </div>

            <div class="flex items-center gap-4">
                <button class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold px-6 py-3 rounded-xl shadow-lg shadow-purple-600/30 flex items-center gap-2 transition transform hover:-translate-y-0.5">
                    Get Tickets
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
                <span class="text-sm text-gray-400">From <strong class="text-white text-lg font-bold ml-1">$89</strong></span>
            </div>
        </div>
    </div>
</section>

<!-- Category Filters Navigation -->
<div class="max-w-7xl mx-auto px-6 py-6">
    <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
        @foreach($categories as $category)
            <button class="px-5 py-2 rounded-xl text-sm font-medium transition-all whitespace-nowrap {{ $loop->first ? 'bg-purple-600 text-white shadow-md shadow-purple-600/30' : 'bg-[#141424] text-gray-400 hover:text-white hover:bg-[#1a1a30] border border-gray-800/60' }}">
                {{ $category }}
            </button>
        @endforeach
    </div>
</div>

<!-- Main Events Grid Section -->
<main class="max-w-7xl mx-auto px-6 py-4 pb-16">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-xl font-bold text-white flex items-center gap-2">
            All Events
            <span class="text-xs font-semibold bg-[#1a1a2e] text-purple-400 px-2.5 py-0.5 rounded-full border border-purple-500/20">6</span>
        </h2>
        <a href="#" class="text-sm font-semibold text-purple-400 hover:text-purple-300 flex items-center gap-1 transition">
            View All
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $event)
        <div class="group bg-[#121222] border border-gray-800/80 rounded-2xl overflow-hidden hover:border-purple-500/40 transition duration-300 flex flex-col justify-between shadow-lg">
            <div class="relative h-48 overflow-hidden">
                <img src="{{ $event['image'] }}" alt="{{ $event['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-[#121222] via-transparent to-black/30"></div>
                
                <div class="absolute top-3 left-3 flex items-center gap-2">
                    <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-purple-950/80 text-purple-300 border border-purple-500/30 backdrop-blur-md flex items-center gap-1">
                        🎵 {{ $event['category'] }}
                    </span>
                </div>

                @if($event['featured'])
                <div class="absolute top-3 right-3">
                    <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-amber-500/20 text-amber-300 border border-amber-500/30 backdrop-blur-md">
                        Featured
                    </span>
                </div>
                @endif
            </div>

            <div class="p-5 flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white group-hover:text-purple-400 transition line-clamp-1 mb-1">
                        {{ $event['title'] }}
                    </h3>
                    <p class="text-sm text-gray-400 font-medium mb-4 line-clamp-1">
                        {{ $event['artist'] }}
                    </p>
                </div>

                <div class="space-y-1.5 text-xs text-gray-400 mb-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ $event['date'] }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        <span>{{ $event['location'] }}</span>
                    </div>
                </div>

                <div class="flex items-center justify-between pt-4 border-t border-gray-800/60">
                    <span class="text-xs text-gray-400">
                        From <strong class="text-base text-white font-bold ml-1">{{ $event['price'] }}</strong>
                    </span>
                    <div class="flex items-center gap-1 text-xs font-semibold text-yellow-400">
                        ★ <span>{{ $event['rating'] }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection