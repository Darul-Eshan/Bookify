<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers & Promos - E-Ticket</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#0B0B14] text-white font-sans antialiased">

    <!-- Include Header -->
    @include('frontend.include.header')

    <!-- Main Content -->
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-10">
            
            <!-- Page Header -->
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    Exclusive Offers & Promos
                </h1>
                <p class="text-sm text-gray-400">
                    Grab the best discounts, cashback deals, and promo codes for your favorite concerts, sports, and events.
                </p>
            </div>

            <!-- Featured Big Promo Banner -->
            <div class="relative bg-gradient-to-r from-purple-900/60 via-indigo-900/40 to-[#121222] border border-purple-500/30 rounded-3xl p-6 sm:p-10 overflow-hidden shadow-2xl flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-purple-600/20 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="space-y-4 max-w-xl z-10">
                    <span class="px-3 py-1 bg-purple-600/30 border border-purple-500/50 text-purple-300 text-xs font-bold rounded-full uppercase tracking-wider">
                        Mega Deal 2026
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">Get Flat 30% OFF on All Music Concert Tickets!</h2>
                    <p class="text-sm text-gray-300">
                        Use code <strong class="text-purple-400 bg-[#161628] px-2 py-1 rounded border border-gray-800">MUSIC30</strong> during checkout to instantly save big on upcoming blockbuster musical events.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('events') }}" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold text-sm shadow-lg shadow-purple-600/30 hover:opacity-95 transition">
                            Explore Concerts
                        </a>
                    </div>
                </div>

                <div class="z-10 bg-[#121222]/80 border border-gray-800 p-6 rounded-2xl text-center space-y-3 backdrop-blur-md min-w-[220px]">
                    <span class="text-xs text-gray-400 block uppercase tracking-widest font-semibold">Promo Code</span>
                    <div class="text-xl font-mono font-bold text-purple-400 tracking-wider bg-[#161626] py-2 px-4 rounded-xl border border-purple-500/30">
                        MUSIC30
                    </div>
                    <p class="text-[11px] text-gray-500">Valid till: 31st Dec 2026</p>
                </div>
            </div>

            <!-- Offers Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Offer Card 1 -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between space-y-6 hover:border-purple-500/50 transition">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-xs font-bold rounded-lg">Cashback</span>
                            <span class="text-xs text-gray-400">bKash / Nagad</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">20% Cashback on Sports Events</h3>
                        <p class="text-xs text-gray-400">Pay using online gateways and enjoy up to ৳500 cashback on cricket and football match passes.</p>
                    </div>
                    <div class="pt-4 border-t border-gray-800 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-gray-500 block">Use Code</span>
                            <span class="text-sm font-mono font-bold text-purple-400">SPORTS20</span>
                        </div>
                        <button onclick="navigator.clipboard.writeText('SPORTS20'); alert('Promo code copied!');" class="px-4 py-2 bg-[#1b1b32] hover:bg-[#23234a] text-xs font-semibold rounded-xl text-gray-200 border border-gray-700/60 transition">
                            Copy Code
                        </button>
                    </div>
                </div>

                <!-- Offer Card 2 -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between space-y-6 hover:border-purple-500/50 transition">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 bg-purple-500/10 text-purple-400 border border-purple-500/20 text-xs font-bold rounded-lg">Early Bird</span>
                            <span class="text-xs text-gray-400">Limited Tickets</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">Tech Summit 2026 Special</h3>
                        <p class="text-xs text-gray-400">Book your tech conference tickets early and get a flat ৳400 discount instantly.</p>
                    </div>
                    <div class="pt-4 border-t border-gray-800 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-gray-500 block">Use Code</span>
                            <span class="text-sm font-mono font-bold text-purple-400">TECH2026</span>
                        </div>
                        <button onclick="navigator.clipboard.writeText('TECH2026'); alert('Promo code copied!');" class="px-4 py-2 bg-[#1b1b32] hover:bg-[#23234a] text-xs font-semibold rounded-xl text-gray-200 border border-gray-700/60 transition">
                            Copy Code
                        </button>
                    </div>
                </div>

                <!-- Offer Card 3 -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 flex flex-col justify-between space-y-6 hover:border-purple-500/50 transition">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="px-2.5 py-1 bg-blue-500/10 text-blue-400 border border-blue-500/20 text-xs font-bold rounded-lg">Weekend Pass</span>
                            <span class="text-xs text-gray-400">Theater & Arts</span>
                        </div>
                        <h3 class="text-lg font-bold text-white">Buy 2 Get 1 Free Ticket</h3>
                        <p class="text-xs text-gray-400">Bring your friends and family! Buy any two theater tickets and get the third one completely free.</p>
                    </div>
                    <div class="pt-4 border-t border-gray-800 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-gray-500 block">Use Code</span>
                            <span class="text-sm font-mono font-bold text-purple-400">B2G3ARTS</span>
                        </div>
                        <button onclick="navigator.clipboard.writeText('B2G3ARTS'); alert('Promo code copied!');" class="px-4 py-2 bg-[#1b1b32] hover:bg-[#23234a] text-xs font-semibold rounded-xl text-gray-200 border border-gray-700/60 transition">
                            Copy Code
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>