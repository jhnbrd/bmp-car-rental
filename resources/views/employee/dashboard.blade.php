@extends('layouts.administration')

@section('content')

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- CTA -->
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-blue" href="{{ url('/bookings') }}"
            style="background-color: #0F3460;" href="https://github.com/estevanmaito/windmill-dashboard">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 3C5.455 3 1.731 6.28.458 10c1.273 3.72 4.997 7 9.542 7s8.269-3.28 9.542-7C18.269 6.28 14.545 3 10 3zm0 12c-3.163 0-5.95-2.058-7.003-5C4.05 7.058 6.837 5 10 5s5.95 2.058 7.003 5c-1.053 2.942-3.84 5-7.003 5zm0-8a3 3 0 110 6 3 3 0 010-6z">
                    </path>
                </svg>
                <span>View Upcoming Reservations</span>
            </div>
            <span>View more &RightArrow;</span>
        </a>

        <div id="custom-controls-gallery" class="relative w-full mb-5 z-0" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                </div>
            </div>
        </div>

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card: Total Clients -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <!-- Users Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path fill-rule="evenodd" d="M5 14s1-2 5-2 5 2 5 2v1H5v-1z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Clients</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">305</p>
                </div>
            </div>

            <!-- Card: Cars Available -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <!-- Car Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 10h14l1 4H2l1-4zm0 6a1 1 0 001 1h1v2h2v-2h6v2h2v-2h1a1 1 0 001-1H3z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Cars Available</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">105</p>
                </div>
            </div>

            <!-- Card: Cars Currently Rented -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                    <!-- Rental Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10h16v5H2v-5zm14 3H4v-1h12v1z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Cars Currently Rented</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">30</p>
                </div>
            </div>

            <!-- Card: Cars Under Maintenance -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                    <!-- Wrench Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M11.293 9.707a1 1 0 010-1.414L13.586 6H10V4h6v6h-2V7.414l-2.293 2.293a1 1 0 01-1.414 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Cars Under Maintenance</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">5</p>
                </div>
            </div>

            <!-- Card: Car Damage -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                    <!-- Exclamation Triangle Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 7h2v5H9V7zm0 6h2v2H9v-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Car Damage</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">1</p>
                </div>
            </div>

            <!-- Card: Pending Bookings -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
                    <!-- Clock Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H7V9h3V5h2v6z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Pending Bookings</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">20</p>
                </div>
            </div>

            <!-- Card: Total Revenue -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <!-- Dollar Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9V9h2v4zm0-6H9V5h2v2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Revenue</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">$120,000</p>
                </div>
            </div>

            <!-- Card: Total Cost -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-ora~nge-500">
                    <!-- Money Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10h16v5H2v-5zm14 3H4v-1h12v1z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Total Cost</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">$120,000</p>
                </div>
            </div>
        </div>
@endsection