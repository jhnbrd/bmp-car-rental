@extends('layouts.administration')

@section('content')

    <?php
    $clients = [
        ["id" => "1", "name" => "Hans Burger", "amount" => "$863.45", "status" => "For Approval", "date" => "6/10/2020", "avatar" => "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"],
        ["id" => "2", "name" => "Sarah Lee", "amount" => "$123.45", "status" => "Paid", "date" => "5/12/2020", "avatar" => "https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"],
        ["id" => "3", "name" => "John Doe", "amount" => "$245.67", "status" => "Ongoing", "date" => "7/15/2020", "avatar" => "https://images.unsplash.com/photo-1534528741775-758b1f8f3b1d?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8MXx8aGFuZHxlbnwwfDF8fDE2ODI3Nzg5NzE&ixlib=rb-1.2.1&q=80&w=1080"],
        ["id" => "4", "name" => "Emily Clark", "amount" => "$543.21", "status" => "Cancel", "date" => "4/5/2020", "avatar" => "https://images.unsplash.com/photo-1508595594018-e53c1237d870?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8OXx8ZW1pbHklMjBjbGFya3xlbnwwfDF8fDE2ODI3NzgwOTI&ixlib=rb-1.2.1&q=80&w=1080"],
        ["id" => "5", "name" => "Mark Thompson", "amount" => "$789.99", "status" => "Due", "date" => "6/25/2020", "avatar" => "https://images.unsplash.com/photo-1573496528412-163eea3efc72?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8Mnx8bWFya3xlbnwwfDF8fDE2ODI3NzgyMzk&ixlib=rb-1.2.1&q=80&w=1080"],
        ["id" => "6", "name" => "Anna Swift", "amount" => "$903.12", "status" => "Damage", "date" => "3/18/2020", "avatar" => "https://images.unsplash.com/photo-1573497046978-5e2b9f971bc2?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8OHx8YW5uYSUyMHN3aWZ0fGVufDB8fDF8fDE2ODI3NzgwMTQ&ixlib=rb-1.2.1&q=80&w=1080"],
        ["id" => "7", "name" => "Jack Daniels", "amount" => "$450.67", "status" => "Paid", "date" => "2/11/2020", "avatar" => "https://images.unsplash.com/photo-1515010564209-e27c1e91b99f?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8Mnx8amFjayUyMGRhbmllbHN8ZW58MHx8fDE2ODI3NzgyMjE&ixlib=rb-1.2.1&q=80&w=1080"],
        ["id" => "8", "name" => "Lily Adams", "amount" => "$654.88", "status" => "For Approval", "date" => "1/21/2020", "avatar" => "https://images.unsplash.com/photo-1573496522283-f1c9c2e00e3c?crop=entropy&cs=tinysrgb&fit=max&ixid=MXwyMDg4OHwwfDF8c2VhY2h8M3x8bGlseSUyMGFkYW1zfGVufDB8fDF8fDE2ODI3NzgwMzM&ixlib=rb-1.2.1&q=80&w=1080"],

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

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Bookings
    </h2>

    <!-- Tab Options Sections -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="bookings-tab"
            data-tabs-toggle="#bookings-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="approval-tab" data-tabs-target="#approval"
                    type="button" role="tab" aria-controls="approval" aria-selected="false">For Approval</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="ongoing-tab" data-tabs-target="#ongoing" type="button" role="tab" aria-controls="ongoing"
                    aria-selected="false">Ongoing</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="due-tab" data-tabs-target="#due" type="button" role="tab" aria-controls="due"
                    aria-selected="false">Due</button>
            </li>
            <li role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="cancel-tab" data-tabs-target="#cancel" type="button" role="tab" aria-controls="cancel"
                    aria-selected="false">Cancelled</button>
            </li>
        </ul>
    </div>

    <!-- Approval Bookings Sections -->
    <div id="bookings-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approval" role="tabpanel"
            aria-labelledby="approval-tab">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                For Approval Bookings
            </h4>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
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
        if ($client['status'] !== "For Approval")
            continue;
        $hasForApproval = true;
        $statusBadge = getStatusBadge($client['status']);
        $dropdownId = "approval-toggle-" . $index;
                                                                                                                                                ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <!-- For Approval - Client Name Data -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="<?= $client['avatar'] ?>" alt="" loading="lazy" />
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
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 pointer-events-none">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>
                                        </label>

                                        <!-- Dropdown Menu -->
                                        <div
                                            class="absolute right-0 mt-2 w-48 bg-white translate-y-ful bottom-50 rounded-md shadow-lg opacity-0 peer-checked:opacity-100 peer-checked:scale-100 peer-checked:block hidden transition-all duration-200 z-40">
                                            <!-- View Details -->
                                            <label for="viewdetail-modal">
                                                <div data-modal-target="viewdetail-modal"
                                                    data-modal-toggle="viewdetail-modal"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white dark:text-gray-300" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                    </svg>
                                                    View Details
                                                </div>
                                            </label>

                                            <!-- Approve -->
                                            <label for="approval-toggle">
                                                <div data-modal-target="approve-modal" data-modal-toggle="approve-modal"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-green-600 rounded-md shadow hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                                                    </svg>
                                                    Approve
                                                </div>
                                            </label>

                                            <!-- Cancel -->
                                            </label for="approval-toggle">
                                            <div data-modal-target="cancel-modal" data-modal-toggle="cancel-modal"
                                                class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                                                </svg>
                                                Cancel
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
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
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
        </div>
    </div>



    <!-- Ongoing Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="ongoing" role="tabpanel"
        aria-labelledby="ongoing-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Ongoing Bookings
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
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
        if ($client['status'] !== "Ongoing")
            continue;
        $hasOngoing = true;
        $statusBadge = getStatusBadge($client['status']);
        $dropdownId = "approval-toggle-" . $index;
                                                                                                                                                ?>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <!-- Ongoing - Client Name Data -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="<?= $client['avatar'] ?>" alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold"><?= $client['name'] ?></p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Ongoing - Amount -->
                                <td class="px-4 py-3 text-sm"><?= $client['amount'] ?></td>

                                <!-- Ongoing - Status -->
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                        <?= $statusBadge['text'] ?>
                                    </span>
                                </td>

                                <!-- Ongoing - Date -->
                                <td class="px-4 py-3 text-sm"><?= $client['date'] ?></td>

                                <!-- Ongoing - Actions -->
                                <td class="px-4 py-3">

                                    <!-- Wrapper (Position Relative) -->
                                    <div class="relative inline-block text-left">
                                        <!-- Toggle Button -->
                                        <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                        <label for="<?= $dropdownId ?>"
                                            class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                            <!-- Three Dots Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-5 h-5 pointer-events-none">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>
                                        </label>

                                        <!-- Dropdown Menu -->
                                        <div
                                            class="absolute right-0 mt-2 w-48 bg-white translate-y-ful bottom-50 rounded-md shadow-lg opacity-0 peer-checked:opacity-100 peer-checked:scale-100 peer-checked:block hidden transition-all duration-200 z-40">
                                            <!-- View Details -->
                                            <label for="viewdetail-modal">
                                                <div data-modal-target="viewdetail-modal"
                                                    data-modal-toggle="viewdetail-modal"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white dark:text-gray-300" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                    </svg>
                                                    View Details
                                                </div>
                                            </label>

                                            <!-- Print Invoice -->
                                            <button onclick="printInvoice()"
                                                class="w-44 flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                <svg class="w-5 h-5 text-white dark:text-gray-300" fill="none"
                                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 17v-6h6v6M8 7h8M6 3h12a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                                </svg>
                                                Print Invoice
                                            </button>

                                            <!-- Print Agreement -->
                                            <button onclick="printAgreement()"
                                                class="w-44 flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                <svg class="w-5 h-5 text-white dark:text-gray-300" fill="none"
                                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 16h8M8 12h8m-6 8h4a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v11a2 2 0 002 2z" />
                                                </svg>
                                                Print Agreement
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of one Ongoing item -->
                            <?php endforeach; ?>

                            <!-- If No Ongoing Data -->
                            <?php if (!$hasOngoing): ?>
                            <tr>
                                <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No Ongoing bookings found.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Due Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="due" role="tabpanel" aria-labelledby="due-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Due for Returnment Bookings
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full">
                <div class="overflow-x-auto">
                    <table class="min-w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b">
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            <!-- Loop through Due bookings -->
                            <?php
    $hasDue = false;
    foreach ($clients as $client):
        if ($client['status'] !== "Due")
            continue;
        $hasDue = true;
        $statusBadge = getStatusBadge($client['status']);
                                                                                                                                                                                                        ?>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <!-- Due - Client Name -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src="<?= $client['avatar'] ?>" alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold"><?= $client['name'] ?></p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Due - Amount -->
                                <td class="px-4 py-3 text-sm"><?= $client['amount'] ?></td>

                                <!-- Due - Status -->
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                        <?= $statusBadge['text'] ?>
                                    </span>
                                </td>

                                <!-- Due - Date -->
                                <td class="px-4 py-3 text-sm"><?= $client['date'] ?></td>

                                <!-- Due - Actions -->
                                <td class="px-4 py-3">
                                    <div class="relative inline-block text-left z-50">
                                        <!-- Toggle Button -->
                                        <input type="checkbox" id="due-toggle" class="peer hidden" />
                                        <label for="due-toggle"
                                            class="inline-flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                            <!-- Three Dots Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>
                                        </label>

                                        <!-- Dropdown Menu -->
                                        <div
                                            class="absolute left-0 mt-2 w-40 bg-white dark:bg-gray-800 rounded-md shadow-lg opacity-0 scale-y-75 peer-checked:opacity-100 peer-checked:scale-y-100 peer-checked:block hidden transition-all duration-200 origin-top">
                                            <div class="py-2">
                                                <!-- Extend Option -->
                                                <label for="due-toggle"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-300"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                    </svg>
                                                    View Details
                                                </label>

                                                <!-- Report Option -->
                                                <label for="due-toggle"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-300"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M4 4h16v2H4zm0 4h10v2H4zm0 4h16v2H4zm0 4h10v2H4z" />
                                                    </svg>
                                                    Report
                                                </label>

                                                <!-- Return Option -->
                                                <label for="due-toggle"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-300"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M16 12H8v-3l-4 4 4 4v-3h8z" />
                                                    </svg>
                                                    Returned
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            <!-- If No Due Bookings -->
                            <?php if (!$hasDue): ?>
                            <tr>
                                <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No Due bookings found.
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
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
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
        </div>
    </div>

    <!-- Cancelled Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Cancelled Bookings
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full">
                <div>
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap text-center">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b bg-gray-50">
                                    <th class="px-4 py-3">Client</th>
                                    <th class="px-4 py-3">Amount</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y">
                                <?php
    $hasCancelled = false;
    foreach ($clients as $client):
        if ($client['status'] !== "Cancel")
            continue;
        $hasCancelled = true;
                                                                                                                                                                                                            ?>
                                <tr class="text-gray-700">
                                    <!-- Cancelled - Client Info -->
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="<?= $client['avatar'] ?>" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <p class="font-semibold"><?= $client['name'] ?></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    <?= $client['role'] ?? 'Client' ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Cancelled - Amount -->
                                    <td class="px-4 py-3 text-sm">$ <?= $client['amount'] ?></td>

                                    <!-- Cancelled - Status -->
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full">
                                            Cancelled
                                        </span>
                                    </td>

                                    <!-- Cancelled - Date -->
                                    <td class="px-4 py-3 text-sm"><?= $client['date'] ?></td>

                                    <!-- Cancelled - Actions -->
                                    <td class="px-4 py-3">
                                        <div class="flex justify-center space-x-4 text-sm">
                                            <button data-modal-target="view-reason-modal"
                                                data-modal-toggle="view-reason-modal"
                                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 transition">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 4C7.03 4 2.73 6.7 2.07 9.99c-.27.92-.27 1.92 0 2.84C2.73 17.3 7.03 20 12 20c4.97 0 9.27-2.7 9.93-5.17.27-.92.27-1.92 0-2.84C21.27 6.7 16.97 4 12 4zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" />
                                                </svg>
                                                View Reason
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                                <!-- If No Cancelled Bookings -->
                                <?php if (!$hasCancelled): ?>
                                <tr>
                                    <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No Cancelled bookings found.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing 11-20 of 100
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
                            <li><button
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">1</button>
                            </li>
                            <li><button
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">2</button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    3
                                </button>
                            </li>
                            <li><button
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">4</button>
                            </li>
                            <li><span class="px-3 py-1">...</span></li>
                            <li><button
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">8</button>
                            </li>
                            <li><button
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">9</button>
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
        </div>
    </div>

    <!-- View Detail Modal   -->
    <div id="viewdetail-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-start pt-10 px-4 sm:px-6 lg:px-8 bg-black bg-opacity-50 overflow-y-auto">
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-5xl p-3 space-y-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white ms-3">Booking Overview</h2>
                <button data-modal-toggle="viewdetail-modal"
                    class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
            </div>

            <!-- Content -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Renter Info Card -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm space-y-4">
                    <div class="flex items-center space-x-4">
                        <img src="renter-profile.jpg" alt="Renter"
                            class="w-16 h-16 rounded-full border-2 border-gray-400 shadow-md">
                        <div>
                            <p class="text-lg font-semibold text-gray-800 dark:text-white">John Doe</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300">johndoe@example.com</p>
                        </div>
                    </div>
                    <div class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>Contact:</strong> +123 456 7890</p>
                        <p><strong>License #:</strong> D12345678</p>
                        <p><strong>Expiry:</strong> 2027-05-15</p>
                    </div>
                    <!-- Check Profile Button -->
                    <div class="pt-4">
                        <a href="#"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">
                            Check Profile
                        </a>
                    </div>
                </div>

                <!-- Vehicle Info Card -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-3 shadow-sm space-y-4">
                    <img src="vehicle-image.jpg" alt="Vehicle" class="w-full h-40 object-cover rounded-xl shadow-sm">
                    <div class="grid grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>Type:</strong> SUV</p>
                        <p><strong>Plate:</strong> ABC-1234</p>
                        <p><strong>Fuel:</strong> Petrol</p>
                        <p><strong>Transmission:</strong> Automatic</p>
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm space-y-3">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Booking Details</h3>
                <div class="grid sm:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
                    <p><strong>Pickup Location:</strong> Main Street, City</p>
                    <p><strong>Drop-off Location:</strong> Central Park, City</p>
                    <p><strong>Pickup Date & Time:</strong> 2025-04-20 10:00 AM</p>
                    <p><strong>Return Date & Time:</strong> 2025-04-25 10:00 AM</p>
                    <!-- Booking Status -->
                    <div class="sm:col-span-2">
                        <strong>Status:</strong>
                        <span
                            class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                            Paid
                        </span>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div
                class="flex justify-end gap-3 px-6 py-4 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                <button data-modal-hide="viewdetail-modal" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Approval Modal -->
    <div id="approve-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg mx-auto transform transition-all overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Booking Approval
                </h5>
                <button data-modal-hide="approve-modal" type="button"
                    class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 py-6 space-y-5 text-center">
                <div class="flex justify-center">
                    <svg class="text-green-500 w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <p class="text-lg font-medium text-gray-700 dark:text-gray-200">
                    Are you sure you want to approve this <span class="font-semibold text-green-600">booking request</span>?
                </p>

                <!-- Booking Summary -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-left space-y-2">
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Booking ID:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">#BKG-2104</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Renter Name:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">John Rex Partoza</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Pickup:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">April 22, 2025 - 10:00 AM</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Status:</span>
                        <span class="text-sm font-semibold text-green-600">Pending Approval</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div
                class="flex justify-end gap-3 px-6 py-4 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                <button data-modal-hide="approve-modal" type="button"
                    class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition">
                    Approve Booking
                </button>
                <button data-modal-hide="approve-modal" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>


    <!-- Cancel Modal -->
    <div id="cancel-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-4xl mx-auto transform transition-all overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Reason for Cancellation
                </h5>
                <button data-modal-hide="cancel-modal" type="button"
                    class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Textarea Column -->
                <div>
                    <label for="cancel-reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Please explain your reason for cancellation:
                    </label>
                    <textarea id="cancel-reason" rows="6" required
                        class="w-full px-4 py-3 h-48 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                        placeholder="Enter your reason here..."></textarea>
                </div>

                <!-- Suggested Reasons -->
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-inner overflow-y-auto max-h-60">
                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">Common Reasons:</p>
                    <ul class="space-y-2">
                        <li>
                            <button
                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                data-reason="Change of travel plans">
                                • Change of travel plans
                            </button>
                        </li>
                        <li>
                            <button
                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                data-reason="Found a better deal elsewhere">
                                • Found a better deal
                            </button>
                        </li>
                        <li>
                            <button
                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                data-reason="No longer need the vehicle">
                                • Vehicle no longer needed
                            </button>
                        </li>
                        <li>
                            <button
                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                data-reason="Booking was made by mistake">
                                • Booking mistake
                            </button>
                        </li>
                        <li>
                            <button
                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                data-reason="Emergency or unforeseen circumstance">
                                • Emergency or unforeseen circumstances
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="px-6">
                <label class="flex items-center text-sm text-gray-700 mb-3">
                    <input type="checkbox" id="confirm-cancel" class="form-checkbox h-4 w-4 text-blue-600 transition"
                        required>
                    <span class="ms-2">I confirm that I understand and agree to proceed with the cancellation of my
                        booking.</span>
                </label>
            </div>
            <!-- Footer -->
            <div
                class="flex justify-end gap-3 px-6 py-2 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                <button data-modal-hide="cancel-modal" type="submit"
                    class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition">
                    Submit Reason
                </button>
                <button data-modal-hide="cancel-modal" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Close
                </button>
            </div>
        </div>
    </div>

    <div id="invoice-section" class="hidden print:block px-8 py-10 font-sans text-gray-800">
        <div class="max-w-3xl mx-auto border border-dashed border-black p-6 bg-white">

            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-4 mb-4">
                <div class="flex items-center">
                    <!-- Logo -->
                    <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo" class="w-25 h-12" />

                    <!-- Company Info -->
                    <div>
                        <p class="text-2xl font-bold">BMP Car Rentals</p>
                        <p class="text-sm">123 Main St, Davao City</p>
                        <p class="text-sm">Phone: (082) 123-4567</p>
                    </div>
                </div>

                <!-- Invoice Info -->
                <div class="text-right">
                    <p class="text-xl font-semibold">Rental Invoice</p>
                    <p class="text-sm">Invoice #: <span class="font-medium">INV-00123</span></p>
                    <p class="text-sm">Date: April 20, 2025</p>
                </div>
            </div>

            <!-- Remaining Content -->
            <!-- (Customer Details, Rental Info, Charges, etc...) -->

            <div class="mb-6">
                <h4 class="text-md font-semibold mb-2">Customer Details</h4>
                <p class="text-sm"><span class="font-medium">Name:</span> John Rex T. Partoza</p>
                <p class="text-sm"><span class="font-medium">Phone:</span> 0912-345-6789</p>
                <p class="text-sm"><span class="font-medium">Email:</span> johnrex@email.com</p>
            </div>

            <div class="mb-6">
                <p class="text-md font-semibold mb-2">Rental Information</p>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <p><span class="font-medium">Car Model:</span> Toyota Vios 2021</p>
                    <p><span class="font-medium">Plate #:</span> ABC-1234</p>
                    <p><span class="font-medium">Pickup Date:</span> April 22, 2025 - 10:00 AM</p>
                    <p><span class="font-medium">Return Date:</span> April 25, 2025 - 10:00 AM</p>
                    <p><span class="font-medium">Rental Duration:</span> 3 Days</p>
                    <p><span class="font-medium">Status:</span> Paid</p>
                </div>
            </div>

            <div class="mb-6">
                <h4 class="text-md font-semibold mb-2">Charges</h4>
                <div class="text-sm space-y-1">
                    <div class="flex justify-between">
                        <span>Daily Rate</span><span>₱2,000.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Total Days</span><span>3</span>
                    </div>
                    <div class="flex justify-between font-semibold border-t pt-2">
                        <span>Total Amount</span><span>₱6,000.00</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-8">
                <p class="text-sm text-gray-500 italic">Thank you for choosing BMP Car Rentals!</p>
            </div>
        </div>
    </div>

    <div id="agreement-section" class="hidden px-8 py-10 font-sans text-gray-800 print:text-black">
        <div class="max-w-4xl mx-auto  bg-white">
            <!-- Header -->

            <!-- Logo -->
            <div class="flex justify-center">
                <img src="{{ asset('assets/logowithtext.png') }}" alt="BMP Logo" class="w-50 h-14 mb-2">
            </div>

            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-gray-800 border-b pb-3 print:text-black print:mb-4">
                Rental Agreement & Policies</h2>
            <div class="flex justify-between items-center border-b pb-2 mb-3">

                <div>
                    <h2 class="text-sm font-medium">BMP Car Rental</h2>
                    <p class="text-sm">123 Main St, Davao City</p>
                    <p class="text-sm">Phone: (082) 123-4567</p>
                </div>
                <div class="text-right">
                    <p class="text-sm">Agreement Date: April 20, 2025</p>
                </div>
            </div>

            <!-- Customer Details -->
            <div class="mb-4">
                <h4 class="text-md font-semibold mb-2">Customer Details</h4>
                <div class="text-sm">
                    <p><span class="font-medium">Name:</span> John Rex T. Partoza</p>
                    <p><span class="font-medium">Phone:</span> 0912-345-6789</p>
                    <p><span class="font-medium">Email:</span> johnrex@email.com</p>
                </div>
            </div>

            <!-- Rental Info -->
            <div class="mb-4">
                <h4 class="text-md font-semibold mb-2">Rental Information</h4>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <p><span class="font-medium">Car Model:</span> Toyota Vios 2021</p>
                    <p><span class="font-medium">Plate #:</span> ABC-1234</p>
                    <p><span class="font-medium">Pickup Date:</span> April 22, 2025 - 10:00 AM</p>
                    <p><span class="font-medium">Return Date:</span> April 25, 2025 - 10:00 AM</p>
                    <p><span class="font-medium">Rental Duration:</span> 3 Days</p>
                    <p><span class="font-medium">Status:</span> Paid</p>
                </div>
            </div>

            <!-- Rental Policies -->
            <div class="mb-4">
                <h3 class="text-md font-semibold mb-2">Rental Policies</h3>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-2">
                    <li>Renter must be at least 21 years old with a valid driver’s license.</li>
                    <li>Vehicles must be returned with the same fuel level to avoid extra charges.</li>
                    <li>Smoking is strictly prohibited in all rental vehicles.</li>
                    <li>All rentals require a security deposit via valid credit/debit card.</li>
                    <li>Late returns incur additional hourly charges after a 1-hour grace period.</li>
                    <li>Only authorized drivers listed in the agreement may operate the vehicle.</li>
                    <li>No pets allowed unless prior approval is given.</li>
                    <li>Renter is responsible for any traffic violations or toll fees during rental.</li>
                    <li>Any damage to the vehicle must be reported immediately to the rental company.</li>
                    <li>Rental extensions must be requested 24 hours in advance and are subject to availability.</li>
                </ul>
            </div>

            <!-- Agreement Statement -->
            <div class="mb-8 mt-10 text-sm leading-relaxed text-gray-800 dark:text-gray-200">
                <p>
                    I, <span class="font-semibold underline underline-offset-2 decoration-gray-400">John Rex T.
                        Partoza</span>,
                    hereby acknowledge that I have read, understood, and agreed to the rental policies of BMP Car Rental. I
                    accept responsibility for the vehicle during the rental period and agree to comply with the terms stated
                    above.
                </p>
            </div>

            <!-- Signature -->
            <div class="flex justify-between items-end mt-12">
                <div class="w-1/2 text-center">
                    <div class="border-t border-gray-500 w-full mb-1"></div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Signature of Renter</p>
                </div>
                <div class="w-1/3 text-right text-sm">
                    <p class="text-gray-600 dark:text-gray-400">Date: April 20, 2025</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.suggest-btn').forEach(button => {
            button.addEventListener('click', () => {
                const reason = button.getAttribute('data-reason');
                document.getElementById('cancel-reason').value = reason;
            });
        });

        function printInvoice() {
            const invoiceContent = document.getElementById("invoice-section").innerHTML;

            const printWindow = window.open('', '_blank');
            const html = `
                            <html>
                                <head>
                                    <title>Rental Invoice</title>
                                <style>
                                    @page {
                                        margin: 0;
                                    }
                                    body {
                                        margin: 1cm;
                                        font-family: sans-serif;
                                        color: #000;
                                        background-color: #ffffff !important;
                                    }

                                    /* Print utility classes */
                                    .hidden { display: block !important; }
                                    .print\:block { display: block !important; }
                                    .print\:hidden { display: none !important; }

                                    /* Utility classes */
                                    .text-center { text-align: center; }
                                    .text-right { text-align: right; }

                                    .font-sans { font-family: sans-serif; }
                                    .font-bold { font-weight: bold; }
                                    .font-medium { font-weight: 500; }
                                    .font-semibold { font-weight: 600; }
                                    .italic { font-style: italic; }

                                    .text-sm { font-size: 0.875rem; }
                                    .text-md { font-size: 1rem; }
                                    .text-xl { font-size: 1.25rem; }
                                    .text-2xl { font-size: 1.5rem; }

                                    .text-gray-800 { color: #1F2937; }
                                    .text-gray-500 { color: #6B7280; }
                                    .text-gray-300 { color: #D1D5DB; }

                                    .mb-2 { margin-bottom: 0.5rem; }
                                    .mb-4 { margin-bottom: 1rem; }
                                    .mb-6 { margin-bottom: 1.5rem; }
                                    .mt-8 { margin-top: 2rem; }

                                    .pb-4 { padding-bottom: 1rem; }
                                    .pt-2 { padding-top: 0.5rem; }
                                    .p-6 { padding: 1.5rem; }
                                    .px-8 { padding-left: 2rem; padding-right: 2rem; }
                                    .py-10 { padding-top: 2.5rem; padding-bottom: 2.5rem; }

                                    .border { border: 1px solid #000; }
                                    .border-b { border-bottom: 1px solid #000; }
                                    .border-t { border-top: 1px solid #000; }
                                    .border-dashed { border-style: dashed; }

                                    .bg-white { background-color: #fff; }

                                    .grid { display: grid; }
                                    .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }

                                    .flex { display: flex; }
                                    .flex-col { flex-direction: column; }
                                    .justify-between { justify-content: space-between; }
                                    .items-center { align-items: center; }

                                    .gap-2 { gap: 0.5rem; }

                                    .max-w-3xl { max-width: 768px; }
                                    .mx-auto { margin-left: auto; margin-right: auto; }

                                    .w-25 { width: 6.25rem; }
                                    .w-50 { width: 12.5rem; } /* Adjusted to match agreement section */
                                    .h-12 { height: 3rem; }
                                    .w-14 { width: 3.5rem; } /* Adjusted to match agreement section */

                                    .space-y-1 > :not([hidden]) ~ :not([hidden]) {
                                        margin-top: 0.25rem;
                                    }

                                    /* Add this rule to reduce spacing in the header and address sections */
                                    .flex > div > p {
                                        margin-top: 0.2rem;
                                        margin-bottom: 0.2rem;
                                    }

                                    /* Add this rule to reduce spacing in the rental information */
                                    .mb-6 > p {
                                        margin-top: 0.3rem;
                                        margin-bottom: 0.3rem;
                                    }


                                </style>   
                                </head>
                                <body onload="window.print(); window.onafterprint = () => window.close();">
                                    ${invoiceContent}
                                </body>
                            </html>
                        `;

            printWindow.document.write(html);
            printWindow.document.close();
        }


        function printAgreement() {
            const agreementContent = document.getElementById("agreement-section").innerHTML;

            const printWindow = window.open('', '_blank');
            const html = `
                    <html>
                        <head>
                            <title>Rental Agreement</title>
                            <style>
                                @page {
                                    margin: 0;
                                }
                                body {
                                    margin: 1cm;
                                    font-family: sans-serif;
                                    color: #000;
                                    background-color: #ffffff !important;
                                }

                                /* Print utility classes */
                                .hidden { display: block !important; }
                                .print\\:block { display: block !important; }
                                .print\\:hidden { display: none !important; }

                                /* Utility classes */
                                .text-center { text-align: center; }
                                .text-right { text-align: right; }

                                .font-sans { font-family: sans-serif; }
                                .font-bold { font-weight: bold; }
                                .font-medium { font-weight: 500; }
                                .font-semibold { font-weight: 600; }
                                .italic { font-style: italic; }

                                .text-sm { font-size: 0.875rem; }
                                .text-md { font-size: 1rem; }
                                .text-xl { font-size: 1.25rem; }
                                .text-2xl { font-size: 1.5rem; }

                                .text-gray-800 { color: #1F2937; }
                                .text-gray-500 { color: #6B7280; }
                                .text-gray-300 { color: #D1D5DB; }

                                .mb-2 { margin-bottom: 0.5rem; }
                                .mb-4 { margin-bottom: 1rem; }
                                .mb-6 { margin-bottom: 1.5rem; }
                                .mt-8 { margin-top: 2rem; }

                                .pb-4 { padding-bottom: 1rem; }
                                .pt-2 { padding-top: 0.5rem; }
                                .p-6 { padding: 1.5rem; }
                                .px-8 { padding-left: 2rem; padding-right: 2rem; }
                                .py-10 { padding-top: 2.5rem; padding-bottom: 2.5rem; }

                                .border { border: 1px solid #000; }
                                .border-b { border-bottom: 1px solid #000; }
                                .border-t { border-top: 1px solid #000; }
                                .border-dashed { border-style: dashed; }

                                .bg-white { background-color: #fff; }

                                .grid { display: grid; }
                                .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }

                                .flex { display: flex; }
                                .flex-col { flex-direction: column; }
                                .justify-between { justify-content: space-between; }
                                .items-center { align-items: center; }

                                .gap-2 { gap: 0.5rem; }

                                .max-w-4xl { max-width: 896px; } /* Adjusted to match agreement section */
                                .mx-auto { margin-left: auto; margin-right: auto; }

                                .w-50 { width: 12.5rem; } /* Adjusted to match agreement section */
                                .h-14 { height: 3.5rem; } /* Adjusted to match agreement section */
                                .mb-2 { margin-bottom: 0.5rem; } /* Ensure some bottom margin for the logo */

                                .space-y-2 > :not([hidden]) ~ :not([hidden]) {
                                    margin-top: 0.5rem; /* Adjusted to match agreement section */
                                }

                                .leading-relaxed { line-height: 1.625; } /* Added to match agreement text */
                                .underline { text-decoration: underline; }
                                .underline-offset-2 { text-underline-offset: 2px; }
                                .decoration-gray-400 { text-decoration-color: #9CA3AF; }
                                .list-disc { list-style-type: disc; }
                                .list-inside { list-style-position: inside; }
                                .text-gray-700 { color: #374151; }
                                .dark\:text-gray-300 { color: #D1D5DB; }
                                .dark\:text-gray-200 { color: #E5E7EB; }
                                .mt-10 { margin-top: 2.5rem; }
                                .mt-12 { margin-top: 3rem; }
                                .w-1\/2 { width: 50%; }
                                .w-1\/3 { width: 33.333333%; }
                                .items-end { align-items: flex-end; }
                                .mb-1 { margin-bottom: 0.25rem; }
                                .text-gray-600 { color: #4B5563; }
                                .dark\:text-gray-400 { color: #9CA3AF; }
                                .pb-3 { padding-bottom: 0.75rem; }

                                /* Target the <p> elements within the Rental Information grid */
                                .mb-4 > .grid > p {
                                    margin-top: 0.1rem; /* Reduce top margin */
                                    margin-bottom: 0.1rem; /* Reduce bottom margin */
                                    line-height: 1.2; /* Optionally reduce line height within the lines */
                                }

                                /* Slightly reduce margin below the Rental Information heading */
                                .mb-4 > .text-md {
                                    margin-bottom: 0.1rem;
                                }

                                /* Center the logo image */
                                .flex.justify-center > img {
                                    display: block; /* Ensure it behaves as a block-level element */
                                    margin-left: auto; /* Push it to the right */
                                    margin-right: auto; /* Push it to the left */
                                }

                                /* Add spacing to the company information */
                                .flex.justify-between > div > h2.text-sm,
                                .flex.justify-between > div > p.text-sm {
                                    margin-bottom: 0.2rem; /* Add a small bottom margin to each line */
                                }
                            </style>
                        </head>
                        <body onload="window.print(); window.onafterprint = () => window.close();">
                            ${agreementContent}
                        </body>
                    </html>
                `;

            printWindow.document.write(html);
            printWindow.document.close();
        }
    </script>
@endsection