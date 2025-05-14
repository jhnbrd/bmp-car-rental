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
                                                        ['model' => 'Car Model J', 'type' => 'Convertible', 'brand' => 'Brand B']`,
    ];
    
    ?>
    <h2 class="mt-4 text-2xl font-semibold text-gray-700">
        Car Management
    </h2>
    <div class="container flex flex-col items-center mx-auto">
        <div class="container mx-auto p-2">
            <!-- Header Section with Breadcrumbs -->
            <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
                    <!-- Left Section: Breadcrumbs -->
                    <nav class="flex items-center text-sm text-gray-500" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="#" class="inline-flex items-center text-gray-700 hover:text-blue-600">
                                    <i class="bi bi-house-door mr-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <i class="bi bi-chevron-right text-gray-400"></i>
                                    <a href="#" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Cars</a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i class="bi bi-chevron-right text-gray-400"></i>
                                    <span class="ml-1 text-gray-500 md:ml-2 font-medium">Car Management</span>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <!-- Right Section: Title and Stats -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <i class="bi bi-car-front text-2xl text-blue-600"></i>
                            <h1 class="text-xl font-bold text-gray-800 ml-2">Car Fleet Overview</h1>
                        </div>
                        <div class="hidden md:flex items-center space-x-4">
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                <span class="ml-2 text-sm text-gray-600">Available: 15</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                                <span class="ml-2 text-sm text-gray-600">Rented: 8</span>
                            </div>
                            <div class="flex items-center">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                                <span class="ml-2 text-sm text-gray-600">Maintenance: 3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Container -->
            <div class="flex flex-col lg:flex-row gap-4 mt-4 h-[calc(100vh-16rem)]">
                <!-- Car Cards Section (Main Content) -->
                <div class="lg:w-7/12 w-full bg-white rounded-lg shadow-lg p-4 border overflow-y-auto">
                    <!-- Search and Filter Section -->
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-2 md:space-y-0 mb-4">
                        <!-- Search Input -->
                        <div class="relative w-full md:w-64">
                            <input type="text" placeholder="Search cars..." 
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <i class="bi bi-search absolute left-3 top-2.5 text-gray-400"></i>
                        </div>
                        <!-- Right Section: Status and Search Button -->
                        <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                            <!-- Status Dropdown -->
                            <div class="relative">
                                <button id="toggle-status" class="w-full md:w-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none flex justify-between items-center">
                                    <span>All Status</span>
                                    <svg id="status-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 transition-transform duration-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div id="status-dropdown" class="hidden absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg">
                                    <ul class="py-1">
                                        <li>
                                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Available</button>
                                        </li>
                                        <li>
                                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Rented</button>
                                        </li>
                                        <li>
                                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Maintenance</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Search Button -->
                            <button class="w-full md:w-auto px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <i class="bi bi-search mr-2"></i>Search
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Car Card 1 -->
                        <div class="bg-white p-4 rounded-lg shadow-lg border">
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
                                                <button onclick="openEditModal()" class="w-full text-left px-4 py-2 hover:bg-gray-100">Edit</button>
                                            </li>
                                            <li>
                                                <button onclick="openUnavailableModal()" class="w-full text-left px-4 py-2 hover:bg-gray-100">Unavailable</button>
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
                </div>

                <!-- Sidebar -->
                <div class="lg:w-5/12 w-full bg-white rounded-lg shadow-lg p-4 border overflow-y-auto">
                    <!-- Filter Options Section -->
                    <div class="space-y-4">
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
                                Add Car Model
                                <svg id="toggle-add-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor"
                                    class="w-5 h-5 transition-transform duration-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="add-dropdown"
                                class="hidden mt-2 space-y-2 bg-white rounded-2xl border border-gray-200 shadow-md p-4">
                                <form>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- Brand and Model Name -->
                                        <div>
                                            <label for="model_brand" class="block text-sm font-medium text-gray-700 mb-2">Brand</label>
                                            <select id="model_brand" name="model_brand"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                                <option value="" disabled selected>Select Brand</option>
                                                <option value="Toyota">Toyota</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Ford">Ford</option>
                                                <option value="Tesla">Tesla</option>
                                                <option value="Hyundai">Hyundai</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="model_name" class="block text-sm font-medium text-gray-700 mb-2">Model Name</label>
                                            <input type="text" id="model_name" name="model_name"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter model name">
                                        </div>

                                        <!-- Year and Color -->
                                        <div>
                                            <label for="model_year" class="block text-sm font-medium text-gray-700 mb-2">Year</label>
                                            <input type="number" id="model_year" name="model_year"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter year" min="1900" max="2024">
                                        </div>
                                        <div>
                                            <label for="model_color" class="block text-sm font-medium text-gray-700 mb-2">Color</label>
                                            <input type="text" id="model_color" name="model_color"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter color">
                                        </div>

                                        <!-- Model Description -->
                                        <div class="col-span-2">
                                            <label for="model_description" class="block text-sm font-medium text-gray-700 mb-2">Model Description</label>
                                            <textarea id="model_description" name="model_description" rows="3"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter model description"></textarea>
                                        </div>

                                        <!-- Engine Type and Car Type -->
                                        <div>
                                            <label for="model_engine_type" class="block text-sm font-medium text-gray-700 mb-2">Engine Type</label>
                                            <input type="text" id="model_engine_type" name="model_engine_type"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter engine type">
                                        </div>
                                        <div>
                                            <label for="model_car_type" class="block text-sm font-medium text-gray-700 mb-2">Car Type</label>
                                            <select id="model_car_type" name="model_car_type"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                                <option value="" disabled selected>Select Car Type</option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Coupe">Coupe</option>
                                                <option value="Convertible">Convertible</option>
                                            </select>
                                        </div>

                                        <!-- Engine Displacement and Fuel Type -->
                                        <div>
                                            <label for="model_engine_displacement" class="block text-sm font-medium text-gray-700 mb-2">Engine Displacement</label>
                                            <input type="text" id="model_engine_displacement" name="model_engine_displacement"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter engine displacement">
                                        </div>
                                        <div>
                                            <label for="model_fuel_type" class="block text-sm font-medium text-gray-700 mb-2">Fuel Type</label>
                                            <select id="model_fuel_type" name="model_fuel_type"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                                <option value="" disabled selected>Select Fuel Type</option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>

                                        <!-- Seat Capacity and Transmission -->
                                        <div>
                                            <label for="model_seat_capacity" class="block text-sm font-medium text-gray-700 mb-2">Seat Capacity</label>
                                            <input type="number" id="model_seat_capacity" name="model_seat_capacity"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Enter seat capacity" min="1" max="10">
                                        </div>
                                        <div>
                                            <label for="model_transmission" class="block text-sm font-medium text-gray-700 mb-2">Transmission</label>
                                            <select id="model_transmission" name="model_transmission"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                                <option value="" disabled selected>Select Transmission</option>
                                                <option value="Automatic">Automatic</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>

                                        <!-- Image Upload -->
                                        <div class="col-span-2">
                                            <label for="model_image" class="block text-sm font-medium text-gray-700 mb-2">Upload Car Image</label>
                                            <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg shadow-lg cursor-pointer hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                                                <input type="file" id="model_image" name="model_image" accept="image/*" class="hidden" onchange="previewImage(event)" />
                                                <label for="model_image" class="flex items-center space-x-3 text-sm text-gray-700 cursor-pointer">
                                                    <span class="flex items-center">
                                                        <i class="bi bi-card-image"></i>&nbsp;&nbsp;
                                                        <span>Choose Image</span>
                                                    </span>
                                                    <span class="text-gray-400 text-xs text-end">PNG,JPG up to 2mb</span>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Image Preview -->
                                        <div class="col-span-2">
                                            <div id="image-preview" class="hidden mt-2 flex justify-center">
                                                <div class="relative inline-block">
                                                    <img id="preview-img" src="#" alt="Preview" class="max-w-full h-48 object-contain rounded-lg border border-gray-300">
                                                    <button onclick="removeImage()" class="absolute -top-2 -right-2 bg-gray-500 text-white rounded-full p-1.5 hover:bg-gray-600 focus:outline-none shadow-md">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-span-2">
                                            <button type="submit"
                                                class="w-full py-3 px-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <i class="bi bi-plus-lg"></i> &nbsp;Add Car Model
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Add New Car Section -->
                        <div class="border-t border-gray-300 mt-4 pt-4">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4">Add a New Car</h2>
                            <form class="space-y-4">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- Car Brand and Car Model -->
                                    <div>
                                        <label for="car_brand" class="block text-sm font-medium text-gray-700 mb-2">Car Brand</label>
                                        <select id="car_brand" name="car_brand"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Select Brand</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Honda">Honda</option>
                                            <option value="Ford">Ford</option>
                                            <option value="Tesla">Tesla</option>
                                            <option value="Hyundai">Hyundai</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="car_model" class="block text-sm font-medium text-gray-700 mb-2">Car Model</label>
                                        <select id="car_model" name="car_model"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
                                            <option value="" disabled selected>Select Model</option>
                                            <option value="Corolla">Corolla</option>
                                            <option value="Civic">Civic</option>
                                            <option value="Mustang">Mustang</option>
                                            <option value="Model 3">Model 3</option>
                                            <option value="Accent">Accent</option>
                                        </select>
                                    </div>

                                    <!-- Odometer and Licence Plate -->
                                    <div>
                                        <label for="car_odometer" class="block text-sm font-medium text-gray-700 mb-2">Odometer</label>
                                        <input type="number" id="car_odometer" name="car_odometer"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                            placeholder="Enter odometer reading" min="0">
                                    </div>
                                    <div>
                                        <label for="car_license_plate" class="block text-sm font-medium text-gray-700 mb-2">License Plate</label>
                                        <input type="text" id="car_license_plate" name="car_license_plate"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                            placeholder="Enter license plate">
                                    </div>

                                    <!-- Registration Number -->
                                    <div class="col-span-2">
                                        <label for="car_registration_number" class="block text-sm font-medium text-gray-700 mb-2">Registration Number</label>
                                        <input type="text" id="car_registration_number" name="car_registration_number"
                                            class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                            placeholder="Enter registration number">
                                    </div>

                                    <!-- Registration Date -->
                                    <div class="col-span-2">
                                        <label for="car_registration_date" class="block text-sm font-medium text-gray-700 mb-2">Registration Date</label>
                                        <div class="relative">
                                            <input type="date" id="car_registration_date" name="car_registration_date"
                                                class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm"
                                                placeholder="Select date">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-span-2">
                                        <button type="submit"
                                            class="w-full py-3 px-4 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <i class="bi bi-plus-lg"></i> &nbsp;Add Car
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Car Modal -->
    <div id="editCarModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Car Details
                    </h3>
                    <button type="button" onclick="closeEditModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- Car Image -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <img src="https://via.placeholder.com/300x200" alt="Car Image" 
                                class="w-full h-48 object-cover rounded-lg">
                        </div>

                        <!-- Car Details -->
                        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Car Information</h3>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Car Model</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Car Model A</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Brand X</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Sedan</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Year</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">2023</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Engine Type</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">V6</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Seating Capacity</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">5</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Color</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silver</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Transmission</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Automatic</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fuel Type</label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Petrol</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Editable Fields -->
                    <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Update Details</h3>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label for="edit-odometer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Odometer</label>
                                <input type="number" id="edit-odometer" name="odometer"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Enter odometer reading">
                            </div>
                            <div>
                                <label for="edit-status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="edit-status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                    <option value="available">Available</option>
                                    <option value="rented">Rented</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="unavailable">Unavailable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-4">
                    <button type="button" onclick="closeEditModal()" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button type="button" onclick="saveCarChanges()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Unavailable Confirmation Modal -->
    <div id="unavailableModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Mark Car as Unavailable
                    </h3>
                    <button type="button" onclick="closeUnavailableModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 text-center">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full dark:bg-red-900">
                        <i class="bi bi-exclamation-triangle text-red-600 dark:text-red-300 text-2xl"></i>
                    </div>
                    <p class="mb-4 text-gray-500 dark:text-gray-400">
                        This action will mark the car as unavailable. The car will not be available for rent until it is marked as available again.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-4">
                    <button type="button" onclick="closeUnavailableModal()" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancel
                    </button>
                    <button type="button" onclick="confirmUnavailable()" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("toggle-filter").addEventListener("click", function() {
            const dropdown = document.getElementById("filter-dropdown");
            const icon = document.getElementById("toggle-icon");
            dropdown.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
        });

        document.getElementById("toggle-add").addEventListener("click", function() {
            const dropdown = document.getElementById("add-dropdown");
            const icon = document.getElementById("toggle-add-icon");
            dropdown.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
        });

        // Edit Modal Functions
        function openEditModal() {
            document.getElementById('editCarModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editCarModal').classList.add('hidden');
        }

        function saveCarChanges() {
            // Add your save logic here
            closeEditModal();
        }

        // Unavailable Modal Functions
        function openUnavailableModal() {
            document.getElementById('unavailableModal').classList.remove('hidden');
        }

        function closeUnavailableModal() {
            document.getElementById('unavailableModal').classList.add('hidden');
        }

        function confirmUnavailable() {
            // Add your unavailable confirmation logic here
            closeUnavailableModal();
        }

        // Status Dropdown Functions
        document.getElementById("toggle-status").addEventListener("click", function() {
            const dropdown = document.getElementById("status-dropdown");
            const icon = document.getElementById("status-icon");
            dropdown.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function(event) {
            const dropdown = document.getElementById("status-dropdown");
            const toggleButton = document.getElementById("toggle-status");
            const icon = document.getElementById("status-icon");
            
            if (!toggleButton.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add("hidden");
                icon.classList.remove("rotate-180");
            }
        });

        // Image Preview Functions
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const previewDiv = document.getElementById('image-preview');
                const previewImg = document.getElementById('preview-img');

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewDiv.classList.remove('hidden');
                }

                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const fileInput = document.getElementById('model_image');
            const previewDiv = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            fileInput.value = '';
            previewImg.src = '#';
            previewDiv.classList.add('hidden');
        }
    </script>
@endsection
