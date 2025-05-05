<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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

</head>


<body class="font-sans h-screen w-full">
    <!-- MAIN BODY -->
    <div class="bg-white-100 text-black/100 h-screen w-full flex flex-col">

        <!-- HEADER LOCATE: resources/views/profile/partials/header.blade.php-->
        @section('content')
        @include('profile.partials.guestheader')

        <!-- Main Content -->
        <main class="flex-1 mt-16">
            <!-- Hero Section -->
            <!-- Hero Section -->
            <!-- FIRST CONTAINER -->
            <section class="relative bg-[#0f1021] text-white py-50 text-center flex flex-col justify-center">
                <div class="absolute inset-0 flex justify-between">
                    <img src="{{ asset('assets/carleft.svg') }}" class="w-[35%]" alt="Car Left">
                    <img src="{{ asset('assets/carright.svg') }}" class="w-[35%]" alt="Car Right">
                </div>
                <div class="relative z-10 container mx-auto px-6">
                    <h1 class="text-5xl font-bold uppercase">RENT A CAR <span class="text-[#ff335f] italic">TODAY</span>
                    </h1>
                    <p class="mt-2 text-lg uppercase font-semibold tracking-wide">EXCLUSIVE & LOW COST CAR RENTAL</p>
                    <p class="mt-2 text-sm max-w-2xl mx-auto">
                        Find the perfect rental car for your family and enjoy a smooth, stress-free journey wherever you
                        go.
                        <br>
                        With a wide range of comfortable and reliable vehicles, you get the freedom to travel on your
                        terms!
                    </p>
                    <a href="#"
                        class="mt-6 inline-block bg-white text-black px-6 py-3 rounded-md text-lg font-semibold hover:bg-gray-200 transition">
                        BOOK NOW
                    </a>
                </div>
            </section>

            <!-- SECOND CONTAINER -->
            <!-- Main Section -->
            <section class="py-12 bg-white text-black text-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 items-start max-w-6xl mx-auto">

                    <!-- Locations Section -->
                    <div class="pb-8 md:pb-0">
                        <h2 class="text-2xl font-bold mb-6">VISIT ANY OF OUR LOCATIONS</h2>
                        <div class="grid grid-cols-2 gap-6 text-lg font-medium text-[#0f294c]">
                            <span class="flex items-center gap-2 justify-center">
                                <i class="fa-solid fa-map-marker-alt text-[#0f294c] text-2xl"></i> Davao, Mintal
                            </span>
                            <span class="flex items-center gap-2 justify-center">
                                <i class="fa-solid fa-map-marker-alt text-[#0f294c] text-2xl"></i> Davao, Ula
                            </span>
                            <span class="flex items-center gap-2 justify-center">
                                <i class="fa-solid fa-map-marker-alt text-[#0f294c] text-2xl"></i> Davao, Mudiang
                            </span>
                        </div>
                    </div>

                    <!-- THIRD CONTAINER -->
                    <!-- Services Section -->
                    <div class="pb-8 md:pb-0">
                        <h2 class="text-2xl font-bold mb-6">OUR SERVICES</h2>
                        <ul class="text-left text-[#0f294c] text-lg font-medium space-y-6">
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check-circle text-[#0f294c] text-xl"></i>
                                <div>
                                    <span class="font-bold">Daily and Long-Term Rentals</span><br>
                                    <span class="text-gray-600 text-sm">
                                        Flexible rental options, whether you need a car for a day, a week, or longer.
                                    </span>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <i class="fa-solid fa-check-circle text-[#0f294c] text-xl"></i>
                                <div>
                                    <span class="font-bold">Wide Vehicle Selection</span><br>
                                    <span class="text-gray-600 text-sm">
                                        Choose from economy cars, SUVs, luxury vehicles, and more to match your needs.
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Car booking Section -->
                    <div>
                        <h2 class="text-2xl font-bold mb-6">OUR CAR booking</h2>
                        <div class="grid grid-cols-3 gap-8 justify-center items-center">
                            <img src="{{ asset('assets/body2/brands/icon_toyota.png') }}" alt="Toyota"
                                class="h-20 mx-auto">
                            <img src="{{ asset('assets/body2/brands/icon_honda.png') }}" alt="Honda"
                                class="h-20 mx-auto">
                            <img src="{{ asset('assets/body2/brands/icon_ford.png') }}" alt="Ford" class="h-20 mx-auto">
                            <img src="{{ asset('assets/body2/brands/icon_mitshubishi.png') }}" alt="Mitsubishi"
                                class="h-15 mx-auto">
                            <img src="{{ asset('assets/body2/brands/icon_suzuki.png') }}" alt="Suzuki"
                                class="h-15 mx-auto">
                            <img src="{{ asset('assets/body2/brands/icon_nissan.png') }}" alt="Nissan"
                                class="h-20 mx-auto">
                        </div>
                    </div>

                </div>


                <div class="flex flex-row gap-4 py-12 bg-white text-black max-w-6xl mx-auto">
                    <div class="flex flex-row">
                        <img src="{{ asset('assets/body2/car/mercedes.png') }}" alt="Mercedes" class="h-auto object-contain">

                    </div>

                    <div class="">
                        <span class="font-bold text-4xl">FEEL THE BEST EXPERIENCEWITH OUR RENTAL DEALS</span><br>
                        <p class="text-[#ffff] text-2xl text-left  bg-[#0f294c] px-8 py-8 rounded-md">
                            <img src="{{ asset('assets/body/logo/handshake.svg') }}" alt="handshake" class="h-20">
                            <b class="">DEAL FOR EVERY BUDGET</b>
                            <br>
                            looking for a car rental for your next trip? Here are some tips to help you find.
                        </p>
                        <br>
                        <p class="text-[#ffff] text-2xl text-left  bg-[#0f294c] px-8 py-8 rounded-md">
                            <img src="{{ asset('assets/body/logo/tag_price.svg') }}" alt="tag price" class="h-20">
                            <b>BEST PRICE GUARANTEED</b>
                            <br>
                            looking for a car rental for your next trip? Here are some tips to help you find.
                        </p>
                    </div>
                </div>

            </section>
            <!-- FORTH CONTAINER -->
            <!-- Services -->
            <section class="py-10 bg-[#0B1320] text-white min-h-screen flex flex-col items-center">
                <h2 class="text-lg font-semibold text-gray-400">BEST OFFER</h2>
                <h4 class="text-3xl font-bold">OUR FEATURED CARS</h4>

                <!-- Parent Container (Flex Column) -->
                <div class="mt-10 flex flex-col gap-12 w-full max-w-5xl">

                    <!-- VIOS -->
                    <div class="flex flex-row items-center justify-between">
                        <img src="{{ asset('assets/body3/car/vios.svg') }}" alt="Vios" class="h-auto">
                        <div class="max-w-md">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/body3/brands/logo_toyota.svg') }}" alt="Toyota" class="h-15">
                                <h1 class="text-3xl font-semibold">VIOS</h1>
                            </div>
                            <p class="text-sm text-gray-400">1.3 XLE CVT (Silver Metallic 1)</p>
                            <p class="mt-2 text-sm text-gray-300">
                                A reliable and fuel-efficient subcompact sedan known for its practicality and popularity
                                in Asian markets.
                            </p>
                            <button
                                class="mt-4 px-4 py-2 inline-block bg-white text-black rounded-md text-lg font-semibold hover:bg-gray-200 transition">BOOK
                                NOW</button>
                        </div>
                    </div>

                    <!-- MONTERO -->
                    <div class="flex flex-row items-center justify-between">

                        <div class="max-w-md text-right">
                            <div class="flex items-center justify-end gap-2">
                                <img src="{{ asset('assets/body3/brands/logo_mitshubishi.svg') }}" alt="Mitsubishi"
                                    class="h-10">
                                <h1 class="text-3xl font-semibold italic">MONTERO</h1>
                            </div>
                            <p class="text-sm text-gray-400">2.4L Black Series 2WD 8AT</p>
                            <p class="mt-2 text-sm text-gray-300">
                                A mid-size SUV offering a blend of rugged off-road capability and comfortable on-road
                                manners.
                            </p>
                            <button
                                class="mt-4 px-4 py-2 inline-block bg-white text-black rounded-md text-lg font-semibold hover:bg-gray-200 transition">BOOK
                                NOW</button>
                        </div>
                        <img src="{{ asset('assets/body3/car/montero.svg') }}" alt="Montero" class="h-auto">
                    </div>

                    <!-- RAPTOR -->
                    <div class="flex flex-row items-center justify-between">
                        <img src="{{ asset('assets/body3/car/raptor.svg') }}" alt="Raptor" class="h-auto">

                        <div class="max-w-md">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('assets/body3/brands/logo_ford.svg') }}" alt="1" class="h-20">
                                <h1 class="text-3xl font-semibold italic">RAPTOR</h1>
                            </div>
                            <p class="text-sm text-gray-400">1.3 XLE CVT (Silver Metallic 1)</p>
                            <p class="mt-2 text-sm text-gray-300">
                                A reliable and fuel-efficient subcompact sedan known for its practicality and popularity
                                in Asian markets.
                            </p>
                            <button
                                class="mt-4 px-4 py-2 inline-block bg-white text-black rounded-md text-lg font-semibold hover:bg-gray-200 transition">BOOK
                                NOW</button>
                        </div>

                    </div>

                </div>
            </section>
            <!-- FORTH CONTAINER -->
            <!-- Booking Process -->

            <div class="bg-gray-200 py-12">
                <h1 class="text-xl font-semibold text-center text-[#0F3460]">HOW IT WORKS</h1>
                <br>
                <div class="max-w-6xl mx-auto space-y-6">
                    <!-- Step 1 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="{{ asset('assets/body4/booking/booking_1.svg') }}" alt="booking 1"
                            class="w-1/2 md:w-1/3">
                        <div class="bg-[#0F3460] text-white p-6 w-full md:w-1/2">
                            <h2 class="text-lg font-bold">LOGIN OR REGISTER</h2>
                            <p>Create an account or sign in to access the car rental service.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="flex flex-col md:flex-row-reverse items-center">
                        <img src="{{ asset('assets/body4/booking/booking_2.svg') }}" alt="booking 2"
                            class="w-1/2 md:w-1/3">
                        <div class="bg-white text-black p-6 w-full md:w-1/2">
                            <h2 class="text-lg font-bold">CHOOSE CAR</h2>
                            <p>Choose from a variety of available vehicles that suit your needs.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="{{ asset('assets/body4/booking/booking_3.svg') }}" alt="booking 3"
                            class="w-1/2 md:w-1/3">
                        <div class="bg-[#0F3460] text-white p-6 md:w-1/2">
                            <h2 class="text-lg font-bold">PICK A DATE</h2>
                            <p>Select the rental start and end dates for your booking.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="flex flex-col md:flex-row-reverse items-center">
                        <img src="{{ asset('assets/body4/booking/booking_4.svg') }}" alt="booking 4"
                            class="w-1/2 md:w-1/3">
                        <div class="bg-white text-black p-6 w-full md:w-1/2">
                            <h2 class="text-lg font-bold">SELECT A BRANCH</h2>
                            <p>Choose a convenient pickup and drop-off location.</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <img src="{{ asset('assets/body4/booking/booking_5.svg') }}" alt="booking 5"
                            class="w-1/2 md:w-1/3">
                        <div class="bg-[#0F3460] text-white p-6 w-full md:w-1/2">
                            <h2 class="text-lg font-bold">DRIVE & ENJOY</h2>
                            <p>Pick up your car and enjoy a smooth and hassle-free ride!</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- FIFTH CONTAINER -->
            <section
                class="relative py-10 text-center bg-gray-100 text-black min-h-screen flex flex-col justify-center">

                <!-- Background Image -->
                <img src="{{ asset('assets/body5/line_up_car.png') }}" alt="Line-up cars"
                    class="absolute top-0 left-0 w-full h-full object-cover opacity-50">

                <!-- Content -->
                <div class="relative z-10 flex flex-col items-center">

                    <!-- Heading -->
                    <h2 class="text-4xl font-bold">GET IN TOUCH</h2>
                    <p class="text-lg">Want to get in touch? We’d love to hear from you. Here’s how you can reach us</p>

                    <!-- Contact Cards -->
                    <div class="flex flex-row items-center justify-center gap-10 mt-10">

                        <!-- Sales Contact -->
                        <div class="bg-white shadow-lg rounded-lg p-6 max-w-sm text-center">
                            <img src="{{ asset('assets/body5/telephone.svg') }}" alt="telephone" class="h-20 mx-auto">
                            <h3 class="font-bold text-xl mt-4">TALK TO SALES</h3>
                            <p class="text-gray-600">Connect with our sales team for personalized recommendations and
                                exclusive deals.</p>
                            <p class="mt-2 font-semibold text-blue-600">+639 123 456 88</p>
                            <p class="font-semibold text-blue-600">+639 987 621 31</p>
                        </div>

                        <!-- Email Contact -->
                        <div class="bg-white shadow-lg rounded-lg p-9 max-w-sm text-center">
                            <img src="{{ asset('assets/body5/message.svg') }}" alt="message" class="h-20 mx-auto">
                            <h3 class="font-bold text-xl mt-4">EMAIL US</h3>
                            <p class="text-gray-600">Reach out to us via email for inquiries, support, or assistance
                                anytime.</p>
                            <p class="mt-2 font-semibold text-blue-600">bmpcarrentals@gmail.com</p>
                        </div>

                    </div>

                </div>
            </section>


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
        </main>
    </div>
</body>

</html>