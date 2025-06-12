<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Reserveo - Sistema de reservas simple y elegante para tu negocio">

        <title>Reserveo - Sistema de Reservas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white dark:bg-[#0a0a0a] text-black flex min-h-screen flex-col">
        <!-- Navigation -->
        <header class="w-full border-b border-gray-100 dark:border-gray-800">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-black dark:text-white">
                            Reserveo
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    @if (Route::has('login'))
                        <nav class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-black dark:text-white hover:text-gray-700 dark:hover:text-gray-300">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-black dark:text-white hover:text-gray-700 dark:hover:text-gray-300">
                                    {{ __('Iniciar sesión') }}
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200">
                                        {{ __('Registrar') }}
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative bg-white dark:bg-[#0a0a0a] py-16 sm:py-24">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl sm:text-5xl font-bold text-black dark:text-white mb-6">
                            {{ __('Simplifica las reservas de tu negocio') }}
                        </h1>
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-8 max-w-lg mx-auto lg:mx-0">
                            {{ __('Reserveo te ofrece un sistema elegante y fácil de usar para gestionar reservas, clientes y disponibilidad en tiempo real.') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="{{ route('register') }}" class="rounded-md bg-black px-6 py-3 text-base font-medium text-white hover:bg-gray-800 dark:bg-white dark:text-black dark:hover:bg-gray-200">
                                {{ __('Comenzar ahora') }}
                            </a>
                            <a href="#features" class="rounded-md border border-gray-300 dark:border-gray-700 px-6 py-3 text-base font-medium text-black dark:text-white hover:bg-gray-50 dark:hover:bg-gray-900">
                                {{ __('Conocer más') }}
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="relative w-full max-w-lg aspect-video rounded-lg overflow-hidden shadow-lg bg-gray-100 dark:bg-gray-800">
                            <img src="/placeholder.svg?height=400&width=600" alt="Reserveo Dashboard" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-black dark:text-white mb-4">{{ __('Características principales') }}</h2>
                    <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ __('Diseñado para hacer que la gestión de reservas sea simple y eficiente para cualquier tipo de negocio.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Gestión de calendario') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Visualiza y administra todas tus reservas en un calendario intuitivo y fácil de usar.') }}
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Gestión de clientes') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Mantén un registro organizado de tus clientes y su historial de reservas.') }}
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Notificaciones') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Envía recordatorios automáticos a tus clientes para reducir las ausencias.') }}
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Informes y estadísticas') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Analiza el rendimiento de tu negocio con informes detallados y estadísticas útiles.') }}
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Pagos en línea') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Acepta pagos anticipados y depósitos para asegurar las reservas de tus clientes.') }}
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700">
                        <div class="w-12 h-12 bg-black dark:bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Reservas móviles') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Permite a tus clientes hacer reservas desde cualquier dispositivo, en cualquier momento.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="py-16 bg-white dark:bg-[#0a0a0a]">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-black dark:text-white mb-4">{{ __('¿Cómo funciona?') }}</h2>
                    <p class="text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ __('Reserveo hace que gestionar las reservas sea más fácil que nunca.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Step 1 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-black dark:bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-white dark:text-black">1</span>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Regístrate') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Crea tu cuenta en minutos y configura tu perfil de negocio.') }}
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-black dark:bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-white dark:text-black">2</span>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('Personaliza') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Configura tus servicios, horarios y políticas de reserva.') }}
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="text-center">
                        <div class="w-16 h-16 bg-black dark:bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-xl font-bold text-white dark:text-black">3</span>
                        </div>
                        <h3 class="text-xl font-semibold text-black dark:text-white mb-2">{{ __('¡Listo!') }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            {{ __('Empieza a recibir reservas y gestiona tu negocio de forma eficiente.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-16 bg-black dark:bg-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-white dark:text-black mb-6">
                        {{ __('Empieza a gestionar tus reservas hoy mismo') }}
                    </h2>
                    <p class="text-gray-300 dark:text-gray-700 mb-8">
                        {{ __('Únete a los miles de negocios que ya confían en Reserveo para gestionar sus reservas de forma eficiente.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="rounded-md bg-white px-6 py-3 text-base font-medium text-black hover:bg-gray-100 dark:bg-black dark:text-white dark:hover:bg-gray-800">
                            {{ __('Crear cuenta gratis') }}
                        </a>
                        <a href="#" class="rounded-md border border-gray-500 px-6 py-3 text-base font-medium text-white hover:bg-gray-900 dark:text-black dark:border-gray-300 dark:hover:bg-gray-100">
                            {{ __('Solicitar demo') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white dark:bg-[#0a0a0a] border-t border-gray-100 dark:border-gray-800 py-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Logo and Description -->
                    <div class="col-span-1 md:col-span-2">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-black dark:text-white">
                            Reserveo
                        </a>
                        <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-md">
                            {{ __('Sistema de reservas simple y elegante para tu negocio. Gestiona tus citas, clientes y disponibilidad en un solo lugar.') }}
                        </p>
                    </div>

                    <!-- Links -->
                    <div>
                        <h3 class="text-sm font-semibold text-black dark:text-white uppercase tracking-wider">{{ __('Producto') }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#features" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Características') }}</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Precios') }}</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Testimonios') }}</a></li>
                        </ul>
                    </div>

                    <!-- Links -->
                    <div>
                        <h3 class="text-sm font-semibold text-black dark:text-white uppercase tracking-wider">{{ __('Soporte') }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Contacto') }}</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Documentación') }}</a></li>
                            <li><a href="#" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200">{{ __('Política de privacidad') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="mt-12 border-t border-gray-100 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        &copy; {{ date('Y') }} {{ __('Reserveo. Todos los derechos reservados.') }}
                    </p>
                    <div class="mt-4 md:mt-0 flex space-x-6">
                        <!-- Social Links -->
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
