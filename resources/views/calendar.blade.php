<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendario') }}
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
                    <a href="{{ route('reservations.create') }}" class="bg-[#151e27] text-white px-4 py-2 rounded">
                        {{ __('Crear Evento') }}
                    </a>
                </div>
                <div class="p-6 text-gray-900">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/main.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // crear modal
                const modal = document.createElement('div');
                modal.id = 'event-modal';
                modal.style.display = 'none';
                modal.classList.add('fixed', 'inset-0', 'bg-gray-500', 'bg-opacity-75', 'flex', 'items-center', 'justify-center', 'z-50');
                const modalContent = document.createElement('div');
                modalContent.classList.add('bg-white', 'p-12', 'rounded', 'max-w-[400px]', 'w-full', 'shadow-lg', 'justify-center', 'text-center');
                modalContent.innerHTML = `
                    <h2 class="text-lg font-semibold mb-4">Detalles del Evento</h2>
                    <p id="event-details"></p>
                    <button id="close-modal" class="mt-4 px-4 py-2 bg-[#151e27] text-white rounded">Cerrar</button>
                `;
                modal.appendChild(modalContent);
                document.body.appendChild(modal);
                const closeModalButton = document.getElementById('close-modal');
                closeModalButton.addEventListener('click', function() {
                    modal.style.display = 'none';
                });
                modal.style.display = 'none';

                // inicializar calendario
                console.log(@json($events));
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '09:00',
                    slotMaxTime: '22:00',
                    hiddenDays: [0],
                    events: @json($events),
                    editable: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    eventClick: function(info) {
                        modal.style.display = 'flex';
                        const eventDetails = document.getElementById('event-details');
                        eventDetails.innerHTML = `
                            <strong>${info.event.title}</strong><br />
                            <strong>Fecha:</strong> ${info.event.start.toLocaleDateString()}<br />
                            <strong>Inicio:</strong> ${info.event.start.toLocaleTimeString()}<br />
                            <strong>Fin:</strong> ${info.event.end.toLocaleTimeString()}<br />
                            <strong>Notas:</strong> ${info.event.extendedProps.notes}
                        `;
                    },
                    locale: 'es'
                });
                calendar.render();
            });
        </script>
    @endpush

</x-app-layout>
