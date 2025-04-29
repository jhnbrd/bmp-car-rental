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
                    <x-text-input id="email" class="w-full px-4 py-3 border rounded-md text-black" type="email"
                        name="email" :value="old('email')" required autofocus placeholder="Email" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-text-input id="password" class="w-full px-4 py-3 border rounded-md text-black" type="password"
                        name="password" required placeholder="Password" />
                </div>

                <!-- Forgot Password -->
                <div class="text-right text-sm mb-4">
                    @if (Route::has('password.request'))
                        <a class="text-white underline" href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="text-center"> <!--  -->
                    <x-primary-button
                        class="w-full bg-white py-2 px-4 rounded-md border flex items-center justify-center !text-black hover:!text-white" type="submit">
                        {{ __('SIGN IN') }}
                    </x-primary-button>
                </div>

                <!-- Register Link -->
                <div class="text-center text-white text-sm mt-4">
                    Don't have an account?
                    <a class="underline" href="{{ route('register') }}">Register Here</a>
                </div>

                <!-- Back to Home -->
                <div class="text-center text-white text-sm mt-2">
                    <a class="underline" href="{{ route('home') }}">Back to Home</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
