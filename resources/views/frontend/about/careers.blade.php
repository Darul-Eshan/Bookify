<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - E-Ticket</title>
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
        <div class="max-w-6xl mx-auto space-y-16">
            
            <!-- Hero Section -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="px-3 py-1 bg-purple-600/20 border border-purple-500/30 text-purple-400 text-xs font-bold rounded-full uppercase tracking-widest">
                    We Are Hiring
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent">
                    Build the Future of Live Entertainment With Us
                </h1>
                <p class="text-gray-400 text-sm sm:text-base leading-relaxed">
                    Join our passionate team of innovators, developers, and creators. We are always looking for talented minds to help shape seamless ticketing experiences.
                </p>
            </div>

            <!-- Why Join Us Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 space-y-3">
                    <div class="w-10 h-10 bg-purple-600/10 text-purple-400 border border-purple-500/20 rounded-xl flex items-center justify-center font-bold">01</div>
                    <h3 class="text-lg font-bold">Remote Friendly</h3>
                    <p class="text-xs text-gray-400">Work from anywhere or from our modern office space with a flexible schedule.</p>
                </div>
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 space-y-3">
                    <div class="w-10 h-10 bg-indigo-600/10 text-indigo-400 border border-indigo-500/20 rounded-xl flex items-center justify-center font-bold">02</div>
                    <h3 class="text-lg font-bold">Growth & Learning</h3>
                    <p class="text-xs text-gray-400">Continuous learning opportunities, skill development workshops, and conference passes.</p>
                </div>
                <div class="bg-[#121222] border border-gray-800 rounded-3xl p-6 space-y-3">
                    <div class="w-10 h-10 bg-emerald-600/10 text-emerald-400 border border-emerald-500/20 rounded-xl flex items-center justify-center font-bold">03</div>
                    <h3 class="text-lg font-bold">Competitive Perks</h3>
                    <p class="text-xs text-gray-400">Health insurance, performance bonuses, and free access to blockbuster concerts and shows.</p>
                </div>
            </div>

            <!-- Open Positions Section -->
            <div class="space-y-6">
                <div class="border-b border-gray-800 pb-4">
                    <h2 class="text-2xl font-bold">Current Open Positions</h2>
                    <p class="text-xs text-gray-400">Find your ideal role and apply today.</p>
                </div>

                <div class="space-y-4">
                    <!-- Job Card 1 -->
                    <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 transition">
                        <div class="space-y-1">
                            <span class="text-[11px] px-2.5 py-0.5 bg-purple-950 text-purple-300 border border-purple-500/30 rounded-full font-semibold">Engineering</span>
                            <h3 class="text-lg font-bold text-white mt-1">Full Stack Laravel Developer</h3>
                            <p class="text-xs text-gray-400">Remote / Dhaka • Full-time • Experience: 2+ Years</p>
                        </div>
                        <button onclick="alert('Thank you for your interest! Please send your CV to careers@eticket.com')" class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-95 text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/20 transition">
                            Apply Now
                        </button>
                    </div>

                    <!-- Job Card 2 -->
                    <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 transition">
                        <div class="space-y-1">
                            <span class="text-[11px] px-2.5 py-0.5 bg-indigo-950 text-indigo-300 border border-indigo-500/30 rounded-full font-semibold">Design</span>
                            <h3 class="text-lg font-bold text-white mt-1">UI/UX Product Designer</h3>
                            <p class="text-xs text-gray-400">Remote • Full-time • Experience: 1+ Years</p>
                        </div>
                        <button onclick="alert('Thank you for your interest! Please send your CV to careers@eticket.com')" class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-95 text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/20 transition">
                            Apply Now
                        </button>
                    </div>

                    <!-- Job Card 3 -->
                    <div class="bg-[#121222] border border-gray-800 hover:border-purple-500/50 rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 transition">
                        <div class="space-y-1">
                            <span class="text-[11px] px-2.5 py-0.5 bg-emerald-950 text-emerald-300 border border-emerald-500/30 rounded-full font-semibold">Support</span>
                            <h3 class="text-lg font-bold text-white mt-1">Customer Success Executive</h3>
                            <p class="text-xs text-gray-400">Dhaka Office • Full-time • Experience: Freshers Welcome</p>
                        </div>
                        <button onclick="alert('Thank you for your interest! Please send your CV to careers@eticket.com')" class="px-5 py-2.5 bg-gradient-to-r from-purple-600 to-indigo-600 hover:opacity-95 text-xs font-semibold rounded-xl shadow-lg shadow-purple-600/20 transition">
                            Apply Now
                        </button>
                    </div>
                </div>
            </div>

            <!-- General Application Banner -->
            <div class="bg-gradient-to-r from-purple-900/40 via-indigo-900/30 to-[#121222] border border-purple-500/30 rounded-3xl p-8 text-center space-y-4">
                <h3 class="text-xl font-bold">Don't see a role that fits?</h3>
                <p class="text-xs text-gray-300 max-w-xl mx-auto">
                    We are always open to meeting exceptional talent. Send your resume and portfolio directly to our HR team, and we'll reach out if a matching role opens up.
                </p>
                <div class="pt-2">
                    <a href="mailto:careers@eticket.com" class="inline-block px-6 py-3 bg-[#161626] hover:bg-[#232338] border border-gray-700 text-xs font-semibold rounded-xl transition">
                        Send Resume to careers@eticket.com
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Include Footer -->
    @include('frontend.include.footer')

</body>
</html>