<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Center - E-Ticket</title>
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
        <div class="max-w-7xl mx-auto space-y-12">
            
            <!-- Page Header -->
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    How can we help you?
                </h1>
                <p class="text-sm text-gray-400">
                    Find answers to common questions or reach out to our support team for any ticket-related assistance.
                </p>
            </div>

            <!-- Support Cards Grid (Contact Info) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1: Live Chat -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-4 hover:border-purple-500/50 transition">
                    <div class="w-12 h-12 bg-purple-600/10 text-purple-400 border border-purple-500/20 rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Live Chat Support</h3>
                    <p class="text-xs text-gray-400">Chat instantly with our customer executive for quick booking support.</p>
                    <span class="inline-block text-xs font-semibold text-purple-400 bg-purple-950/50 px-3 py-1 rounded-full border border-purple-500/30">Available 24/7</span>
                </div>

                <!-- Card 2: Email Support -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-4 hover:border-purple-500/50 transition">
                    <div class="w-12 h-12 bg-indigo-600/10 text-indigo-400 border border-indigo-500/20 rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Email Us</h3>
                    <p class="text-xs text-gray-400">Send us your detailed query and we will reply within 24 hours.</p>
                    <span class="inline-block text-xs font-mono font-semibold text-indigo-400 bg-indigo-950/50 px-3 py-1 rounded-full border border-indigo-500/30">support@eticket.com</span>
                </div>

                <!-- Card 3: Hotline -->
                <div class="bg-[#121222] border border-gray-800 rounded-2xl p-6 text-center space-y-4 hover:border-purple-500/50 transition">
                    <div class="w-12 h-12 bg-emerald-600/10 text-emerald-400 border border-emerald-500/20 rounded-2xl flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold">Helpline Number</h3>
                    <p class="text-xs text-gray-400">Call our hotline directly to talk with a customer care representative.</p>
                    <span class="inline-block text-xs font-mono font-semibold text-emerald-400 bg-emerald-950/50 px-3 py-1 rounded-full border border-emerald-500/30">+880 9612-345678</span>
                </div>

            </div>

            <!-- FAQ and Contact Form Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                
                <!-- Left: FAQs (Accordion style with Alpine.js) -->
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 sm:p-8 space-y-6">
                    <h2 class="text-xl font-bold">Frequently Asked Questions</h2>
                    
                    <div class="space-y-4" x-data="{ selected: null }">
                        
                        <!-- FAQ 1 -->
                        <div class="border border-gray-800 rounded-xl overflow-hidden bg-[#161626]">
                            <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full flex justify-between items-center p-4 text-left text-sm font-semibold transition">
                                <span>How do I download my purchased tickets?</span>
                                <svg class="w-4 h-4 transition-transform" :class="selected === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="selected === 1" class="px-4 pb-4 text-xs text-gray-400">
                                Once your payment is successfully completed, you can go to your profile or "My Tickets" section to download your e-ticket PDF instantly.
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="border border-gray-800 rounded-xl overflow-hidden bg-[#161626]">
                            <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full flex justify-between items-center p-4 text-left text-sm font-semibold transition">
                                <span>Can I get a refund if an event is canceled?</span>
                                <svg class="w-4 h-4 transition-transform" :class="selected === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="selected === 2" class="px-4 pb-4 text-xs text-gray-400">
                                Yes! If an official event is canceled by the organizers, a 100% full refund will be credited back to your original payment method within 5-7 working days.
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="border border-gray-800 rounded-xl overflow-hidden bg-[#161626]">
                            <button @click="selected !== 3 ? selected = 3 : selected = null" class="w-full flex justify-between items-center p-4 text-left text-sm font-semibold transition">
                                <span>What payment methods are supported?</span>
                                <svg class="w-4 h-4 transition-transform" :class="selected === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="selected === 3" class="px-4 pb-4 text-xs text-gray-400">
                                We support bKash, Nagad, Rocket, Visa/Mastercard, and internet banking gateways seamlessly.
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right: Send Message Form -->
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 sm:p-8 space-y-6">
                    <h2 class="text-xl font-bold">Send Us a Message</h2>
                    
                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-medium text-gray-300 mb-1">Your Name</label>
                            <input type="text" placeholder="Enter your full name" class="w-full bg-[#161626] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-300 mb-1">Email Address</label>
                            <input type="email5" placeholder="Enter your email" class="w-full bg-[#161626] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition">
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-gray-300 mb-1">Message</label>
                            <textarea rows="4" placeholder="Describe your issue or question..." class="w-full bg-[#161626] text-sm text-gray-200 border border-gray-800 rounded-xl px-4 py-2.5 focus:outline-none focus:border-purple-500 transition"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold text-sm shadow-lg shadow-purple-600/30 hover:opacity-95 transition">
                            Submit Support Request
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</body>
</html>