    <head>
        <title>Login</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/main logo.png') }}" alt="Dropex Logo" class="h-16">
            </div>

            <!-- Laravel Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Sign in to Dropex</h2>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Email Address') }}</label>
                    <input type="email" id="email" name="email" :value="old('email')" required autofocus
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" required
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox"
                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" name="remember">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex justify-between items-center mb-4">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-indigo-600 hover:underline">{{ __('Forgot your password?') }}</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-medium py-2 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        {{ __('Log in') }}
                    </button>
                </div>

                <!-- Registration Link -->
                <p class="mt-6 text-center text-sm text-gray-600">
                    {{ __('New user?') }} <a href="{{ route('register') }}"
                        class="text-indigo-600 hover:underline">{{ __('Create an account') }}</a>
                </p>
            </form>
        </div>
</div>

