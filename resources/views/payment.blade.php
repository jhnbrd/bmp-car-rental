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
                        CONFIRMATION AND PAYMENT
                    </p>

                    {{-- <p class="text-xl">
                        Track the current state of your car rental, from pending confirmation to completion.
                    </p> --}}
                </div>
                <div class="flex flex-col mx-70 md:mx-40 flex-row items-start gap-5 p-10 bg-gray-50 min-h-screen">

                    <!-- Left Side: Booking Summary -->
                    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-8 text-left">
                        <h1 class="text-4xl font-bold text-[#0f294c] mb-6 text-center">Booking Summary</h1>

                        <div class="container-body mb-4 text-lg">
                            <div class="bg-[#d9d9d9] rounded-lg p-6 mb-6">
                                <div class="firstgroup mb-6">
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

                        </div>
                    </div>


                    <!-- Right Side: Payment Section -->
                    <!-- Payment Method Section -->
                    <div class="w-full md:w-1/2 bg-white shadow-md rounded-lg p-8">
                        <h1 class="text-4xl font-bold text-[#0f294c] mb-6 text-center">Details</h1>
                        <div class="bg-[#d9d9d9] rounded-lg p-6 mb-6 text-left">
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

                                    <div>
                                        <label class="text-gray-600 block">License Exp:</label>
                                        <input type="date" value="2025-01-01"
                                            class="w-full md:w-80 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0f294c]"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-gray-600 block">Phone Number:</label>
                                        <input type="text" value="0912 343 5432"
                                            class="w-full md:w-80 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0f294c]"
                                            readonly>
                                    </div>

                                    <div>
                                        <label class="text-gray-600 block">Address:</label>
                                        <input type="text" value="Purok 1, Pogi St., Davao City"
                                            class="w-full md:w-80 bg-gray-100 border border-gray-300 rounded-md px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#0f294c]"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- Centered Payment Banner -->
                        <div class="bg-[#d9d9d9] rounded-lg p-6 mb-6">
                            <img src="{{ asset('assets/payment_method.png') }}" alt="Payment Logo"
                                class="w-24 h-24 object-contain mx-auto mb-4">

                            <h2 class="text-2xl font-bold text-[#0f294c] mb-6 text-center">Payment Method</h2>

                            <!-- Include Alpine.js (place this in your <head> if not already included) -->
                            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

                            <form class="space-y-4 text-black" x-data="{ paymentMethod: '' }">
                                <!-- Option 1: E-wallet -->
                                <label
                                    class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-[#0f294c] cursor-pointer transition-all">
                                    <div class="flex items-center gap-3 flex-1">
                                        <input type="radio" name="payment" value="ewallet" x-model="paymentMethod"
                                            class="accent-[#0f294c]">
                                        <p class="font-medium text-gray-800">E-wallet</p>
                                    </div>
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/payment_methods/paypal.png') }}"
                                            class="w-6 h-6 object-contain" alt="paypal">
                                        <img src="{{ asset('assets/payment_methods/gcash.png') }}"
                                            class="w-6 h-6 object-contain" alt="Gcash">
                                        <img src="{{ asset('assets/payment_methods/paymaya.png') }}"
                                            class="w-6 h-6 object-contain" alt="Paymaya">
                                        <img src="{{ asset('assets/payment_methods/cliqq.png') }}"
                                            class="w-6 h-6 object-contain" alt="Cliqq">
                                        <img src="{{ asset('assets/payment_methods/coinPH.jpg') }}"
                                            class="w-6 h-6 object-contain" alt="coinPH">
                                            <img src="{{ asset('assets/payment_methods/billease.png') }}"
                                            class="w-6 h-6 object-contain" alt="billease">
                                    </div>
                                </label>

                                <!-- E-wallet Extra Fields -->
                                <div class="space-y-3" x-show="paymentMethod === 'ewallet'" x-transition>
                                    <div class="text-left">
                                        <div x-data="{ open: false, selected: null, wallets: [
                                            { name: 'Gcash', icon: '{{ asset('assets/payment_methods/gcash.png') }}' },
                                            { name: 'Paymaya', icon: '{{ asset('assets/payment_methods/paymaya.png') }}' },
                                            { name: 'PayPal', icon: '{{ asset('assets/payment_methods/paypal.png') }}' },
                                            { name: '7-Eleven Cliqq', icon: '{{ asset('assets/payment_methods/cliqq.png') }}' },
                                            { name: 'Coins.ph', icon: '{{ asset('assets/payment_methods/coinPH.jpg') }}' },
                                            { name: 'Billease', icon: '{{ asset('assets/payment_methods/billease.png') }}' }
                                        ] }" class="relative w-full">
                                            <label class="block text-sm text-gray-600 text-left mb-1">Select E-Wallet:</label>
                                        
                                            <!-- Dropdown Button -->
                                            <button @click="open = !open" type="button"
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 flex items-center justify-between focus:ring-2 focus:ring-[#0f294c]">
                                                <template x-if="selected">
                                                    <div class="flex items-center gap-2">
                                                        <img :src="selected.icon" class="w-5 h-5 object-contain" />
                                                        <span x-text="selected.name"></span>
                                                    </div>
                                                </template>
                                                <template x-if="!selected">
                                                    <span class="text-gray-400">-- Select E-wallet --</span>
                                                </template>
                                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </button>
                                        
                                            <!-- Dropdown List -->
                                            <ul x-show="open" @click.away="open = false"
                                                class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg max-h-60 overflow-auto">
                                                <template x-for="wallet in wallets" :key="wallet.name">
                                                    <li @click="selected = wallet; open = false"
                                                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 cursor-pointer">
                                                        <img :src="wallet.icon" class="w-5 h-5 object-contain" />
                                                        <span x-text="wallet.name"></span>
                                                    </li>
                                                </template>
                                            </ul>
                                        
                                            <!-- Hidden input for form submission -->
                                            {{-- <input type="hidden" name="e_wallet" :value="selected ? selected.name : ''"> --}}
                                        </div>
                                        
                                        <div>
                                            <label class="block text-sm text-gray-600">Ref No.</label>
                                            <input id="e-wallet-ref"
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]" />
                                            <!-- hidden input to store the reference number -->
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const ref = '5642' + Math.random().toString(36).substring(2, 10).toUpperCase();
                                                    document.getElementById('e-wallet-ref').value = ref;
                                                });
                                            </script>
                                            <p class="text-sm text-gray-600 mt-2 text-center mb-3">Note: Input here the
                                                reference number according to your E-wallet you select.</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600">Account Name:</label>
                                            <input type="text"
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                placeholder="Enter Account Name">
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600">Account Number:</label>
                                            <input type="text"
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                placeholder="Enter Account Number">
                                        </div>
                                        <div>
                                            <label class="block text-sm text-gray-600">Amount:</label>
                                            <input type="number"
                                                class="w-full bg-gray-100 border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-[#0f294c]"
                                                placeholder="Enter Amount">
                                        </div>
                                    </div>
                                </div>

                                <!-- Option 2: Cash -->
                                <label
                                    class="flex items-center p-4 border border-gray-300 rounded-lg hover:border-[#0f294c] cursor-pointer transition-all">
                                    <div class="flex items-center gap-3 flex-1">
                                        <input type="radio" name="payment" value="cash" x-model="paymentMethod"
                                            class="accent-[#0f294c]">
                                        <p class="font-medium text-gray-800">Cash</p>
                                    </div>
                                    <img src="{{ asset('assets/payment_methods/money.png') }}"
                                        class="w-6 h-6 object-contain" alt="Cash">
                                </label>

                                <!-- Cash Extra Fields -->
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
                                    <p class="text-sm text-gray-600 mt-2">Note: Go to the selected branch and you will
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
                                            I agree to the <a href="{{route('terms_condition')}}"
                                                class="text-[#0f294c] font-semibold">Terms and Conditions</a> of the Bmp
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