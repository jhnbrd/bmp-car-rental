<!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<header class="fixed top-0 w-full bg-white text-black shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center px-4 py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo" class="h-10 md:h-12 transition-all duration-300 hover:scale-105">
        </a>

        <!-- Desktop Navigation Menu -->
        @if (Route::has('login'))
            <nav class="hidden md:flex space-x-8 items-center uppercase font-semibold tracking-wide">
                @auth
                    <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Home</a>
                    <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Cars</a>
                    <a href="{{ route('booking') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Booking</a>
                    <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Contacts</a>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="focus:outline-none">
                            <img src="{{ asset(Auth::user()->picture_path) }}" alt="Profile" class="h-10 w-10 rounded-full object-cover border-2 border-primary hover:border-blue-700 transition-colors">
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 border border-gray-100">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ Auth::user()->customer->first_name ?? '' }}
                                    {{ Auth::user()->customer->last_name ?? '' }}
                                </p>
                                <p class="text-xs text-gray-500 truncate">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1 text-sm text-gray-700">
                                <li>
                                    <a href="{{ route('userprofile') }}" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Profile</a>
                                </li>
                            </ul>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition-colors">
                                    LOGOUT
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Home</a>
                    <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Cars</a>
                    <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Booking</a>
                    <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary transition-colors">Contacts</a>
                    <a href="{{ route('login') }}" class="bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold flex items-center gap-2 transition-all duration-300 hover:scale-105">
                        <i class="fa-solid fa-user text-lg"></i>
                        <span class="hidden md:inline">Login</span>
                    </a>
                @endauth
            </nav>
        @endif

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none transition-colors">
                <i class="fa-solid fa-bars text-3xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white w-full absolute left-0 top-full shadow-lg">
        <div class="container mx-auto px-6 py-4 flex flex-col space-y-4">
            @auth
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Cars</a>
                <a href="{{ route('booking') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Booking</a>
                <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Contacts</a>
                <a href="{{ route('userprofile') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-lg text-red-600 hover:text-red-700 py-3 font-semibold transition-colors">
                        LOGOUT
                    </button>
                </form>
            @else
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Cars</a>
                <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Booking</a>
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Contacts</a>
                <a href="{{ route('login') }}" class="bg-primary hover:bg-blue-700 text-white px-6 py-4 rounded-md font-semibold flex items-center justify-center gap-3 mt-3 transition-colors">
                    <i class="fa-solid fa-user text-lg"></i>
                    <span>Login / Register</span>
                </a>
            @endauth
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
            mobileMenuButton.classList.toggle('text-primary');
        });
    });
</script>