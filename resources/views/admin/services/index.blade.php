<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Servicios') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('Success:') }}</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ __('Error:') }}</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.services.create') }}" class="bg-[#151e27] text-white px-4 py-2 rounded">
                        {{ __('Crear Servicio') }}
                    </a>
                </div>
                
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('ID de Servicio') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Nombre del Servicio') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Descripción') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Duración (minutos)') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($services as $service)
                            <tr>
                                <td class="py-4 whitespace-nowrap">{{ $service->id }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $service->name }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $service->description }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $service->duration_service }}</td>
                                <td class="flex gap-2 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('{{ __('¿Estás seguro de que deseas eliminar este servicio?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">{{ __('No se encontraron servicios.') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 flex justify-between items-center">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>