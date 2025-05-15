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

            <section class="relative bg-[#0f1021] text-white min-h-screen p-20">
                <div class="flex flex-col md:flex-row gap-6 max-w-7xl mx-auto mt-24 px-6 md:px-10 lg:px-16 pb-10">
                    <!-- Sidebar -->
                    <div class="w-full md:w-1/4 lg:w-1/5 bg-gray-900 text-white p-5 rounded-lg shadow-md">
                        <h2 class="text-xl font-bold mb-6">My Profile</h2>
                        <ul class="space-y-4">
                            <li>
                                <button
                                    class="w-full text-left px-4 py-2 rounded-md hover:bg-blue-400 hover:text-black transition-colors duration-200"
                                    onclick="showTab('profileInfo')">
                                    Profile Info
                                </button>
                            </li>
                            <li>
                                <button
                                    class="hidden w-full text-left px-4 py-2 rounded-md hover:bg-blue-400 hover:text-black transition-colors duration-200"
                                    onclick="showTab('carHistory')">
                                    Car History
                                </button>
                            </li>
                            <li>
                                <button
                                    class="w-full text-left px-4 py-2 rounded-md hover:bg-blue-400 hover:text-black transition-colors duration-200"
                                    onclick="showTab('changePassword')">
                                    Change Password
                                </button>
                            </li>
                        </ul>
                    </div>


                    <!-- Main Content -->
                    <div class="flex-1 p-6 space-y-6">
                        <!-- Profile Info Card Section -->
                        <div id="profileInfo" class="bg-white text-black p-6 rounded-lg shadow-md space-y-6">
                            <!-- Card 1: Profile Picture & Name -->
                            <div class="flex flex-col items-center text-center">
                                <img src={{ Auth::user()->picture_path }} alt="Profile Picture"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-blue-500">
                                <h3 class="mt-4 text-2xl font-bold">John Doe</h3>
                            </div>

                            <!-- Card 2: Basic Info -->
                            <div class="bg-gray-50 w-full rounded-lg p-4 shadow-sm">
                                <h4 class="text-lg font-semibold mb-3">Account Details</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <p><span class="font-medium">Email:</span> john@example.com</p>
                                    <p><span class="font-medium">Phone:</span> +63 912 345 6789</p>
                                    <p><span class="font-medium">Status:</span> <span
                                            class="text-green-600 font-semibold">Active</span></p>
                                    <p><span class="font-medium">License No.:</span> D123456789</p>
                                    <p><span class="font-medium">License Expiry:</span> December 31, 2026</p>
                                </div>
                            </div>
                        </div>


                        <!-- Car History Card (hidden by default) -->
                        <div id="carHistory"
                            class="hidden bg-white text-black p-6 rounded-lg shadow-md overflow-x-auto">
                            <h3 class="text-2xl font-bold mb-4">Car Rental History</h3>

                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Car Brand</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Transmission</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Pickup Date</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">Return Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Toyota Vios</td>
                                        <td class="border border-gray-300 px-4 py-2">Automatic</td>
                                        <td class="border border-gray-300 px-4 py-2">March 10, 2025</td>
                                        <td class="border border-gray-300 px-4 py-2">March 15, 2025</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">Honda City</td>
                                        <td class="border border-gray-300 px-4 py-2">Manual</td>
                                        <td class="border border-gray-300 px-4 py-2">April 5, 2025</td>
                                        <td class="border border-gray-300 px-4 py-2">April 12, 2025</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <!-- Change Password Card (hidden by default) -->
                        <div id="changePassword" class="hidden bg-white text-black p-6 rounded-lg shadow-md">
                            <h3 class="text-2xl font-bold mb-4">Change Password</h3>
                            <form id="changePasswordForm" method="POST" action="{{ route('update-password') }}">
                            @csrf
                                <input type="password" placeholder="Current Password" name="current_password"
                                    class="mb-2 w-full p-2 border rounded">
                                <input type="password" placeholder="New Password" name="new_password"
                                    class="mb-2 w-full p-2 border rounded">
                                <input type="password" placeholder="Confirm New Password" name="new_password_confirmation"
                                    class="mb-4 w-full p-2 border rounded">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
            <script>
                function showTab(tabId) {
                    ['profileInfo', 'carHistory', 'changePassword'].forEach(id => {
                        document.getElementById(id).classList.add('hidden');
                    });
                    document.getElementById(tabId).classList.remove('hidden');
                }
            </script>



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