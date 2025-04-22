<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>


<body class="font-sans h-screen w-full">
    <!-- MAIN BODY -->
    <div class="bg-white-100 text-black/100 h-screen w-full flex flex-col">

        <!-- HEADER LOCATE: resources/views/profile/partials/header.blade.php-->
        @section('content')
        @include('profile.partials.userheader')

        <!-- Main Content -->
        <main class="flex-1 mt-16">
            <!-- Hero Section -->
            <!-- Hero Section -->
            <!-- FIRST CONTAINER -->

            <section class="relative bg-[#0f1021] text-white py-10 text-center">
                <div class="py-10">
                    <p class="text-7xl font-bold">
                        BOOKING STATUS
                    </p>
    
                    <p class="text-xl">
                        Track the current state of your car rental, from pending confirmation to completion.
                    </p>
                </div>


                <div class="grid grid-cols-4 justify-center gap-[5%] mx-[10%]">
                    <!-- flex flex-row-->
                    <!-- FIRST CARD -->
                    <div class="max-w-md mx-auto my-auto bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                        <div class="bg-gray-100 p-4 flex justify-center">
                            <img src="{{ asset('assets/user_carpage/car_vios.svg') }}" class="w-3/4" alt="Toyota Vios">
                        </div>
                        <div class="p-5 text-center">
                            <div class="flex items-center justify-center mb-2">
                                <img src="{{ asset('assets/user_carpage/logo_toyota.svg') }}" class="w-12 mr-2"
                                    alt="Toyota Logo">
                                <h5 class="text-2xl font-bold text-gray-900">VIOS</h5>
                            </div>
                            <div class="bg-blue-900 text-white p-4 rounded-lg grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-car"></i>
                                    <span>SEDAN</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-door-open"></i>
                                    <span>4-5 DOORS</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-user-group"></i>
                                    <span>5 PEOPLE</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-snowflake"></i>
                                    <span>AC / HEATER</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <p class="text-gray-900 text-xl font-bold">₱ 500 / DAY</p>
                                <a href="#"
                                    class="inline-flex items-center px-4 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                    RENT
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 14 10">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>


            <!-- footer -->
            <div class="flex flex-col min-h-auto bg-white">
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
            <p>Explore Our Premium Car Brands for Rent
                Choose from a Wide Range of Trusted and Automakers.</p>
        </main>
    </div>
</body>

</html>