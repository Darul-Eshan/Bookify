<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - E-Ticket</title>
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
                    Legal & Security
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    Privacy Policy
                </h1>
                <p class="text-xs sm:text-sm text-gray-400">
                    Last updated: August 28, 2026. Your privacy is critically important to us.
                </p>
            </div>

            <!-- Content Body -->
            <div class="bg-[#121222] border border-gray-800 rounded-3xl p-8 sm:p-10 space-y-8 text-gray-300 text-sm leading-relaxed">
                
                <!-- Section 1 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 1. Information We Collect
                    </h2>
                    <p class="text-gray-400">
                        When you use our e-ticketing platform, register an account, or book tickets for concerts and sports events, we may collect personal information such as your full name, email address, phone number, and transaction/payment details[cite: 2].
                    </p>
                </div>

                <!-- Section 2 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 2. How We Use Your Data
                    </h2>
                    <p class="text-gray-400">
                        Your data is primarily used to process ticket bookings securely, generate digital QR passes, send booking confirmations, and provide prompt customer support[cite: 2]. We also use analytical data to improve our platform performance.
                    </p>
                </div>

                <!-- Section 3 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 3. Payment Security & Gateways
                    </h2>
                    <p class="text-gray-400">
                        All financial transactions are handled through certified third-party payment gateways (such as bKash, Nagad, and banking partners). We do not store your complete credit/debit card numbers or sensitive PINs on our servers.
                    </p>
                </div>

                <!-- Section 4 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 4. Cookies and Tracking Technologies
                    </h2>
                    <p class="text-gray-400">
                        We use cookies to maintain your active session, remember your preferences, and analyze site traffic to give you a personalized event-browsing experience.
                    </p>
                </div>

                <!-- Section 5 -->
                <div class="space-y-3">
                    <h2 class="text-lg font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-purple-500"></span> 5. Contact Us Regarding Privacy
                    </h2>
                    <p class="text-gray-400">
                        If you have any questions, concerns, or requests regarding your personal data or this privacy policy, feel free to reach out to our data privacy team at <span class="text-purple-400 font-mono">privacy@eticket.com</span>.
                    </p>
                </div>

            </div>

        </div>
    </div>

    <!-- Include Footer -->
    @include('frontend.include.footer')

</body>
</html>