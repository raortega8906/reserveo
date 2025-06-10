<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservas') }}
        </h2>
    </x-slot>

    <div class="px-12 py-5 text-green-400">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __('Success!') }}</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ __('Error!') }}</strong>
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
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Reservation ID') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Date') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Time') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Notes') }}</th>
                                <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($reservations as $reservation)
                            <tr>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->id }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_date }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->formatted_time }}</td>
                                <td class="py-4 whitespace-nowrap">{{ $reservation->notes }}</td>
                                <td class="flex gap-2 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.reservations.edit', $reservation) }}" class="text-blue-500 hover:underline">{{ __('Edit') }}</a>
                                    <form action="{{ route('admin.reservations.destroy', $reservation) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this reservation?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No reservations found.</td>
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
                        {{ __('Create Reservation') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>