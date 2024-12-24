<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
            <!-- Logo Section -->
            <div class="flex justify-center mb-6">
                <img src="{{ url('images/main logo.png') }}" alt="Dropex Logo" class="h-12">
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Create an Account</h2>

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Country -->
                <div class="mb-4">
                    <x-input-label for="country" :value="__('Country')" />
                    <select id="country" name="country" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">{{ __('Select your country') }}</option>
                        <option value="us">United States</option>
                        <option value="ca">Canada</option>
                        <option value="mx">Mexico</option>
                        <!-- Add more countries as needed -->
                    </select>
                    <x-input-error :messages="$errors->get('country')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <x-input-label for="phone" :value="__('Phone Number')" />
                    <div class="flex space-x-2">
                        <select id="country-code" name="country_code" class="block border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                            <option value="+1">+1 (US, Canada)</option>
                            <option value="+52">+52 (Mexico)</option>
                            <!-- Add more country codes as needed -->
                        </select>
                        <x-text-input id="phone" class="flex-grow block mt-1 w-full" type="tel" name="phone" required placeholder="Phone number" />
                    </div>
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Agreement Section -->
                <div class="mb-4">
                    <label for="agreement" class="flex items-center">
                        <input id="agreement" type="checkbox" name="agreement" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" required>
                        <span class="ml-2 text-sm text-gray-600">
                            {{ __('I agree to the') }} <a href="{{ route('terms') }}" class="text-indigo-600 hover:underline">{{ __('Terms and Conditions') }}</a> {{ __('and') }} <a href="{{ route('license') }}" class="text-indigo-600 hover:underline">{{ __('License Agreement') }}</a>.
                        </span>
                    </label>
                </div>

                <!-- Already Registered -->
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">{{ __('Already registered?') }}</a>
                </div>

                <!-- Register Button -->
                <div class="mt-6">
                    <x-primary-button class="w-full">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
