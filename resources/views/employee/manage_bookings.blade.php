@extends('layouts.administration')

@section('content')
    <?php
    $clients = [
        ['id' => '1', 'name' => 'Hans Burger', 'amount' => "$863.45", 'status' => 'Approved', 'date' => '6/10/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg'],
        ['id' => '2', 'name' => 'Sarah Lee', 'amount' => "$123.45", 'status' => 'Paid', 'date' => '5/12/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/2.jpg'],
        ['id' => '3', 'name' => 'John Doe', 'amount' => "$245.67", 'status' => 'Ongoing', 'date' => '7/15/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg'],
        ['id' => '4', 'name' => 'Emily Clark', 'amount' => "$543.21", 'status' => 'Reported', 'date' => '4/5/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/4.jpg'],
        ['id' => '5', 'name' => 'Mark Thompson', 'amount' => "$789.99", 'status' => 'Due', 'date' => '6/25/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/5.jpg'],
        ['id' => '6', 'name' => 'Anna Swift', 'amount' => "$903.12", 'status' => 'Unpaid', 'date' => '3/18/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/6.jpg'],
        ['id' => '7', 'name' => 'Jack Daniels', 'amount' => "$450.67", 'status' => 'Paid', 'date' => '2/11/2020', 'avatar' => 'https://randomuser.me/api/portraits/men/7.jpg'],
        ['id' => '8', 'name' => 'Lily Adams', 'amount' => "$654.88", 'status' => 'Approved', 'date' => '1/21/2020', 'avatar' => 'https://randomuser.me/api/portraits/women/8.jpg'],
        ['id' => '9', 'name' => 'Carlos Reyes', 'amount' => "$712.33", 'status' => 'Pick-Up', 'date' => '8/13/2021', 'avatar' => 'https://randomuser.me/api/portraits/men/9.jpg'],
        ['id' => '10', 'name' => 'Mia Gonzalez', 'amount' => "$320.20", 'status' => 'Due', 'date' => '11/2/2021', 'avatar' => 'https://randomuser.me/api/portraits/women/10.jpg'],
        ['id' => '11', 'name' => 'Noah Smith', 'amount' => "$615.49", 'status' => 'Ongoing', 'date' => '10/8/2022', 'avatar' => 'https://randomuser.me/api/portraits/men/11.jpg'],
        ['id' => '12', 'name' => 'Olivia Johnson', 'amount' => "$982.00", 'status' => 'Unpaid', 'date' => '6/30/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/12.jpg'],
        ['id' => '13', 'name' => 'William Brown', 'amount' => "$134.80", 'status' => 'Reported', 'date' => '4/18/2021', 'avatar' => 'https://randomuser.me/api/portraits/men/13.jpg'],
        ['id' => '14', 'name' => 'Emma Davis', 'amount' => "$768.90", 'status' => 'Paid', 'date' => '9/5/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/14.jpg'],
        ['id' => '15', 'name' => 'James Wilson', 'amount' => "$402.56", 'status' => 'Approved', 'date' => '7/19/2022', 'avatar' => 'https://randomuser.me/api/portraits/men/15.jpg'],
        ['id' => '16', 'name' => 'Sophia Moore', 'amount' => "$823.47", 'status' => 'Paid', 'date' => '3/12/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/16.jpg'],
        ['id' => '17', 'name' => 'Benjamin Taylor', 'amount' => "$553.21", 'status' => 'Ongoing', 'date' => '5/24/2023', 'avatar' => 'https://randomuser.me/api/portraits/men/17.jpg'],
        ['id' => '18', 'name' => 'Isabella Martinez', 'amount' => "$731.95", 'status' => 'Due', 'date' => '10/29/2023', 'avatar' => 'https://randomuser.me/api/portraits/women/18.jpg'],
        ['id' => '19', 'name' => 'Logan Anderson', 'amount' => "$888.65", 'status' => 'Unsettle', 'date' => '9/2/2023', 'avatar' => 'https://randomuser.me/api/portraits/men/19.jpg'],
        ['id' => '20', 'name' => 'Ava Thomas', 'amount' => "$610.77", 'status' => 'Unsettle', 'date' => '1/11/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/20.jpg'],
        ['id' => '21', 'name' => 'Elijah Jackson', 'amount' => "$299.99", 'status' => 'Paid', 'date' => '2/5/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/21.jpg'],
        ['id' => '22', 'name' => 'Charlotte White', 'amount' => "$753.88", 'status' => 'Approved', 'date' => '1/28/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/22.jpg'],
        ['id' => '23', 'name' => 'Lucas Harris', 'amount' => "$480.34", 'status' => 'Ongoing', 'date' => '3/15/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/23.jpg'],
        ['id' => '24', 'name' => 'Amelia Martin', 'amount' => "$199.99", 'status' => 'Due', 'date' => '3/30/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/24.jpg'],
        ['id' => '25', 'name' => 'Henry Clark', 'amount' => "$920.65", 'status' => 'Unpaid', 'date' => '4/1/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/25.jpg'],
        ['id' => '26', 'name' => 'Grace Lewis', 'amount' => "$330.20", 'status' => 'Paid', 'date' => '4/10/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/26.jpg'],
        ['id' => '27', 'name' => 'Daniel Walker', 'amount' => "$875.50", 'status' => 'Pick-Up', 'date' => '4/15/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/27.jpg'],
        ['id' => '28', 'name' => 'Chloe Hall', 'amount' => "$702.45", 'status' => 'Approved', 'date' => '4/18/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/28.jpg'],
        ['id' => '29', 'name' => 'Matthew Allen', 'amount' => "$515.99", 'status' => 'Paid', 'date' => '4/19/2024', 'avatar' => 'https://randomuser.me/api/portraits/men/29.jpg'],
        ['id' => '30', 'name' => 'Harper Young', 'amount' => "$682.30", 'status' => 'Due', 'date' => '4/20/2024', 'avatar' => 'https://randomuser.me/api/portraits/women/30.jpg'],
    ];
    
    function getStatusBadge($status)
    {
        switch ($status) {
            case 'Paid':
                return ['text' => 'Paid', 'color' => 'bg-green-100 text-green-700'];
            case 'Ongoing':
                return ['text' => 'Ongoing', 'color' => 'bg-emerald-100 text-emerald-700'];
            case 'Cancelled':
                return ['text' => 'Cancelled', 'color' => 'bg-red-100 text-red-700'];
            case 'Due for Return':
                return ['text' => 'Due for Return', 'color' => 'bg-orange-100 text-orange-700'];
            case 'Unsettled':
                return ['text' => 'Unsettled', 'color' => 'bg-purple-100 text-purple-700'];
            case 'Reported':
                return ['text' => 'Reported', 'color' => 'bg-red-100 text-red-700'];
            case 'Unpaid':
                return ['text' => 'Unpaid', 'color' => 'bg-yellow-100 text-yellow-700'];
            case 'Pick-Up':
                return ['text' => 'For Pick-Up', 'color' => 'bg-cyan-100 text-cyan-700'];
            case 'Approved':
                return ['text' => 'Approved', 'color' => 'bg-blue-100 text-blue-700'];
            default:
                return ['text' => 'Unknown', 'color' => 'bg-gray-100 text-gray-700'];
        }
    }
    ?>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Manage Bookings
    </h2>

    <!-- Tab Options Sections -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="bookings-tab"
            data-tabs-toggle="#bookings-tab-content" role="tablist">
            @if(Auth::user()->employee->role == 'Cashier' || Auth::user()->employee->role == 'Admin')
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="payment-tab" data-tabs-target="#payment"
                    type="button" role="tab" aria-controls="payment" aria-selected="false">For Payment</button>
            </li>
            @endif
            @if(Auth::user()->employee->role == 'Front Desk' || Auth::user()->employee->role == 'Admin')
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="approval-tab" data-tabs-target="#approval"
                    type="button" role="tab" aria-controls="approval" aria-selected="false">For Approval</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="approved-tab" data-tabs-target="#approved"
                    type="button" role="tab" aria-controls="approved" aria-selected="false">Approved</button>
            </li>
            @endif
            @if(Auth::user()->employee->role == 'Manager' || Auth::user()->employee->role == 'Admin')
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="pickup-tab" data-tabs-target="#pickup"
                    type="button" role="tab" aria-controls="pickup" aria-selected="false">For Pick-Up</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="ongoing-tab" data-tabs-target="#ongoing" type="button" role="tab" aria-controls="ongoing"
                    aria-selected="false">Ongoing</button>
            </li>
            @endif
            @if(Auth::user()->employee->role == 'Mechanic' || Auth::user()->employee->role == 'Admin')
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
                    aria-selected="false">Reported/Unsettled</button>
            </li>
            @endif
        </ul>
    </div>

    <!-- For Payment Bookings Sections -->
    <div id="bookings-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="payment" role="tabpanel"
            aria-labelledby="payment-tab">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                For Payment Bookings
            </h4>
            <div class="w-full overflow-visible rounded-lg shadow-xs mb-2">
                <div class="w-full">
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
                            @if ($unpaidBookings->isNotEmpty())
                                @foreach ($unpaidBookings as $unpaidBooking)
                                    <?php
                                    $statusBadge = getStatusBadge($unpaidBooking->latestStatus->status);
                                    $dropdownId = 'unpaid-toggle-' . $unpaidBooking->id;
                                    ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <!-- For Approval - Client Name Data -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center mx-10 text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src={{ asset($unpaidBooking->customer->user->picture_path) }}
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <p class="font-semibold">{{ $unpaidBooking->customer->first_name }}
                                                        {{ $unpaidBooking->customer->middle_name ? $unpaidBooking->customer->middle_name . ' ' : '' }}
                                                        {{ $unpaidBooking->customer->last_name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <!--  For Approval - Amount -->
                                        <td class="px-4 py-3 text-sm">Php {{ $unpaidBooking->amount_due }}</td>

                                        <!--  For Approval - Status -->
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                                {{ $unpaidBooking->latestStatus->status }}
                                            </span>
                                        </td>

                                        <!-- For Approval - Date-->
                                        <td class="px-4 py-3 text-sm">{{ $unpaidBooking->latestStatus->status_date }}</td>

                                        <!--  For Approval - Actions -->
                                        <td class="px-4 py-3">

                                            <!-- Wrapper (Position Relative) -->
                                            <div class="relative inline-block text-left">
                                                <!-- Toggle Button -->
                                                <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                                <label for="<?= $dropdownId ?>"
                                                    class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <!-- Three Dots Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
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
                                                        <div data-modal-target="viewdetail-modal-{{ $unpaidBooking->id }}"
                                                            data-modal-toggle="viewdetail-modal-{{ $unpaidBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white dark:text-gray-300"
                                                                fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                            </svg>
                                                            View Details
                                                        </div>
                                                    </label>

                                                    <!-- Approve -->
                                                    <label for="payment-toggle">
                                                        <div data-modal-target="payment-modal-{{ $unpaidBooking->id }}"
                                                            data-modal-toggle="payment-modal-{{ $unpaidBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-green-600 rounded-md shadow hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path
                                                                    d="M2 4a2 2 0 012-2h12a2 2 0 012 2v1H2V4zm16 3v7a2 2 0 01-2 2H4a2 2 0 01-2-2V7h16zm-3 4a1 1 0 100 2h2a1 1 0 100-2h-2z" />
                                                            </svg>
                                                            Payment
                                                        </div>
                                                    </label>

                                                    <!-- Cancel -->
                                                    <label>
                                                        <div data-modal-target="cancel-modal-{{ $unpaidBooking->id }}" 
                                                             data-modal-toggle="cancel-modal-{{ $unpaidBooking->id }}"
                                                             class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414  10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                                                            </svg>
                                                            Cancel
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Loop Ending Point -->
                                @endforeach
                                <!-- If No For Approval Data-->
                            @else
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No bookings found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $unpaidBookings->links() }}
        </div>
    </div>

    <!-- Approval Bookings Sections -->
    <div id="bookings-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approval" role="tabpanel"
            aria-labelledby="approval-tab">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                For Approval Bookings
            </h4>
            <div class="w-full overflow-visible rounded-lg shadow-xs">
                <div class="w-full">
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
                            @if ($paidBookings->isNotEmpty())
                                @foreach ($paidBookings as $paidBooking)
                                    <?php
                                    $statusBadge = getStatusBadge($paidBooking->latestStatus->status);
                                    $dropdownId = 'paid-toggle-' . $paidBooking->id; ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <!-- For Approval - Client Name Data -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-start mx-10 text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src={{ asset($paidBooking->customer->user->picture_path) }}
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div class="flex flex-col">
                                                    <p class="font-semibold">{{ $paidBooking->customer->first_name }}
                                                        {{ $paidBooking->customer->middle_name ? $paidBooking->customer->middle_name . ' ' : '' }}
                                                        {{ $paidBooking->customer->last_name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <!--  For Approval - Amount -->
                                        <td class="px-4 py-3 text-sm">Php {{ $paidBooking->amount_due }}</td>

                                        <!--  For Approval - Status -->
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                                {{ $paidBooking->latestStatus->status }}
                                            </span>
                                        </td>

                                        <!-- For Approval - Date-->
                                        <td class="px-4 py-3 text-sm">{{ $paidBooking->latestStatus->status_date }}</td>

                                        <!--  For Approval - Actions -->
                                        <td class="px-4 py-3">

                                            <!-- Wrapper (Position Relative) -->
                                            <div class="relative inline-block text-left">
                                                <!-- Toggle Button -->
                                                <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                                <label for="<?= $dropdownId ?>"
                                                    class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <!-- Three Dots Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
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
                                                        <div data-modal-target="viewdetail-modal-{{ $paidBooking->id }}"
                                                            data-modal-toggle="viewdetail-modal-{{ $paidBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white dark:text-gray-300"
                                                                fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                            </svg>
                                                            View Details
                                                        </div>
                                                    </label>

                                                    <!-- Approve -->
                                                    <label for="approval-toggle">
                                                        <div data-modal-target="approve-modal-{{ $paidBooking->id }}"
                                                            data-modal-toggle="approve-modal-{{ $paidBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-green-600 rounded-md shadow hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                                                            </svg>
                                                            Approve
                                                        </div>
                                                    </label>

                                                    <!-- Cancel -->
                                                    </label for="approval-toggle">
                                                    <div data-modal-target="cancel-modal-{{ $paidBooking->id }}" data-modal-toggle="cancel-modal-{{ $paidBooking->id }}"
                                                        class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                                        <svg class="w-5 h-5 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
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
                                @endforeach
                                <!-- If No For Approval Data-->
                            @else
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No For Approval bookings found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $paidBookings->links() }}
        </div>
    </div>


    <!-- Approved Bookings Section --!>
        <div id="bookings-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="approved" role="tabpanel"
                aria-labelledby="approved-tab">
                <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    All Approved Bookings
                </h4>
                <div class="w-full overflow-visible rounded-lg shadow-xs">
                    <div class="w-full">
                        <table class="w-full whitespace-no-wrap text-center">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">Client</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @if ($approvedBookings->isNotEmpty())
                                @foreach ($approvedBookings as $approvedBooking)
                                <?php
                                $statusBadge = getStatusBadge($approvedBooking->latestStatus->status);
                                $dropdownId = 'approved-toggle-' . $approvedBooking->id; ?>
                                                            <tr class="text-gray-700 dark:text-gray-400">
                                                                <!-- For Approval - Client Name Data -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center mx-10 text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src={{ asset($approvedBooking->customer->user->picture_path) }} alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $approvedBooking->customer->first_name }}
                                                {{ $approvedBooking->customer->middle_name ? $approvedBooking->customer->middle_name . ' ' : '' }}
                                                {{ $approvedBooking->customer->last_name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <!--  For Approval - Status -->
                                <td class="px-4 py-3 text-xs">
                                    <span class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                        {{ $approvedBooking->latestStatus->status }}
                                    </span>
                                </td>

                                <!-- For Approval - Date-->
                                <td class="px-4 py-3 text-sm">{{ $approvedBooking->latestStatus->status_date }}</td>

                                <!--  For Approval - Actions -->
                                <td class="px-4 py-3">

                                    <!-- Wrapper (Position Relative) -->
                                    <div class="relative inline-block text-left">
                                        <!-- Toggle Button -->
                                        <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                        <label for="<?= $dropdownId ?>"
                                            class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                            <!-- Three Dots Icon -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" class="w-5 h-5 pointer-events-none">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>
                                        </label>

                                        <!-- Dropdown Menu -->
                                        <div
                                            class="absolute right-0 mt-2 w-48 bg-white translate-y-ful bottom-50 rounded-md shadow-lg opacity-0 peer-checked:opacity-100 peer-checked:scale-100 peer-checked:block hidden transition-all duration-200 z-40">
                                            <!-- View Details -->
                                            <label for="viewdetail-modal">
                                                <div data-modal-target="viewdetail-modal-{{ $approvedBooking->id }}" data-modal-toggle="viewdetail-modal-{{ $approvedBooking->id }}"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                    </svg>
                                                    View Details
                                                </div>
                                            </label>

                                            <!-- Approve -->
                                            <label for="approvedtype-toggle">
                                                <div data-modal-target="approvedtype-modal-{{ $approvedBooking->id }}" data-modal-toggle="approvedtype-modal-{{ $approvedBooking->id }}"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-green-600 rounded-md shadow hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                                                    </svg>
                                                    Approved Type
                                                </div>
                                            </label>

                                            <!-- Cancel -->
                                            </label for="approval-toggle">
                                            <div data-modal-target="cancel-modal-{{ $approvedBooking->id }}" data-modal-toggle="cancel-modal-{{ $approvedBooking->id }}"
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
                                @endforeach
                                <!-- If No For Approval Data-->
                                @else
                                <tr>
                                    <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No Approved bookings found.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $approvedBookings->links() }}
            </div>
    </div>

    <!-- Pick Up Bookings Sections -->
    <div id="bookings-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="pickup" role="tabpanel"
            aria-labelledby="pickup-tab">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                For Pick Up Bookings
            </h4>
            <div class="w-full overflow-visible rounded-lg shadow-xs">
                <div class="w-full">
                    <table class="w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @if ($forPickUpBookings->isNotEmpty())
                                @foreach ($forPickUpBookings as $forPickUpBooking)
                                    <?php
                                    $statusBadge = getStatusBadge($forPickUpBooking->latestStatus->status);
                                    $dropdownId = 'pickup-toggle-' . $forPickUpBooking->id; ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <!-- For Approval - Client Name Data -->
                                        <td class="px-4 py-3">
                                            <div class="flex items-center mx-10 text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src={{ asset($forPickUpBooking->customer->user->picture_path) }}
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $forPickUpBooking->customer->first_name }}
                                                        {{ $forPickUpBooking->customer->middle_name ? $forPickUpBooking->customer->middle_name . ' ' : '' }}
                                                        {{ $forPickUpBooking->customer->last_name }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <!--  For Approval - Status -->
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                                {{ $forPickUpBooking->latestStatus->status }}
                                            </span>
                                        </td>

                                        <!-- For Approval - Date-->
                                        <td class="px-4 py-3 text-sm">{{ $forPickUpBooking->latestStatus->status_date }}
                                        </td>

                                        <!--  For Approval - Actions -->
                                        <td class="px-4 py-3">

                                            <!-- Wrapper (Position Relative) -->
                                            <div class="relative inline-block text-left">
                                                <!-- Toggle Button -->
                                                <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                                <label for="<?= $dropdownId ?>"
                                                    class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                    <!-- Three Dots Icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
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
                                                        <div data-modal-target="viewdetail-modal-{{ $forPickUpBooking->id }}"
                                                            data-modal-toggle="viewdetail-modal-{{ $forPickUpBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white dark:text-gray-300"
                                                                fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                            </svg>
                                                            View Details
                                                        </div>
                                                    </label>

                                                    <!-- Approve -->
                                                    <label for="pickup-toggle">
                                                        <div data-modal-target="pickup-modal-{{ $forPickUpBooking->id }}"
                                                            data-modal-toggle="pickup-modal-{{ $forPickUpBooking->id }}"
                                                            class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 cursor-pointer transition mx-2 my-1">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.293 4.293a1 1 0 00-1.414 0L8 10.586 5.707 8.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" />
                                                            </svg>
                                                            Picked-up
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Loop Ending Point -->
                                @endforeach
                                <!-- If No For Approval Data-->
                            @else
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No For Approval bookings found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $forPickUpBookings->links() }}
        </div>
    </div>

    <!-- Ongoing Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="ongoing" role="tabpanel"
        aria-labelledby="ongoing-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Ongoing Bookings
        </h4>
        <div class="w-full overflow-visible rounded-lg shadow-xs">
            <div class="w-full">
                <table class="w-full whitespace-no-wrap text-center">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                            <th class="px-4 py-3">Client</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @if ($ongoingBookings->isNotEmpty())
                        @foreach ($ongoingBookings as $ongoingBooking)
                        <?php
                        $statusBadge = getStatusBadge($ongoingBooking->latestStatus->status);
                        $dropdownId = 'approval-toggle-' . $ongoingBooking->id;
                        ?>

                        <tr class="text-gray-700 dark:text-gray-400">
                            <!-- Ongoing - Client Name Data -->
                            <td class="px-4 py-3">
                                <div class="flex items-center mx-10 text-sm">
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src={{ asset($ongoingBooking->customer->user->picture_path) }} alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-semibold">{{ $ongoingBooking->customer->first_name }} {{ $ongoingBooking->customer->middle_name ? $ongoingBooking->customer->middle_name . ' ' : '' }} {{ $ongoingBooking->customer->last_name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client</p>
                                    </div>
                                </div>
                            </td>

                            <!-- Ongoing - Status -->
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                    {{ $ongoingBooking->latestStatus->status }}
                                </span>
                            </td>

                            <!-- Ongoing - Date -->
                            <td class="px-4 py-3 text-sm">{{ $ongoingBooking->latestStatus->status_date }}</td>

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
                                            <div data-modal-target="viewdetail-modal-{{ $ongoingBooking->id }}" data-modal-toggle="viewdetail-modal-{{ $ongoingBooking->id }}"
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
                        @endforeach

                        <!-- If No Ongoing Data -->
                        @else
                        <tr>
                            <td colspan="5" class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                No Ongoing bookings found.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{ $ongoingBookings->links() }}
    </div>

    <!-- Due Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="due" role="tabpanel"
        aria-labelledby="due-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Due for Return Bookings
        </h4>
        <div class="w-full overflow-visible rounded-lg shadow-xs">
            <div class="w-full">
                    <table class="min-w-full whitespace-no-wrap text-center">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b">
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if ($dueForReturnBookings->isNotEmpty())
                            <!-- Loop through Due bookings -->
                            @foreach ($dueForReturnBookings as $dueForReturnBooking)
                            <?php
                            $statusBadge = getStatusBadge($dueForReturnBooking->latestStatus->status);
                            $dropdownId = 'approval-toggle-' . $dueForReturnBooking->id;
                            ?>

                            <tr class="text-gray-700 dark:text-gray-400">
                                <!-- Due - Client Name -->
                                <td class="px-4 py-3">
                                    <div class="flex items-center mx-10 text-sm">
                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img class="object-cover w-full h-full rounded-full"
                                                src={{ asset($dueForReturnBooking->customer->user->picture_path) }} alt="" loading="lazy" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                            </div>
                                        </div>
                                        <div class="text-left">
                                            <p class="font-semibold">{{ $dueForReturnBooking->customer->first_name }} {{ $dueForReturnBooking->customer->middle_name ? $dueForReturnBooking->customer->middle_name . ' ' : '' }} {{ $dueForReturnBooking->customer->last_name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400 text-left">Client</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Due - Status -->
                                <td class="px-4 py-3 text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                        {{ $dueForReturnBooking->latestStatus->status }}
                                    </span>
                                </td>

                                <!-- Due - Date -->
                                <td class="px-4 py-3 text-sm">{{ $dueForReturnBooking->latestStatus->status_date }}</td>

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
                                                <div data-modal-target="viewdetail-modal-{{ $dueForReturnBooking->id }}"
                                                    data-modal-toggle="viewdetail-modal-{{ $dueForReturnBooking->id }}"
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
                                            <label for="return-modal">
                                                <div data-modal-target="return-modal-{{ $dueForReturnBooking->id }}" data-modal-toggle="return-modal-{{ $dueForReturnBooking->id }}"
                                                    class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-green-600 rounded-md shadow hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 cursor-pointer transition mx-2 my-1">
                                                    <svg class="w-5 h-5 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path d="M16 12H8v-3l-4 4 4 4v-3h8z" />
                                                    </svg>
                                                    Returned
                                                </div>
                                            </label>

                                            <!-- Report -->
                                            </label for="report-renter-modal">
                                            <div data-modal-target="report-renter-modal-{{ $dueForReturnBooking->id }}"
                                                data-modal-toggle="report-renter-modal"-{{ $dueForReturnBooking->id }}
                                                class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M4 4h16v2H4zm0 4h10v2H4zm0 4h16v2H4zm0 4h10v2H4z" />
                                                </svg>
                                                Report
                                            </div>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <!-- If No Due Bookings -->
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
        {{ $dueForReturnBookings->links() }}
    </div>

    <!-- Unsettled/Reported Bookings Section -->
    <div class="hidden p-4 rounded-lg bg-gray-50" id="cancel" role="tabpanel" aria-labelledby="cancel-tab">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Reported Bookings
        </h4>
        <div class="w-full overflow-visible rounded-lg shadow-xs">
            <div class="w-full">
                <div>
                    <div class="w-full">
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
                            @if ($reportedBookings->isNotEmpty())
                                @foreach ($reportedBookings as $reportedBooking)
                                <?php
                                $statusBadge = getStatusBadge($reportedBooking->latestStatus->status);
                                $dropdownId = 'reportedunsettle-toggle-' . $reportedBooking->id; ?>
                                <tr class="text-gray-700">
                                    <!-- Cancelled - Client Info -->
                                    <td class="px-4 py-3">
                                        <div class="flex items-center mx-10 text-sm">
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src={{ asset($reportedBooking->customer->user->picture_path) }} alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true">
                                                </div>
                                            </div>
                                            <div class="text-left">
                                                <p class="font-semibold">{{ $reportedBooking->customer->first_name }} {{ $reportedBooking->customer->middle_name ? $reportedBooking->customer->middle_name . ' ' : '' }} {{ $reportedBooking->customer->last_name }}</p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400 text-left">
                                                    Client
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Reported - Amount -->
                                    <td class="px-4 py-3 text-sm">Php {{ $reportedBooking->amount_due }}</td>

                                    <!-- Reported - Status -->
                                    <td class="px-4 py-3 text-xs">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight <?= $statusBadge['color'] ?> rounded-full">
                                            {{ $reportedBooking->latestStatus->status }}
                                        </span>
                                    </td>

                                    <!-- Reported - Date -->
                                    <td class="px-4 py-3 text-sm">{{ $reportedBooking->latestStatus->status_date }}</td>

                                    <!-- Reported - Actions -->
                                    <td class="px-4 py-3">

                                        <!-- Wrapper (Position Relative) -->
                                        <div class="relative inline-block text-left">
                                            <!-- Toggle Button -->
                                            <input type="checkbox" id="<?= $dropdownId ?>" class="peer hidden" />
                                            <label for="<?= $dropdownId ?>"
                                                class="flex justify-center items-center w-10 h-10 text-gray-600 dark:text-gray-300 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer">
                                                <!-- Three Dots Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
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
                                                    <div data-modal-target="viewdetail-modal-{{ $reportedBooking->id }}"
                                                        data-modal-toggle="viewdetail-modal-{{ $reportedBooking->id }}"
                                                        class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 cursor-pointer transition mx-2 my-1">
                                                        <svg class="w-5 h-5 text-white dark:text-gray-300"
                                                            fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 4.5C7.03 4.5 3 7.61 3 10.5C3 13.39 7.03 16.5 12 16.5C16.97 16.5 21 13.39 21 10.5C21 7.61 16.97 4.5 12 4.5ZM12 14C9.79 14 8 11.77 8 10.5C8 9.23 9.79 7 12 7C14.21 7 16 9.23 16 10.5C16 11.77 14.21 14 12 14ZM12 9.5C11.17 9.5 10.5 10.17 10.5 11C10.5 11.83 11.17 12.5 12 12.5C12.83 12.5 13.5 11.83 13.5 11C13.5 10.17 12.83 9.5 12 9.5Z" />
                                                        </svg>
                                                        View Details
                                                    </div>
                                                </label>

                                                <!-- Resolve Button -->
                                                <label for="resolve-modal">
                                                    <div data-modal-target="resolve-modal-{{ $reportedBooking->id }}"
                                                        data-modal-toggle="resolve-modal-{{ $reportedBooking->id }}"
                                                        class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-blue-600 rounded-md shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 cursor-pointer transition mx-2 my-1">
                                                        <svg class="w-5 h-5 text-white" fill="none"
                                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        </svg>
                                                        Resolve
                                                    </div>
                                                </label>

                                                <!-- Blacklisted Button -->
                                                <label for="blacklist-modal">
                                                    <div data-modal-target="blacklist-modal-{{ $reportedBooking->id }}"
                                                        data-modal-toggle="blacklist-modal-{{ $reportedBooking->id }}"
                                                        class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                                        <svg class="w-5 h-5 text-white" fill="none"
                                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        Blacklisted
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- If No Cancelled Bookings -->
                                @else
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-3 text-center text-sm text-gray-500 dark:text-gray-400">
                                        No Reported/Unsettled bookings found.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $reportedBookings->links() }}
            </div>
        </div>
    </div>

