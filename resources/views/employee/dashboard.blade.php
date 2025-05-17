@extends('layouts.administration')

@section('content')

    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- CTA -->
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-white rounded-lg shadow-md focus:outline-none focus:shadow-outline-blue" href="{{ url('/bookings/manage') }}"
            style="background-color: #0F3460;" href="https://github.com/estevanmaito/windmill-dashboard">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 3C5.455 3 1.731 6.28.458 10c1.273 3.72 4.997 7 9.542 7s8.269-3.28 9.542-7C18.269 6.28 14.545 3 10 3zm0 12c-3.163 0-5.95-2.058-7.003-5C4.05 7.058 6.837 5 10 5s5.95 2.058 7.003 5c-1.053 2.942-3.84 5-7.003 5zm0-8a3 3 0 110 6 3 3 0 010-6z">
                    </path>
                </svg>
                <span>New bookings need updating</span>
            </div>
            <span>View bookings &RightArrow;</span>
        </a>

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card: Cars Available -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <!-- Car Icon -->
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 10h14l1 4H2l1-4zm0 6a1 1 0 001 1h1v2h2v-2h6v2h2v-2h1a1 1 0 001-1H3z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Available</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $availableCarsCount }}</p>
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
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Booked</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $carsCurrentlyRented }}</p>
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
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Damaged</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{ $carsDamaged }}</p>
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
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Pending</p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">20</p>
                </div>
            </div>
        </div>
@endsection