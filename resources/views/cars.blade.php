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

            <section class="relative bg-[#0f1021] text-white pt-10 text-center">
                <div class="py-10">
                    <p class="text-7xl font-bold">
                        AVAILABLE CARS
                    </p>

                    <p class="text-xl">Choose from a wide range of vehicles,
                        tailored to your preferences and budget.
                        <br>
                        From compact cars for city drives to luxury
                        vehicles for an elegant experience,
                        <br>
                        we have options for every kind of journey.
                    </p>
                </div>


                <div class="grid grid-cols-4 justify-center mx-[10%]">
                @foreach ($carModels as $car)
                    <!-- CAR CARD -->
                    <div class="max-w-md mx-auto my-auto bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200" style="margin-block: 5%;">
                        <div class="bg-gray-100 p-4 flex justify-center h-[150px] w-[270px]">
                            <img src="{{ asset($car->img_file_path) }}" class="w-3/4 object-contain h-full" alt="">
                        </div>
                        <div class="p-5 text-center w-[270px] h-[240px]">
                            <div class="flex items-center justify-center mb-2 h-[48px]">
                                @if ($car->brand === 'Toyota')
                                    <img src="{{ asset('assets/user_carpage/logo_toyota.svg') }}" class="w-12 mr-2" alt="Toyota Logo">
                                @elseif ($car->brand === 'Nissan')
                                    <img src="{{ asset('assets/user_carpage/logo_nissan.svg') }}" class="w-12 mr-2" alt="Nissan Logo">
                                @elseif ($car->brand === 'Mitsubishi')
                                    <img src="{{ asset('assets/user_carpage/logo_mitsubishi.svg') }}" class="w-12 mr-2" alt="Mitsubishi Logo">
                                @elseif ($car->brand === 'Suzuki')
                                    <img src="{{ asset('assets/user_carpage/logo_suzuki.svg') }}" class="w-12 mr-2" alt="Suzuki Logo">
                                @elseif ($car->brand === 'Honda')
                                    <img src="{{ asset('assets/user_carpage/logo_honda.svg') }}" class="w-12 mr-2" alt="Honda Logo">
                                @elseif ($car->brand === 'Ford')
                                    <img src="{{ asset('assets/user_carpage/logo_ford.svg') }}" class="w-12 mr-2" alt="Ford Logo">
                                @else
                                    <span class="w-12 mr-2"></span> {{-- Placeholder if no specific logo --}}
                                @endif
                                <h5 class="text-2xl font-bold text-gray-900">{{ $car->model_name }}</h5>
                            </div>
                            <div class="bg-blue-900 text-white p-4 rounded-lg grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-car"></i>
                                    <span>{{ strtoupper($car->car_type) }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-door-open"></i>
                                    <span>{{ $car->transmission }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-user-group"></i>
                                    <span>{{ $car->seat_capacity }} PEOPLE</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fa-solid fa-snowflake"></i>
                                    <span>{{ $car->fuel_type }}</span>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <p class="text-gray-900 text-xl font-bold">
                                    @if ($car->car_type === 'Sedan')
                                        ₱ 500 / DAY
                                    @elseif ($car->car_type === 'SUV')
                                        ₱ 1,000 / DAY
                                    @elseif ($car->car_type === 'Pick-up')
                                        ₱ 1,500 / DAY
                                    @else
                                        {{-- Optional: Default price or handle unknown car types --}}
                                        ₱ {{ $defaultPrice ?? 'N/A' }} / DAY
                                    @endif
                                </p>
                                <!-- Trigger Button -->
                                <button data-modal-target="carModal-{{ $car->id }}" data-modal-toggle="carModal-{{ $car->id }}"
                                class="inline-flex items-center px-4 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                RENT
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 14 10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
            <div class="bg-[#0f1021] flex flex-row mx-auto">
                <div class="py-8 mx-auto flex justify-end">
                    {{ $carModels->links() }}
                </div>
            </div>
            

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
    <!-- Modal -->
    @foreach ($carModels as $car)
    <div id="carModal-{{ $car->id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-7xl max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <div class="grid grid-cols-2">
                    <div class="bg-[#012E57] text-white p-6 flex flex-col items-center justify-center">
                        <img src="{{ asset($car->img_file_path) }}" alt="{{ $car->model_name }}" class="mx-auto w-200 object-contain">
                    </div>

                    <div class="p-8">
                        <div class="flex flex-row flex-start items-center mb-5">
                            @if ($car->brand === 'Toyota')
                            <img src="{{ asset('assets/user_carpage/logo_toyota.svg') }}" alt="Toyota Logo" class="h-15">
                            @elseif ($car->brand === 'Nissan')
                            <img src="{{ asset('assets/user_carpage/logo_nissan.svg') }}" alt="Nissan Logo" class="h-15">
                            @elseif ($car->brand === 'Mitsubishi')
                            <img src="{{ asset('assets/user_carpage/logo_mitsubishi.svg') }}" alt="Mitsubishi Logo" class="h-15">
                            @elseif ($car->brand === 'Suzuki')
                            <img src="{{ asset('assets/user_carpage/logo_suzuki.svg') }}" alt="Suzuki Logo" class="h-15">
                            @elseif ($car->brand === 'Honda')
                            <img src="{{ asset('assets/user_carpage/logo_honda.svg') }}" alt="Honda Logo" class="h-15">
                            @elseif ($car->brand === 'Ford')
                            <img src="{{ asset('assets/user_carpage/logo_ford.svg') }}" alt="Ford Logo" class="h-15">
                            @else
                            <span class="mx-auto h-15"></span>
                            @endif
                            <div class="flex flex-col mx-5">
                                <h2 class="text-4xl font-bold text-blue-900">{{ $car->model_name }} {{$car->model_year}}</h2>
                                <p class="text-xl text-blue-600 font-medium">{{ $car->model_desc }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                            <div>
                                <p class="font-semibold">Engine Type</p>
                                <p>{{ strtoupper($car->engine_type) }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Engine Displacement</p>
                                <p>{{ strtoupper($car->engine_displacement) }} cc</p>
                            </div>
                            <div>
                                <p class="font-semibold">Car Type</p>
                                <p>{{ strtoupper($car->car_type) }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Transmission</p>
                                <p>{{ $car->transmission }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Seating Capacity</p>
                                <p>{{ $car->seat_capacity }} People</p>
                            </div>
                            <div>
                                <p class="font-semibold">Fuel Type</p>
                                <p>{{ $car->fuel_type }}</p>
                            </div>
                            <div>
                                <p class="font-semibold">Color</p>
                                <p>{{ $car->color }}</p>
                            </div>
                            <div class="items-center space-x-4">
                                <p class="font-semibold">Status</p>
                                <p class="bg-green-600 text-white px-3 py-1 rounded text-xs w-[30%]">Available</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 mt-6">
                            <div>
                                <label for="pickup_date-{{ $car->id }}" class="block text-sm font-semibold text-gray-700 mb-1">Select Pick-up Date</label>
                                <input type="date" id="pickup_date-{{ $car->id }}" class="border-gray-300 rounded px-3 py-2 text-sm w-1/2" />
                            </div>
                            <div>
                                <label for="return_date-{{ $car->id }}" class="block text-sm font-semibold text-gray-700 mb-1">Select Return Date</label>
                                <input type="date" id="return_date-{{ $car->id }}" class="border-gray-300 rounded px-3 py-2 text-sm w-1/2" />
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-4">
                            <button data-modal-hide="carModal-{{ $car->id }}" class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                                ← Back
                            </button>
                            <a href="{{ route('terms_condition') }}" class="px-5 py-2 bg-blue-900 text-white rounded hover:bg-blue-800">
                                Proceed →
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>