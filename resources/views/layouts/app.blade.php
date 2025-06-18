<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Reserveo') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex font-sans antialiased bg-gray-100">

        <!-- Sidebar Navigation -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <div class="flex flex-col flex-grow bg-white shadow-lg border-r border-gray-200">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0 px-6 py-5 border-b border-gray-200">
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-4 py-4 space-y-1">

                    {{-- Descomentar condicional en prod --}}
                    {{-- @if (Auth::user()->role === 'client') --}}
                        <!-- Client Section -->
                        <div class="mb-6">
                            <div class="flex items-center px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Cliente
                            </div>
                            <div class="space-y-1">
                                <x-sidebar-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ __('Calendario') }}
                                </x-sidebar-nav-link>
                            </div>
                        </div>
                    {{-- @endif --}}

                    @if (Auth::user()->role === 'admin')
                        <!-- Admin Panel Section -->
                        <div class="mb-6">
                            <div class="flex items-center px-3 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Administración
                            </div>
                            <div class="space-y-1">
                                <x-sidebar-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                                    </svg>
                                    {{ __('Dashboard') }}
                                </x-sidebar-nav-link>

                                <x-sidebar-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.index')">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    {{ __('Servicios') }}
                                </x-sidebar-nav-link>

                                <x-sidebar-nav-link :href="route('admin.reservations.index')" :active="request()->routeIs('admin.reservations.index')">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                    </svg>
                                    {{ __('Reservas') }}
                                </x-sidebar-nav-link>
                            </div>
                        </div>
                    @endif

                </nav>

                <!-- User Profile Section -->
                <div class="flex-shrink-0 border-t border-gray-200" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="w-full flex items-center px-4 py-4 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3 flex-1 text-left">
                            <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 transform transition-transform duration-200" :class="{'rotate-180': open}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute bottom-16 left-4 right-4 z-50 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                         style="display: none;">
                        <div class="py-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                {{ __('Perfil') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    {{ __('Cerrar sesión') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-data="{ open: false }" class="lg:hidden">
            <!-- Mobile menu button -->
            <div class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button @click="open = !open" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                <path :class="{'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <x-application-logo class="ml-4 h-8 w-auto fill-current text-gray-800" />
                    </div>
                </div>
            </div>

            <!-- Mobile menu overlay -->
            <div x-show="open" @click="open = false" class="fixed inset-0 z-40 bg-black bg-opacity-25 lg:hidden"></div>

            <!-- Mobile menu sidebar -->
            <div x-show="open" 
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg lg:hidden">
                
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="flex items-center flex-shrink-0 px-6 py-4 border-b border-gray-200">
                        <x-application-logo class="h-8 w-auto fill-current text-gray-800" />
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1 px-4 py-4 space-y-2">
                        <x-sidebar-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                            {{ __('Dashboard') }}
                        </x-sidebar-nav-link>

                        <x-sidebar-nav-link :href="route('calendar')" :active="request()->routeIs('calendar')">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                            </svg>
                            {{ __('Calendario') }}
                        </x-sidebar-nav-link>

                        @if (Auth::user()->role === 'admin')
                            <x-sidebar-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.index')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                {{ __('Servicios') }}
                            </x-sidebar-nav-link>

                            <x-sidebar-nav-link :href="route('admin.reservations.index')" :active="request()->routeIs('admin.reservations.index')">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                                {{ __('Reservas') }}
                            </x-sidebar-nav-link>
                        @endif
                    </nav>

                    <!-- User Profile Section -->
                    <div class="flex-shrink-0 border-t border-gray-200 p-4">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        
                        <div class="space-y-1">
                            <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                {{ __('Perfil') }}
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                    {{ __('Cerrar sesión') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 lg:pl-64">
            <!-- Top bar for mobile -->
            <div class="lg:hidden h-16"></div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')
    </body>
</html>