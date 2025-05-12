<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
</head>


<body class="font-sans h-screen w-full">
    <!-- MAIN BODY -->
    <div class="bg-white-100 text-black/100 h-screen w-full flex flex-col">

        <!-- HEADER LOCATE: resources/views/profile/partials/header.blade.php-->
        @section('content')
        @include('profile.partials.userheader')

        <!-- Main Content -->
        <main class="flex-1 mt-16">
            <!-- Hero Section -->
            <!-- Hero Section -->
            <!-- FIRST CONTAINER -->

            <section class="relative bg-[#0f1021] text-white py-10 mx-auto text-center">
                <div class="py-10">
                    <p class="text-4xl md:text-6xl font-bold mb-4">
                        BOOKING STATUS
                    </p>

                    <p class="text-xl">
                        Track the current state of your car rental, from pending confirmation to completion.
                    </p>
                </div>

                @if (session('error'))
                <div class="bg-red-200 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-[750px]" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path fill-rule="evenodd" d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.15 2.759 3.152a1.2 1.2 0 0 1 0 1.697z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 mb-5 rounded relative max-w-[750px] mx-auto" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path fill-rule="evenodd" d="M14.348 5.652a1.2 1.2 0 0 0-1.697 0L10 8.183l-2.651-2.531a1.2 1.2 0 1 0-1.697 1.697L8.303 10l-2.651 2.53a1.2 1.2 0 0 0 1.697 1.697L10 11.817l2.651 2.531a1.2 1.2 0 0 0 1.697-1.697L11.697 10l2.651-2.53a1.2 1.2 0 0 0 0-1.697z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                @endif

                <!-- Booking Status Card -->
                @forelse ($bookings as $booking)
                <div class="max-w-2xl mb-5 mx-auto bg-[#f9f9f9] border border-gray-200 rounded-lg shadow flex flex-col md:flex-row overflow-hidden">
                    <img class="w-full h-48 object-contain md:w-1/3 md:h-auto rounded-lg mx-5"
                        src="{{ asset($booking->car->carModel->img_file_path) }}" alt="Sample pic" />

                    <div class="flex flex-col justify-between p-6 md:w-2/3 text-left">
                        <div>
                            <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900">
                                {{ $booking->car->carModel->brand }} - {{ $booking->car->carModel->model_name }} {{ $booking->car->carModel->model_desc }}
                            </h5>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-gray-700 text-sm">
                                <p><span class="font-semibold">Car Type:</span> {{ $booking->car->carModel->car_type }}</p>
                                <p><span class="font-semibold">Transmission:</span> {{ $booking->car->carModel->transmission }}</p>
                                <p><span class="font-semibold">Created Date:</span><br> {{ \Carbon\Carbon::parse($booking->created_at)->format('Y-m-d') }}</p>
                                <p><span class="font-semibold">Amount Due:</span><br> ₱{{ $booking->amount_due }}</p>
                                <p><span class="font-semibold">Pickup Date:</span><br> {{ \Carbon\Carbon::parse($booking->pickup_date)->format('Y-m-d') }}</p>
                                <p><span class="font-semibold">Return Date:</span><br> {{ \Carbon\Carbon::parse($booking->return_date)->format('Y-m-d') }}</p>
                            </div>
                        </div>
                        <?php

                        // In your Blade template or controller, define the $statusColor variable
                            switch ($booking->latestStatus->status) {
                                case 'Unpaid':
                                    $statusColor = 'background-color: #f59e0b; /* Yellow 500 */'; // Old: bg-yellow-500
                                    break;
                                case 'Paid':
                                    $statusColor = 'background-color: #16a34a; /* Green 600 */';   // Old: bg-green-500
                                    break;
                                case 'Pending':
                                    $statusColor = 'background-color: #8b5cf6; /* Purple 500 */'; // Old: bg-purple-500
                                    break;
                                case 'Cancelled':
                                    $statusColor = 'background-color: #ef4444; /* Red 500 */';   // Old: bg-red-500
                                    break;
                                case 'Approved':
                                    $statusColor = 'background-color: #3b82f6; /* Blue 500 */';  // Old: bg-blue-500
                                    break;
                                case 'For Pick-Up':
                                    $statusColor = 'background-color: #06b6d4; /* Cyan 500 */';
                                    break;
                                case 'Ongoing':
                                    $statusColor = 'background-color: #34d399; /* Emerald 500 */';
                                    break;
                                case 'Due for Return':
                                    $statusColor = 'background-color: #f97316; /* Orange 500 */';
                                    break;
                                case 'Successful':
                                    $statusColor = 'background-color: #22c55e; /* Green 500 */';
                                    break;
                                case 'Reported':
                                    $statusColor = 'background-color: #dc2626; /* Red 600 */';
                                    break;
                                case 'Unsettled':
                                    $statusColor = 'background-color: #a855f7; /* Purple 600 */';
                                    break;
                                case 'Blacklisted':
                                    $statusColor = 'background-color: #000000; /* Black */';
                                    break;
                                default:
                                    $statusColor = 'background-color: #d1d5db; /* Gray 300 */'; // Default color
                                    break;
                            }
                            ?>

                        <div class="mt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <span
                                class="inline-block px-4 py-2 text-sm font-semibold text-white rounded-full w-fit"
                                style="{{ $statusColor }}">
                                {{ $booking->latestStatus->status }}
                            </span>
                            @if (in_array($booking->latestStatus->status, ['Unpaid', 'Paid', 'Pending', 'Approved']))
                            <div data-modal-target="cancel-modal-{{ $booking->id }}" data-modal-toggle="cancel-modal-{{ $booking->id }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-white bg-red-600 rounded-md shadow hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 cursor-pointer transition mx-2 my-1">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
                                </svg>
                                Cancel
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Cancel Modal -->
                <div id="cancel-modal-{{ $booking->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden fixed inset-0 z-50 flex justify-center items-center overflow-y-auto">

                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-4xl mx-auto transform transition-all overflow-hidden">

                        <!-- Header -->
                        <div class="flex items-center justify-between px-6 py-4 border-b dark:border-gray-700">
                            <h5 class="text-xl font-semibold text-gray-800 dark:text-white">
                                Reason for Cancellation
                            </h5>
                            <button data-modal-hide="cancel-modal" type="button"
                                class="text-gray-500 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-full p-2 transition">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- CANCELATION MODAL -->
                        <form action="{{ route('cancel_booking', ['booking' => $booking->id]) }}" id="cancel-booking-form-{{ $booking->id }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <div class="px-6 py-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Textarea Column -->
                                <div>
                                    <label for="cancel-reason-{{ $booking->id }}"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Please explain your reason for cancellation:
                                    </label>
                                    <textarea id="cancel-reason-{{ $booking->id }}" rows="6" required
                                        class="w-full px-4 py-3 h-48 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                                        name="cancel_reason"
                                        placeholder="Enter your reason here..."></textarea>
                                </div>

                                <!-- Suggested Reasons -->
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-inner overflow-y-auto max-h-60">
                                    <p class="text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">Common Reasons:</p>
                                    <ul class="space-y-2">
                                        <li>
                                            <button
                                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                                data-reason="Change of travel plans"
                                                data-target="cancel-reason-{{ $booking->id }}"
                                                type="button">
                                                • Change of travel plans
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                                data-reason="Found a better deal elsewhere"
                                                data-target="cancel-reason-{{ $booking->id }}"
                                                type="button">
                                                • Found a better deal
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                                data-reason="No longer need the vehicle"
                                                data-target="cancel-reason-{{ $booking->id }}"
                                                type="button">
                                                • Vehicle no longer needed
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                                data-reason="Booking was made by mistake"
                                                data-target="cancel-reason-{{ $booking->id }}"
                                                type="button">
                                                • Booking mistake
                                            </button>
                                        </li>
                                        <li>
                                            <button
                                                class="suggest-btn w-full text-left text-sm text-gray-800 dark:text-white bg-white dark:bg-gray-800 hover:bg-blue-100 dark:hover:bg-gray-600 rounded-lg px-4 py-2 transition"
                                                data-reason="Emergency or unforeseen circumstance"
                                                data-target="cancel-reason-{{ $booking->id }}"
                                                type="button">
                                                • Emergency or unforeseen circumstances
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="px-6">
                                <label class="flex items-center text-sm text-gray-200 mb-3">
                                    <input type="checkbox" id="confirm-cancel-{{ $booking->id }}" name="confirm_cancel"
                                        class="form-checkbox h-4 w-4 text-blue-600 transition" required>
                                    <span class="ms-2">I confirm that I understand and agree to proceed with the cancellation of
                                        my
                                        booking.</span>
                                </label>
                            </div>
                            <!-- Footer -->
                            <div
                                class="flex justify-end gap-3 px-6 py-2 border-t dark:border-gray-700 bg-gray-50 dark:bg-gray-900 rounded-b-2xl">
                                <button data-modal-hide="cancel-modal" type="submit"
                                    class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition"
                                    onclick="return confirm('Are you sure you want to cancel this booking? This action cannot be undone.');">
                                    Submit Reason
                                </button>
                                <button data-modal-hide="cancel-modal-{{ $booking->id }}" type="button"
                                    class="px-5 py-2.5 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 text-sm font-medium rounded-lg transition">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
                </script>
                @empty
                <div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-lg shadow p-6 text-center">
                    <p class="text-gray-500 dark:text-gray-400">You have no current bookings.</p>
                </div>
                @endforelse
                <div class="flex justify-center mt-4">
                    {{ $bookings->links() }}
                </div>
            </section>

            <!-- footer -->
            <div class="flex flex-col min-h-auto bg-white">
                <!-- Footer Section -->
                <footer class="bg-white py-10 text-[#0f294c] text-sm text-center">
                    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Quick Links -->
                        <div>
                            <h3 class="font-bold text-base">QUICK LINKS</h3>
                            <ul class="space-y-2 mt-2">
                                <li><a href="#" class="hover:underline text-sm">Home</a></li>
                                <li><a href="#" class="hover:underline text-sm">Cars</a></li>
                                <li><a href="#" class="hover:underline text-sm">Bookings</a></li>
                                <li><a href="#" class="hover:underline text-sm">Contacts</a></li>
                            </ul>
                        </div>

                        <!-- About Us -->
                        <div>
                            <h3 class="font-bold text-base">ABOUT US</h3>
                            <ul class="space-y-2 mt-2">
                                <li><a href="#" class="hover:underline text-sm">Services</a></li>
                                <li><a href="#" class="hover:underline text-sm">Rental Deals</a></li>
                                <li><a href="#" class="hover:underline text-sm">Car Brands</a></li>
                                <li><a href="#" class="hover:underline text-sm">Branches</a></li>
                            </ul>
                        </div>

                        <!-- Customer Support -->
                        <div>
                            <h3 class="font-bold text-base">CUSTOMER SUPPORT</h3>
                            <ul class="space-y-2 mt-2">
                                <li><a href="#" class="hover:underline text-sm">Help Center</a></li>
                                <li><a href="#" class="hover:underline text-sm">Terms and Conditions</a></li>
                                <li><a href="#" class="hover:underline text-sm">Privacy Policy</a></li>
                                <li><a href="#" class="hover:underline text-sm">Damage & Return Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Social Media and Copyright -->
                    <div class="mt-10">
                        <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Footer Logo" class="mx-auto h-14">
                        <div class="flex justify-center space-x-6 mt-4">
                            <a href="#" class="text-[#0f294c]"><i class="fab fa-x-twitter text-2xl"></i></a>
                            <a href="#" class="text-[#0f294c]"><i class="fab fa-facebook text-2xl"></i></a>
                            <a href="#" class="text-[#0f294c]"><i class="fab fa-instagram text-2xl"></i></a>
                            <a href="#" class="text-[#0f294c]"><i class="fab fa-tiktok text-2xl"></i></a>
                            <a href="#" class="text-[#0f294c]"><i class="fab fa-github text-2xl"></i></a>
                        </div>
                        <p class="mt-5 text-sm">© 2025, BMP Car Rental. All Rights Reserved</p>
                        <p>Explore Our Premium Car Brands for Rent
                            Choose from a Wide Range of Trusted and Automakers.</p>
                    </div>
                </footer>

            </div>

        </main>
    </div>
</body>

</html>