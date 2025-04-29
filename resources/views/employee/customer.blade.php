@extends('layouts.administration')

@section('content')

    <div class="flex flex-col md:flex-row md:items-center md:justify-between my-6 space-y-4 md:space-y-0">
        <!-- Flex Container -->
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Customer Records
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

    <div class="flex justify-between items-center mb-5">
        <!-- Breadcrumb -->
        <nav class="text-sm text-gray-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-gray-700 hover:text-blue-600 font-medium text-base">
                        All Cars
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L11.586 9 7.293 4.707a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 text-gray-700 font-bold text-lg">
                            Filtered Cars
                        </span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Filter Button -->
        <div class="relative inline-block text-left">
            <button type="button"
                class="inline-flex justify-between items-center px-4 py-2 bg-blue-600 dark:bg-blue-800 border border-blue-600 dark:border-blue-800 rounded-md shadow-sm text-sm font-medium text-white dark:text-gray-300 hover:bg-blue-700 dark:hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-200"
                data-dropdown-toggle="dropdown-menu" aria-expanded="false">
                Filter Status
                <!-- Interactive SVG -->
                <svg id="dropdown-arrow" class="h-5 w-5 ml-2 transform transition-transform duration-200 ease-in-out"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ul id="dropdown-menu"
                class="hidden absolute right-0 mt-2 bg-white dark:bg-gray-800 text-sm text-gray-700 dark:text-gray-200 shadow-lg rounded-md w-48 z-10">
                <li>
                    <a href="#"
                        class="block px-4 py-2 rounded-t-md hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white">
                        Active
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white">
                        Inactive
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white">
                        Disabled
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="block px-4 py-2 rounded-b-md hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 dark:hover:text-white">
                        Blacklisted
                    </a>
                </li>
            </ul>
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

    <!-- Main modal -->
    <div id="editcustomer-modal" tabindex="-1" aria-hidden="true"
        class="hidden  fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative w-full max-w-2xl">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Profile
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="editcustomer-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="#">
                        <div class="overflow-y-auto max-h-[500px] border border-gray-300 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="johnrexpartoza21@gmail.com" disabled />
                                </div>
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="John Rex Partoza" disabled />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-2">
                                <div>
                                    <label for="province"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                                    <input type="text" name="province" id="province"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Davao Del Sur" disabled />
                                </div>
                                <div>
                                    <label for="city"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                    <input type="text" name="city" id="city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Davao City" disabled />
                                </div>
                                <div>
                                    <label for="barangay"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Barangay</label>
                                    <input type="text" name="barangay" id="barangay"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Mudiang    " disabled />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-3 mb-2">
                                <div>
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="address" id="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Purok 1, Near Basketball Covered Court" disabled />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-2">
                                <div>
                                    <label for="phonenumber"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                        Number</label>
                                    <input type="text" name="phonenumber" id="phonenumber"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="09123456789" disabled />
                                </div>
                                <div>
                                    <label for="licencenumber"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Licence
                                        Number</label>
                                    <input type="text" name="licencenumber" id="licencenumber"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="L37-86753" disabled />
                                </div>
                            </div>
                            <div class="col-span-full mb-2">
                                <label for="licenceimage"
                                    class="block text-sm/6 font-medium text-gray-900 dark:text-gray-200">License
                                    Image</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 dark:border-gray-600 mx-5">
                                    <!-- Displayed Image -->
                                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                                        alt="Uploaded Image" class="mx-auto w-full object-cover rounded-lg">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-2">
                                <div>
                                    <label for="licenceexpirationdate"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Licence
                                        Expiration
                                        Date</label>
                                    <input type="date" name="licenceexpirationdate" id="licenceexpirationdate"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="March 28, 2028" disabled />
                                </div>
                                <div>
                                    <label for="accountcreated"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                                        Created</label>
                                    <input type="date" name="licenceexpirationdate"
                                        id="licenceexpirationdate"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="March 28, 2025" disabled />
                                </div>

                            </div>
                            <div class="rounded-sm gap-2 mb-2">
                                <!-- Added flex-col for vertical alignment -->
                                <label class="text-sm font-medium text-gray-900 dark:text-white">
                                    Disable Account

                                    <div class="flex items-center gap-2"> <!-- Toggle switch placed neatly beside label -->
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div
                                            class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-red-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full rtl:peer-checked:after:translate-x-[-100%] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-red-600 dark:peer-checked:bg-red-600">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                            Customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const button = document.querySelector('button[data-dropdown-toggle="dropdown-menu"]');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownArrow = document.getElementById('dropdown-arrow');

        button.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
            dropdownArrow.classList.toggle('rotate-180');
        });
    </script>
@endsection