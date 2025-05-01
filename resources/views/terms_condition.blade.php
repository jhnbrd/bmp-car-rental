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

            <section class="relative bg-[#0f1021] text-white py-10">
                <div
                    class="max-w-screen-xl mx-auto py-10 px-4 sm:px-6 lg:px-20 bg-white text-black rounded-lg shadow-lg">

                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('assets/bmp_logo.png') }}" alt="Company Logo"
                        class="max-w-[150px] sm:max-w-[200px] md:max-w-[250px] mx-auto" />
                    </div>

                    <div class="py-10 text-center">
                        <h2 class="text-3xl sm:text-4xl font-bold">RENTAL AGREEMENT POLICY</h2>
                    </div>

                    <div class="flex flex-col gap-6 sm:gap-8 lg:gap-10 text-lg sm:text-xl">
                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Authorized Drivers Only</h3>
                            <p>Only the renter and authorized drivers are permitted to operate the vehicle.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Valid License Requirement</h3>
                            <p>The renter or any driver must possess a valid driver’s license.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">No Unauthorized Use</h3>
                            <p>The vehicle may not be used for racing, towing or pushing other vehicles, transporting
                                illegal goods or passengers for hire, off-road driving, or in hazardous conditions.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Care of Vehicle</h3>
                            <p>The renter must take care of the vehicle responsibly: keep it clean, park securely, avoid
                                smoking, and use the correct fuel.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Accidents and Damage</h3>
                            <p>Any accidents, theft, or damage must be reported to the owner and local authorities
                                immediately. The renter is liable for all damage.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Traffic Violations</h3>
                            <p>The renter is responsible for all parking tickets, traffic violations, tolls, and fines
                                during the rental period.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">No Smoking Policy</h3>
                            <p>Smoking inside the vehicle is strictly prohibited. Cleaning fees may apply if violated.
                            </p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Return Time</h3>
                            <p>The vehicle must be returned on or before the agreed-upon date and time. Late returns may
                                incur extra charges.</p>
                        </div>

                        <div>
                            <h3 class="text-xl sm:text-2xl font-semibold">Non-Return and Non-Compliance Policy</h3>
                            <p>If the renter fails to return the vehicle within ten (10) days of the due date without
                                prior notice, or fails to settle damages within twenty (20) days, they will be
                                blacklisted and reported to the authorities. The owner may also file a police report for
                                vehicle theft, which could result in a warrant of arrest.</p>
                        </div>

                        <!-- Agreement Section -->
                        <div class="mt-8 flex flex-col items-start sm:items-center gap-4">
                            <label class="flex items-start sm:items-center gap-2 text-sm sm:text-base">
                                <input type="checkbox" id="agreeTerms" class="accent-blue-500 w-5 h-5 mt-1 sm:mt-0" />
                                <span>I have read and agree to the Rental Agreement Policy.</span>
                            </label>
                            <a href="{{ route("payment") }}" id="acceptBtn"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl disabled:opacity-50">
                                I Accept
                            </a>
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
                        <p class="mt-5 text-sm">© 2025, BMP Car Rental. All Rights Reserved
                    </div>
                </footer>

            </div>
            Explore Our Premium Car Brands for Rent
            Choose from a Wide Range of Trusted and Automakers.
        </main>
    </div>
</body>

</html>