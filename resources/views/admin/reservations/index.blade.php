<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>

    <div class="px-12 py-5 text-green-400">
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
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Nombre') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Fecha') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Hora') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Notas') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Servicio contratado') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Estado') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Acciones') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($reservations as $reservation)
                            <tr>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_date }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_time }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->notes }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->service->name }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->status }}</td>
                                <td class="flex gap-2 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.reservations.edit', $reservation) }}" class="text-blue-500 hover:underline">{{ __('Editar') }}</a>
                                    <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('{{ __('¿Estás seguro de que deseas eliminar esta reserva?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">{{ __('No se encontraron reservas.') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4 flex justify-between items-center">
                        {{ $reservations->links() }}
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.reservations.create') }}" class="border border-green-500 text-green-500 hover:underline bg-white-200 px-4 py-2 border-1 rounded">
                        {{ __('Crear Reserva') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>