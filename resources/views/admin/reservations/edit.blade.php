<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar reservas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('admin.reservations.index') }}" class="bg-[#2c3e50] text-white px-4 py-2 rounded">
                        {{ __('Volver a las Reservas') }}
                    </a>
                </div>

                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}">
                        @csrf
                        @method('PUT')  
                        <div class="mb-4">
                            <label for="reservation_date" class="block text-gray-700">{{ __('Fecha de Reserva') }}</label>
                            <input type="date" id="reservation_date" name="reservation_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $reservation->reservation_date }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="reservation_time" class="block text-gray-700">{{ __('Hora de Reserva') }}</label>
                            <input type="time" id="reservation_time" name="reservation_time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="{{ $reservation->reservation_time }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700">{{ __('Notas') }}</label>
                            <textarea id="notes" name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ $reservation->notes }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="service_id" class="block text-gray-700">{{ __('Servicio Contratado') }}</label>
                            <select id="service_id" name="service_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                <option value="" disabled>{{ __('Seleccione un servicio') }}</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ $reservation->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="bg-[#151e27] text-white px-4 py-2 rounded">
                            {{ __('Editar Reserva') }}
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