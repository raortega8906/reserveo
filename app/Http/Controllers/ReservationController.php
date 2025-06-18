<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Mail\AdminEmailConfirmation;
use App\Mail\EmailConfirmation;
use App\Models\Reservation;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        $services = Service::all();

        $reservations = Reservation::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.reservations.index', compact('reservations', 'services'));
    }

    public function create()
    {
        $services = Service::all();

        return view('admin.reservations.create', compact('services'));
    }

    public function store(StoreReservationRequest $request)
    {
        $reservations = Reservation::all();

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['service_id'] = $request->service_id;

        $user = auth()->user()->name;
        $email = auth()->user()->email;
        $reservation_date = $validated['reservation_date'] . ' ' . $validated['reservation_time'];


        foreach ($reservations as $reservation)
        {
            if ($reservation->reservation_date?->format('Y-m-d') === $validated['reservation_date'] && $reservation->status != 'cancelled')
            {
                if ($reservation->reservation_time?->format('H:i') === $validated['reservation_time'])
                {
                    return redirect()->route('admin.reservations.index')->with('error', 'La reserva no se ha podido realizar, el turno ya está ocupado');
                }
            }
        }
        
        Reservation::create($validated);

        Mail::to('raortega8906@gmail.com')->send(new AdminEmailConfirmation($user, $email, $reservation_date));
        Mail::to($email)->send(new EmailConfirmation($user, $email, $reservation_date));

        return redirect()->route('admin.reservations.index')->with('success', 'Reserva creada correctamente');
    }

    public function edit(Reservation $reservation)
    {
        $services = Service::all();

        return view('admin.reservations.edit', compact('reservation', 'services'));
    }

    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {

        $validated = $request->validated();
        $validated['service_id'] = $request->service_id;

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

        $events = [];
        $carbon_date = Carbon::now();
        $time = $carbon_date->format('H:i');
        $date = $carbon_date->format('Y-m-d');

        if (auth()->user()->role === 'admin')
        {
            $reservations = Reservation::orderBy('reservation_date', 'asc')->get();
        } 
        else {
            $reservations = Reservation::where('user_id', auth()->id())
                ->orderBy('reservation_date', 'asc')
                ->get();

            $reservations_not_admin = Reservation::where('user_id', '!=', auth()->id())
                ->orderBy('reservation_date', 'asc')
                ->get();

            foreach ($reservations_not_admin as $reservation) {

                if($date <= $reservation->reservation_date?->format('Y-m-d') && $time <= $reservation->reservation_time?->format('H:i')) {
                    if ($reservation->status == 'cancelled'){
                        continue;
                    }
                    
                    $events[] = [
                        'title' => 'Reserva ocupada',
                        'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                        'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                        'notes' => $reservation->notes,
                        'color' => '#FF5733',
                        'textColor' => '#FFFFFF',
                        'borderColor' => '#FF5733',
                        'backgroundColor' => '#FF5733',
                    ];
                }
                else{
                    continue;
                }

            }
        }

        foreach ($reservations as $reservation) {

            if($date <= $reservation->reservation_date?->format('Y-m-d') && $time <= $reservation->reservation_time?->format('H:i')) {

                if ($reservation->status == 'confirmed') {
                    $events[] = [
                        'title' => 'Reserva: ' . $reservation->user->name,
                        'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                        'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                        'notes' => $reservation->notes,
                        'color' => 'green',
                        'textColor' => '#FFFFFF', 
                        'borderColor' => 'green', 
                        'backgroundColor' => 'green',
                    ];
                } 
                elseif ($reservation->status == 'pending') {
                    $events[] = [
                        'title' => 'Reserva: ' . $reservation->user->name,
                        'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                        'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                        'notes' => $reservation->notes,
                        'color' => 'yellow',
                        'textColor' => '#000', 
                        'borderColor' => 'yellow', 
                        'backgroundColor' => 'yellow',
                    ];
                } 
                else{
                    $events[] = [
                        'title' => 'Reserva: ' . $reservation->user->name,
                        'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                        'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                        'notes' => $reservation->notes,
                        'color' => 'red',
                        'textColor' => '#FFFFFF', 
                        'borderColor' => 'red', 
                        'backgroundColor' => 'red',
                    ];
                }
                
            }
            else{
                $events[] = [
                    'title' => 'Reserva: ' . $reservation->user->name,
                    'start' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->format('H:i'),
                    'end' => $reservation->reservation_date?->format('Y-m-d') . ' ' . $reservation->reservation_time?->addMinutes(60)->format('H:i'),
                    'notes' => 'Reserva finalizada',
                    'color' => '#FF5733',
                    'textColor' => '#FFFFFF',
                    'borderColor' => '#FF5733',
                    'backgroundColor' => '#FF5733',
                ];
            }

        }
        
        return view('calendar', compact('events'));
    }

    public function allReservations ()
    {
        $all_reservations = Reservation::orderBy('created_at', 'desc')->paginate(10);

        $count = Reservation::count();

        return view('dashboard', compact('all_reservations', 'count'));
    }

    public function createClient()
    {
        $services = Service::all();

        return view('create-reservation', compact('services'));
    }

    public function storeClient(StoreReservationRequest $request)
    {
        $reservations = Reservation::all();

        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated['service_id'] = $request->input('service_id');
        $validated['status'] = 'confirmed';

        $user = auth()->user()->name;
        $email = auth()->user()->email;
        $reservation_date = $validated['reservation_date'] . ' ' . $validated['reservation_time'];


        foreach ($reservations as $reservation)
        {
            if ($reservation->reservation_date?->format('Y-m-d') === $validated['reservation_date'] && $reservation->status != 'cancelled')
            {
                if ($reservation->reservation_time?->format('H:i') === $validated['reservation_time'])
                {
                    return redirect()->route('calendar')->with('error', 'La reserva no se ha podido realizar, el turno ya está ocupado');
                }
            }
        }
        
        Reservation::create($validated);

        Mail::to('raortega8906@gmail.com')->send(new AdminEmailConfirmation($user, $email, $reservation_date));
        Mail::to($email)->send(new EmailConfirmation($user, $email, $reservation_date));

        return redirect()->route('calendar')->with('success', 'La reserva se ha creado correctamente');
    }

}
