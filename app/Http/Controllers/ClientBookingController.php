<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Haircut;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreClientBookingRequest;
use App\Http\Requests\UpdateClientBookingRequest;
use Carbon\Carbon;

class ClientBookingController extends Controller
{
    public function create()
    {
        $barbers = User::role('peluquero')->get();
        $haircuts = Haircut::all();
        $schedules = Schedule::all();
        return view('userBookings.create', compact('barbers', 'haircuts', 'schedules'));
    }

    public function store(StoreClientBookingRequest $request)
    {
        $validated = $request->validated();

        $dayOfBookingDate = Carbon::parse($request->booking_date)->dayOfWeekIso; // Se coge la fecha escogida, y se obtiene el número de la semana que es. (lunes 1), etc.
        $scheduleMain = Schedule::find($request->schedule_id); // Se obtiene el horario escogido.

        if ($scheduleMain && $dayOfBookingDate != $scheduleMain->day_of_week){
            return back()->withErrors(['schedule_id' => 'La fecha seleccionada no se corresponde con el día de la semana de ese horario.'])->withInput();
        }

        $ocupado = Booking::where('barber_id', $request->barber_id) // Comprobamos si la fecha escogida en dicho horario, está ocupado por un peluquero.
            ->where('booking_date', $request->booking_date)
            ->where('schedule_id', $request->schedule_id)
            ->whereIn('state', ['pendiente'])
            ->exists();

        if ($ocupado) { // Si estuviese ocupado, mandamos el error al usuario nuevamente...
            return back()->withErrors(['schedule_id' => 'El barbero ya tiene una cita reservada en esa fecha y hora.'])->withInput();
        }

        $validated['client_id'] = auth()->id(); // Se le añade el cliente con el que está autenticado.
        $validated['state'] = 'pendiente'; // Se pone como pendiente, aunque la BD ya lo pone.
        Booking::create($validated);

        return redirect()->route('dashboard')->with('success', 'Reserva creada correctamente.');
    }

    public function show(Booking $booking)
    {
        if ($booking->client_id != auth()->id()){ // esto es para validar que el usuario que entra en esta vista, que sea una reserva de él mismo, y no de otro usuario.
            abort(404);
        }

        return view('userBookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        if ($booking->client_id != auth()->id()){ // esto es para validar que el usuario que entra en esta vista, que sea una reserva de él mismo, y no de otro usuario.
            abort(404);
        }

        $client = Auth::id();
        $barbers = User::role('peluquero')->get();
        $haircuts = Haircut::all();
        $schedules = Schedule::all();
        return view('userBookings.edit', compact('booking', 'client', 'barbers', 'haircuts', 'schedules'));
    }

    public function update(UpdateClientBookingRequest $request, Booking $booking)
    {
        $validated = $request->validated();

        // 1. Si marcó el checkbox de cancelar que pusimos antes, cancelamos y fuera líos
        if ($request->has('cancel_booking')) {
            $booking->update(['state' => 'cancelado']);
            return redirect()->route('dashboard')->with('success', 'Cita cancelada.');
        }

        $dayOfBookingDate = Carbon::parse($request->booking_date)->dayOfWeekIso; // Se coge la fecha escogida, y se obtiene el número de la semana que es. (lunes 1), etc.
        $scheduleMain = Schedule::find($request->schedule_id); // Se obtiene el horario escogido.

        if ($scheduleMain && $dayOfBookingDate != $scheduleMain->day_of_week){
            return back()->withErrors(['schedule_id' => 'La fecha seleccionada no se corresponde con el día de la semana de ese horario.'])->withInput();
        }

        $ocupado = Booking::where('barber_id', $request->barber_id) // Comprobamos si la fecha escogida en dicho horario, está ocupado por un peluquero.
            ->where('booking_date', $request->booking_date)
            ->where('schedule_id', $request->schedule_id)
            ->where('id', '!=', $booking->id)
            ->whereIn('state', ['pendiente'])
            ->exists();

        if ($ocupado) { // Si estuviese ocupado, mandamos el error al usuario nuevamente...
            return back()->withErrors(['schedule_id' => 'El barbero ya tiene una cita reservada en esa fecha y hora.'])->withInput();
        }

        $booking->update($validated);

        return redirect()->route('dashboard')->with('success', 'Reserva modificada correctamente.');
    }

    public function getCalendarBookings()
    {
        $bookings = Booking::with(['barber', 'schedule'])
            ->where('client_id', Auth::id())
            ->get();

        $events = $bookings->map(function ($booking) {
            return [
                'id'    => $booking->id,
                'title' => '- ' . $booking->barber->name,
                'start' => $booking->booking_date . 'T' . $booking->schedule->start_time,
                'end'   => $booking->booking_date . 'T' . $booking->schedule->finish_time,
                'color' => $booking->state === 'completado' ? '#049632' : ($booking->state === 'cancelado' ? '#a13838' : '#927860'),
            ];
        });

        return response()->json($events);
    }

    public function getAvailableSlots(\Illuminate\Http\Request $request)
    {
        $schedules = Schedule::where('day_of_week', $request->input('day_name'))->get();

        return response()->json([
            'data' => $schedules
        ]);
    }
}
