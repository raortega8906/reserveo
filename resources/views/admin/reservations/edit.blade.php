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
                            <input type="date" id="reservation_date" name="reservation_date" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" 
                                value="{{ old('reservation_date') ?? $reservation->reservation_date?->format('Y-m-d') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="reservation_time" class="block text-gray-700">{{ __('Hora de Reserva') }}</label>
                            @php
                                $currentTime = old('reservation_time') ?? $reservation->reservation_time?->format('H:i');
                            @endphp
                            
                            <select id="reservation_time" name="reservation_time" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                <option value="09:00" {{ $currentTime === '09:00' ? 'selected' : '' }}>{{ __('09:00') }}</option>
                                <option value="09:30" {{ $currentTime === '09:30' ? 'selected' : '' }}>{{ __('09:30') }}</option>
                                <option value="10:00" {{ $currentTime === '10:00' ? 'selected' : '' }}>{{ __('10:00') }}</option>
                                <option value="10:30" {{ $currentTime === '10:30' ? 'selected' : '' }}>{{ __('10:30') }}</option>
                                <option value="11:00" {{ $currentTime === '11:00' ? 'selected' : '' }}>{{ __('11:00') }}</option>
                                <option value="11:30" {{ $currentTime === '11:30' ? 'selected' : '' }}>{{ __('11:30') }}</option>
                                <option value="12:00" {{ $currentTime === '12:00' ? 'selected' : '' }}>{{ __('12:00') }}</option>
                                <option value="12:30" {{ $currentTime === '12:30' ? 'selected' : '' }}>{{ __('12:30') }}</option>
                                <option value="13:00" {{ $currentTime === '13:00' ? 'selected' : '' }}>{{ __('13:00') }}</option>
                                <option value="13:30" {{ $currentTime === '13:30' ? 'selected' : '' }}>{{ __('13:30') }}</option>
                                <option value="15:00" {{ $currentTime === '15:00' ? 'selected' : '' }}>{{ __('15:00') }}</option>
                                <option value="15:30" {{ $currentTime === '15:30' ? 'selected' : '' }}>{{ __('15:30') }}</option>
                                <option value="16:00" {{ $currentTime === '16:00' ? 'selected' : '' }}>{{ __('16:00') }}</option>
                                <option value="16:30" {{ $currentTime === '16:30' ? 'selected' : '' }}>{{ __('16:30') }}</option>
                                <option value="17:00" {{ $currentTime === '17:00' ? 'selected' : '' }}>{{ __('17:00') }}</option>
                                <option value="17:30" {{ $currentTime === '17:30' ? 'selected' : '' }}>{{ __('17:30') }}</option>
                                <option value="18:00" {{ $currentTime === '18:00' ? 'selected' : '' }}>{{ __('18:00') }}</option>
                                <option value="18:30" {{ $currentTime === '18:30' ? 'selected' : '' }}>{{ __('18:30') }}</option>
                                <option value="19:00" {{ $currentTime === '19:00' ? 'selected' : '' }}>{{ __('19:00') }}</option>
                                <option value="19:30" {{ $currentTime === '19:30' ? 'selected' : '' }}>{{ __('19:30') }}</option>
                                <option value="20:00" {{ $currentTime === '20:00' ? 'selected' : '' }}>{{ __('20:00') }}</option>
                                <option value="20:30" {{ $currentTime === '20:30' ? 'selected' : '' }}>{{ __('20:30') }}</option>
                                <option value="21:00" {{ $currentTime === '21:00' ? 'selected' : '' }}>{{ __('21:00') }}</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700">{{ __('Notas') }}</label>
                            <textarea id="notes" name="notes" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ $reservation->notes }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">{{ __('Estado') }}</label>
                            <select id="status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" required>
                                <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>{{ __('Confirmado') }}</option>
                                <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>{{ __('Pendiente') }}</option>
                                <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>{{ __('Cancelado') }}</option>
                            </select>
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
                            {{ __('Actualizar Reserva') }}
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