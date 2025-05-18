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
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
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

            <section class="relative bg-[#0f1021] text-white py-10">
                <div class="relative z-10 max-w-7xl mx-auto flex flex-col space-y-10 px-4 py-10">

                    <!-- HEADER TOP CENTERED -->
                    <div class="flex flex-col justify-center items-center text-center space-y-4">
                        <h2 class="text-4xl font-bold">GET IN TOUCH</h2>
                        <p class="text-lg">Want to get in touch? We’d love to hear from you. Here’s how you can reach us
                        </p>
                    </div>

                    <!-- BOTTOM GRID: Contact Cards Left | Form Right -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                        <!-- LEFT: Contact Cards -->
                        <div class="space-y-9">
                            <!-- Sales Contact Card -->
                            <div class="bg-white shadow-lg rounded-lg p-7 text-center text-gray-800">
                                <img src="{{ asset('assets/body5/telephone.svg') }}" alt="telephone"
                                    class="h-20 mx-auto">
                                <h3 class="font-bold text-xl mt-4">TALK TO SALES</h3>
                                <p class="text-gray-600">Connect with our sales team for personalized recommendations
                                    and exclusive deals.</p>
                                {{-- <p class="mt-2 font-semibold text-blue-600">+639 123 456 88</p> --}}
                                <p class="font-semibold text-blue-600">+639 987 621 31</p>
                            </div>

                            <!-- Email Contact Card -->
                            <div class="bg-white shadow-lg rounded-lg p-7 text-center text-gray-800">
                                <img src="{{ asset('assets/body5/message.svg') }}" alt="message" class="h-20 mx-auto">
                                <h3 class="font-bold text-xl mt-4">EMAIL US</h3>
                                <p class="text-gray-600">Reach out to us via email for inquiries, support, or assistance
                                    anytime.</p>
                                <p class="mt-2 font-semibold text-blue-600">bmpcarrentals@gmail.com</p>
                            </div>
                        </div>

                        <!-- RIGHT: Contact Form -->
                        <div class="bg-white rounded-lg shadow-lg p-8 text-gray-800 space-y-5">
                            <h3 class="font-bold text-xl text-center">VISIT US</h3>
                            <input type="text" placeholder="Enter your Name"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                                name="name" id="name">
                            <input type="email" placeholder="Enter your Email"
                                class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"
                                name="email" id="email">
                            <textarea placeholder="Your Message"
                                class="w-full p-3 border border-gray-300 rounded-md h-32 resize-none focus:outline-none focus:ring-2 focus:ring-blue-600"
                                name="message" id="message"></textarea>
                            <button
                                class="bg-blue-600 text-white px-6 py-3 rounded-md w-full hover:bg-blue-700 transition duration-300">Find
                                Us</button>
                            <div class="text-center text-gray-600 space-y-1">
                                <p>123 Main Street, City, Country</p>
                                <p>Open Monday to Friday, 9 AM to 5 PM</p>
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
                        <p>Explore Our Premium Car Brands for Rent
                            Choose from a Wide Range of Trusted and Automakers.</p>
                    </div>
                </footer>

            </div>

        </main>
    </div>
</body>

</html>