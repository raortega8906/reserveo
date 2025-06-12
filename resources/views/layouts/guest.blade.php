<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Script para prevenir parpadeo al cargar el tema -->
    <script>
        // Inmediatamente verifica y aplica el tema antes de que la página se renderice
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="font-sans text-gray-900 antialiased h-full bg-gray-50">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4">
            <a href="/" class="flex justify-center mb-6">
                <div class="text-2xl font-bold text-black dark:text-white">Reserveo</div>
            </a>
        
        </div>
        
        {{ $slot }}
    </div>
</body>
</html>
