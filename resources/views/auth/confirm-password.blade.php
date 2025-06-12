<x-guest-layout>
    <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
        <div class="mb-8 text-center">
            <a href="/" class="inline-block mb-4">
                <h1 class="text-2xl font-bold text-black">Reserveo</h1>
            </a>
            <h2 class="text-2xl font-bold text-black">{{ __('Confirmar contraseña') }}</h2>
        </div>

        <div class="mb-6 text-sm text-gray-600 text-center">
            {{ __('Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-medium text-gray-700" />
                <x-text-input id="password" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                    {{ __('Confirmar') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
