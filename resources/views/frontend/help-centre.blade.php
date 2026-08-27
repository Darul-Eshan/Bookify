<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Centre - E-Ticket</title>
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
            
            <!-- Hero Search Section -->
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <span class="px-3 py-1 bg-purple-600/20 border border-purple-500/30 text-purple-400 text-xs font-bold rounded-full uppercase tracking-widest">
                    Help Centre
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    How can we help you today?
                </h1>
                <p class="text-gray-400 text-sm">
                    Search our knowledge base or browse categories below to find quick answers.
                </p>

                <!-- Search Bar -->
                <div class="pt-2">
                    <div class="relative max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" placeholder="Search for tickets, refunds, payments..." class="w-full bg-[#121222] text-sm text-gray-200 border border-gray-800 rounded-2xl pl-12 pr-4 py-3.5 focus:outline-none focus:border-purple-500 transition shadow-xl">
                    </div>
                </div>
            </div>

            <!-- Help Topics Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Topic 1 -->
                <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-3xl p-6 space-y-3 transition">
                    <div class="w-12 h-12 bg-purple-600/10 text-purple-400 border border-purple-500/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Ticket Booking & QR</h3>
                    <p class="text-xs text-gray-400">Learn how to purchase, download, and scan your digital concert or event tickets.</p>
                </div>

                <!-- Topic 2 -->
                <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-3xl p-6 space-y-3 transition">
                    <div class="w-12 h-12 bg-indigo-600/10 text-indigo-400 border border-indigo-500/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Payments & Refunds</h3>
                    <p class="text-xs text-gray-400">Information regarding bKash/Nagad transactions, failed payments, and cancellation refunds.</p>
                </div>

                <!-- Topic 3 -->
                <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-3xl p-6 space-y-3 transition">
                    <div class="w-12 h-12 bg-emerald-600/10 text-emerald-400 border border-emerald-500/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Account & Profile</h3>
                    <p class="text-xs text-gray-400">Managing your login credentials, personal details, and past booking history.</p>
                </div>

            </div>

            <!-- Still Need Help? Banner -->
            <div class="bg-gradient-to-r from-purple-900/40 via-indigo-900/30 to-[#121222] border border-purple-500/30 rounded-3xl p-8 sm:p-10 text-center space-y-4">
                <h3 class="text-2xl font-bold">Still couldn't find what you're looking for?</h3>
                <p class="text-xs sm:text-sm text-gray-300 max-w-xl mx-auto">
                    Our customer support team is available 24/7 to help you resolve any booking or event-related issues instantly.
                </p>
                <div class="pt-3">
                    <a href="{{ route('support') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold text-xs rounded-xl shadow-lg shadow-purple-600/30 hover:opacity-95 transition">
                        Contact Support Team
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Include Footer -->
    @include('frontend.include.footer')

</body>
</html>