<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Profile - BMP Car Rental</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans bg-gray-100">
    <div class="min-h-screen">
        @section('content')
        @include('profile.partials.userheader')

        <!-- Main Content -->
        <main class="pt-40 pb-20 bg-[#191A2E]">
            <!-- Profile Heading -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-white mb-2">My Profile Dashboard</h1>
                </div>
            </div>

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Sidebar -->
                    <div class="w-full md:w-1/4 space-y-6">
                        <!-- Profile Quick Info Card -->
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex flex-col items-center">
                                <img src={{ Auth::user()->picture_path }} alt="Profile Picture"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-blue-500 shadow-lg">
                                <h2 class="mt-4 text-2xl font-bold text-gray-800">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                                <div class="mt-4 flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        <span class="mr-2 h-2 w-2 rounded-full bg-green-500"></span>
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Menu -->
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <nav class="space-y-2">
                                <button onclick="showTab('profileInfo')"
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left rounded-lg hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-user text-blue-600"></i>
                                    <span>Profile Information</span>
                                </button>
                                <button onclick="showTab('carHistory')"
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left rounded-lg hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-history text-blue-600"></i>
                                    <span>Rental History</span>
                                </button>
                                <button onclick="showTab('changePassword')"
                                    class="w-full flex items-center space-x-3 px-4 py-3 text-left rounded-lg hover:bg-blue-50 transition-colors">
                                    <i class="fas fa-lock text-blue-600"></i>
                                    <span>Security Settings</span>
                                </button>
                            </nav>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="flex-1 space-y-6">
                        <!-- Profile Information Section -->
                        <div id="profileInfo" class="bg-white rounded-lg shadow-md">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Profile Information</h3>
                                <p class="mt-1 text-sm text-gray-500">Manage your profile details and personal information.</p>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700">Full Name</label>
                                        <p class="text-gray-900">{{ $customer->first_name }} {{ $customer->last_name }}</p>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700">Email Address</label>
                                        <p class="text-gray-900">{{ Auth::user()->email }}</p>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700">Phone Number</label>
                                        <p class="text-gray-900">{{ $customer->phone_number }}</p>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700">Driver's License</label>
                                        <p class="text-gray-900">{{ $customer->driver_license_number }}</p>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="text-sm font-medium text-gray-700">License Expiry</label>
                                        <p class="text-gray-900">{{ $customer->license_expiration_date }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Car History Section -->
                        <div id="carHistory" class="hidden bg-white rounded-lg shadow-md">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Rental History</h3>
                                <p class="mt-1 text-sm text-gray-500">View your past and current car rentals.</p>
                            </div>
                            <div class="p-6 overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Car Brand</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transmission</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pickup Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Return Date</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Toyota Vios</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Automatic</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">March 10, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">March 15, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Honda City</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Manual</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">April 5, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">April 12, 2025</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Upcoming
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Change Password Section -->
                        <div id="changePassword" class="hidden bg-white rounded-lg shadow-md">
                            <div class="p-6 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-900">Security Settings</h3>
                                <p class="mt-1 text-sm text-gray-500">Update your password and security preferences.</p>
                            </div>
                            <div class="p-6">
                                <form id="changePasswordForm" method="POST" action="{{ route('update-password') }}" class="space-y-8">
                                    @csrf
                                    <div class="relative">
                                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                        <div class="relative">
                                            <input type="password" name="current_password" id="current_password"
                                                class="mt-1 block w-full px-4 py-3 text-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <button type="button" onclick="togglePassword('current_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="current_password_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                        <div class="relative">
                                            <input type="password" name="new_password" id="new_password"
                                                class="mt-1 block w-full px-4 py-3 text-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <button type="button" onclick="togglePassword('new_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="new_password_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                        <div class="relative">
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                                class="mt-1 block w-full px-4 py-3 text-lg rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                            <button type="button" onclick="togglePassword('new_password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="new_password_confirmation_icon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="w-full inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            Update Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white mt-8">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-base font-bold text-gray-900">QUICK LINKS</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Home</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Cars</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Bookings</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Contacts</a></li>
                        </ul>
                    </div>

                    <!-- About Us -->
                    <div>
                        <h3 class="text-base font-bold text-gray-900">ABOUT US</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Services</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Rental Deals</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Car Brands</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Branches</a></li>
                        </ul>
                    </div>

                    <!-- Customer Support -->
                    <div>
                        <h3 class="text-base font-bold text-gray-900">CUSTOMER SUPPORT</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Help Center</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Terms and Conditions</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Privacy Policy</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-gray-900">Damage & Return Policy</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media and Copyright -->
                <div class="mt-8 border-t border-gray-200 pt-8">
                    <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Footer Logo" class="mx-auto h-14">
                    <div class="flex justify-center space-x-6 mt-4">
                        <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-x-twitter text-2xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-facebook text-2xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-instagram text-2xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-tiktok text-2xl"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-github text-2xl"></i></a>
                    </div>
                    <p class="mt-8 text-center text-gray-500">&copy; 2025 BMP Car Rental. All rights reserved.</p>
                    <p class="text-center text-gray-500 mt-2">Explore Our Premium Car Brands for Rent - Choose from a Wide Range of Trusted Automakers.</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function showTab(tabId) {
            // Hide all tabs
            ['profileInfo', 'carHistory', 'changePassword'].forEach(id => {
                document.getElementById(id).classList.add('hidden');
            });
            // Show selected tab
            document.getElementById(tabId).classList.remove('hidden');
            
            // Update active state of navigation buttons
            document.querySelectorAll('nav button').forEach(button => {
                if (button.getAttribute('onclick').includes(tabId)) {
                    button.classList.add('bg-blue-50');
                } else {
                    button.classList.remove('bg-blue-50');
                }
            });
        }

        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(inputId + '_icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>