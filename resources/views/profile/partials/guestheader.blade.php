 <!-- Header -->
 <header class="fixed top-0 w-full bg-white text-black py-5">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <img src="{{asset('assets/bmp_logo.png')}}" alt="BMP Logo" class="h-8">
            <!-- Update with actual logo path -->
        </a>

        <!-- Navigation Menu -->
        @if (Route::has('login'))
        <nav class="flex space-x-8 uppercase font-semibold tracking-wide">
            @auth
                <a href="{{ url('/dashboard') }}" class="hover:text-gray-700">Dashboard</a>
            @else
            <a href="{{ route('home') }}" class="hover:text-gray-700">Home</a>
            <a href="{{ route('cars') }}" class="hover:text-gray-700" style="margin-left: 0 !important;">Cars</a>
            <a href="{{ route('login') }}" class="hover:text-gray-700">Booking</a>
            <a href="{{ route('home') }}" class="hover:text-gray-700">Contacts</a>
            <a href="{{ route('login') }}" class="hover:text-gray-700">
                <i class="fa-solid fa-user text-lg"></i>
            </a>
            @endif
        </nav>
        @endif
    </div>
</header>