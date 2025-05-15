<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'BMP Car Rental System') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/bmp_icon.ico') }}">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
            darkMode: 'class', // or 'media'
            theme: {
              extend: {
                colors: {
                  primary: '#1D4ED8',
                },
              },
            },
          }
        </script>
        <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-col min-h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            
            <!-- Footer Section -->
            <footer class="bg-white py-10 text-[#0f294c] text-sm text-center">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Quick Links -->
                    <div>
                        <h3 class="font-bold text-base">QUICK LINKS</h3>
                        <ul class="space-y-2 mt-2">
                            <li><a href="#" class="hover:underline text-sm">Home</a></li>
                            <li><a href="#" class="hover:underline text-sm">Cars</a></li>
                            <li><a href="#" class="hover:underline text-sm">Bookings</a></li>
                            <li><a href="#" class="hover:underline text-sm">Contacts</a></li>
                        </ul>
                    </div>

                    <!-- About Us -->
                    <div>
                        <h3 class="font-bold text-base">ABOUT US</h3>
                        <ul class="space-y-2 mt-2">
                            <li><a href="#" class="hover:underline text-sm">Services</a></li>
                            <li><a href="#" class="hover:underline text-sm">Rental Deals</a></li>
                            <li><a href="#" class="hover:underline text-sm">Car Brands</a></li>
                            <li><a href="#" class="hover:underline text-sm">Branches</a></li>
                        </ul>
                    </div>

                    <!-- Customer Support -->
                    <div>
                        <h3 class="font-bold text-base">CUSTOMER SUPPORT</h3>
                        <ul class="space-y-2 mt-2">
                            <li><a href="#" class="hover:underline text-sm">Help Center</a></li>
                            <li><a href="#" class="hover:underline text-sm">Terms and Conditions</a></li>
                            <li><a href="#" class="hover:underline text-sm">Privacy Policy</a></li>
                            <li><a href="#" class="hover:underline text-sm">Damage & Return Policy</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media and Copyright -->
                <div class="mt-10">
                    <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Footer Logo" class="mx-auto h-14">
                    <div class="flex justify-center space-x-6 mt-4">
                        <a href="#" class="text-[#0f294c]"><i class="fab fa-x-twitter text-2xl"></i></a>
                        <a href="#" class="text-[#0f294c]"><i class="fab fa-facebook text-2xl"></i></a>
                        <a href="#" class="text-[#0f294c]"><i class="fab fa-instagram text-2xl"></i></a>
                        <a href="#" class="text-[#0f294c]"><i class="fab fa-tiktok text-2xl"></i></a>
                        <a href="#" class="text-[#0f294c]"><i class="fab fa-github text-2xl"></i></a>
                    </div>
                    <p class="mt-5 text-sm">© 2025, BMP Car Rental. All Rights Reserved</p>
                </div>
            </footer>
        </div>
    </body>
</html>
