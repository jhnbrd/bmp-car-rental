@extends('layouts.administration')

@section('content')

<?php
    $clients = [
        ['id' => '1', 'name' => 'Hans Burger', 'amount' => "$863.45", 'status' => 'Completed', 'date' => '6/10/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg', 'reason' => ''],
        ['id' => '2', 'name' => 'Sarah Lee', 'amount' => "$123.45", 'status' => 'Completed', 'date' => '5/12/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg', 'reason' => ''],
        ['id' => '3', 'name' => 'John Doe', 'amount' => "$245.67", 'status' => 'Cancelled', 'date' => '7/15/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg', 'reason' => 'Customer requested cancellation due to change of plans'],
        ['id' => '4', 'name' => 'Emily Clark', 'amount' => "$543.21", 'status' => 'Blacklisted', 'date' => '4/5/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/4.jpg', 'reason' => 'Multiple violations of rental policies'],
    ];
    
    function getStatusBadge($status)
    {
        switch ($status) {
            case 'Successful':
                return ['text' => 'Completed', 'color' => 'bg-green-100 text-green-700'];
            case 'Cancelled':
                return ['text' => 'Cancelled', 'color' => 'bg-red-100 text-red-700'];
            case 'Blacklisted':
                return ['text' => 'Blacklisted', 'color' => 'bg-purple-100 text-purple-700'];
            default:
                return ['text' => 'Unknown', 'color' => 'bg-gray-100 text-gray-700'];
        }
    }
?>

<div class="flex flex-col md:flex-row md:items-center md:justify-between my-6 space-y-4 md:space-y-0">
    <!-- Flex Container -->
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
        All Booking History
    </h2>

    <form class="w-full sm:w-[300px] md:w-[400px] lg:w-[500px] xl:w-[500px]"> <!-- Responsive Widths -->
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" id="default-search"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:outline-none"
                placeholder="Search Customer Name ..." required />

            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>
</div>

