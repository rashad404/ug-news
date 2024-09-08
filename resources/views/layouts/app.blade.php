<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'UG News')</title>
    @vite('resources/css/app.css')

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        @include('partials.navbar')

        <!-- Main Layout with Sidebars -->
        <div class="grid grid-cols-12 gap-4 py-6">
            <!-- Include Left Sidebar -->
            @include('partials.left-sidebar')

            <!-- Main Content Area -->
            <main class="col-span-12 lg:col-span-8">
                @yield('content')
            </main>

            <!-- Include Right Sidebar -->
            @include('partials.right-sidebar')
        </div>

        @include('partials.footer')
    </div>

    @vite('resources/js/app.js')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Stack for additional scripts -->
    @stack('scripts')
</body>
</html>
