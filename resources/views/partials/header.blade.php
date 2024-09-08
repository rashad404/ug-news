<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="/" class="text-2xl font-bold text-gray-800">
            UG News
        </a>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-8">
            <a href="/" class="text-gray-700 hover:text-blue-500">Home</a>
            <!-- Dynamically loaded categories -->
            @foreach ($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="text-gray-700 hover:text-blue-500">
                    {{ $category->name }}
                </a>
            @endforeach
            <a href="/contact" class="text-gray-700 hover:text-blue-500">Contact</a>
        </nav>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <nav class="px-4 py-2 bg-white border-t border-gray-200">
            <a href="/" class="block py-2 text-gray-700 hover:text-blue-500">Home</a>
            <!-- Dynamically loaded categories -->
            @foreach ($categories as $category)
                <a href="/categories/{{ $category->slug }}" class="block py-2 text-gray-700 hover:text-blue-500">
                    {{ $category->name }}
                </a>
            @endforeach
            <a href="/contact" class="block py-2 text-gray-700 hover:text-blue-500">Contact</a>
        </nav>
    </div>
</header>

<script>
    // Toggle Mobile Menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    });
</script>
