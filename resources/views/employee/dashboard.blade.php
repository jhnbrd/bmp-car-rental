@extends('layouts.administration')

@section('content')
    <div class="container px-6 mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center py-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Dashboard
                </h2>
                <p class="text-gray-600 dark:text-gray-400">Welcome back, here's what's happening today.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ url('/bookings/manage') }}" 
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    New Booking
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Available Cars -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-shadow duration-200">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Available Cars
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $availableCarsCount }}
                    </p>
                </div>
            </div>

            <!-- Currently Rented -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-shadow duration-200">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Currently Rented
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $carsCurrentlyRented }}
                    </p>
                </div>
            </div>

            <!-- Damaged Cars -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-shadow duration-200">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Damaged Cars
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $carsDamaged }}
                    </p>
                </div>
            </div>

            <!-- Pending Bookings -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-shadow duration-200">
                <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Pending Bookings
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $pendingBookings ?? 0 }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <!-- Recent Bookings -->
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">Recent Bookings</h4>
                    <a href="{{ url('/bookings/manage') }}" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">View all</a>
                </div>
                <div class="overflow-hidden rounded-lg border">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Car</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($recentBookings ?? [] as $booking)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->customer_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $booking->car_model }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $booking->status === 'Completed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Maintenance Alerts -->
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300">Maintenance Alerts</h4>
                    <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline">View all</a>
                </div>
                <div class="space-y-4">
                    @foreach($maintenanceAlerts ?? [] as $alert)
                    <div class="flex items-start p-3 bg-gray-50 rounded-lg">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-gray-900">{{ $alert->car_model }}</h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $alert->message }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">Quick Actions</h4>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ url('/cars/manage') }}" 
                    class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Manage Cars</span>
                </a>

                <a href="{{ url('/bookings/create') }}" 
                    class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">New Booking</span>
                </a>

                <a href="{{ url('/maintenance') }}" 
                    class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 text-yellow-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Maintenance</span>
                </a>

                <a href="{{ url('/reports') }}" 
                    class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 hover:shadow-md transition-all duration-200 flex flex-col items-center justify-center">
                    <svg class="w-8 h-8 text-purple-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Reports</span>
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div id="toast-success" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
        </div>
        <div class="ml-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
@endsection