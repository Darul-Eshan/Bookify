<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookify</title>

    <!-- Tailwind CSS (Vite / App CSS) Link -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0B0B14] text-gray-200 antialiased selection:bg-purple-600 selection:text-white">

    <!-- Header Included -->
    @include('frontend.include.header')

    <!-- Dynamic Main Content -->
    @yield('section')

    <!-- Footer Included -->
    @include('frontend.include.footer')

</body>
</html>