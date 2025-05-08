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

            <section class="relative bg-[#0f1021] text-white py-2 text-center">
                <div class="py-5">
                    <p class="text-7xl font-bold">
                        CONFIRMATION AND PAYMENT
                    </p>

                    {{-- <p class="text-xl">
                        Track the current state of your car rental, from pending confirmation to completion.
                    </p> --}}
                </div>
                <div
                    class="flex flex-col mx-70 md:mx-40 flex-row items-start gap-5 p-10 bg-gray-50 min-h-screen rounded-lg shadow-lg">
                    <!-- Right Side: rENTAL AGREEMENT POLICY -->
                    <!-- Payment Method Section -->
                    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-8">
                        <h1 class="text-4xl font-bold text-[#0f294c] mb-4 text-center">RENTAL AGREEMENT POLICY</h1>
                        <div class="bg-[#f9f9f9] rounded-lg shadow-lg p-6 mb-2 h-[550px] overflow-y-auto">
                            <div class="flex flex-col gap-6 sm:gap-8 lg:gap-10 text-lg sm:text-xl text-left text-black">
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
                                    <p>The vehicle may not be used for racing, towing or pushing other vehicles,
                                        transporting
                                        illegal goods or passengers for hire, off-road driving, or in hazardous
                                        conditions.</p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">Care of Vehicle</h3>
                                    <p>The renter must take care of the vehicle responsibly: keep it clean, park
                                        securely, avoid
                                        smoking, and use the correct fuel.</p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">Accidents and Damage</h3>
                                    <p>Any accidents, theft, or damage must be reported to the owner and local
                                        authorities
                                        immediately. The renter is liable for all damage.</p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">Traffic Violations</h3>
                                    <p>The renter is responsible for all parking tickets, traffic violations, tolls, and
                                        fines
                                        during the rental period.</p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">No Smoking Policy</h3>
                                    <p>Smoking inside the vehicle is strictly prohibited. Cleaning fees may apply if
                                        violated.
                                    </p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">Return Time</h3>
                                    <p>The vehicle must be returned on or before the agreed-upon date and time. Late
                                        returns may
                                        incur extra charges.</p>
                                </div>

                                <div>
                                    <h3 class="text-xl sm:text-2xl font-semibold">Non-Return and Non-Compliance Policy
                                    </h3>
                                    <p>If the renter fails to return the vehicle within ten (10) days of the due date
                                        without
                                        prior notice, or fails to settle damages within twenty (20) days, they will be
                                        blacklisted and reported to the authorities. The owner may also file a police
                                        report for
                                        vehicle theft, which could result in a warrant of arrest.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Agreement Section -->
                        <div class="mt-8 flex flex-col items-start sm:items-center gap-4 text-black">
                            <label class="flex items-start sm:items-center gap-2 text-sm sm:text-base">
                                <input type="checkbox" id="agreeTerms" class="accent-blue-500 w-5 h-5 mt-1 sm:mt-0" />
                                <span>I have read and agree to the Rental Agreement Policy.</span>
                            </label>
                            <a href="{{ route("process_add_booking", 1) }}" id="acceptBtn"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl disabled:opacity-50">
                                I Accept
                            </a>
                        </div>
                    </div>

                    <!-- Right Side: Payment Section -->
                    <!-- Payment Method Section -->
                    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-8">
                        <h1 class="text-4xl font-bold text-[#0f294c] mb-4 text-center">DETAILS</h1>
                        <div class="h-[558px] overflow-y-auto">
                            <div class="bg-[#f9f9f9] rounded-lg shadow-lg p-6 mb-6">
                                <div class="firstgroup mb-6 text-left">
                                    <h3 class="text-xl font-semibold text-gray-800">Car Details</h3>
                                    <img src="{{ asset('assets/sample_picture.png') }}" alt="Car Image"
                                        class="w-60 h-60 object-contain rounded-md justify-center">
                                    <p class=" text-gray-600">Brand: <span class="font-medium">Toyota</span>
                                    </p>
                                    <p class=" text-gray-600">Model: <span class="font-medium">Vios 1.3 XLE</span>
                                    </p>
                                    <p class=" text-gray-600">Transmission: <span class="font-medium">CVT</span>
                                    </p>
                                    <p class="text-gray-600">Rental Period: <span class="font-medium">01/01/2025 -
                                            01/02/2025</span>
                                    </p>
                                </div>
                            </div>
                            <div class="bg-[#f9f9f9] rounded-lg shadow-lg p-6 mb-6 text-left">
                                <div class="secondgroup mb-6">
                                    <h3 class="text-xl font-semibold text-gray-800">Customer details</h3>
                                    <div class="mt-4 space-y-3">
                                        <div>
                                            <label class="text-gray-600 block">Name:</label>
                                            <input type="text" value="Michael Shelby"
                                                class="w-full md:w-80 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0f294c]"
                                                readonly>
                                        </div>

                                        <div>
                                            <label class="text-gray-600 block">License No.:</label>
                                            <input type="text" value="L0 23 325421"
                                                class="w-full md:w-80 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0f294c]"
                                                readonly>
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <!-- Centered Payment Banner -->
                            <div class="bg-[#f9f9f9] rounded-lg shadow-lg p-6 mb-6">
                                <img src="{{ asset('assets/payment_method.png') }}" alt="Payment Logo"
                                    class="w-24 h-24 object-contain mx-auto mb-4">

                                <h2 class="text-2xl font-bold text-[#0f294c] mb-6 text-center">Payment Method</h2>

                                <!-- Include Alpine.js (place this in your <head> if not already included) -->
                                <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
                                    defer></script>

                                <form class="space-y-4 text-black" x-data="{ paymentMethod: '' }">

                                    <!-- Option 1: PayMaya -->
                                    <label
                                        class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-[#0f294c] cursor-pointer transition-all">
                                        <div class="flex items-center gap-3 flex-1">
                                            <input type="radio" name="payment" value="paymaya" x-model="paymentMethod"
                                                class="accent-[#0f294c]">
                                            <p class="font-medium text-gray-800">PayMaya</p>
                                        </div>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/payment_methods/paymaya.png') }}"
                                                class="w-6 h-6 object-contain" alt="Paymaya">
                                        </div>
                                    </label>

                                    <!-- PayMaya Extra Fields -->
                                    <div class="space-y-3" x-show="paymentMethod === 'paymaya'" x-transition>
                                        <div class="text-left">
                                            {{-- REFERENCE NUMBER --}}
                                            {{-- NAG SCRIPT RKO DRI NA PART PRE --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Ref No.</label>
                                                <input id="paymaya-ref"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]" />
                                                <!-- hidden input to store the reference number -->
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const ref = '5642' + Math.random().toString(36).substring(2, 10).toUpperCase();
                                                        document.getElementById('paymaya-ref').value = ref;
                                                    });
                                                </script>
                                                <p class="text-sm text-gray-600 mt-2 text-center mb-3">Note: Found at the header of e-receipt, input your Paymaya ref no.</p>
                                            </div>

                                            {{-- ACCOUNT NUMBER --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Account Name:</label>
                                                <input type="name"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                    placeholder="Enter Account Name">
                                            </div>

                                            {{-- AMOUNT --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Amount:</label>
                                                <input type="number"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                    placeholder="Enter Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Option 2: Gcash -->
                                    <label
                                        class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-[#0f294c] cursor-pointer transition-all">
                                        <div class="flex items-center gap-3 flex-1">
                                            <input type="radio" name="payment" value="gcash" x-model="paymentMethod"
                                                class="accent-[#0f294c]">
                                            <p class="font-medium text-gray-800">Gcash</p>
                                        </div>
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/payment_methods/gcash.png') }}"
                                                class="w-6 h-6 object-contain" alt="Gcash">
                                        </div>
                                    </label>

                                    <!-- Gcash Extra Fields -->
                                    <div class="space-y-3" x-show="paymentMethod === 'gcash'" x-transition>
                                        <div class="text-left">
                                            {{-- REFERENCE NUMBER --}}
                                            {{-- NAG SCRIPT RKO DRI NA PART PRE --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Ref No.</label>
                                                <input id="gcash-ref"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]" />
                                                <!-- hidden input to store the reference number -->
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        const ref = '5642' + Math.random().toString(36).substring(2, 10).toUpperCase();
                                                        document.getElementById('gcash-ref').value = ref;
                                                    });
                                                </script>
                                                <p class="text-sm text-gray-600 mt-2 text-center mb-3">Note: Found at the header of e-receipt, input your Gcash ref no.</p>
                                            </div>

                                            {{-- ACCOUNT NUMBER --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Account Name:</label>
                                                <input type="name"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                    placeholder="Enter Account Name">
                                            </div>

                                            {{-- AMOUNT --}}
                                            <div>
                                                <label class="block text-sm text-gray-600">Amount:</label>
                                                <input type="number"
                                                    class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                    placeholder="Enter Amount">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Option 3: Cash -->
                                    <label
                                        class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-[#0f294c] cursor-pointer transition-all">
                                        <div class="flex items-center gap-3 flex-1">
                                            <input type="radio" name="payment" value="cash" x-model="paymentMethod"
                                                class="accent-[#0f294c]">
                                            <p class="font-medium text-gray-800">Pay at the counter</p>
                                        </div>
                                        <img src="{{ asset('assets/payment_methods/money.png') }}"
                                            class="w-6 h-6 object-contain" alt="Cash">
                                    </label>

                                    {{-- Cash Extra Fields --}}
                                    <div class="space-y-3" x-show="paymentMethod === 'cash'" x-transition>
                                        <div>
                                            <label class="block text-sm text-gray-600 text-left">Select Branch:</label>
                                            <select
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]">
                                                <option value="">-- Select a Branch --</option>
                                                <option>Mintal Branch</option>
                                                <option>Ula Branch</option>
                                                <option>Mudiang Branch</option>
                                            </select>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-2">Note: Go to the selected branch and you
                                            will
                                            pay the amount refer below.</p>
                                    </div>


                                    <div class="pt-6 border-t mt-6 space-y-4">
                                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Payment Summary</h3>
                                        <div class="flex justify-between items-center">
                                            <p class="text-gray-700 font-medium text-lg">Rental Fee:</p>
                                            <p class="text-xl font-bold text-[#0f294c]">$2000.00</p>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <p class="text-gray-700 font-medium text-lg">Booking Fee:</p>
                                            <p class="text-xl font-bold text-[#0f294c]">$500.00</p>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <p class="text-gray-700 font-medium text-lg">Total Amount:</p>
                                            <p class="text-xl font-bold text-[#0f294c]">$2500.00</p>
                                        </div>
                                        <div class="mt-4 flex items-center">
                                            <input type="checkbox" id="agreement" class="mr-2">
                                            <label for="agreement" class="text-sm text-gray-600">
                                                I agree to the <a 
                                                    class="text-[#0f294c] font-semibold">Terms and Conditions</a> of the
                                                Bmp
                                                Car Rental.
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <button type="submit"
                                        class="w-full mt-6 bg-[#0f294c] text-white px-6 py-3 rounded-md text-lg font-semibold hover:bg-[#092136] transition">
                                        Book Now
                                    </button>
                                </form>

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
                        <img src="{{ asset('assets/payment_methods/visa.png') }}" alt="BMP Footer Logo"
                            class="mx-auto h-14">
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
    <!-- GENERATE REF NO,-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ref = 'REF-' + Math.random().toString(36).substring(2, 10).toUpperCase();
            document.getElementById('referenceNumber').value = ref;
        });
    </script>
</body>

</html>