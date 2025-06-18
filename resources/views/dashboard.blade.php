<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ( Auth::user()->role === 'admin' )
                    <div class="p-6 text-gray-900">

                        @if ($all_reservations->count() === 0)
                            <h3 class="mt-2 mb-6 text-black-500">{{ __("No hay reservas registradas.") }}</h3>
                        @else
                            <h3 class="mt-2 mb-6 text-black-500">{{ __("Total de reservas: :count", ['count' => $all_reservations->count()]) }}</h3>
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Usuario") }}</th>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Fecha") }}</th>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Hora") }}</th>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Notas") }}</th>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Servicio") }}</th>
                                        <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __("Estado") }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_reservations as $reservation)
                                        <tr>
                                            <td class="py-4 whitespace-nowrap">{{ $reservation->user->name }}</td>
                                            <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_date }}</td>
                                            <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_time }}</td>
                                            <td class="py-4 whitespace-nowrap">{{ $reservation->notes }}</td>
                                            <td class="py-4 whitespace-nowrap">{{ $reservation->service->name }}</td>
                                            @if ($reservation->status === 'pending')
                                                <td class="py-4 whitespace-nowrap text-yellow-500">{{ $reservation->status }}</td>
                                            @elseif ($reservation->status === 'cancelled')
                                                <td class="py-4 whitespace-nowrap text-red-500">{{ $reservation->status }}</td>
                                            @else
                                                <td class="py-4 whitespace-nowrap text-green-500">{{ $reservation->status }}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-4 d-flex justify-content-between align-items-center flex-row">
                                {{ $all_reservations->links('custom-pagination') }}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">{{ __("Panel de Usuario") }}</h3>
                        <p>{{ __("Aquí puedes ver tus reservas y gestionar tu perfil.") }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
