<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar servicios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.services.index') }}" class="bg-[#2c3e50] text-white px-4 py-2 rounded">
                        {{ __('Volver a los Servicios') }}
                    </a>
                </div>

                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.services.update', $service) }}">
                        @csrf
                        @method('PUT')  
                        
                        <!-- Nombre y Duración en la misma fila -->
                        <div class="flex gap-4 mb-4">
                            <div class="flex-1">
                                <label for="name" class="block text-gray-700">{{ __('Nombre del Servicio') }}</label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $service->name }}" required>
                            </div>
                            <div class="flex-1">
                                <label for="duration_service" class="block text-gray-700">{{ __('Duración (minutos)') }}</label>
                                <select id="duration_service" name="duration_service" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                    <option value="15" {{ $service->duration_service == 15 ? 'selected' : '' }}>{{ __('15 minutos') }}</option>
                                    <option value="30" {{ $service->duration_service == 30 ? 'selected' : '' }}>{{ __('30 minutos') }}</option>
                                    <option value="45" {{ $service->duration_service == 45 ? 'selected' : '' }}>{{ __('45 minutos') }}</option>
                                    <option value="60" {{ $service->duration_service == 60 ? 'selected' : '' }}>{{ __('60 minutos') }}</option>
                                    <option value="90" {{ $service->duration_service == 90 ? 'selected' : '' }}>{{ __('90 minutos') }}</option>
                                    <option value="120" {{ $service->duration_service == 120 ? 'selected' : '' }}>{{ __('120 minutos') }}</option>
                                </select>
                            </div>
                        </div>

                        <!-- Descripción sola en una fila completa -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __('Descripción') }}</label>
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>{{ $service->description }}</textarea>
                        </div>

                        <button type="submit" class="bg-[#151e27] text-white px-4 py-2 rounded">
                            {{ __('Actualizar Servicio') }}
                        </button>
                    </form>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>