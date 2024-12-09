<x-guest-layout>
    <div class="min-h-screen bg-gray-100 flex justify-center items-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-lg shadow-lg">

            <!-- Título de la página -->
            <h2 class="text-center text-3xl font-extrabold text-indigo-600">
                Inicia sesión
            </h2>

            <!-- Sesión de estado -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Enlaces y botón -->
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="w-full py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center mt-6">
                <span class="text-sm text-gray-600">¿No tienes una cuenta?</span>
                <a href="{{ route('register') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                    {{ __('Regístrate aquí') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
