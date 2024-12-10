<x-guest-layout>
    <div class="container py-8">
        <!-- Contenedor del formulario -->
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8 border border-gray-200">
            <form method="POST" action="{{ route('login') }}" class="w-full max-w-md">
                @csrf

                <!-- Título -->
                <h2 class="text-center text-2xl font-bold text-indigo-600 mb-4">
                    Inicia sesión
                </h2>

                <!-- Sesión de estado -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Recordarme -->
                <div class="mb-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>
                </div>

                <!-- Botón -->
                <div class="mb-4">
                    <x-primary-button class="w-full">
                        {{ __('Iniciar sesión') }}
                    </x-primary-button>
                </div>

                <!-- Enlaces -->
                <div class="flex justify-between text-sm">
                    @if (Route::has('password.request'))
                        <a class="text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    <a class="text-indigo-600 hover:text-indigo-500" href="{{ route('register') }}">
                        {{ __('Crear cuenta') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
