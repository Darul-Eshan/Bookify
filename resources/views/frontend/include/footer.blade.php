<!-- Footer -->
    <footer class="bg-[#08080f] border-t border-gray-800/80 pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Brand Info -->
                <div class="md:col-span-2 space-y-4">
                    <a href="#" class="flex items-center gap-2 text-white font-bold text-xl tracking-tight">
                        <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2 rounded-xl text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                        </span>
                        E-Ticket
                    </a>
                    <p class="text-sm text-gray-400 max-w-sm">
                        The world's smart event ticketing platform. Discover concerts, sports, theater, and comedy events near you.
                    </p>
                </div>

            <div>
    <ul class="space-y-3 text-sm text-gray-400">
        <li><a href="{{ route('about') }}" class="hover:text-white transition">About</a></li>
        <li><a href="{{ route('privacy') }}" class="hover:text-white transition">Privacy Policy</a></li>
        <li><a href="{{ route('careers') }}" class="hover:text-white transition">Careers</a></li>
    </ul>
</div>

<!-- Column 2 -->
<div>
    <ul class="space-y-3 text-sm text-gray-400">
        <li><a href="{{ route('help.centre') }}" class="hover:text-white transition">Help Centre</a></li>
        <li><a href="{{ route('terms') }}" class="hover:text-white transition">Terms of Service</a></li>
        <li><a href="{{ route('press') }}" class="hover:text-white transition">Press</a></li>
    </ul>
</div>

            <!-- Bottom Copyright Bar -->
            <div class="border-t border-gray-800/60 pt-6 flex flex-col md:flex-row items-center justify-between gap-4 text-xs text-gray-500">
                <p>© 2026 E-Ticket, Inc. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1.5 hover:text-gray-300 cursor-pointer">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> English (US)
                    </span>
                    <span class="hover:text-gray-300 cursor-pointer">$ USD</span>
                </div>
            </div>
        </div>
    </footer>