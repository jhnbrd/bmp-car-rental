@extends('layouts.administration')

@section('content')
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        Audit Logs
    </h2>

    <!-- Filter Section -->
    <div class="mb-8 bg-white rounded-lg shadow-md">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-gray-700">Audit Log Filters</h4>
                    <p class="mt-1 text-sm text-gray-500">Filter audit logs by user, action type, and date range</p>
                </div>
                <button type="button" id="clearFilters" class="text-sm text-gray-600 hover:text-gray-900">
                    Clear all filters
                </button>
            </div>
        </div>
        
        <form class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- User Filter -->
                <div class="relative">
                    <label class="block mb-2 text-sm font-medium text-gray-700">User</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8 appearance-none">
                        <option value="">All Users</option>
                        <option value="1">John Doe</option>
                        <option value="2">Jane Smith</option>
                        <option value="3">Mike Johnson</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Action Type Filter -->
                <div class="relative">
                    <label class="block mb-2 text-sm font-medium text-gray-700">Action Type</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8 appearance-none">
                        <option value="">All Actions</option>
                        <option value="create">Create</option>
                        <option value="update">Update</option>
                        <option value="delete">Delete</option>
                        <option value="login">Login</option>
                        <option value="logout">Logout</option>
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
                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8" placeholder="Start Date">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-8" placeholder="End Date">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Actions -->
            <div class="flex justify-end mt-6 space-x-3">
                <button type="button" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Audit Logs Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Timestamp</th>
                        <th class="px-4 py-3">User</th>
                        <th class="px-4 py-3">Action</th>
                        <th class="px-4 py-3">Module</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">IP Address</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <!-- Sample Log Entry 1 -->
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">Mar 19, 2024</p>
                                    <p class="text-xs text-gray-600">10:30 AM</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            John Doe
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                Create
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Users
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Created new user account
                        </td>
                        <td class="px-4 py-3 text-sm">
                            192.168.1.1
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button data-modal-target="audit-modal-1" data-modal-toggle="audit-modal-1" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                View Details
                            </button>
                        </td>
                    </tr>

                    <!-- Sample Log Entry 2 -->
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <div>
                                    <p class="font-semibold">Mar 19, 2024</p>
                                    <p class="text-xs text-gray-600">09:15 AM</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Jane Smith
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <span class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full">
                                Update
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Cars
                        </td>
                        <td class="px-4 py-3 text-sm">
                            Updated car details
                        </td>
                        <td class="px-4 py-3 text-sm">
                            192.168.1.2
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button data-modal-target="audit-modal-2" data-modal-toggle="audit-modal-2" class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                View Details
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="px-4 py-3 border-t dark:border-gray-700">
            <!-- Pagination -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-sm text-gray-700">
                        Showing <span class="font-semibold">1</span> to <span class="font-semibold">2</span> of <span class="font-semibold">2</span> entries
                    </span>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Previous
                    </button>
                    <button class="px-3 py-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Modal 1 -->
    <div id="audit-modal-1" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Audit Log Details
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="audit-modal-1">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">User</p>
                            <p class="mt-1 text-sm text-gray-900">John Doe</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Action Type</p>
                            <p class="mt-1">
                                <span class="px-2 py-1 text-xs font-semibold leading-tight text-green-700 bg-green-100 rounded-full">
                                    Create
                                </span>
                            </p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Module</p>
                            <p class="mt-1 text-sm text-gray-900">Users</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Timestamp</p>
                            <p class="mt-1 text-sm text-gray-900">Mar 19, 2024 10:30 AM</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">IP Address</p>
                            <p class="mt-1 text-sm text-gray-900">192.168.1.1</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">User Agent</p>
                            <p class="mt-1 text-sm text-gray-900">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-gray-500">Description</p>
                            <p class="mt-1 text-sm text-gray-900">Created new user account</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-sm font-medium text-gray-500">New Values</p>
                            <pre class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{
    "name": "New User",
    "email": "newuser@example.com",
    "role": "Customer"
}</pre>
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="audit-modal-1" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
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
            });
        });
    </script>
    @endpush
@endsection 