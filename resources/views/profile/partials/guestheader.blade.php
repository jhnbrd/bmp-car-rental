<!-- Header -->
<header class="fixed top-0 w-full bg-white text-black shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center px-2 py-4">
        <!-- Logo - Made larger -->
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{asset('assets/bmp_logo.png')}}" alt="BMP Logo" class="h-10 md:h-12 transition-all duration-300 hover:scale-105">
        </a>

        <!-- Desktop Navigation Menu - Larger text -->
        @if (Route::has('login'))
        <nav class="hidden md:flex items-center space-x-10 font-semibold">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Dashboard</a>
            @else
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors" style="margin-left: 0 !important;">Cars</a>
                <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Book Now</a>
                <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary font-semibold transition-colors">Contact Us</a>
                <a href="{{ route('login') }}" class="bg-primary hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold flex items-center gap-2 transition-all duration-300 hover:scale-105 text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span>Login</span>
                </a>
            @endauth
        </nav>
        @endif

        <!-- Mobile Menu Button - Larger -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none transition-colors">
                <i class="fa-solid fa-bars text-3xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu - Larger text -->
    <div id="mobile-menu" class="hidden md:hidden bg-white w-full absolute left-0 top-full shadow-lg">
        <div class="container mx-auto px-6 py-4 flex flex-col space-y-5">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Dashboard</a>
            @else
                <a href="{{ route('home') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Home</a>
                <a href="{{ route('cars') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors" style="margin-top: 0 !important;">Cars</a>
                <a href="{{ route('login') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Book Now</a>
                <a href="{{ route('contact_user') }}" class="text-lg text-gray-700 hover:text-primary py-3 border-b border-gray-100 font-semibold transition-colors">Contact Us</a>
                <a href="{{ route('login') }}" class="bg-primary hover:bg-blue-700 text-white px-6 py-4 rounded-md font-semibold flex items-center justify-center gap-3 mt-3 transition-colors text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
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