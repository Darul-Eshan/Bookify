<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - E-Ticket</title>
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
        <div class="max-w-4xl mx-auto space-y-12">
            
            <!-- Page Header -->
            <div class="space-y-3 border-b border-gray-800 pb-8">
                <span class="px-3 py-1 bg-purple-600/20 border border-purple-500/30 text-purple-400 text-xs font-bold rounded-full uppercase tracking-widest">
                    Legal Agreement
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    Terms of Service
                </h1>
                <p class="text-xs sm:text-sm text-gray-400">
                    Last updated: August 28, 2026. Please read these terms carefully before using our platform.
                </p>
            </div>

            <!-- Content Body -->
            <div class="bg-[#121222] border border-gray-800 rounded-3xl p-8 sm:p-10 space-y-8 text-gray-300 text-sm leading-relaxed">
                
                <!-- Section 1 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 1. Acceptance of Terms
                    </h2>
                    <p class="text-gray-400">
                        By accessing, registering, or purchasing tickets through E-Ticket, you signify your agreement to abide by these Terms of Service. If you do not agree with any part of these terms, you must not use our platform.
                    </p>
                </div>

                <!-- Section 2 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 2. Account Registration & Security
                    </h2>
                    <p class="text-gray-400">
                        You are responsible for maintaining the confidentiality of your account credentials (password and email). Any bookings or activities performed under your account will be your sole responsibility.
                    </p>
                </div>

                <!-- Section 3 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 3. Ticket Purchases & Final Sales
                    </h2>
                    <p class="text-gray-400">
                        All ticket purchases made through our platform are final. Tickets cannot be exchanged, transferred, or refunded unless an event is officially canceled or rescheduled by the primary event organizers.
                    </p>
                </div>

                <!-- Section 4 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 4. Canceled or Postponed Events
                    </h2>
                    <p class="text-gray-400">
                        In the rare event of a cancellation, ticket holders will automatically qualify for a full refund of the ticket price through their original payment gateway within 7 to 10 working days.
                    </p>
                </div>

                <!-- Section 5 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 5. Changes to Terms
                    </h2>
                    <p class="text-gray-400">
                        We reserve the right to modify or update these terms at any time without prior notice. Continued use of the platform after modifications constitutes your acceptance of the updated terms.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <!-- Include Footer -->
    @include('frontend.include.footer')

</body>
</html>