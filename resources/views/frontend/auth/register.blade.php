<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - E-Ticket</title>

    <!-- Tailwind CSS (Vite / App CSS) Link -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0B14] text-gray-200 antialiased selection:bg-purple-600 selection:text-white">

<div class="relative min-h-screen flex items-center justify-center py-12 px-6 overflow-hidden">
    <!-- Glowing Background Lights -->
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-purple-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-indigo-600/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative w-full max-w-md">
        <!-- Card Container -->
        <div class="bg-[#121222]/90 border border-gray-800/80 backdrop-blur-xl rounded-2xl p-8 shadow-2xl shadow-purple-950/20">
            
            <!-- Logo & Title -->
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-white font-bold text-2xl tracking-tight mb-2">
                    <span class="bg-gradient-to-tr from-purple-600 to-indigo-500 p-2.5 rounded-xl text-white shadow-lg shadow-purple-600/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                    </span>
                    E-Ticket
                </a>
                <h2 class="text-2xl font-bold text-white tracking-tight">Create an Account</h2>
                <p class="text-sm text-gray-400 mt-1">Enter your details to register & get tickets</p>
            </div>

            <!-- Form Start -->
            <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- 1. Full Name Field -->
                <div>
                    <label for="name" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-1.5">Full Name</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="John Doe" class="w-full bg-[#161628] text-sm text-white border border-gray-800 rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 placeholder-gray-500 transition">
                    </div>
                    @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- 2. Phone Number Field -->
                <div>
                    <label for="phone_number" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-1.5">Phone Number</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </span>
                        <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required placeholder="+880 1700-000000" class="w-full bg-[#161628] text-sm text-white border border-gray-800 rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 placeholder-gray-500 transition">
                    </div>
                    @error('phone_number') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- 3. Email Address Field -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-1.5">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="name@example.com" class="w-full bg-[#161628] text-sm text-white border border-gray-800 rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 placeholder-gray-500 transition">
                    </div>
                    @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- 4. Password Field -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-1.5">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input type="password" id="password" name="password" required placeholder="••••••••" class="w-full bg-[#161628] text-sm text-white border border-gray-800 rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 placeholder-gray-500 transition">
                    </div>
                    @error('password') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- 5. Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-gray-300 uppercase tracking-wider mb-1.5">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••" class="w-full bg-[#161628] text-sm text-white border border-gray-800 rounded-xl pl-11 pr-4 py-3 focus:outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500 placeholder-gray-500 transition">
                    </div>
                </div>

                <!-- Terms Checkbox -->
                <div>
                    <div class="flex items-center gap-2 pt-1">
                        <input type="checkbox" id="terms" name="terms" value="1" required class="w-4 h-4 rounded border-gray-700 bg-[#161628] text-purple-600 focus:ring-purple-500 focus:ring-offset-0 cursor-pointer">
                        <label for="terms" class="text-xs text-gray-400 cursor-pointer">
                            I agree to the <a href="#" class="text-purple-400 hover:underline">Terms of Service</a> & <a href="#" class="text-purple-400 hover:underline">Privacy Policy</a>
                        </label>
                    </div>
                    @error('terms') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full mt-2 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 text-white font-semibold py-3.5 rounded-xl shadow-lg shadow-purple-600/30 transition transform hover:-translate-y-0.5 active:translate-y-0">
                    Register Now
                </button>
            </form>

            <!-- Already Have An Account Link -->
            <p class="text-center text-xs text-gray-400 mt-6">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 font-semibold transition">Sign In</a>
            </p>

        </div>
    </div>
</div>

</body>
</html>