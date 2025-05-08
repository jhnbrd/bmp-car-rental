@extends('layouts.administration')

@section('content')

    <div class="flex flex-col md:flex-row md:items-center md:justify-between my-6 space-y-4 md:space-y-0">
        <!-- Flex Container -->
        <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 mb-5">
            Employee Records
        </h2>

        <form class="w-full sm:w-[400px] md:w-[500px] lg:w-[600px] xl:w-[600px]">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 md:col-span-8">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
                        Search
                    </label>
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
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                            Search
                        </button>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 flex items-center">
                    <button data-modal-target="addemployee-modal" data-modal-toggle="addemployee-modal"
                        class="flex items-center gap-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"></circle>
                            <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        Add Employee
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="flex justify-end items-center mb-5">

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
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Date Created</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($employees as $employee)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{ asset($employee->user->picture_path) }}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">
                                            {{ $employee->first_name }}
                                            @if ($employee->middle_name)
                                                {{ $employee->middle_name }}
                                            @endif
                                            {{ $employee->last_name }}
                                        </p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $employee->employee_id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->user->email ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->role }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($employee->is_active)
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $employee->created_at }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button data-modal-target="editcustomer-modal" data-modal-toggle="editcustomer-modal"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit"
                                        onclick="openModal('{{ $employee->first_name }}', '{{ $employee->middle_name ? $employee->middle_name : '' }}', '{{ $employee->last_name }}', '{{ $employee->user->email ?? '' }}', '{{ $employee->role }}', '{{ $employee->is_active }}', '{{ $employee->created_at->format('Y-m-d H:i:s') }}', {{ $employee->id }})">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-4 py-3 text-center" colspan="6">
                                No employees found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Employee modal -->
    <div id="addemployee-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative w-full max-w-2xl">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Add Employee
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="addemployee-modal">
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
                    <form class="space-y-4" action="{{ route('add-employee') }}" method="POST">
                        @csrf
                        <div class="overflow-y-auto max-h-[500px] border border-gray-300 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                                <div>
                                    <label for="first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                        Name</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                </div>
                                <div>
                                    <label for="last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                        Name</label>
                                    <input type="text" name="last_name" id="last_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-2">
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                </div>
                                <div>
                                    <label for="role"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Employee
                                        Role</label>
                                    <select name="role" id="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Cashier">Cashier</option>
                                        <option value="Mechanic">Mechanic</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                                <div>
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <div class="relative">
                                        <input type="password" name="password" id="password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                                        <span toggle="#password"
                                            class="absolute inset-y-0 right-0 flex items-center px-2 cursor-pointer text-gray-500 dark:text-gray-300">
                                            <i id="eye-icon" class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Add Employee
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Employee modal -->
    <div id="editcustomer-modal" tabindex="-1" aria-hidden="true"
        class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 max-h-full">
        <div class="relative w-full max-w-2xl">
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Employee
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
                <div class="px-4 pb-2">
                    <form class="space-y-4" action="{{ route('update-employee', 1) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_employee_id" name="employee_id">
                        <div class="overflow-y-auto max-h-[500px] border border-gray-300 rounded-lg p-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                                <div>
                                    <label for="edit_first_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                                        Name</label>
                                    <input type="text" name="first_name" id="edit_first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Enter first name">
                                </div>
                                <div>
                                    <label for="edit_last_name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                        Name</label>
                                    <input type="text" name="last_name" id="edit_last_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Enter last name">
                                </div>
                            </div>
                            <div>
                                <label for="edit_middle_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name
                                    (Optional)</label>
                                <input type="text" name="middle_name" id="edit_middle_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Enter middle name">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-2">
                                <div>
                                    <label for="edit_email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="edit_email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Enter email">
                                </div>
                                <div>
                                    <label for="edit_role"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <select id="edit_role" name="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                        <option value="Admin">Admin</option>
                                        <option value="Mechanic">Mechanic</option>
                                        <option value="Cashier">Cashier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-3 mb-2">
                                <div>
                                    <label for="edit_accountcreated"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account
                                        Created</label>
                                    <input type="text" name="accountcreated" id="edit_accountcreated"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Invalid Date" disabled>
                                </div>
                            </div>
                            <div class="rounded-sm gap-2 mb-2">
                                <label class="text-sm font-medium text-gray-900 dark:text-white">
                                    Account Status

                                    <div
                                        class="flex mt-2 items-center gap-4 border border-gray-300 dark:border-gray-600 p-2 rounded-md w-fit">
                                        <span id="edit-toggle-label"
                                            class="text-sm font-medium text-gray-700 dark:text-gray-200">Active</span>

                                        <div class="flex items-center gap-2">
                                            <input type="checkbox" id="edit-toggle-switch" name="is_active"
                                                class="sr-only peer" value="1">
                                            <div
                                                class="relative w-12 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-7 rtl:peer-checked:after:translate-x-[-100%] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-500 peer-checked:bg-green-600 dark:peer-checked:bg-green-600">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                            Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const button = document.querySelector('button[data-dropdown-toggle="dropdown-menu"]');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownArrow = document.getElementById('dropdown-arrow');

        if (button) {
            button.addEventListener('click', () => {
                if (dropdownMenu) {
                    dropdownMenu.classList.toggle('hidden');
                }
                if (dropdownArrow) {
                    dropdownArrow.classList.toggle('rotate-180');
                }
            });
        }

        function openModal(firstName, middleName, lastName, email, role, isActive, createdAt, employeeId) {
            document.getElementById('edit_employee_id').value = employeeId;
            document.getElementById('edit_first_name').value = firstName;
            document.getElementById('edit_middle_name').value = middleName || '';
            document.getElementById('edit_last_name').value = lastName;
            document.getElementById('edit_email').value = email;

            const roleSelect = document.getElementById('edit_role');
            if (roleSelect) {
                roleSelect.value = role;
            }

            const toggleSwitch = document.getElementById('edit-toggle-switch');
            const toggleLabelElement = document.getElementById('edit-toggle-label');
            if (toggleSwitch && toggleLabelElement) {
                toggleSwitch.checked = (isActive == 1);
                toggleLabelElement.textContent = (isActive == 1) ? 'Active' : 'Inactive';
            }

            const accountCreatedInput = document.getElementById('edit_accountcreated');
            if (accountCreatedInput) {
                const date = new Date(createdAt);
                const formattedDate = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                accountCreatedInput.value = formattedDate;
            }

            const modal = document.getElementById('editcustomer-modal');
            if (modal && !modal.classList.contains('show')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            // Dynamically set the form action with the employee ID
            const editForm = modal.querySelector('form');
            if (editForm) {
                editForm.action = `/employees/${employeeId}`;

                // Add an event listener to the form's submit event
                editForm.addEventListener('submit', function (event) {
                    const isChecked = document.getElementById('edit-toggle-switch').checked;

                    // Check if the original is_active input exists and remove it
                    const originalIsActive = editForm.querySelector('input[name="is_active"]');
                    if (originalIsActive) {
                        originalIsActive.remove();
                    }

                    // Create a new hidden input with the desired 'is_active' name
                    const newIsActive = document.createElement('input');
                    newIsActive.type = 'hidden';
                    newIsActive.name = 'is_active';
                    newIsActive.value = isChecked ? 1 : 0;
                    editForm.appendChild(newIsActive);

                    // The form will now submit with the 'is_active' hidden input
                });
            }
        }

        function toggleLabel() {
            const toggleSwitch = document.getElementById('toggle-switch');
            const toggleLabel = document.getElementById('toggle-label');
            if (toggleSwitch && toggleLabel) {
                toggleLabel.textContent = toggleSwitch.checked ? 'Active' : 'Inactive';
            }
        }
    </script>
@endsection