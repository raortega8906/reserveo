<x-guest-layout>
    <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-100">
        <div class="mb-8 text-center">
            <a href="/" class="inline-block mb-4">
                <h1 class="text-2xl font-bold text-black">Reserveo</h1>
            </a>
            <h2 class="text-2xl font-bold text-black">{{ __('Verificar correo electrónico') }}</h2>
        </div>

        <div class="mb-6 text-sm text-gray-600 text-center">
            {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico haciendo clic en el enlace que acabamos de enviarte? Si no recibiste el correo, con gusto te enviaremos otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 font-medium text-sm text-green-600 text-center">
                {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.') }}
            </div>
        @endif

        <div class="flex flex-col space-y-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
                    {{ __('Reenviar correo de verificación') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="text-center">
                @csrf
                <button type="submit" class="text-sm text-gray-600 hover:text-black underline">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
