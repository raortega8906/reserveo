<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-black">{{ __('Iniciar sesión') }}</h2>
                <p class="mt-2 text-sm text-gray-600">{{ __('Accede a tu cuenta para gestionar tus reservas') }}</p>
            </div>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" :value="__('Contraseña')" class="text-sm font-medium text-gray-700" />
                        @if (Route::has('password.request'))
                            <a class="text-xs text-gray-600 hover:text-black" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm focus:ring-black" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                    </label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                        {{ __('Iniciar sesión') }}
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    {{ __('¿No tienes una cuenta?') }} 
                    <a href="{{ route('register') }}" class="font-medium text-black hover:text-gray-800">
                        {{ __('Regístrate') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
