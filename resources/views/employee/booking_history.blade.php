@extends('layouts.administration')

@section('content')

<?php
    $clients = [
        ['id' => '1', 'name' => 'Hans Burger', 'amount' => "$863.45", 'status' => 'For Approval', 'date' => '6/10/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'],
        ['id' => '2', 'name' => 'Sarah Lee', 'amount' => "$123.45", 'status' => 'Paid', 'date' => '5/12/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'],
        ['id' => '3', 'name' => 'John Doe', 'amount' => "$245.67", 'status' => 'Ongoing', 'date' => '7/15/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg'],
        ['id' => '4', 'name' => 'Emily Clark', 'amount' => "$543.21", 'status' => 'Cancel', 'date' => '4/5/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/4.jpg'],
        ['id' => '5', 'name' => 'Mark Thompson', 'amount' => "$789.99", 'status' => 'Due', 'date' => '6/25/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/5.jpg'],
        ['id' => '6', 'name' => 'Anna Swift', 'amount' => "$903.12", 'status' => 'Damage', 'date' => '3/18/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/6.jpg'],
        ['id' => '7', 'name' => 'Jack Daniels', 'amount' => "$450.67", 'status' => 'Paid', 'date' => '2/11/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/7.jpg'],
        ['id' => '8', 'name' => 'Lily Adams', 'amount' => "$654.88", 'status' => 'For Approval', 'date' => '1/21/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/8.jpg'],
        ['id' => '9', 'name' => 'Carlos Reyes', 'amount' => "$712.33", 'status' => 'Paid', 'date' => '8/13/2021', 'avatar' => 'https://randomuser.me/api/portraits/men/9.jpg'],
        ['id' => '10', 'name' => 'Mia Gonzalez', 'amount' => "$320.20", 'status' => 'Due', 'date' => '11/2/2021', 'avatar' => 'https://randomuser.me/api/portraits/women/10.jpg'],
        ['id' => '11', 'name' => 'Noah Smith', 'amount' => "$615.49", 'status' => 'Ongoing', 'date' => '10/8/2022', 'avatar' => 'https://randomuser.me/api/portraits/men/11.jpg'],
        ['id' => '12', 'name' => 'Olivia Johnson', 'amount' => "$982.00", 'status' => 'Damage', 'date' => '6/30/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/12.jpg'],
        ['id' => '13', 'name' => 'William Brown', 'amount' => "$134.80", 'status' => 'Cancel', 'date' => '4/18/2021', 'avatar' => 'https://randomuser.me/api/portraits/men/13.jpg'],
        ['id' => '14', 'name' => 'Emma Davis', 'amount' => "$768.90", 'status' => 'Paid', 'date' => '9/5/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/14.jpg'],
        ['id' => '15', 'name' => 'James Wilson', 'amount' => "$402.56", 'status' => 'For Approval', 'date' => '7/19/2022', 'avatar' => 'https://randomuser.me/api/portraits/men/15.jpg'],
        ['id' => '16', 'name' => 'Sophia Moore', 'amount' => "$823.47", 'status' => 'Paid', 'date' => '3/12/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/16.jpg'],
        ['id' => '17', 'name' => 'Benjamin Taylor', 'amount' => "$553.21", 'status' => 'Ongoing', 'date' => '5/24/2023', 'avatar' => 'https://randomuser.me/api/portraits/men/17.jpg'],
        ['id' => '18', 'name' => 'Isabella Martinez', 'amount' => "$731.95", 'status' => 'Due', 'date' => '10/29/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/18.jpg'],
        ['id' => '19', 'name' => 'Logan Anderson', 'amount' => "$888.65", 'status' => 'Cancel', 'date' => '9/2/2023', 'avatar' => 'https://randomuser.me/api/portraits/men/19.jpg'],
        ['id' => '20', 'name' => 'Ava Thomas', 'amount' => "$610.77", 'status' => 'Damage', 'date' => '1/11/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/20.jpg'],
        ['id' => '21', 'name' => 'Elijah Jackson', 'amount' => "$299.99", 'status' => 'Paid', 'date' => '2/5/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/21.jpg'],
        ['id' => '22', 'name' => 'Charlotte White', 'amount' => "$753.88", 'status' => 'For Approval', 'date' => '1/28/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/22.jpg'],
        ['id' => '23', 'name' => 'Lucas Harris', 'amount' => "$480.34", 'status' => 'Ongoing', 'date' => '3/15/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/23.jpg'],
        ['id' => '24', 'name' => 'Amelia Martin', 'amount' => "$199.99", 'status' => 'Due', 'date' => '3/30/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/24.jpg'],
        ['id' => '25', 'name' => 'Henry Clark', 'amount' => "$920.65", 'status' => 'Cancel', 'date' => '4/1/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/25.jpg'],
        ['id' => '26', 'name' => 'Grace Lewis', 'amount' => "$330.20", 'status' => 'Paid', 'date' => '4/10/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/26.jpg'],
        ['id' => '27', 'name' => 'Daniel Walker', 'amount' => "$875.50", 'status' => 'Damage', 'date' => '4/15/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/27.jpg'],
        ['id' => '28', 'name' => 'Chloe Hall', 'amount' => "$702.45", 'status' => 'For Approval', 'date' => '4/18/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/28.jpg'],
        ['id' => '29', 'name' => 'Matthew Allen', 'amount' => "$515.99", 'status' => 'Paid', 'date' => '4/19/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/29.jpg'],
        ['id' => '30', 'name' => 'Harper Young', 'amount' => "$682.30", 'status' => 'Due', 'date' => '4/20/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/30.jpg'],
    ];
    
    function getStatusBadge($status)
    {
        switch ($status) {
            case 'For Approval':
                return ['text' => 'For Approval', 'color' => 'bg-sky-100 text-sky-700'];
            case 'Ongoing':
                return ['text' => 'Ongoing', 'color' => 'bg-yellow-100 text-yellow-700'];
            case 'Paid':
                return ['text' => 'Paid', 'color' => 'bg-green-100 text-green-700'];
            case 'Cancel':
                return ['text' => 'Cancel', 'color' => 'bg-red-100 text-red-700'];
            case 'Due':
                return ['text' => 'Due for Returnment', 'color' => 'bg-orange-100 text-orange-700'];
            case 'Damage':
                return ['text' => 'Damage', 'color' => 'bg-purple-100 text-purple-700'];
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
        class="hidden absolute mt-2 w-1/3 max-w-3xl bg-white dark:bg-gray-800 text-sm text-gray-700 dark:text-gray-200 shadow-lg rounded-md z-10 p-2">


        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

            <!-- Status Section (col-span-1) -->
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg md:col-span-1">
                <h3 class="text-gray-900 dark:text-gray-100 font-semibold text-base mb-4">Filter by Status</h3>
                <div class="flex flex-col gap-3">
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                        <span>Completed</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                        <span>Cancelled</span>
                    </label>
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500">
                        <span>Blacklisted</span>
                    </label>
                </div>
            </div>

            <!-- Date Section (col-span-2) -->
            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg md:col-span-2">
                <h3 class="text-gray-900 dark:text-gray-100 font-semibold text-base mb-4">Filter by Date</h3>

                <div class="space-y-1">
                    <label for="date-group" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select
                        Date(s)</label>

                    <!-- Month (multi-select) -->
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

                    <!-- Day & Year Inline -->
                    <div class="flex gap-4 mt-3">
                        <input id="day" type="text"
                            class="w-1/2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Day (e.g. 1, 15)">
                        <input id="year" type="text"
                            class="w-1/2 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white text-sm focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Year (e.g. 2023)">
                    </div>
                </div>
            </div>
        </div>


        <!-- Apply Button -->
        <div class="flex justify-end mt-2">
            <button type="button"
                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-md focus:outline-none transition">
                Apply Filters
            </button>
        </div>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap text-center">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                    <?php foreach ($clients as $index => $client): ?>
                    <?php
                    if ($client['status'] !== 'For Approval') {
                        continue;
                    }
                    $hasForApproval = true;
                    $statusBadge = getStatusBadge($client['status']);
                    $dropdownId = 'approval-toggle-' . $index; ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <!-- For Approval - Client Name Data -->
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center text-sm">
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="<?= $client['avatar'] ?>"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                    </div>
                                </div>
                                <div>
                                    <p class="font-semibold"><?= $client['name'] ?></p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer
                                    </p>
                                </div>
                            </div>
                        </td>

                        <!--  For Approval - Amount -->
                        <td class="px-4 py-3 text-sm"><?= $client['amount'] ?></td>

                        <!--  For Approval - Status -->
                        <td class="px-4 py-3 text-xs">
                            <span
                                class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                <?= $statusBadge['text'] ?>
                            </span>
                        </td>

                        <!-- For Approval - Date-->
                        <td class="px-4 py-3 text-sm"><?= $client['date'] ?></td>

                        <!--  For Approval - Actions -->
                        <td class="px-4 py-3">

                            <!-- Wrapper (Position Relative) -->
                            <div class="relative inline-block text-left">
                                <!-- Toggle Button -->
                                <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                <label for="<?= $dropdownId ?>"
                                    class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                    <!-- Three Dots Icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                    </svg>
                                </label>

                                <!-- Dropdown Menu -->
                                <div
                                    class="absolute right-0 mt-2 w-48 bg-white translate-y-ful bottom-50 rounded-md shadow-lg opacity-0 peer-checked:opacity-100 peer-checked:scale-100 peer-checked:block hidden transition-all duration-200 z-40">
                                    <!-- View Details -->
                                    <label for="viewdetail-modal">
                                        <div data-modal-target="viewdetail-modal" data-modal-toggle="viewdetail-modal"
                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                            <svg class="w-5 h-5 text-white dark:text-gray-300" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                            </svg>
                                            View Details
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Loop Ending Point -->
                    <?php endforeach;?>
                    <!-- If No For Approval Data-->
                    <?php if (!$hasForApproval): ?>
                    <tr>
                        <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                            No For Approval bookings found.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
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
