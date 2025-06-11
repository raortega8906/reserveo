<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(StoreReservationRequest $request)
    {
        $reservations = Reservation::all();

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

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

        return redirect()->route('admin.reservations.index')->with('success', 'Reserva creada correctamente');
    }

    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {

        $validated = $request->validated();

        $reservation->update($validated);

        return redirect()->route('admin.reservations.index', compact('reservation'))->with('success', 'Reserva actualizada correctamente');

    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('error', 'Reserva eliminada satisfactoriamente');
    }

    public function calendar()
    {
        $reservations = Reservation::all();
        $events = [];

        foreach ($reservations as $reservation) {
            $events[] = [
                'title' => 'reserva',
                'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(30)->format('H:i'),
            ];
        }

        return view('calendar', compact('events'));
    }
}
