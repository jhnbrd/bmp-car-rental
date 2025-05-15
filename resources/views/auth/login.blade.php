<x-guest-layout>
    <!-- Login Section -->
    <div class="flex justify-center items-center">
        <div class="w-[40%] bg-[#0f294c] rounded-lg">
            <header class="text-white text-4xl font-bold text-center mb-6">LOG IN</header>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            @if ($errors->get('email'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Error</span>
                    <div>
                        @foreach ($errors->get('email') as $error)
                            <span class="font-medium">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @else
                <x-input-error :messages="$errors->get('email')" class="mt-2 mb-2" />
            @endif

            @if ($errors->get('password'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Error</span>
                    <div>
                        @foreach ($errors->get('password') as $error)
                            <span class="font-medium">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @else
                <x-input-error :messages="$errors->get('password')" class="mt-2 mb-2" />
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-white mb-1">Email Address</label>
                    <x-text-input id="email" class="w-full px-4 py-3 border rounded-md text-black" type="email"
                        name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
                </div>

                <!-- Password -->
                <div class="mb-4" x-data="{ showPassword: false }">
                    <label for="password" class="block text-white mb-1">Password</label>
                    <div class="relative">
                        <x-text-input id="password" class="w-full px-4 py-3 border rounded-md text-black pr-10"
                            x-bind:type="showPassword ? 'text' : 'password'"
                            name="password" required placeholder="Enter your password" />
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
                </div>

                <!-- Forgot Password -->
                <div class="text-right text-white text-sm mb-4">
                    @if (Route::has('password.request'))
                        <a class="underline hover:text-blue-300 transition-colors duration-200 px-2 py-1 rounded-md" href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center"> <!--  -->
                    <button type="submit"
                        class="w-full bg-white border font-medium border-gray-300 rounded-md px-6 py-2 transition duration-200 hover:bg-gray-100 hover:border-blue-400 hover:scale-105 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:ring-offset-2">
                        SIGN IN
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center text-white text-sm mt-4">
                    Don't have an account?
                    <a class="underline hover:text-blue-300 transition-colors duration-200 px-2 py-1 rounded-md" href="{{ route('register') }}">Register Here</a>
                </div>

                <!-- Back to Home -->
                <div class="text-center text-white text-sm mt-2">
                    <a class="underline hover:text-blue-300 transition-colors duration-200 px-2 py-1 rounded-md" href="{{ route('home') }}">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
