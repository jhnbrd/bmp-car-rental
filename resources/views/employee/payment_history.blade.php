@extends('layouts.administration')

@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Payment History
    </h2>

    <!-- Filter Section -->
    <div class="mb-8 bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-gray-700">Payment Filters</h4>
                    <p class="mt-1 text-sm text-gray-500">Filter payment records by type, date range, and status</p>
                </div>
                <button type="button" id="clearFilters" class="text-sm text-gray-600 hover:text-gray-900">
                    Clear all filters
                </button>
            </div>
        </div>
        
        <form action="{{ route('payment.history') }}" method="GET" class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Payment Type Filter -->
                <div class="relative">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Payment Type</label>
                    <select name="payment_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8 appearance-none">
                        <option value="">All Payments</option>
                        <option value="booking">Booking Payments</option>
                        <option value="repairment">Repair Payments/option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Date Range Filter -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Date Range</label>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="relative">
                            <input type="date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8" placeholder="Start Date">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <input type="date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8" placeholder="End Date">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Status Filter -->
                <div class="relative">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Payment Status</label>
                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8 appearance-none">
                        <option value="">All Status</option>
                        <option value="verified">Verified</option>
                        <option value="pending">Pending</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="flex justify-end mt-6 space-x-3">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Summary Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Total Payments Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">Total Payments</p>
                <p class="text-lg font-semibold text-gray-700">₱0.00</p>
            </div>
        </div>

        <!-- Booking Payments Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">Booking Payments</p>
                <p class="text-lg font-semibold text-gray-700">₱0.00</p>
            </div>
        </div>

        <!-- Repairment Costs Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">Repair Payments</p>
                <p class="text-lg font-semibold text-gray-700">₱0.00</p>
            </div>
        </div>

        <!-- Pending Payments Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600">Pending Payments</p>
                <p class="text-lg font-semibold text-gray-700">₱0.00</p>
            </div>
        </div>
    </div>

    <!-- Payment History Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Reference</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Payment Method</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">Jan 1, 2024</p>
                                    <p class="text-xs text-gray-600">10:00 AM</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            REF-001
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                Booking
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            ₱1,000.00
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Cash
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                Verified
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button data-modal-target="payment-modal" data-modal-toggle="payment-modal" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                View Details
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t dark:border-gray-700">
            <!-- Pagination will go here -->
        </div>
    </div>

    <!-- Payment Details Modal -->
    <div id="payment-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Payment Details
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="payment-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <!-- Payment Type Badge -->
                    <div class="flex justify-end">
                        <span class="px-3 py-1 text-sm font-semibold leading-tight text-green-700 bg-green-100 rounded-full payment-type-badge">
                            Booking Payment
                        </span>
                    </div>

                    <!-- Common Payment Details -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Payment ID</p>
                            <p class="mt-1 text-sm text-gray-900">PAY-001</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Reference Number</p>
                            <p class="mt-1 text-sm text-gray-900">REF-001</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Amount</p>
                            <p class="mt-1 text-sm text-gray-900">₱1,000.00</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Payment Method</p>
                            <p class="mt-1 text-sm text-gray-900">Cash</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Status</p>
                            <p class="mt-1">
                                <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                    Verified
                                </span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Date</p>
                            <p class="mt-1 text-sm text-gray-900">Jan 1, 2024 10:00 AM</p>
                        </div>
                    </div>

                    <!-- Booking Details Section (shown for booking payments) -->
                    <div class="mt-6 booking-details">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Booking Details</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Booking ID</p>
                                <p class="mt-1 text-sm text-gray-900">BK-001</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Customer Name</p>
                                <p class="mt-1 text-sm text-gray-900">John Doe</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Car Details</p>
                                <p class="mt-1 text-sm text-gray-900">Toyota Camry 2023</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Rental Period</p>
                                <p class="mt-1 text-sm text-gray-900">Jan 1 - Jan 3, 2024</p>
                            </div>
                        </div>
                    </div>

                    <!-- Repairment Details Section (shown for repairment costs) -->
                    <div class="mt-6 repairment-details hidden">
                        <h4 class="text-lg font-medium text-gray-900 mb-4">Repair Details</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Car Details</p>
                                <p class="mt-1 text-sm text-gray-900">Toyota Camry 2023</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Damage Type</p>
                                <p class="mt-1 text-sm text-gray-900">Body Damage</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Repair Parts</p>
                                <p class="mt-1 text-sm text-gray-900">Front Bumper, Headlight</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Repair Status</p>
                                <p class="mt-1">
                                    <span class="px-2 py-1 text-xs font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full">
                                        Under Repair
                                    </span>
                                </p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-sm font-medium text-gray-500">Damage Description</p>
                                <p class="mt-1 text-sm text-gray-900">Front bumper damage due to minor collision. Headlight assembly needs replacement.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="payment-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dropdown functionality
            const selects = document.querySelectorAll('select');
            
            selects.forEach(select => {
                const icon = select.parentElement.querySelector('svg');
                
                select.addEventListener('focus', () => {
                    icon.classList.add('rotate-180');
                });
                
                select.addEventListener('blur', () => {
                    icon.classList.remove('rotate-180');
                });
                
                select.addEventListener('change', () => {
                    if (select.value) {
                        select.classList.add('text-gray-900');
                    } else {
                        select.classList.remove('text-gray-900');
                    }
                });
            });

            // Clear filters functionality
            const clearFiltersBtn = document.getElementById('clearFilters');
            const form = document.querySelector('form');

            clearFiltersBtn.addEventListener('click', () => {
                const inputs = form.querySelectorAll('input, select');
                inputs.forEach(input => {
                    if (input.type === 'date') {
                        input.value = '';
                    } else if (input.tagName === 'SELECT') {
                        input.selectedIndex = 0;
                        input.classList.remove('text-gray-900');
                    }
                });
                form.submit();
            });
        });
    </script>
    @endpush
@endsection