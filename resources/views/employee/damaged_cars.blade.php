@extends('layouts.administration')

@section('content')
<div class="container flex flex-col items-center mx-auto">
    <h2 class="w-full text-2xl font-semibold text-gray-700 my-4">
        Damaged Car Management
    </h2>

    <div class="container mx-auto p-2">
        <!-- Header Section with Breadcrumbs -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0">
                <!-- Left Section: Breadcrumbs -->
                <nav class="flex items-center text-sm text-gray-500" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('employee.dashboard') }}" class="inline-flex items-center text-gray-700 hover:text-blue-600">
                                <i class="bi bi-house-door mr-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <a href="{{ route('cars-modification') }}" class="ml-1 text-gray-700 hover:text-blue-600 md:ml-2">Cars</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="bi bi-chevron-right text-gray-400"></i>
                                <span class="ml-1 text-gray-500 md:ml-2 font-medium">Damaged Cars</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Right Section: Title -->
                <div class="flex items-center">
                                    <!-- Right Section: Title and Stats -->
                <div class="flex items-center space-x-4">
                    <div class="hidden md:flex items-center space-x-4">
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                            <span class="ml-2 text-sm text-gray-600">Under Repair: 1</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            <span class="ml-2 text-sm text-gray-600">Completed: 1</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
                            <span class="ml-2 text-sm text-gray-600">Total Cost: ₱40,000</span>
                        </div>
                    </div>
                </div>
