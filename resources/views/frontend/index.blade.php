@extends('frontend.layout.master')

@section('section')
@php
    // ক্যাটাগরিগুলো ফিল্টারিংয়ের জন্য ফিক্সড রাখা হলো
    $categories = ['All', 'Music', 'Tech', 'Cultural', 'Comedy'];
@endphp

<!-- Main Wrapper with Alpine.js State -->
<div x-data="{ activeCategory: 'All' }">

    @if($events->count() > 0)
        @php 
            $featuredEvent = $events->first(); // প্রথম ইভেন্টটি হিরো সেকশনে দেখানোর জন্য 
        @endphp
        <!-- Hero Section (Dynamic from Database) -->
        <section class="relative min-h-[520px] flex items-end pb-12 overflow-hidden border-b border-gray-800/30">
            <div class="absolute inset-0 z-0">
                <img src="{{ filter_var($featuredEvent->image, FILTER_VALIDATE_URL) ? $featuredEvent->image : asset('storage/' . $featuredEvent->image) }}" alt="Hero Background" class="w-full h-full object-cover">
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
                        {{ $featuredEvent->title }}
                    </h1>
                    <p class="text-purple-300 font-medium mb-4 text-lg">{{ $featuredEvent->artist ?? 'Various Artists' }}</p>

                    <div class="flex flex-wrap items-center gap-6 text-sm text-gray-300 mb-8">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ \Carbon\Carbon::parse($featuredEvent->date_time ?? $featuredEvent->date)->format('M d, Y') }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $featuredEvent->venue ?? $featuredEvent->location }}
                        </span>
                        <span class="flex items-center gap-1 text-yellow-400 font-semibold">
                            ★ {{ $featuredEvent->rating ?? '4.9' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-4">
                       <a href="{{ route('events.details', $featuredEvent->id) }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-bold text-lg px-10 py-2.5 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                        <span class="text-sm text-gray-400">From <strong class="text-white text-lg font-bold ml-1">{{ is_numeric($featuredEvent->price) ? 'BDT ' . number_format($featuredEvent->price) : $featuredEvent->price }}</strong></span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Category Filters Navigation -->
    <div class="max-w-7xl mx-auto px-6 py-6">
        <div class="flex items-center gap-2 overflow-x-auto pb-2 scrollbar-none">
            @foreach($categories as $category)
                <button 
                    @click="activeCategory = '{{ $category }}'"
                    :class="activeCategory === '{{ $category }}' ? 'bg-purple-600 text-white shadow-md shadow-purple-600/30' : 'bg-[#141424] text-gray-400 hover:text-white hover:bg-[#1a1a30] border border-gray-800/60'"
                    class="px-5 py-2 rounded-xl text-sm font-medium transition-all whitespace-nowrap">
                    {{ $category }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Main Events Grid Section -->
    <main class="max-w-7xl mx-auto px-6 py-4 pb-16">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-xl font-bold text-white flex items-center gap-2">
                <span x-text="activeCategory === 'All' ? 'All Events' : activeCategory + ' Events'"></span>
            </h2>
            <a href="#" class="text-sm font-semibold text-purple-400 hover:text-purple-300 flex items-center gap-1 transition">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($events as $event)
            <div 
                x-show="activeCategory === 'All' || activeCategory === '{{ $event->category }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="group bg-[#121222] border border-gray-800/80 rounded-2xl overflow-hidden hover:border-purple-500/40 transition duration-300 flex flex-col justify-between shadow-lg">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ filter_var($event->image, FILTER_VALIDATE_URL) ? $event->image : asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#121222] via-transparent to-black/30"></div>
                    
                    <div class="absolute top-3 left-3 flex items-center gap-2">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-purple-950/80 text-purple-300 border border-purple-500/30 backdrop-blur-md flex items-center gap-1">
                            🎵 {{ $event->category }}
                        </span>
                    </div>

                    @if(!empty($event->featured) && $event->featured)
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
                            {{ $event->title }}
                        </h3>
                        <p class="text-sm text-gray-400 font-medium mb-4 line-clamp-1">
                            {{ $event->artist ?? 'Various Artists' }}
                        </p>
                    </div>

                    <div class="space-y-1.5 text-xs text-gray-400 mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span>{{ \Carbon\Carbon::parse($event->date_time ?? $event->date)->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                            <span>{{ $event->venue ?? $event->location }}</span>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-800/60 flex flex-col gap-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-400">
                                Price <strong class="text-base text-white font-bold ml-1">{{ is_numeric($event->price) ? 'BDT ' . number_format($event->price) : $event->price }}</strong>
                            </span>
                            <div class="flex items-center gap-1 text-xs font-semibold text-yellow-400">
                                ★ <span>{{ $event->rating ?? '4.8' }}</span>
                            </div>
                        </div>

                        <!-- Get Ticket Button with ID -->
                        <a href="{{ route('events.details', $event->id) }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-90 text-white font-bold text-sm py-2.5 px-4 rounded-xl shadow-md shadow-purple-600/20 transition flex items-center justify-center gap-1.5">
                            Get Ticket <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-400">
                    No events found in the database. Please add events from the dashboard.
                </div>
            @endforelse
        </div>
    </main>

</div>

<!-- Realistic Image Sliding Banner (Footer-er Upore) -->
<div class="max-w-7xl mx-auto px-6 mb-12">
    <div class="relative bg-[#121222] border border-purple-500/30 rounded-2xl overflow-hidden shadow-2xl">
        
        <!-- Slider Wrapper -->
        <div class="relative h-64 md:h-80 w-full overflow-hidden" id="imageSlider">
            
            @php
                $sliderEvents = $events->take(3); // প্রথম ৩টি ইভেন্ট স্লাইডারে দেখানোর জন্য
            @endphp

            @forelse($sliderEvents as $key => $slide)
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $key === 0 ? 'opacity-100' : 'opacity-0' }} slide-item">
                    <img src="{{ filter_var($slide->image, FILTER_VALIDATE_URL) ? $slide->image : asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#121222] via-black/50 to-transparent flex flex-col justify-end p-6 md:p-8">
                        <span class="bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-full w-max mb-2">{{ $slide->category }}</span>
                        <h3 class="text-2xl md:text-3xl font-extrabold text-white">{{ $slide->title }}</h3>
                        <p class="text-gray-300 text-sm mt-1">{{ $slide->venue ?? $slide->location }} - {{ \Carbon\Carbon::parse($slide->date_time ?? $slide->date)->format('M d, Y') }}</p>
                    </div>
                </div>
            @empty
                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                    No Slider Events Available
                </div>
            @endforelse

        </div>

        <!-- Slider Indicators (Dots) -->
        <div class="absolute bottom-4 right-6 z-10 flex gap-2">
            @foreach($sliderEvents as $key => $slide)
                <button class="w-3 h-3 rounded-full {{ $key === 0 ? 'bg-white' : 'bg-white/50' }} hover:bg-white transition dot-btn" onclick="currentSlide({{ $key }})"></button>
            @endforeach
        </div>

    </div>
</div>

<!-- JavaScript for Image Slider -->
<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide-item');
    const dots = document.querySelectorAll('.dot-btn');

    function showSlides() {
        if(slides.length === 0) return;
        slides.forEach((slide, index) => {
            slide.style.opacity = '0';
            if(dots[index]) {
                dots[index].classList.remove('bg-white');
                dots[index].classList.add('bg-white/50');
            }
        });

        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1; }

        if(slides[slideIndex - 1]) {
            slides[slideIndex - 1].style.opacity = '1';
        }
        if(dots[slideIndex - 1]) {
            dots[slideIndex - 1].classList.remove('bg-white/50');
            dots[slideIndex - 1].classList.add('bg-white');
        }

        setTimeout(showSlides, 4000); // Change image every 4 seconds
    }

    function currentSlide(n) {
        slideIndex = n;
        slides.forEach((slide, index) => {
            slide.style.opacity = index === n ? '1' : '0';
            if(dots[index]) {
                dots[index].classList.toggle('bg-white', index === n);
                dots[index].classList.toggle('bg-white/50', index !== n);
            }
        });
    }

    // Start auto slide
    if(slides.length > 0) {
        setTimeout(showSlides, 4000);
    }
</script>
@endsection