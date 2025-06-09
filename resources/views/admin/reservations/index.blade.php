<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No reservations found.</td>
                        </tr>
                    @endforelse
                </div>
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.reservations.create') }}" class="text-blue-500 hover:underline">
                        {{ __('Create Reservation') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>