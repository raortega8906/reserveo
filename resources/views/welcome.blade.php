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
    <body class="bg-white text-black flex min-h-screen flex-col">
        <!-- Navigation -->
        <header class="w-full border-b border-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-black">
                            Reserveo
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    @if (Route::has('login'))
                        <nav class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium text-black hover:text-gray-700">
                                    {{ __('Dashboard') }}
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-black hover:text-gray-700">
                                    {{ __('Iniciar sesión') }}
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md bg-black px-4 py-2 text-sm font-medium text-white hover:bg-gray-800">
                                        {{ __('Registrar') }}
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </div>
        </header>

        <!-- Hero Section (Fondo Blanco) -->
        <section class="relative bg-white py-16 sm:py-24">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="text-center lg:text-left">
                        <h1 class="text-4xl sm:text-5xl font-bold text-black mb-6">
                            {{ __('Simplifica las reservas de tu negocio') }}
                        </h1>
                        <p class="text-lg text-gray-700 mb-8 max-w-lg mx-auto lg:mx-0">
                            {{ __('Reserveo te ofrece un sistema elegante y fácil de usar para gestionar reservas, clientes y disponibilidad en tiempo real.') }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                            <a href="{{ route('register') }}" class="rounded-md bg-black px-6 py-3 text-base font-medium text-white hover:bg-gray-800">
                                {{ __('Comenzar ahora') }}
                            </a>
                            <a href="#features" class="rounded-md border border-gray-300 px-6 py-3 text-base font-medium text-black hover:bg-gray-50">
                                {{ __('Conocer más') }}
                            </a>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div class="relative w-full max-w-lg aspect-video rounded-lg overflow-hidden shadow-lg bg-gray-100">
                            <img src="{{ asset('assets/images/image.webp') }}" alt="Reserveo Dashboard" class="w-full h-full object-cover" />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section (Fondo Negro) -->
        <section id="features" class="py-16 bg-black text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-white mb-4">{{ __('Características principales') }}</h2>
                    <p class="text-gray-300 max-w-2xl mx-auto">
                        {{ __('Diseñado para hacer que la gestión de reservas sea simple y eficiente para cualquier tipo de negocio.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-gray-900 p-6 rounded-lg shadow-sm border border-gray-800">
                        <div class="w-12 h-12 bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">{{ __('Gestión de calendario') }}</h3>
                        <p class="text-gray-300">
                            {{ __('Visualiza y administra todas tus reservas en un calendario intuitivo y fácil de usar.') }}
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-gray-900 p-6 rounded-lg shadow-sm border border-gray-800">
                        <div class="w-12 h-12 bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">{{ __('Gestión de clientes') }}</h3>
                        <p class="text-gray-300">
                            {{ __('Mantén un registro organizado de tus clientes y su historial de reservas.') }}
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-gray-900 p-6 rounded-lg shadow-sm border border-gray-800">
                        <div class="w-12 h-12 bg-white rounded-md flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">{{ __('Notificaciones') }}</h3>
                        <p class="text-gray-300">
                            {{ __('Envía recordatorios automáticos a tus clientes para reducir las ausencias.') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section (Fondo Blanco) -->
        <section class="py-16 bg-white border-t border-gray-100">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-black mb-6">
                        {{ __('¿Listo para simplificar tus reservas?') }}
                    </h2>
                    <p class="text-gray-600 mb-8">
                        {{ __('Únete a los negocios que ya confían en Reserveo para gestionar sus reservas de forma eficiente.') }}
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="rounded-md bg-black px-6 py-3 text-base font-medium text-white hover:bg-gray-800">
                            {{ __('Crear cuenta gratis') }}
                        </a>
                        <a href="{{ route('login') }}" class="rounded-md border border-gray-300 px-6 py-3 text-base font-medium text-black hover:bg-gray-50">
                            {{ __('Iniciar sesión') }}
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer (Fondo Blanco) -->
        <footer class="bg-white border-t border-gray-100 py-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Logo and Description -->
                    <div class="col-span-1 md:col-span-2">
                        <a href="{{ url('/') }}" class="text-2xl font-bold text-black">
                            Reserveo
                        </a>
                        <p class="mt-4 text-gray-600 max-w-md">
                            {{ __('Sistema de reservas simple y elegante para tu negocio. Gestiona tus citas, clientes y disponibilidad en un solo lugar.') }}
                        </p>
                    </div>

                    <!-- Links -->
                    <div>
                        <h3 class="text-sm font-semibold text-black uppercase tracking-wider">{{ __('Soporte') }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="mailto:raortega8906@gmail.com" class="text-gray-600 hover:text-gray-900">{{ __('Contacto') }}</a></li>
                            <li><a href="https://github.com/raortega8906/reserveo" class="text-gray-600 hover:text-gray-900">{{ __('Documentación') }}</a></li>
                        </ul>
                    </div>

                    <!-- Links -->
                    <div>
                        <h3 class="text-sm font-semibold text-black uppercase tracking-wider">{{ __('Producto') }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#features" class="text-gray-600 hover:text-gray-900">{{ __('Características') }}</a></li>
                            {{-- <li><a href="#" class="text-gray-600 hover:text-gray-900">{{ __('Precios') }}</a></li> --}}
                        </ul>
                    </div>

                </div>

                <div class="mt-12 border-t border-gray-100 pt-8 flex flex-col md:flex-row justify-between items-center">
                    <p class="text-sm text-gray-500">
                        &copy; {{ date('Y') }} {{ __('Reserveo. Desarrollado por ') }}<a href="https://portfolio.wpcache.es" target="_blank" class="font-medium text-gray-900">{{ __('Rafael A. Ortega') }}</a>
                    </p>
                    <div class="mt-4 md:mt-0 flex space-x-6">
                        <!-- Social Links -->
                        <a href="https://github.com/raortega8906" class="text-gray-500 hover:text-gray-900">
                            <span class="sr-only">GitHub</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/in/rafael-a-ortega/" class="text-gray-500 hover:text-gray-900">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452z" />
                            </svg>
                        </a>
                        <a href="mailto:raortega8906@gmail.com" class="text-gray-500 hover:text-gray-900">
                            <span class="sr-only">Gmail</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
