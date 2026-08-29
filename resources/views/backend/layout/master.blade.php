<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - E-Ticket</title>

    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0B14] text-gray-200 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Include -->
        @include('backend.include.sidebar')

        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col lg:pl-64 overflow-hidden">
            <!-- Header Include -->
            @include('backend.include.header')

            <!-- Main Dynamic Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#0B0B14] p-6">
                
                <!-- Dynamic Content Will Be Injected Here -->
                @yield('content')

            </main>

            <!-- Footer Include -->
            @include('backend.include.footer')
        </div>
    </div>

</body>
</html>