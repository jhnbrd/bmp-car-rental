<!-- Header -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<header class="fixed top-0 w-full bg-white text-black py-4 z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo" class="h-8">
        </a>

        <!-- Navigation Menu -->
        @if (Route::has('login'))
            <nav class="flex space-x-8 items-center uppercase font-semibold tracking-wide">
                @auth
                    <a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Home</a>
                    <a href="{{ route('cars') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Cars</a>
                    <a href="{{ route('booking') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Booking</a>
                    <a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Contacts</a>

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }" style="margin-top: 2.6px;">
                        <button @click="open = !open" class="focus:outline-none">
                            <img src="{{ asset('assets/shelby.jpg') }}" alt="Profile" class="h-10 w-10 rounded-full object-cover">
                        </button>

                        <div x-show="open" @click.away="open = false" x-transition
                             class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg z-50">
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-600">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ Auth::user()->customer->first_name ?? '' }}
                                    {{ Auth::user()->customer->last_name ?? '' }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-300 truncate">
                                    {{ Auth::user()->email }}
                                </p>
                            </div>
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Settings</a>
                                </li>
                            </ul>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-400 dark:hover:text-white">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                <a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Home</a>
                <a href="{{ route('cars') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Cars</a>
                <a href="{{ route('booking') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Booking</a>
                <a href="{{ route('home') }}" class="hover:text-gray-700 dark:hover:text-gray-300">Contacts</a>
                <a href="{{ route('login') }}" class="hover:text-gray-700 dark:hover:text-gray-300">
                    <i class="fa-solid fa-user text-lg"></i>
                </a>
                @endauth
            </nav>
        @endif
    </div>
</header>