-
                </div>
            </div>
        </div>

        <!-- Main Content Container -->
        <div class="bg-white rounded-lg shadow-lg p-4 border">
            <!-- Search and Filter Section -->
            <div class="flex flex-col md:flex-row items-center justify-between space-y-2 md:space-y-0 mb-4">
                <!-- Search Input -->
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Search damaged cars..." 
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
                                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Under Repair</button>
                                </li>
                                <li>
                                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100">Repair Completed</button>
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

            <!-- Damaged Cars Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($carDamages as $carDamage)
                <!-- Single Car Card -->
                <div class="bg-white p-3 rounded-lg shadow-sm border hover:shadow-md transition-shadow duration-200">
                    <!-- Car Image -->
                    <img src="{{ asset($carDamage->damage_img_path) }}" alt="Car Image"
                        class="w-full h-25 object-scale-down rounded-md mb-3">

                    <!-- Car Model and Dropdown -->
                    <div class="flex justify-between items-center mb-2">
                        <h3 class="font-semibold text-base">{{ $carDamage->booking->car->carModel->brand }} {{ $carDamage->booking->car->carModel->model_name }} {{ $carDamage->booking->car->carModel->model_year }}</h3>
                        <!-- Three Dots Dropdown -->
                        <div class="relative">
                            @if ($carDamage->latestStatus->status != 'Complete')
                            <button id="dropdownMenuButton" data-dropdown-toggle="dropdownMenu"
                                class="text-dark font-medium rounded-lg text-sm px-2 py-1 text-center inline-flex items-center"
                                type="button"><i class="bi bi-three-dots-vertical"></i></button>
                            <!-- Dropdown Menu -->
                            <div id="dropdownMenu"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <button onclick="openRepairModal()" class="w-full text-left px-4 py-2 hover:bg-gray-100">Update Status</button>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Car Details -->
                    <div class="space-y-1.5 mb-3">
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-600">License Plate:</span>
                            <span class="font-medium">{{ $carDamage->booking->car->license_plate }}</span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-600">Customer:</span>
                            <span class="font-medium">{{ $carDamage->booking->customer->first_name }} {{ $carDamage->booking->customer->middle_name ? $carDamage->booking->customer->middle_name . ' ' : '' }} {{ $carDamage->booking->customer->last_name }}</span>
                        </div>
                        @if ($carDamage->latestStatus->status === 'Under Repair' || $carDamage->latestStatus->status === 'Complete')
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-600">Damage Cost:</span>
                            <span class="font-medium">{{ $carDamage->repair_cost }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-600">Last Updated:</span>
                            <span>{{ $carDamage->latestStatus->status_date }}</span>
                        </div>
                        @if ($carDamage->latestStatus->status === 'Under Repair' || $carDamage->latestStatus->status === 'Complete')
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-600">Parts to Repair:</span>
                            <span class="text-xs text-gray-500 truncate max-w-[150px]">{{ $carDamage->repair_desc }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Status Badges -->
                    <div class="flex space-x-2 mb-3">
                        @php
                            $statusBadge1 = '';
                            $statusBadge2 = '';
                            $statusBadge1ColorClass = '';
                            $statusBadge2ColorClass = '';

                            switch ($carDamage->latestStatus->status) {
                                case 'Pending':
                                    $statusBadge1 = 'Pending Assessment';
                                    $statusBadge2 = 'Unpaid';
                                    $statusBadge1ColorClass = 'bg-yellow-200 text-yellow-800';
                                    $statusBadge2ColorClass = 'bg-red-200 text-red-800';
                                    break;
                                case 'Under Repair':
                                    $statusBadge1 = 'Under Repair';
                                    $statusBadge2 = 'Paid'; // Assuming 'Paid' is the correct status
                                    $statusBadge1ColorClass = 'bg-blue-200 text-blue-800'; // You can adjust the color
                                    $statusBadge2ColorClass = 'bg-green-200 text-green-800';
                                    break;
                                case 'Complete':
                                    $statusBadge1 = 'Complete';
                                    $statusBadge2 = 'Paid';
                                    $statusBadge1ColorClass = 'bg-green-200 text-green-800';
                                    $statusBadge2ColorClass = 'bg-green-200 text-green-800';
                                    break;
                                default:
                                    $statusBadge1 = 'Unknown';
                                    $statusBadge2 = 'Unknown';
                                    $statusBadge1ColorClass = 'bg-gray-200 text-gray-800';
                                    $statusBadge2ColorClass = 'bg-gray-200 text-gray-800';
                            }
                        @endphp

                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full {{ $statusBadge1ColorClass }}">
                            {{ $statusBadge1 }}
                        </span>
                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full {{ $statusBadge2ColorClass }}">
                            {{ $statusBadge2 }}
                        </span>
                    </div>

                    @if ($carDamage->latestStatus->status != 'Complete')
                    <button data-modal-target="repairModal-{{ $carDamage->id }}" data-modal-toggle="repairModal-{{ $carDamage->id }}"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 focus:outline-none">
                        Update Repair Status
                    </button>
                    @endif
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Repair Status Modal -->
<div id="repairModal-{{ $carDamage->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full flex items-center justify-center">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Update Repair Status
                </h3>
                <button type="button" onclick="closeRepairModal()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="repairForm" action="{{ route('update-damage-repair-status', $carDamage->id) }}" method="POST" class="p-4 md:p-5 space-y-4">
                <input type="hidden" id="carId" name="carId">
                @csrf
                <div>
                    <label for="repairStatus" class="block mb-2 text-sm font-medium text-gray-900">Repair Status</label>
                    <select id="repairStatus" name="repairStatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Under Repair">Under Repair</option>
                        <option value="Complete">Repair Completed</option>
                        <option value="Pending">Pending Assessment</option>
                    </select>
                </div>

                <div>
                    <label for="repairCost" class="block mb-2 text-sm font-medium text-gray-900">Total Repair Cost</label>
                    <input type="number" id="repairCost" name="repairCost" step="0.01" min="0"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="repairParts" class="block mb-2 text-sm font-medium text-gray-900">Parts to be Repaired</label>
                    <textarea id="repairParts" name="repairParts" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="List the parts that need repair..."></textarea>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button type="button" onclick="closeRepairModal()"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
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
function openRepairModal(carId) {
    document.getElementById('carId').value = carId;
    document.getElementById('repairModal').classList.remove('hidden');
}

function closeRepairModal() {
    document.getElementById('repairModal').classList.add('hidden');
    document.getElementById('repairForm').reset();
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
</script>
@endsection 