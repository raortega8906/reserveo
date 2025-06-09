<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Formulario crear reservas') }}
                </div>

                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.reservations.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="reservation_date" class="block text-gray-700">{{ __('Reservation Date') }}</label>
                            <input type="date" id="reservation_date" name="reservation_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="reservation_time" class="block text-gray-700">{{ __('Reservation Time') }}</label>
                            <input type="time" id="reservation_time" name="reservation_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                        </div>
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700">{{ __('Notes') }}</label>
                            <textarea id="notes" name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            {{ __('Create Reservation') }}
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

                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.reservations.index') }}" class="text-blue-500 hover:underline">
                        {{ __('Go Reservations') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>