@foreach ($allBookings as $booking)
    <!-- Resolve Report Modal -->
    <div id="resolve-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 sm:p-6 lg:p-8 bg-black bg-opacity-50 overflow-y-auto">
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-4xl p-6 space-y-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center pb-4 border-b dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Resolve Report</h2>
                <button data-modal-hide="resolve-modal-{{ $booking->id }}" class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
            </div>

            <!-- Booking Details Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Booking Details</h3>
                <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <div>
                        <label class="block font-medium">Booking ID</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            #123456
                        </p>
                    </div>
                    <div>
                        <label class="block font-medium">Customer Name</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            John Doe
                        </p>
                    </div>
                    <div>
                        <label class="block font-medium">Rental Dates</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            01/05/2025 - 05/05/2025
                        </p>
                    </div>
                </div>
            </div>

            <!-- Modal Content Grid with Scrollable Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Side: Renter Profile (Fixed height) -->
                <div
                    class="space-y-4 bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm flex flex-col max-h-[30vh] overflow-y-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Resolvation</h3>
                    <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                        <div>
                            <label class="block font-semibold mb-1">Amount to be Paid</label>
                            <div class="grid grid-cols-3 gap-3">
                                <p><strong>Base:</strong><br>$100.00</p>
                                <p><strong>Late Fee:</strong><br>$20.00</p>
                                <p><strong>Discount:</strong><br>-$10.00</p>
                                <p><strong>Tax:</strong><br>$5.00</p>
                                <p><strong>Paid:</strong><br>$100.00</p>
                                <p><strong>Balance:</strong><br><span class="text-red-600">$15.00</span></p>
                            </div>

                            <div class="mt-4 border-t pt-2 dark:border-gray-700">
                                <p class="text-sm"><strong>Total Due:</strong> <span
                                        class="text-blue-600 font-bold">$115.00</span>
                                </p>
                            </div>

                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Amount Paid</label>
                            <input type="number" placeholder="₱0.00"
                                class="w-full bg-white dark:bg-gray-700 border dark:border-gray-600 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div>
                            <label class="block font-semibold mb-1">Description</label>
                            <textarea rows="3" placeholder="Enter details..."
                                class="w-full bg-white dark:bg-gray-700 border dark:border-gray-600 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <div class="flex items-start space-x-2">
                            <input type="checkbox" id="agreement"
                                class="mt-1 rounded border-gray-300 focus:ring-blue-500" />
                            <label for="agreement" class="text-sm text-gray-600 dark:text-gray-300">
                                I agree to the payment terms and conditions.
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Right Side: Issue Details (Fixed height, scrollable) -->
                <div
                    class="space-y-6 bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm flex flex-col max-h-[30vh] overflow-y-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Issue Details</h3>
                    <div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <!-- Issue Type -->
                        <div>
                            <label class="block font-medium">Type of Issue</label>
                            <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                                Physical Damage
                            </p>
                        </div>

                        <!-- Issue Image in Separate Row -->
                        <div>
                            <label class="block font-medium">Issue Image</label>
                            <div class="w-32 h-32 overflow-hidden rounded-lg shadow-md">
                                <img src="path-to-issue-image.jpg" alt="Issue Image" class="w-full h-auto object-cover">
                            </div>
                        </div>

                        <!-- Issue Description in Separate Row -->
                        <div class="space-y-3">
                            <label class="block font-medium">Description</label>
                            <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                                The front bumper is cracked and has visible paint scratches. Damage likely caused by a minor
                                collision. The issue is significant enough to affect the car's appearance, and we recommend
                                a professional repair to restore it to its original condition.
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal Footer -->
            <div class="flex justify-end pt-4 border-t dark:border-gray-700 gap-3">
                <button data-modal-hide="resolve-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Cancel
                </button>
                <button
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                    Submit Resolution
                </button>
            </div>
        </div>
    </div>

    <!-- Blacklist Report Modal -->
    <div id="blacklist-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center p-4 sm:p-6 lg:p-8 bg-black bg-opacity-50 overflow-y-auto">
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-4xl p-6 space-y-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center pb-4 border-b dark:border-gray-700">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Blacklist Booking</h2>
                <button data-modal-hide="blacklist-modal-{{ $booking->id }}"
                    class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
            </div>

            <!-- Booking Details Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Booking Details</h3>
                <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <div>
                        <label class="block font-medium">Booking ID</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            #123456
                        </p>
                    </div>
                    <div>
                        <label class="block font-medium">Customer Name</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            John Doe
                        </p>
                    </div>
                    <div>
                        <label class="block font-medium">Rental Dates</label>
                        <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                            01/05/2025 - 05/05/2025
                        </p>
                    </div>
                </div>
            </div>

            <!-- Modal Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Side: Renter Profile (Fixed height) -->
                <div class="space-y-6">
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
                        <div class="pt-4 hidden">
                            <a href="#"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition hidden">
                                Check Profile
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Right Side: Issue Details (Fixed height, scrollable) -->
                <div
                    class="space-y-6 bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm flex flex-col max-h-[30vh] overflow-y-auto">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Issue Details</h3>
                    <div class="space-y-3 text-sm text-gray-700 dark:text-gray-300">
                        <!-- Issue Type -->
                        <div>
                            <label class="block font-medium">Type of Issue</label>
                            <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                                Physical Damage
                            </p>
                        </div>

                        <!-- Issue Image in Separate Row -->
                        <div>
                            <label class="block font-medium">Issue Image</label>
                            <div class="w-32 h-32 overflow-hidden rounded-lg shadow-md">
                                <img src="path-to-issue-image.jpg" alt="Issue Image" class="w-full h-auto object-cover">
                            </div>
                        </div>

                        <!-- Issue Description in Separate Row -->
                        <div class="space-y-3">
                            <label class="block font-medium">Description</label>
                            <p class="bg-gray-100 dark:bg-gray-800 p-3 rounded-lg text-gray-800 dark:text-gray-200">
                                The front bumper is cracked and has visible paint scratches. Damage likely caused by a minor
                                collision. The issue is significant enough to affect the car's appearance, and we recommend
                                a professional repair to restore it to its original condition.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end pt-4 border-t dark:border-gray-700 gap-3">
                <button data-modal-hide="blacklist-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Cancel
                </button>
                <button
                    class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition">
                    Blacklist Booking
                </button>
            </div>
        </div>
    </div>

    <!-- View Detail Modal   -->
    <div id="viewdetail-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-start px-4 sm:px-6 lg:px-8 bg-black bg-opacity-50 overflow-y-auto">
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-5xl p-3 space-y-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-4">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Booking Overview
                </h5>
                <button data-modal-toggle="viewdetail-modal-{{ $booking->id }}"
                    class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
            </div>

            <!-- Content -->
            <div class="modal-content grid md:grid-cols-2 gap-6">
                <!-- Renter Info Card -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm space-y-4">
                    <div class="flex items-center space-x-4">
                        <img src={{ asset($booking->customer->user->picture_path) }} alt="Renter"
                            class="w-16 h-16 rounded-full border-2 border-gray-400 shadow-md">
                        <div>
                            <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300">{{ $booking->customer->user->email }}</p>
                        </div>
                    </div>
                    <div class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>Contact:</strong> {{ $booking->customer->phone_number }}</p>
                        <p><strong>License #:</strong> {{ $booking->customer->driver_license_number }}</p>
                        <p><strong>Expiry:</strong> {{ $booking->customer->license_expiration_date }}</p>
                    </div>
                    <!-- Check Profile Button -->
                    <div class="pt-4 hidden">
                        <a href="#"
                            class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-lg transition">
                            Check Profile
                        </a>
                    </div>
                </div>

                <!-- Vehicle Info Card -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-3 shadow-sm space-y-4">
                    <img src={{ asset($booking->car->carModel->img_file_path) }} alt="Vehicle" class="mx-auto w-auto h-40 object-cover rounded-xl shadow-sm">
                    <div class="grid grid-cols-2 gap-2 text-sm text-gray-700 dark:text-gray-300">
                        <p><strong>Brand:</strong> {{ $booking->car->carModel->brand }}</p>
                        <p><strong>Model:</strong> {{ $booking->car->carModel->model_name }} {{ $booking->car->carModel->model_year }} </p>
                        <p><strong>Car Type:</strong> {{ $booking->car->carModel->car_type }}</p>
                        <p><strong>Plate Number:</strong> {{ $booking->car->license_plate }} </p>
                        <p><strong>Fuel Type:</strong> {{ $booking->car->carModel->fuel_type }} </p>
                        <p><strong>Transmission:</strong> {{ $booking->car->carModel->transmission }} </p>
                    </div>
                </div>
            </div>

            <!-- Booking Details -->
            <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-5 shadow-sm space-y-3">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">Booking Details</h3>
                <div class="grid sm:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
                    <p><strong>Pickup Location:</strong> Main Branch, Ecoland, Davao City</p>
                    <p><strong>Drop-off Location:</strong> Main Branch, Ecoland, Davao City</p>
                    <p><strong>Pickup Date & Time:</strong> {{ $booking->pickup_date }} </p>
                    <p><strong>Return Date & Time:</strong> {{ $booking->return_date }} </p>
                    <!-- Booking Status -->
                    <div class="sm:col-span-2">
                        <strong>Status:</strong>
                        <?php $statusBadge = getStatusBadge($booking->latestStatus->status); ?>
                        <span class="ml-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium <?= $statusBadge['color'] ?>">
                            {{ $booking->latestStatus->status }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div
                class="flex justify-end gap-3 px-6 py-4 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                <button data-modal-hide="viewdetail-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="payment-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg mx-auto transform transition-all overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Payment Details
                </h5>
                <button data-modal-hide="payment-modal-{{ $booking->id }}" type="button"
                    class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 py-6 space-y-5 text-left">
                <!-- Booking Summary -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Booking ID:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">#BKG-{{ sprintf('%04d', $booking->id) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Renter Name:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Car Rented:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">{{ $booking->car->carModel->brand }} {{ $booking->car->carModel->model_name }} {{ $booking->car->carModel->model_year }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Start Date:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($booking->pickup_date)->format('Y-m-d') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Due Date:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($booking->return_date)->format('Y-m-d') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Amount Due:</span>
                        <span class="text-sm font-semibold text-green-600" id="total-payment-outer">Php <span id="total-payment">{{ $booking->amount_due }}</span></span>
                    </div>
                </div>

                <!-- Payment Form -->
                <form action="{{ route('process-offline-payment', $booking->id ) }}" method="POST">
                    @csrf
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                            Amount Paid
                        </label>
                        <input type="number" id="amount-paid" placeholder="Enter amount" min="0" required
                            class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-gray-900 text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-green-500" />

                        <div class="flex justify-between items-center mt-2">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Change:</span>
                            <span class="text-sm font-semibold text-green-600" id="change-label">Php 0.00</span>
                        </div>
                    </div>
                
            </div>

            <!-- Footer -->
            <div
                class="flex justify-end gap-3 px-6 py-4 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                <button type="submit"
                    class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition">
                    Confirm Payment
                </button>
                </form>
                <button data-modal-hide="payment-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Approval Modal -->
    <div id="approve-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-lg mx-auto transform transition-all overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Booking Approval
                </h5>
                <button data-modal-hide="approve-modal-{{ $booking->id }}" type="button"
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
                    Are you sure you want to approve this <span class="font-semibold text-green-600">booking
                        request</span>?
                </p>

                <!-- Booking Summary -->
                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-left space-y-2">
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Booking ID:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">#BKG-{{ sprintf('%04d', $booking->id) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Renter Name:</span>
                        <span class="text-sm text-gray-800 dark:text-gray-100">{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</span>
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
                <form id="approve-booking-form-{{$booking->id}}" action="{{ route('approve-booking', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition approve-button">
                        Approve Booking
                    </button>
                </form>
                <button data-modal-hide="approve-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Approval Type -->
    <div id="approvedtype-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        Approval Type
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="approvedtype-modal-{{ $booking->id }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.293 4.293a1 1 0 011.414 0L10 6.586l2.293-2.293a1 1 0 111.414 1.414L11.414 8l2.293 2.293a1 1 0 01-1.414 1.414L10 9.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 8 6.293 5.707a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Please select the approval type for the booking:
                    </p>

                    <!-- Dropdown for Approval Type -->
                    <div class="relative">
                        <form action=" {{ route('change-approved-status', $booking->id) }} " method="POST">
                            @csrf
                            <select id="approval-type" name="approval_type"
                                class="block w-full px-4 py-2 text-sm text-gray-700 bg-white rounded-md shadow-sm border border-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:focus:ring-blue-600">
                                <option value="used-now">Used Now</option>
                                <option value="for-pickup">For Pickup</option>
                            </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 dark:border-gray-600">
                    <!-- Cancel Button -->
                    <button data-modal-hide="approvedtype-modal-{{ $booking->id }}" type="button"
                        class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 rounded-md py-2 text-sm">
                        Close
                    </button>
                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full text-white bg-green-600 border border-green-300 hover:bg-green-700 rounded-md py-2 text-sm">
                        Submit
                    </button>

                </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pickup Confirmation Modal -->
    <div id="pickup-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div class="relative w-full max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-2xl">

            <!-- Modal content -->
            <div class="flex flex-col space-y-6 p-3">

                <!-- Header -->
                <div class="flex items-center justify-between border-b p-2">
                    <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                        Car Pickup Confirmation
                    </h5>
                    <button data-modal-hide="pickup-modal-{{ $booking->id }}" type="button"
                        class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Body -->
                <div class="text-center space-y-5">
                    <div class="flex justify-center">
                        <svg class="text-green-500 w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-lg font-medium text-gray-700 dark:text-gray-200">
                        Are you sure you want to confirm the car pickup for the <span
                            class="font-semibold text-green-600">booking request</span>?
                    </p>

                    <!-- Booking Summary -->
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 text-left space-y-2">
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Booking ID:</span>
                            <span class="text-sm text-gray-800 dark:text-gray-100">#BKG-{{ sprintf('%04d', $booking->id) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Renter Name:</span>
                            <span class="text-sm text-gray-800 dark:text-gray-100">{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Pickup Time:</span>
                            <span class="text-sm text-gray-800 dark:text-gray-100">{{ \Carbon\Carbon::parse($booking->pickup_date)->format('F j, Y') }} - {{ $booking->actual_pickup_time }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300">Status:</span>
                            <span class="text-sm font-semibold text-green-600">Pickup Confirmed</span>
                        </div>
                    </div>

                    <!-- Checkbox for confirmation -->
                    <form action="{{ route('customer-picksup-car', $booking->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center justify-center space-x-2">
                        <input type="checkbox" id="confirmPickup"
                            class="h-5 w-5 text-green-600 border-gray-300 dark:border-gray-600 rounded" required/>
                        <label for="confirmPickup" class="text-sm text-gray-700 dark:text-gray-200">I confirm that the car
                            has been picked up</label>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-3">
                    <button data-modal-hide="pickup-modal-{{ $booking->id }}" type="button"
                        class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition"
                        id="confirmPickupBtn">
                        Confirm Pickup
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Modal -->
    <div id="cancel-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black bg-opacity-50 overflow-y-auto">

        <div
            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-4xl mx-auto transform transition-all overflow-hidden">

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Reason for Cancellation
                </h5>
                <button data-modal-hide="cancel-modal-{{ $booking->id }}" type="button"
                    class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <form action="{{ route('employee-cancel-booking', ['booking' => $booking->id]) }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Textarea Column -->
                    <div>
                        <label for="cancel-reason-{{ $booking->id }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Please explain your reason for cancellation:
                        </label>
                        <textarea id="cancel-reason-{{ $booking->id }}" name="cancel_reason" rows="6" required
                            class="w-full px-4 py-3 h-48 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="Enter your reason here..."></textarea>
                    </div>

                    <!-- Suggested Reasons -->
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-inner overflow-y-auto max-h-60">
                        <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">Common Reasons:</p>
                        <ul class="space-y-2">
                            <li>
                                <button type="button"
                                    class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                    data-reason="Change of travel plans"
                                    data-target="cancel-reason-{{ $booking->id }}">
                                    • Change of travel plans
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                    data-reason="Found a better deal elsewhere"
                                    data-target="cancel-reason-{{ $booking->id }}">
                                    • Found a better deal
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                    data-reason="No longer need the vehicle"
                                    data-target="cancel-reason-{{ $booking->id }}">
                                    • Vehicle no longer needed
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                    data-reason="Booking was made by mistake"
                                    data-target="cancel-reason-{{ $booking->id }}">
                                    • Booking mistake
                                </button>
                            </li>
                            <li>
                                <button type="button"
                                    class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                    data-reason="Emergency or unforeseen circumstance"
                                    data-target="cancel-reason-{{ $booking->id }}">
                                    • Emergency or unforeseen circumstances
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="px-6">
                    <label class="flex items-center text-sm text-gray-700 dark:text-gray-300 mb-3">
                        <input type="checkbox" id="confirm-cancel-{{ $booking->id }}" name="confirm_cancel" class="form-checkbox h-4 w-4 text-blue-600 transition"
                            required>
                        <span class="ms-2">I confirm that I understand and agree to proceed with the cancellation of this booking.</span>
                    </label>
                </div>
                <!-- Footer -->
                <div
                    class="flex justify-end gap-3 px-6 py-2 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                    <button type="submit"
                        class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition">
                        Submit Reason
                    </button>
                    <button type="button" data-modal-hide="cancel-modal-{{ $booking->id }}"
                        class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modern Return Vehicle Modal -->
    <div id="return-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-2 bg-black bg-opacity-50 overflow-y-auto">
        <div class="relative bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-6xl p-4 space-y-6">

            <!-- Modal Header -->
            <div class="flex justify-between items-center border-b pb-4 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Return Vehicle</h2>
                <button data-modal-hide="return-modal-{{ $booking->id }}" class="text-gray-500 hover:text-red-500 text-2xl">&times;</button>
            </div>

            <!-- Row 1: Customer Profile (left), Rental Duration (right) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Customer Profile -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 text-sm text-gray-700 dark:text-gray-300">
                    <h3 class="font-semibold text-base text-gray-800 dark:text-white mb-2">Customer Profile</h3>
                    <div class="flex items-center gap-4">
                        <img src={{ asset($booking->customer->user->picture_path) }} alt="Customer" class="w-24 h-24 object-cover rounded-full border">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm"><strong>Name:</strong><br>{{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</p>
                            </div>
                            <div>
                                <p class="text-sm"><strong>Email:</strong><br>{{ $booking->customer->user->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm"><strong>Phone:</strong><br>{{ $booking->customer->phone_number }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rental Duration -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 text-sm text-gray-700 dark:text-gray-300">
                    <h3 class="font-semibold text-base text-gray-800 dark:text-white mb-2">Rental Duration</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm"><strong>Rental Start/Pickup Time:</strong><br>{{ \Carbon\Carbon::parse($booking->pickup_date)->format('F j') }}, {{ $booking->actual_pickup_time }}</p>
                        </div>
                        <div>
                            <p class="text-sm"><strong>Expected Return Before:</strong><br>{{ \Carbon\Carbon::parse($booking->return_date)->format('F j') }}, {{ $booking->actual_pickup_time }}</p>
                        </div>
                        <div>
                            <p class="text-sm"><strong>Actual Return:</strong><br>{{ \Carbon\Carbon::parse(now())->format('F j') }}, {{ now()->format('g A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2: Vehicle (left), Charges & Payments (right) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vehicle Info -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 text-sm text-gray-700 dark:text-gray-300">
                    <h3 class="font-semibold text-base text-gray-800 dark:text-white mb-4">Vehicle Information</h3>

                    <div class="flex flex-col md:flex-row items-center gap-4">
                        <!-- Left Side: Vehicle Image -->
                        <img src={{ asset($booking->car->carModel->img_file_path) }} alt="Vehicle"
                            class="w-full md:w-1/2 h-[15vh] object-scale-down rounded-xl shadow-sm border">

                        <!-- Right Side: Vehicle Details -->
                        <div class="w-full md:w-1/2 space-y-4 text-left">
                            <!-- Model and Plate side by side -->
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <p class="font-bold text-gray-800 text-xs">Model</p>
                                    <p class="text-gray-500">{{ $booking->car->carModel->brand }} {{ $booking->car->carModel->model_name }} {{ $booking->car->carModel->model_year }}</p>
                                </div>
                                <div class="w-1/2">
                                    <p class="font-bold text-gray-800 text-xs">Plate</p>
                                    <p class="text-gray-500">{{ $booking->car->license_plate }}</p>
                                </div>
                            </div>

                            <!-- Rental ID alone below -->
                            <div class="flex gap-4">
                                <div class="w-1/2">
                                    <p class="font-bold text-gray-800 text-xs">Rental ID</p>
                                    <p class=" text-gray-500">#BKG-{{ sprintf('%04d', $booking->id) }}</p>
                                </div>
                                <div class="w-1/2">
                                    <p class="font-bold text-gray-800 text-xs">Last Odometer Reading</p>
                                    <p class=" text-gray-500">{{ $booking->car->odometer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charges & Payments -->
                <div class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 text-sm text-gray-700 dark:text-gray-300">
                    <h3 class="font-semibold text-base text-gray-800 dark:text-white mb-2">Payments</h3>

                    <div class="grid grid-cols-3 gap-3">
                        <p><strong>Base Rental:</strong><br>Php {{ $booking->amount_due - number_format($booking->amount_due - ($booking->amount_due / 1.12), 2)}} </p>
                        <p><strong>VAT Inclusive 12%:</strong><br>Php {{ number_format($booking->amount_due - ($booking->amount_due / 1.12), 2) }}</p>
                    </div>

                    <div class="mt-4 border-t pt-2 dark:border-gray-700">
                        <p class="text-sm"><strong>Total Paid:</strong> <span
                                class="text-blue-600 font-bold">Php {{ $booking->amount_due }}</span>
                        </p>
                    </div>

                </div>

            </div>

            <!-- Row 3: Vehicle Condition -->
            <div
                x-data="{ selectedOption: '' }"
                class="bg-gray-50 dark:bg-gray-800 rounded-xl p-4 text-sm text-gray-700 dark:text-gray-300 space-y-4 max-h-[20vh] overflow-y-auto">
                <h3 class="font-semibold text-base text-gray-800 dark:text-white">Vehicle Condition</h3>
                <form action="{{ route('customer-returns-car', $booking->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="font-semibold block mb-1">ODO Reading</label>
                        <input type="number" placeholder="e.g., 1200" name="latest_odo"
                            class="w-full bg-white dark:bg-gray-700 border dark:border-gray-600 rounded px-3 py-2" required />
                    </div>
                    <div>
                        <label class="font-semibold block mb-1">Damage / Issue</label>
                        <select id="damage-status" x-model="selectedOption" name="damage_status"
                            class="w-full bg-white dark:bg-gray-700 border dark:border-gray-600 rounded px-3 py-2">
                            <option value="no-issue">No Issue</option>
                            <option value="returned-damage">Returned Damaged</option>
                        </select>
                    </div>
                </div>

                <div x-show="selectedOption === 'returned-damage'" id="damage-details-section" class="space-y-3">
                    <div>
                        <label class="font-semibold block mb-1">Damage Description</label>
                        <textarea rows="3" class="w-full bg-white dark:bg-gray-700 border dark:border-gray-600 rounded px-3 py-2"
                            placeholder="Describe the damage..." name="damage_desc" :required="selectedOption === 'returned-damage'"></textarea>
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-800 dark:text-gray-200 mb-1">Upload Evidence</label>
                        <div
                            class="flex items-center justify-between p-4 border border-gray-300 bg-white rounded-lg shadow-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                            <input type="file" id="car-image" name="car-image" accept="image/*"
                                :required="selectedOption === 'returned-damage'"/>
                            <label for="car-image"
                                class="flex items-center space-x-3 text-sm text-gray-700 cursor-pointer">
                                <span class="flex items-center">
                                    <i class="bi bi-card-image"></i>&nbsp;&nbsp;
                                    <span>Choose Image</span>
                                </span>
                                <span class="text-gray-400 text-xs text-end">PNG, JPG up to 2mb</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-between items-center gap-3 border-t pt-4 dark:border-gray-700">
                <button data-modal-hide="return-modal-{{ $booking->id }}" type="button"
                    class="px-5 py-2 bg-white dark:bg-gray-700 text-gray-700 dark:text-white border rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium">
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                    Confirm Return
                </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Report Renter Modal -->
    <div id="report-renter-modal-{{ $booking->id }}"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50 overflow-y-auto">
        <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl w-full max-w-2xl p-6 space-y-6">

            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-3 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Report Renter</h2>
                <button class="text-gray-400 hover:text-red-500 text-2xl"
                    data-modal-hide="report-renter-modal-{{ $booking->id }}">&times;</button>
            </div>

            <!-- Renter Info -->
            <div
                class="bg-gray-50 dark:bg-gray-800 p-4 rounded-xl text-sm text-gray-700 dark:text-gray-300 flex items-center gap-4">
                <!-- Profile Picture -->
                <img src="profile-picture.jpg" alt="Profile"
                    class="w-16 h-16 rounded-full object-cover border border-gray-300 dark:border-gray-600 shadow-sm">

                <!-- Renter Info -->
                <div class="flex-1">
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> johndoe@email.com</p>
                    <p><strong>Rental ID:</strong> #456789</p>
                </div>

                <!-- View Profile Button -->
                <div>
                    <button
                        class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition">
                        View Profile
                    </button>
                </div>
            </div>

            <!-- Report Form -->
            <div class="space-y-4">
                <div>
                    <label class="block font-semibold text-gray-800 dark:text-gray-200 mb-1">Reason for Report</label>
                    <select
                        class="w-full rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 border dark:border-gray-600 px-3 py-2">
                        <option value="">Select a reason</option>
                        <option value="late-return">Late Return</option>
                        <option value="vehicle-damage">Vehicle Damage</option>
                        <option value="abusive-behavior">Abusive Behavior</option>
                        <option value="payment-issue">Payment Issue</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div>
                    <label class="block font-semibold text-gray-800 dark:text-gray-200 mb-1">Description</label>
                    <textarea rows="4" placeholder="Provide details of the issue..."
                        class="w-full rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 border dark:border-gray-600 px-3 py-2"></textarea>
                </div>

                <div>
                    <label class="block font-semibold text-gray-800 dark:text-gray-200 mb-1">Upload Evidence
                        (Optional)</label>
                    <div
                        class="flex items-center justify-between p-4 border border-gray-300 bg-white rounded-lg shadow-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                        <input type="file" id="car-image" name="car-image" accept="image/*" class="hidden" />
                        <label for="car-image" class="flex items-center space-x-3 text-sm text-gray-700 cursor-pointer">
                            <span class="flex items-center">
                                <i class="bi bi-card-image"></i>&nbsp;&nbsp;
                                <span>Choose Image</span>
                            </span>
                            <span class="text-gray-400 text-xs text-end">PNG,JPG up to 2mb</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end space-x-3 pt-4 border-t dark:border-gray-700">
                <button data-modal-hide="report-renter-modal-{{ $booking->id }}"
                    class="px-4 py-2 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium">
                    Cancel
                </button>
                <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-medium">
                    Submit Report
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
                    <p class="text-sm">Invoice #: <span class="font-medium">INV-{{ sprintf('%04d', $booking->id) }}</span></p>
                    <p class="text-sm">Date: {{ \Carbon\Carbon::parse(now())->format('F j, Y') }}</p>
                </div>
            </div>

            <!-- Remaining Content -->
            <!-- (Customer Details, Rental Info, Charges, etc...) -->

            <div class="mb-6">
                <h4 class="text-md font-semibold mb-2">Customer Details</h4>
                <p class="text-sm"><span class="font-medium">Name:</span> {{ $booking->customer->first_name }} {{ $booking->customer->middle_name ? $booking->customer->middle_name . ' ' : '' }} {{ $booking->customer->last_name }}</p>
                <p class="text-sm"><span class="font-medium">Phone:</span> {{ $booking->customer->phone_number }}</p>
                <p class="text-sm"><span class="font-medium">Email:</span> {{ $booking->customer->user->email }}</p>
            </div>

            <div class="mb-6">
                <p class="text-md font-semibold mb-2">Rental Information</p>
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <p><span class="font-medium">Car Model:</span> {{ $booking->car->carModel->brand }} {{ $booking->car->carModel->model_name }} {{ $booking->car->carModel->model_year }}</p>
                    <p><span class="font-medium">Plate #:</span> {{ $booking->car->license_plate }}</p>
                    <p><span class="font-medium">Pickup Date:</span> {{ \Carbon\Carbon::parse($booking->pickup_date)->format('F j, Y') }} - {{ $booking->actual_pickup_time }}</p>
                    <p><span class="font-medium">Return Date:</span> {{ \Carbon\Carbon::parse($booking->return_date)->format('F j, Y') }} - {{ $booking->actual_pickup_time }}</p>
                    <p><span class="font-medium">Status:</span> {{ $booking->latestStatus->status }}</p>
                </div>
            </div>

            <div class="mb-6">
                <h4 class="text-md font-semibold mb-2">Charges</h4>
                <div class="text-sm space-y-1">
                    <div class="flex justify-between">
                        <span>Rental Fee</span><span>Php {{ $booking->amount_due - number_format($booking->amount_due - ($booking->amount_due / 1.12), 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>VAT Inclusive 12%</span>
                        <span>Php {{ number_format($booking->amount_due - ($booking->amount_due / 1.12), 2) }}</span>
                    </div>
                    <div class="flex justify-between font-semibold border-t pt-2">
                        <span>Total Amount</span><span>Php {{ $booking->amount_due }} </span>
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
                    hereby acknowledge that I have read, understood, and agreed to the rental policies of BMP Car
                    Rental. I
                    accept responsibility for the vehicle during the rental period and agree to comply with the terms
                    stated
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
@endforeach

@if(session('success'))
<div id="toast-success" class="fixed bottom-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Success icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
</div>
@endif

    <script>
        document.querySelectorAll('.suggest-btn').forEach(button => {
            button.addEventListener('click', () => {
                const reason = button.getAttribute('data-reason');
                const targetId = button.getAttribute('data-target');
                if (targetId) {
                    const targetTextarea = document.getElementById(targetId);
                    if (targetTextarea) {
                        targetTextarea.value = reason;
                    }
                }
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

        const amountInput = document.getElementById('amount-paid');
        const changeLabel = document.getElementById('change-label');
        const total = document.getElementById('total-payment'); // Example: change as needed or pass from server

        amountInput.addEventListener('input', () => {
            const paid = parseFloat(amountInput.value);
            const amount = parseFloat(total.textContent);
            const change = paid - amount;
            changeLabel.textContent = change >= 0 ? `Php ${change.toFixed(2)}` : 'Php 0.00';
        });

        document.addEventListener('DOMContentLoaded', function() {
            const damageStatus = document.getElementById('damage-status');
            const damageDetailsSection = document.getElementById('damage-details-section');

            damageStatus.addEventListener('change', function() {
                if (damageStatus.value === 'returned-damage') {
                    damageDetailsSection.classList.remove('hidden');
                } else {
                    damageDetailsSection.classList.add('hidden');
                }
            });

            const approveButtons = document.querySelectorAll('.approve-button');
            approveButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    const form = this.closest('form'); // Find the form associated with the button

                    Swal.fire({ // Use SweetAlert
                        title: 'Are you sure?',
                        text: "Do you want to approve this booking?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6 !important',
                        cancelButtonColor: '#d33 !important',
                        confirmButtonText: 'Yes, approve it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if the user confirms
                        }
                    });
                });
            });
        });
    </script>
@endsection
