<x-guest-layout>
    <header class="text-white text-4xl font-bold text-center mb-6">Register</header>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Column 1-->
        <div class="grid grid-cols-3 gap-4">
            <!-- First Name -->
            <div class="mb-4">
                <label for="firstname" class="block text-white mb-1">First Name</label>
                <x-text-input id="firstname" class="w-full px-4 py-3 border rounded-md text-black" type="text"
                    name="firstname" :value="old('firstname')" required autofocus placeholder="First Name" />
                <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
            </div>

            <!-- Middle Name -->
            <div class="mb-4">
                <label for="middlename" class="block text-white mb-1">Middle Name</label>
                <x-text-input id="middlename" class="w-full px-4 py-3 border rounded-md text-black" type="text"
                    name="middlename" :value="old('middlename')" required autofocus placeholder="Middle Name" />
                <x-input-error :messages="$errors->get('middlename')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mb-4">
                <label for="lastname" class="block text-white mb-1">Last Name</label>
                <x-text-input id="lastname" class="w-full px-4 py-3 border rounded-md text-black" type="text"
                    name="lastname" required placeholder="Last Name" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>
        </div>

        <!-- Column 2-->
        <div x-data="{ 
            provinces: [], 
            cities: [], 
            barangays: [], 
            selectedProvince: '', 
            selectedCity: ''
        }" x-init="fetch('https://psgc.gitlab.io/api/provinces')
        .then(response => response.json())
        .then(data => provinces = data)">
        
        {{-- (SUGGESTED TO REMOVE DUE TO DATA PRIVACY) --}}
            {{-- <div class="grid grid-cols-3 gap-4">
                <!-- Province -->
                <div class="mb-4">
                    <label for="province" class="block text-white mb-1">Province</label>
                    <select id="province" name="province" class="w-full px-4 py-3 border rounded-md text-black" @change="selectedProvince = $event.target.value;
                fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvince}/cities-municipalities`)
                .then(response => response.json())
                .then(data => cities = data)">
                        <option value="">Select Province</option>
                        <template x-for="province in provinces" :key="province . code">
                            <option :value="province . code" x-text="province.name"></option>
                        </template>
                    </select>
                    <x-input-error :messages="$errors->get('province')" class="mt-2" />
                </div>

                <!-- City -->
                <div class="mb-4">
                    <label for="city" class="block text-white mb-1">City/Municipality</label>
                    <select id="city" name="city" class="w-full px-4 py-3 border rounded-md text-black" @change="selectedCity = $event.target.value;
                    fetch(`https://psgc.gitlab.io/api/cities-municipalities/${selectedCity}/barangays`)
                    .then(response => response.json())
                    .then(data => barangays = data);
        
                    fetch(`https://psgc.gitlab.io/api/cities-municipalities/${selectedCity}`)
                    .then(response => response.json())
                    .then(data => zipcode = data.zip_code || '')">
                        <option value="">Select City</option>
                        <template x-for="city in cities" :key="city . code">
                            <option :value="city . code" x-text="city.name"></option>
                        </template>
                    </select>

                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>
                <!-- Barangay -->
                <div class="mb-4">
                    <label for="barangay" class="block text-white mb-1">Barangay</label>
                    <select id="barangay" name="barangay" class="w-full px-4 py-3 border rounded-md text-black">
                        <option value="">Select Barangay</option>
                        <template x-for="barangay in barangays" :key="barangay . code">
                            <option :value="barangay . code" x-text="barangay.name"></option>
                        </template>
                    </select>

                    <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
                </div>
            </div>

            <!-- Column 3-->
            <div class="grid grid-cols-2 gap-4">
                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-white mb-1">Street Address</label>
                    <x-text-input id="address" class="w-full px-4 py-3 border rounded-md text-black" type="text"
                        name="address" :value="old('address')" required autofocus
                        placeholder="Street, Building, House No." />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone_number" class="block text-white mb-1">Phone Number</label>
                    <div class="flex items-center">
                        <span class="bg-gray-200 px-3 py-3 rounded-l-md text-gray-700 border border-r-0">+63</span>
                        <x-text-input id="phone_number" class="w-full rounded-l-none px-4 py-3 border text-black"
                            type="number" name="phone_number" :value="old('phone_number')" required autofocus
                            placeholder="9XXXXXXXXX" />
                    </div>
                    <p class="text-xs text-gray-300 mt-1">Format: 9XXXXXXXXX (without leading 0)</p>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
            </div> --}}

        </div>

        <!-- Column 5 (SUGGESTED TO REMOVE DUE TO DATA PRIVACY)--> 
        {{-- <div class="grid grid-cols-3 gap-4">
            <!-- Driver License Number -->
            <div class="mb-4">
                <label for="driver_license" class="block text-white mb-1">Driver License No.</label>
                <x-text-input id="driver_license" class="w-full px-4 py-3 border rounded-md text-black" type="text"
                    name="driver_license" :value="old('driver_license')" required autofocus
                    placeholder="L0X-XX-XXXXXX" />
                <x-input-error :messages="$errors->get('driver_license')" class="mt-2" />
            </div>
            <!-- License Expiration Date -->
            <div class="mb-4">
                <label for="licence_exp" class="block text-white mb-1">License Expiration Date</label>
                <x-text-input id="licence_exp" class="w-full px-4 py-3 border rounded-md text-black" type="date"
                    name="licence_exp" :value="old('licence_exp')" required autofocus placeholder="Expiration Date" />
                <x-input-error :messages="$errors->get('licence_exp')" class="mt-2" />
            </div>
            <!-- Upload License -->
            <div class="mb-4" x-data="{ fileName: '' }">
                <label for="driverlicense" class="block text-white mb-1">Upload License Image</label>
                <div class="relative flex items-center w-full px-4 py-3 border rounded-md bg-gray-50 text-gray-700">
                    <svg class="h-5 w-5 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-sm text-gray-500" x-text="fileName ? fileName : 'JPG, PNG files only'"></span>
                    <input id="driverlicense" type="file" name="upload_img" required accept=".jpg,.jpeg,.png"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                        @change="fileName = $event.target.files.length ? $event.target.files[0].name : ''" />
                </div>
                <x-input-error :messages="$errors->get('upload_img')" class="mt-2" />
            </div>
        </div> --}}

        <!-- Column 6-->
        <div class="grid grid-cols-3 gap-4">
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-white mb-1">Email Address</label>
                <x-text-input id="email" class="w-full px-4 py-3 border rounded-md text-black" type="email" name="email"
                    :value="old('email')" required autofocus placeholder="Enter your email address" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mb-4" x-data="{ showPassword: false }">
                <label for="password" class="block text-white mb-1">Password</label>
                <div class="relative">
                    <x-text-input id="password" class="w-full px-4 py-3 border rounded-md text-black pr-10"
                        x-bind:type="showPassword ? 'text' : 'password'" name="password" required autofocus
                        placeholder="Enter your password" />
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <svg x-show="!showPassword" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <svg x-show="showPassword" class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                clip-rule="evenodd" />
                            <path
                                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Confirm Password -->
            <div class="mb-4" x-data="{ showConfirmPassword: false }">
                <label for="confirmpassword" class="block text-white mb-1">Confirm Password</label>
                <div class="relative">
                    <x-text-input id="confirmpassword" class="w-full px-4 py-3 border rounded-md text-black pr-10"
                        x-bind:type="showConfirmPassword ? 'text' : 'password'" name="password_confirmation" required
                        autofocus placeholder="Confirm your password" />
                    <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                        <svg x-show="!showConfirmPassword" class="h-5 w-5 text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd"
                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                clip-rule="evenodd" />
                        </svg>
                        <svg x-show="showConfirmPassword" class="h-5 w-5 text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                clip-rule="evenodd" />
                            <path
                                d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <div class="text-white text-sm">
                <a class="underline hover:text-blue-300 transition-colors duration-200 px-2 py-1 rounded-md"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>


            <button type="submit"
                class="ms-4 bg-white font-medium border border-gray-300 rounded-md px-6 py-1 transition duration-200 hover:bg-gray-100 hover:border-blue-400 hover:scale-105 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2">
                {{ __('REGISTER') }}
            </button>

            <input type="hidden" name="is_banned" value="0" />
        </div>
    </form>
</x-guest-layout>