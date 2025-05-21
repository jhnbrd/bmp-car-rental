<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<header class="fixed top-0 w-full bg-white text-black shadow-sm z-50">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo" class="h-10 md:h-12 transition-all duration-300 hover:scale-105">
        </a>

        <!-- Desktop Navigation Menu -->
        @if (Route::has('login'))
        <nav class="hidden md:flex items-center space-x-8">
            @auth
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Cars</a>
                <a href="{{ route('booking') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Booking</a>
                <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Contact Us</a>
                
                <!-- Profile Dropdown (Desktop) -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                        <img src="{{ asset(Auth::user()->picture_path) }}" alt="Profile" 
                             class="h-10 w-10 rounded-full object-cover border-2 border-gray-200 hover:border-primary transition-colors">
                    </button>

                    <div x-show="open" @click.away="open = false" x-transition
                         class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg z-50 border border-gray-100">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-900">
                                {{ Auth::user()->customer->first_name ?? '' }}
                                {{ Auth::user()->customer->last_name ?? '' }}
                            </p>
                            <p class="text-xs text-gray-500 truncate">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <ul class="py-1">
                            <li>
                                <a href="{{ route('userprofile') }}" 
                                   class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    My Profile
                                </a>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50 border-t border-gray-100 flex items-center gap-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Guest Navigation -->
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Cars</a>
                <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Book Now</a>
                <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Contact Us</a>
                <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors flex items-center gap-1">
                    <i class="fa-solid fa-user text-lg"></i>
                    <span>Login</span>
                </a>
            @endauth
        </nav>
        @endif

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none transition-colors">
                <i class="fa-solid fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Includes Profile Link) -->
    <div id="mobile-menu" class="hidden md:hidden bg-white w-full absolute left-0 top-full shadow-lg">
        <div class="container mx-auto px-6 py-4 flex flex-col space-y-4">
            @auth
                <!-- Profile Section (Mobile) -->
                <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                    <img src="{{ asset(Auth::user()->picture_path) }}" alt="Profile" 
                         class="h-12 w-12 rounded-full object-cover border-2 border-primary">
                    <div>
                        <p class="font-semibold text-gray-900">
                            {{ Auth::user()->customer->first_name ?? '' }}
                            {{ Auth::user()->customer->last_name ?? '' }}
                        </p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                
                <a href="{{ route('userprofile') }}" class="flex items-center gap-2 text-gray-700 hover:text-primary py-2 font-medium transition-colors">
                    My Profile
                </a>
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Cars</a>
                <a href="{{ route('booking') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Booking</a>
                <a href="{{ route('contact_user') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Contact Us</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 w-full text-left text-gray-700 hover:text-primary py-2 font-medium transition-colors">
                        Logout
                    </button>
                </form>
            @else
                <!-- Guest Mobile Navigation -->
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Cars</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Book Now</a>
                <a href="{{ route('contact_user') }}" class="text-gray-700 hover:text-primary py-2 font-medium transition-colors">Contact Us</a>
                <a href="{{ route('login') }}" class="flex items-center gap-2 text-gray-700 hover:text-primary py-2 font-medium transition-colors">
                    <i class="fa-solid fa-user"></i> Login
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