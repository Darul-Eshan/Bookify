<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - E-Ticket</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#0B0B14] text-white font-sans antialiased">

    <!-- Include Header -->
    @include('frontend.include.header')

    <!-- Main Content -->
    <div class="min-h-screen py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto space-y-16">
            
            <!-- Hero Section -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="px-3 py-1 bg-purple-600/20 border border-purple-500/30 text-purple-400 text-xs font-bold rounded-full uppercase tracking-widest">
                    About Our Platform
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    Redefining How You Experience Live Events
                </h1>
                <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                    E-Ticket is the world's smart event ticketing platform, built to bridge the gap between passionate fans and unforgettable live entertainment[cite: 2].
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-2">
                    <h3 class="text-3xl font-black text-purple-400">1M+</h3>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Tickets Sold</p>
                </div>
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-2">
                    <h3 class="text-3xl font-black text-indigo-400">500+</h3>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Events Hosted</p>
                </div>
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-2">
                    <h3 class="text-3xl font-black text-emerald-400">50K+</h3>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Happy Users</p>
                </div>
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-2">
                    <h3 class="text-3xl font-black text-pink-400">24/7</h3>
                    <p class="text-xs text-gray-400 uppercase tracking-wider font-semibold">Support Ready</p>
                </div>
            </div>

            <!-- Mission & Vision Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-8 space-y-4">
                    <div class="w-12 h-12 bg-purple-600/10 text-purple-400 border border-purple-500/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold">Our Mission</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        To simplify ticket purchasing through cutting-edge technology, ensuring transparent pricing, instant delivery, and absolute security for every music concert, sports tournament, and theater show.
                    </p>
                </div>

                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-8 space-y-4">
                    <div class="w-12 h-12 bg-indigo-600/10 text-indigo-400 border border-indigo-500/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold">Our Vision</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        To become the most trusted and user-centric global ticketing ecosystem, empowering event organizers to reach wider audiences effortlessly.
                    </p>
                </div>
            </div>

            <!-- Why Choose Us Section -->
            <div class="bg-[#121222] border border-gray-800 rounded-3xl p-8 sm:p-12 space-y-8">
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <h2 class="text-2xl sm:text-3xl font-bold">Why Choose E-Ticket?</h2>
                    <p class="text-xs text-gray-400">We provide the best features to make your booking journey smooth.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2 bg-[#161626] p-6 rounded-2xl border border-gray-800/60">
                        <h4 class="font-bold text-white text-base">Secure Payments</h4>
                        <p class="text-xs text-gray-400">Integrated with trusted gateways like bKash, Nagad, and international cards.</p>
                    </div>
                    <div class="space-y-2 bg-[#161626] p-6 rounded-2xl border border-gray-800/60">
                        <h4 class="font-bold text-white text-base">Instant E-Tickets</h4>
                        <p class="text-xs text-gray-400">Get your scannable QR ticket directly in your profile instantly after payment.</p>
                    </div>
                    <div class="space-y-2 bg-[#161626] p-6 rounded-2xl border border-gray-800/60">
                        <h4 class="font-bold text-white text-base">Verified Events</h4>
                        <p class="text-xs text-gray-400">Every single concert and show listed on our platform is 100% verified and authentic.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Include Footer -->
    @include('frontend.include.footer')

</body>
</html>