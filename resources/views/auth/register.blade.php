<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo Electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone Address -->
        <div class="mt-4">
            <x-input-label for="telefono">
                {{ __('Teléfono') }}
                <span class="text-xs font-normal text-gray-400 lowercase">({{ __('Opcional') }})</span>
            </x-input-label>
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" placeholder="Ej: 612345678" autocomplete="tel" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="direccion">
                {{ __('Dirección') }}
                <span class="text-xs font-normal text-gray-400 lowercase">({{ __('Opcional') }})</span>
            </x-input-label>
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" autocomplete="street-address" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <!-- Date Of Birth -->
        <div class="mt-4">
            <x-input-label for="fecha_nacimiento">
                {{ __('Fecha de Nacimiento') }}
                <span class="text-xs font-normal text-gray-400 lowercase">({{ __('Opcional') }})</span>
            </x-input-label>
            <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" />
            <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
