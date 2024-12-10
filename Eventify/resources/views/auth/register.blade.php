<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
            <h1 class="text-3xl font-semibold text-cencdter text-blue-600 mb-6">Bienvenido a Eventify</h1>
            <p class="text-center text-gray-500 mb-8">Por favor, regístrate para continuar.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Role Selection -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="asistente" {{ old('role') == 'asistente' ? 'selected' : '' }}>Asistente</option>
                        <option value="organizador" {{ old('role') == 'organizador' ? 'selected' : '' }}>Organizador</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">¿Ya tienes cuenta? Inicia sesión.</a>
                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