<!-- Filter Section -->
<div class="mb-6">
    <form id="filterForm" action="{{ route('booking-history') }}" method="GET" class="flex flex-wrap items-center gap-4">
        <!-- Status Filter -->
        <div class="relative" x-data="{ open: false }">
            <button type="button" @click="open = !open"
                class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                Filter by Status
                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false"
                class="absolute z-10 mt-2 w-96 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                <div class="p-6 space-y-6">
                    <!-- Status Filters -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Booking Status</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="inline-flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <input type="checkbox" name="status[]" value="Successful" 
                                    {{ in_array('Successful', request()->input('status', [])) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <span class="ml-3 text-sm text-gray-700 dark:text-gray-200">Completed</span>
                            </label>
                            <label class="inline-flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <input type="checkbox" name="status[]" value="Cancelled"
                                    {{ in_array('Cancelled', request()->input('status', [])) ? 'checked' : '' }}
                                    class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <span class="ml-3 text-sm text-gray-700 dark:text-gray-200">Cancelled</span>
                            </label>
                        </div>
                    </div>

                    <!-- Date Range Filter -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Date Range</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-500 dark:text-gray-400 mb-2">From</label>
                                <input type="date" name="date_from" value="{{ request()->input('date_from') }}"
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-500 dark:text-gray-400 mb-2">To</label>
                                <input type="date" name="date_to" value="{{ request()->input('date_to') }}"
                                    class="w-full px-4 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Quick Date Filters -->
                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-200">Quick Filters</h3>
                        <div class="flex flex-wrap gap-3">
                            <button type="button" data-quick-filter="today"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                Today
                            </button>
                            <button type="button" data-quick-filter="7days"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                Last 7 Days
                            </button>
                            <button type="button" data-quick-filter="30days"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                Last 30 Days
                            </button>
                            <button type="button" data-quick-filter="month"
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                This Month
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Filter Actions -->
                <div class="flex items-center justify-between p-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" id="resetFilters"
                        class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                        Reset Filters
                    </button>
                    <div class="flex gap-3">
                        <button type="button" @click="open = false"
                            class="px-5 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Input (moved inside the form) -->
        <div class="w-full sm:w-[300px] md:w-[400px] lg:w-[500px] xl:w-[500px] hidden">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search" value="{{ request()->input('search') }}"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:outline-none"
                    placeholder="Search Customer Name ..." />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="w-full overflow-visible rounded-lg shadow-xs mt-4">
    <div class="w-full">
        <table class="w-full whitespace-no-wrap text-center">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Client</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @if ($booking_history->isNotEmpty())
                <!-- Loop through all bookings -->
                @foreach ($booking_history as $booking)
                <?php
                    $statusBadge = getStatusBadge($booking->latestStatus->status);
                    $dropdownId = 'dropdown-' . $booking->id;
                ?>
                <tr class="text-gray-700 dark:text-gray-400">
                    <!-- Client Name Data -->
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-center text-sm">
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src={{ asset($booking->customer->user->picture_path) }}
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">Client</p>
                            </div>
                        </div>
                    </td>

                    <!-- Amount -->
                    <td class="px-4 py-3 text-sm">{{ $booking->amount_due }}</td>

                    <!-- Status -->
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                            <?= $statusBadge['text'] ?>
                        </span>
                    </td>

                    <!-- Date -->
                    <td class="px-4 py-3 text-sm">{{ $booking->latestStatus->status_date }}</td>

                    <!-- Actions -->
                    <td class="px-4 py-3">
                        <div class="relative inline-block text-left">
                            <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                            <label for="<?= $dropdownId ?>"
                                class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 pointer-events-none">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>
                            </label>

                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg opacity-0 peer-checked:opacity-100 peer-checked:scale-100 peer-checked:block hidden transition-all duration-200 z-40">
                                <!-- View Details -->
                                <button type="button"
                                    data-modal-target="viewdetail-modal-{{ $booking->id }}"
                                    data-modal-toggle="viewdetail-modal-{{ $booking->id }}"
                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1 w-[calc(100%-1rem)]">
                                    <svg class="w-5 h-5 text-white dark:text-gray-300" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                    </svg>
                                    View Details
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- View Detail Modal for each booking -->
                <div id="viewdetail-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-5xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Booking Overview
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="viewdetail-modal-{{ $booking->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <div class="grid md:grid-cols-2 gap-6">
                                    <!-- Renter Info Card -->
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5 shadow-sm space-y-4">
                                        <div class="flex items-center space-x-4">
                                            <img src="{{ asset($booking->customer->user->picture_path) }}" alt="Renter"
                                                class="w-16 h-16 rounded-full border-2 border-gray-400 shadow-md">
                                            <div>
                                                <p class="text-lg font-semibold text-gray-800 dark:text-white">
                                                    {{ $booking->customer->first_name }}
                                                    {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }}
                                                    {{ $booking->customer->last_name }}
                                                </p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $booking->customer->user->email }}</p>
                                            </div>
                                        </div>
                                        <div class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                            <p><strong>Contact:</strong> {{ $booking->customer->phone_number }}</p>
                                            <p><strong>License #:</strong> {{ $booking->customer->driver_license_number }}</p>
                                            <p><strong>Expiry:</strong> {{ $booking->customer->license_expiration_date }}</p>
                                        </div>
                                    </div>

                                    <!-- Vehicle Info Card -->
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5 shadow-sm space-y-4">
                                        <img src="{{ asset($booking->car->carModel->img_file_path) }}" alt="Vehicle"
                                            class="w-full h-40 object-scale-down rounded-xl shadow-sm">
                                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
                                            <p><strong>Brand:</strong> {{ $booking->car->carModel->brand }}</p>
                                            <p><strong>Model:</strong> {{ $booking->car->carModel->model_name }}</p>
                                            <p><strong>Type:</strong> {{ $booking->car->carModel->car_type }}</p>
                                            <p><strong>Plate:</strong> {{ $booking->car->license_plate }}</p>
                                            <p><strong>Transmission:</strong> {{ $booking->car->carModel->transmission }}</p>
                                            <p><strong>Fuel Type:</strong> {{ $booking->car->carModel->fuel_type }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Booking Details -->
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-5 shadow-sm space-y-3">
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Booking Details</h3>
                                    <div class="grid sm:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
                                        <p><strong>Pickup Location:</strong> Main Branch, Ecoland, Davao City</p>
                                        <p><strong>Drop-off Location:</strong> Main Branch, Ecoland, Davao City</p>
                                        <p><strong>Pickup Date:</strong> {{ $booking->pickup_date }}</p>
                                        <p><strong>Return Date:</strong> {{ $booking->return_date }}</p>
                                        <p><strong>Amount Due:</strong> ₱{{ number_format($booking->amount_due, 2) }}</p>
                                        @if($booking->actual_pickup_time)
                                            <p><strong>Actual Pickup Time:</strong> {{ $booking->actual_pickup_time }}</p>
                                        @endif
                                        <!-- Booking Status -->
                                        <div class="sm:col-span-2">
                                            <strong>Status:</strong>
                                            <?php $statusBadge = getStatusBadge($booking->latestStatus->status); ?>
                                            <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusBadge['color'] ?>">
                                                {{ $booking->latestStatus->status }}
                                            </span>
                                            @if($booking->latestStatus->additional_notes)
                                                <p class="mt-2"><strong>Additional Notes:</strong> {{ $booking->latestStatus->additional_notes }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                    data-modal-hide="viewdetail-modal-{{ $booking->id }}">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <tr>
                <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                    No Due bookings found.
                </td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
<div
    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800 hidden">
    <span class="flex items-center col-span-3">
        Showing 21-30 of 100
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
            <ul class="inline-flex items-center">
                <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>
                <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        1
                    </button>
                </li>
                <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        2
                    </button>
                </li>
                <li>
                    <button
                        class="px-3 py-1 text-white transition-colors duration-150 bg-blue-600 border border-r-0 border-blue-600 rounded-md focus:outline-none focus:shadow-outline-blue">
                        3
                    </button>
                </li>
                <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        4
                    </button>
                </li>
                <li>
                    <span class="px-3 py-1">...</span>
                </li>
                <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        8
                    </button>
                </li>
                <li>
                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                        9
                    </button>
                </li>
                <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>
            </ul>
        </nav>
    </span>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalButtons = document.querySelectorAll('[data-modal-toggle]');
        const modalHideButtons = document.querySelectorAll('[data-modal-hide]');
        const modals = document.querySelectorAll('[id^="viewdetail-modal-"]');

        // Show modal
        modalButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-modal-target');
                const modal = document.getElementById(targetId);
                if (modal) {
                    modal.classList.remove('hidden');
                }
            });
        });

        // Hide modal
        modalHideButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-modal-hide');
                const modal = document.getElementById(targetId);
                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        // Close modal when clicking outside
        modals.forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        // Close modal when pressing ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        modal.classList.add('hidden');
                    }
                });
            }
        });

        // Filter functionality
        const quickFilterButtons = document.querySelectorAll('[data-quick-filter]');
        const dateFromInput = document.querySelector('input[name="date_from"]');
        const dateToInput = document.querySelector('input[name="date_to"]');
        const resetButton = document.getElementById('resetFilters');

        // Quick filter buttons
        quickFilterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const today = new Date();
                let fromDate = new Date();

                switch (button.dataset.quickFilter) {
                    case 'today':
                        fromDate = today;
                        break;
                    case '7days':
                        fromDate.setDate(today.getDate() - 7);
                        break;
                    case '30days':
                        fromDate.setDate(today.getDate() - 30);
                        break;
                    case 'month':
                        fromDate = new Date(today.getFullYear(), today.getMonth(), 1);
                        break;
                }

                dateFromInput.value = fromDate.toISOString().split('T')[0];
                dateToInput.value = today.toISOString().split('T')[0];
            });
        });

        // Reset filters
        resetButton.addEventListener('click', () => {
            const form = document.getElementById('filterForm');
            const checkboxes = form.querySelectorAll('input[type="checkbox"]');
            const dateInputs = form.querySelectorAll('input[type="date"]');
            const searchInput = form.querySelector('input[type="search"]');

            checkboxes.forEach(checkbox => checkbox.checked = false);
            dateInputs.forEach(input => input.value = '');
            if (searchInput) searchInput.value = '';

            form.submit();
        });
    });
</script>
@endpush
