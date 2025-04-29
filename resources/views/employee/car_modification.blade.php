@extends('layouts.administration')

@section('content')
    <?php
    $cars = [
        `   ['model' => 'Car Model A', 'type' => 'Sedan', 'brand' => 'Brand X'],
                                    ['model' => 'Car Model B', 'type' => 'SUV', 'brand' => 'Brand Y'],
                                    ['model' => 'Car Model C', 'type' => 'Truck', 'brand' => 'Brand Z'],
                                    ['model' => 'Car Model D', 'type' => 'Coupe', 'brand' => 'Brand A'],
                                    ['model' => 'Car Model E', 'type' => 'Convertible', 'brand' => 'Brand B'],
                                    ['model' => 'Car Model F', 'type' => 'Sedan', 'brand' => 'Brand X'],
                                    ['model' => 'Car Model G', 'type' => 'SUV', 'brand' => 'Brand Y'],
                                    ['model' => 'Car Model H', 'type' => 'Truck', 'brand' => 'Brand Z'],
                                    ['model' => 'Car Model I', 'type' => 'Coupe', 'brand' => 'Brand A'],
                                    ['model' => 'Car Model J', 'type' => 'Convertible', 'brand' => 'Brand B']`
    ];

                                ?>
    <h2 class="mt-4 text-2xl font-semibold text-gray-700">
        Car Management
    </h2>
    <div class="container flex flex-col items-center mx-auto">
        <div class="container mx-auto p-2">
            <!-- Breadcrumbs -->
            <nav class="flex items-center text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-gray-700 hover:text-blue-600 font-medium text-base">
                            <!-- Dynamic label: Default "All Cars" -->
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
                                <!-- Dynamic label: If filtered, show "Filtered Cars" -->
                                Filtered Cars
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Car Cards Section with Rounded Background -->
            <div class="flex flex-wrap gap-10 p-4">

                <!-- Car Cards Section (Main Content) -->
                <div class="lg:w-7/12 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 overflow-y-auto rounded-lg bg-white shadow-lg p-6 border"
                    style="max-height: 80vh;">

                    <!-- Car Card 1 -->
                    <div class="bg-white p-4 rounded-lg shadow-lg border" style="max-height: 30vh;">
                        <!-- Car Image -->
                        <img src="https://via.placeholder.com/200x150" alt="Car Image"
                            class="w-full h-32 object-cover rounded-md mb-4">

                        <!-- Car Model and Dropdown -->
                        <div class="flex justify-between items-center mb-2">
                            <h3 class="font-semibold text-lg">Car Model A</h3>
                            <!-- Three Dots Dropdown -->
                            <div class="relative">
                                <button id="dropdownMenuButton" data-dropdown-toggle="dropdownMenu"
                                    class="text-dark font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                                    type="button"><i class="bi bi-three-dots-vertical"></i></button>
                                <!-- Dropdown Menu -->
                                <div id="dropdownMenu"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                                    <ul class="py-2 text-sm text-gray-700">
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Disable</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Car Type and Brand with Status Badge -->
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-sm text-gray-500">Type: Sedan</p>
                            <div class="flex items-center space-x-2">
                                <p class="text-sm text-gray-500">Brand: Brand X</p>
                            </div>
                        </div>
                        <!-- Status Badge -->
                        <span
                            class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-200 rounded-full">Available</span>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:w-4/12 w-full bg-white p-6 rounded-lg shadow-lg space-y-6 border overflow-y-auto"
                    style="max-height: 80vh">
                    <!-- Filter Options Section -->
                    <div>
                        <button id="toggle-filter"
                            class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Filter Options
                            <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-5 h-5 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="filter-dropdown"
                            class="hidden mt-4 space-y-4 bg-white p-5 rounded-xl border border-gray-200 shadow-md transition-all duration-300">

                            <!-- Car Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800">Car Type</label>
                                <div class="grid grid-cols-3 gap-3 mt-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Sedan"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Sedan</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="SUV"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">SUV</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Truck"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Truck</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Coupe"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Coupe</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Convertible"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Convertible</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Car Brand -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-800">Car Brand</label>
                                <div class="grid grid-cols-3 gap-3 mt-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Brand X"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Brand X</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Brand Y"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Brand Y</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Brand Z"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Brand Z</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Brand A"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Brand A</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" value="Brand B"
                                            class="h-4 w-4 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-700">Brand B</span>
                                    </label>
                                </div>
                            </div>

                            <button
                                class="w-full mt-4 px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <i class="bi bi-stars"></i>&nbsp;Generate Filter
                            </button>
                        </div>

                        <!-- Add Categories Section -->
                        <div class="mt-4">
                            <button id="toggle-add"
                                class="w-full flex justify-between items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Add Categories
                                <svg id="toggle-add-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5 transition-transform duration-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="add-dropdown"
                                class="hidden mt-2 space-y-2 bg-white rounded-2xl border border-gray-200 shadow-md p-4">

                                <!-- Add Car Type Section -->
                                <div>
                                    <h2 class="text-sm font-medium text-gray-800 mb-2">Add Car Type</h2>
                                    <form class="space-y-4">
                                        <input type="text" placeholder="e.g. SUV, Sedan"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <button type="submit"
                                            class="w-full bg-blue-600 text-sm font-medium text-white py-2 rounded-xl font-small hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200">
                                            <i class="bi bi-plus-circle"></i>&nbsp;Add Car Type
                                        </button>
                                    </form>
                                </div>

                                <!-- Divider -->
                                <div class="border-t border-dashed border-gray-300"></div>

                                <!-- Add Car Brand Section -->
                                <div>
                                    <h2 class="text-sm font-medium text-gray-800 mb-2">Add Car Brand</h2>
                                    <form class="space-y-4" enctype="multipart/form-data">
                                        <input type="text" placeholder="e.g. Toyota, Ford"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                        <div class="w-full">
                                            <label for="car-image"
                                                class="flex items-center justify-between px-4 py-2 bg-blue-50 border border-dashed border-blue-300 rounded-xl cursor-pointer hover:bg-blue-100 transition duration-200">
                                                <div class="flex items-center space-x-3 text-blue-600">
                                                    <i class="bi bi-camera"></i>
                                                    <span class="text-sm font-small">Upload Car Brand Image</span>
                                                </div>
                                                <span class="text-xs text-gray-400">PNG, JPG up to 2MB</span>
                                            </label>
                                            <input id="car-image" name="car-image" type="file" accept="image/*"
                                                class="hidden">
                                        </div>
                                        <button type="submit"
                                            class="w-full bg-blue-600 text-sm font-medium text-white py-2 rounded-xl font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200">
                                            <i class="bi bi-plus-circle"></i>&nbsp;Add Car Brand
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border border-gray-300 mt-4"></div>
                        <div class="w-full max-w-sm mx-auto bg-white">

                            <!-- Form Title -->
                            <h2 class="text-xl font-semibold text-gray-800 my-2 text-start">Add a New Car</h2>

                            <form>
                                <!-- Car Form Grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                    <!-- Car Type Dropdown -->
                                    <div>
                                        <label for="car-type" class="block text-sm font-medium text-gray-700 mb-2">Car
                                            Type</label>
                                        <select id="car-type" name="car-type"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Select Car Type</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                            <option value="Truck">Truck</option>
                                            <option value="Coupe">Coupe</option>
                                            <option value="Convertible">Convertible</option>
                                        </select>
                                    </div>

                                    <!-- Car Model Name -->
                                    <div>
                                        <label for="car-model" class="block text-sm font-medium text-gray-700 mb-2">Car
                                            Model
                                            Name</label>
                                        <input type="text" id="car-model" name="car-model" placeholder="Enter Model Name"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                    </div>

                                    <!-- Car Brand Dropdown -->
                                    <div>
                                        <label for="car-brand" class="block text-sm font-medium text-gray-700 mb-2">Car
                                            Brand</label>
                                        <select id="car-brand" name="car-brand"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Select Car Brand</option>
                                            <option value="Brand X">Brand X</option>
                                            <option value="Brand Y">Brand Y</option>
                                            <option value="Brand Z">Brand Z</option>
                                            <option value="Brand A">Brand A</option>
                                            <option value="Brand B">Brand B</option>
                                        </select>
                                    </div>

                                    <!-- Car Seat Capacity -->
                                    <div>
                                        <label for="seat-capacity" class="block text-sm font-medium text-gray-700 mb-2">Seat
                                            Capacity</label>
                                        <input type="number" id="seat-capacity" name="seat-capacity"
                                            placeholder="Enter Seat Capacity"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                    </div>

                                    <!-- Car Transmission Dropdown -->
                                    <div>
                                        <label for="car-transmission"
                                            class="block text-sm font-medium text-gray-700 mb-2">Car
                                            Transmission</label>
                                        <select id="car-transmission" name="car-transmission"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Transmission Type</option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                        </select>
                                    </div>

                                    <!-- Fuel Type Dropdown -->
                                    <div>
                                        <label for="fuel-type" class="block text-sm font-medium text-gray-700 mb-2">Fuel
                                            Type</label>
                                        <select id="fuel-type" name="fuel-type"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Fuel Type</option>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Electric">Electric</option>
                                            <option value="Hybrid">Hybrid</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="cost-per-hour" class="block text-sm font-medium text-gray-700 mb-2">
                                            Rental Rate per Day
                                        </label>
                                        <input type="number" id="cost-per-hour" name="cost-per-hour" placeholder="₱0.00"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                            step="0.01" min="0">
                                    </div>

                                    <!-- Car Image Input -->
                                    <div class="mb-2 col-span-2">
                                        <label for="car-image" class="block text-sm font-medium text-gray-700 mb-2">Upload
                                            Car
                                            Image</label>
                                        <div
                                            class="flex items-center justify-between p-4 border border-gray-300 rounded-lg shadow-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                                            <input type="file" id="car-image" name="car-image" accept="image/*"
                                                class="hidden" />
                                            <label for="car-image"
                                                class="flex items-center space-x-3 text-sm text-gray-700 cursor-pointer">
                                                <span class="flex items-center">
                                                    <i class="bi bi-card-image"></i>&nbsp;&nbsp;
                                                    <span>Choose Image</span>
                                                </span>
                                                <span class="text-gray-400 text-xs text-end">PNG,JPG up to 2mb</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="text-center mt-1">
                                    <button type="submit"
                                        class="w-full py-3 px-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <i class="bi bi-plus-lg"></i> &nbsp;Add Car
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                document.getElementById("toggle-filter").addEventListener("click", function () {
                    const dropdown = document.getElementById("filter-dropdown");
                    const icon = document.getElementById("toggle-icon");
                    dropdown.classList.toggle("hidden");
                    icon.classList.toggle("rotate-180");
                });

                document.getElementById("toggle-add").addEventListener("click", function () {
                    const dropdown = document.getElementById("add-dropdown");
                    const icon = document.getElementById("toggle-add-icon");
                    dropdown.classList.toggle("hidden");
                    icon.classList.toggle("rotate-180");
                });
            </script>

@endsection