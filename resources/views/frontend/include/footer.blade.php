<!-- Footer -->
<footer class="bg-[#08080f] border-t border-gray-800/80 pt-16 pb-8 text-gray-400">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Top Newsletter / Quick Update Section -->
        <div class="bg-gradient-to-r from-purple-900/20 via-[#121222] to-indigo-900/20 border border-purple-500/20 rounded-2xl p-6 md:p-8 mb-12 flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
            <div>
                <h3 class="text-white font-bold text-lg mb-1">Stay updated with upcoming events!</h3>
                <p class="text-xs md:text-sm text-gray-400">Get notified about hot concerts, tech expos, and early bird ticket discounts.</p>
            </div>
            <form class="flex items-center w-full md:w-auto gap-2">
                <input type="email" placeholder="Enter your email address" class="bg-[#121222] border border-gray-700/80 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-purple-500 w-full md:w-72 transition">
            <a href="{{ route('login') }}"  class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-medium text-sm px-5 py-2.5 rounded-xl shadow-lg shadow-purple-600/20 hover:opacity-95 transition">
                Sign In
            </a>
            </form>
        </div>

        <!-- Main Footer Links Grid -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mb-12">
            
            <!-- Brand Info (Takes 2 Columns) -->
            <div class="md:col-span-2 space-y-4">
                <a href="#" class="flex items-center gap-2 text-white font-bold text-xl tracking-tight">
                    <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2 rounded-xl text-white shadow-md shadow-purple-600/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </span>
                    E-Ticket
                </a>
                <p class="text-sm text-gray-400 max-w-sm leading-relaxed">
                    The world's smart event ticketing platform. Discover concerts, sports, theater, and comedy events near you[cite: 6].
                </p>
                
            
            </div>

            <!-- Column 1: Quick Links -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-4">Quick Links</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('about') }}" class="hover:text-white transition">About Us</a></li>
                    </ul>
            </div>

            <!-- Column 2: Support & Help -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-4">Support</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('help.centre') }}" class="hover:text-white transition">Help Centre</a></li>
    
                    <li><a href="#" class="hover:text-white transition">Refund Policy</a></li>
                </ul>
            </div>

            <!-- Column 3: Legal -->
            <div>
                <h4 class="text-white font-semibold text-sm mb-4">Legal</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white transition">Terms of Service</a></li>
            
                </ul>
            </div>

        </div>

        <!-- Middle Payment & Security Badges Bar -->
        <div class="border-t border-gray-800/60 pt-6 pb-6 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-3 text-xs text-gray-500">
                <span>Secure Payments:</span>
                <div class="flex items-center gap-2">
                    <span class="bg-[#121222] border border-gray-800 px-2.5 py-1 rounded text-gray-300 font-semibold text-[11px]">bKash</span>
                    <span class="bg-[#121222] border border-gray-800 px-2.5 py-1 rounded text-gray-300 font-semibold text-[11px]">Nagad</span>
                    <span class="bg-[#121222] border border-gray-800 px-2.5 py-1 rounded text-gray-300 font-semibold text-[11px]">Visa</span>
                    <span class="bg-[#121222] border border-gray-800 px-2.5 py-1 rounded text-gray-300 font-semibold text-[11px]">Mastercard</span>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="border-t border-gray-800/40 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-gray-500">
            <p>© 2026 E-Ticket, All rights reserved 😎</p>
            <p class="text-gray-600">Designed for smooth ticketing experiences.</p>
        </div>

    </div>
</footer>