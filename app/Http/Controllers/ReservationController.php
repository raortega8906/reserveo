<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Mail\AdminEmailConfirmation;
use App\Mail\EmailConfirmation;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(Service $service)
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.reservations.index', compact('reservations', 'service'));
    }

    public function create(Service $service)
    {
        return view('admin.reservations.create', compact('service'));
    }

    public function store(StoreReservationRequest $request, Service $service)
    {
        $reservations = Reservation::all();

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['service_id'] = $service->name; // Prueba de servicio, se puede cambiar según sea necesario
        $validated['status'] = 'pending';

        $user = auth()->user()->name;
        $email = auth()->user()->email;
        $reservation_date = $validated['reservation_date'] . ' ' . $validated['reservation_time'];


        foreach ($reservations as $reservation)
        {
            if ($reservation->reservation_date?->format('Y-m-d') === $validated['reservation_date'])
            {
                if ($reservation->reservation_time?->format('H:i') === $validated['reservation_time'])
                {
                    return redirect()->route('admin.reservations.index')->with('error', 'La reserva no se ha podido realizar');
                }
            }
        }
        
        Reservation::create($validated);

        Mail::to('raortega8906@gmail.com')->send(new AdminEmailConfirmation($user, $email, $reservation_date));
        Mail::to($email)->send(new EmailConfirmation($user, $email, $reservation_date));

        return redirect()->route('admin.reservations.index', compact('service'))->with('success', 'Reserva creada correctamente');
    }

    public function edit(Reservation $reservation, Service $service)
    {
        return view('admin.reservations.edit', compact('reservation', 'service'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation, Service $service)
    {

        $validated = $request->validated();

        $reservation->update($validated);

        return redirect()->route('admin.reservations.index', compact('reservation'))->with('success', 'Reserva actualizada correctamente');

    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index', compact('service'))->with('error', 'Reserva eliminada satisfactoriamente');
    }

    public function calendar()
    {
        $reservations = Reservation::all();
        $events = [];

        foreach ($reservations as $reservation) {
            $events[] = [
                'title' => 'Reserva: ' . $reservation->user->name,
                // 'email' => $reservation->user->email,
                // 'color' => '#FF5733', // Color personalizado para las reservas
                // 'textColor' => '#FFFFFF', // Color del texto
                // 'borderColor' => '#FF5733', // Color del borde
                // 'backgroundColor' => '#FF5733', // Color de fondo
                'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                'notes' => $reservation->notes,
            ];
        }

        return view('calendar', compact('events'));
    }
}
