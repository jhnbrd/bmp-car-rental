@extends('layouts.administration')

@section('content')

    <div class="flex flex-col md:flex-row md:items-center md:justify-between my-6 space-y-4 md:space-y-0">
        <!-- Flex Container -->
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            All Booking History
        </h2>

        <form class="w-full sm:w-[400px] md:w-[500px] lg:w-[600px] xl:w-[700px]"> <!-- Responsive Widths -->
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
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

    <!-- Filter Button -->
    <div class="relative inline-block text-left">
        <button type="button"
            class="inline-flex justify-between items-center px-4 py-2 bg-blue-600 dark:bg-blue-800 border border-blue-600 dark:border-blue-800 rounded-md shadow-sm text-sm font-medium text-white dark:text-gray-300 hover:bg-blue-700 dark:hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
            data-dropdown-toggle="dropdown-menu" aria-expanded="false">
            Filter Status
            <svg id="dropdown-arrow" class="h-5 w-5 ml-2 transform transition-transform duration-200 ease-in-out"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdown-menu"
            class="hidden absolute right-0 mt-2 w-full max-w-3xl bg-white dark:bg-gray-800 text-sm text-gray-700 dark:text-gray-200 shadow-lg rounded-md z-10 p-6">

            <!-- Horizontal layout -->
            <div class="flex flex-wrap gap-6 justify-between">

                <!-- Status Section -->
                <div class="flex-1 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg space-y-2">
                    <h3 class="text-gray-900 dark:text-gray-100 font-semibold text-sm mb-2">Status</h3>
                    <div class="flex flex-col gap-2">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox"
                                class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                            <span>Completed</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox"
                                class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                            <span>Cancelled</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox"
                                class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                            <span>Blacklisted</span>
                        </label>
                    </div>
                </div>

                <!-- Date Section (Grouped Month/Day/Year) -->
                <div class="flex-1 bg-gray-100 dark:bg-gray-700 p-4 rounded-lg space-y-4">
                    <h3 class="text-gray-900 dark:text-gray-100 font-semibold text-sm mb-2">Date</h3>

                    <div class="space-y-3">
                        <div>
                            <label for="month" class="block text-gray-700 dark:text-gray-300 mb-1">Month</label>
                            <select id="month" multiple size="4"
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>
                        </div>

                        <div>
                            <label for="day" class="block text-gray-700 dark:text-gray-300 mb-1">Day</label>
                            <input id="day" type="text"
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., 1, 15, 31">
                        </div>

                        <div>
                            <label for="year" class="block text-gray-700 dark:text-gray-300 mb-1">Year</label>
                            <input id="year" type="text"
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., 2023, 2024">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Apply Button -->
            <div class="flex justify-end mt-6">
                <button type="button"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md focus:outline-none">
                    Apply Filters
                </button>
            </div>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">License Number</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date Created</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($customers as $customer)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">
                                            {{ $customer->first_name }}
                                            @if ($customer->middle_name)
                                                {{ $customer->middle_name }}
                                            @endif
                                            {{ $customer->last_name }}
                                        </p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $customer->phone_number }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $customer->barangay }}, {{ $customer->city }}, {{ $customer->province }},
                                {{ $customer->address }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $customer->driver_license_number }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $customer->is_banned ? 'Banned' : 'Active' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $customer->created_at }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button data-modal-target="editcustomer-modal" data-modal-toggle="editcustomer-modal"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit"
                                        onclick="openModal('{{ $customer->first_name }}', '{{ $customer->middle_name }}', '{{ $customer->last_name }}', '{{ $customer->barangay }}', '{{ $customer->city }}', '{{ $customer->province }}', '{{ $customer->address }}', '{{ $customer->phone_number }}', '{{ $customer->driver_license_number }}', '{{ $customer->license_expiration_date }}', '{{ $customer->is_banned }}', '{{ $customer->created_at }}')">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection