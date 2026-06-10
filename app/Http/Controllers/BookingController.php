<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Haircut;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        $bookingsDesactived = Booking::onlyTrashed()->count();

        return view('admin.bookings.index', compact('bookings', 'bookingsDesactived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = User::all();
        $barbers = User::role('peluquero')->get();
        $haircuts = Haircut::all();
        $schedules = Schedule::all();
        return view('admin.bookings.create', compact('clients', 'barbers', 'haircuts', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $validated = $request->validated();

        Booking::create([
            'note' => $validated['note'] ?? null,
            'state' => $validated['state'],
            'client_id' => $validated['client_id'],
            'barber_id' => $validated['barber_id'],
            'schedule_id' => $validated['schedule_id'],
            'haircut_id' => $validated['haircut_id'],
            'booking_date' => $validated['booking_date'],
            'confirmation_date' => now(), // Al crearla desde el panel de administración, se confirma automáticamente...
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Reserva creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $clients = User::withTrashed()->get();
        $barbers = User::role('peluquero')->withTrashed()->get();
        $haircuts = Haircut::withTrashed()->get();
        $schedules = Schedule::withTrashed()->get();
        return view('admin.bookings.edit', compact('booking', 'clients', 'barbers', 'haircuts', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $validated = $request->validated();

        if ($request->has('confirmed')) { // Si se marca el confirmar la reserva (estaba vacío antes)...
            $confirmationDate = $booking->confirmation_date ?? now(); // Se pone la confirmación que tenía, o bien se pone la fecha actual.
        } else {
            $confirmationDate = null; // Si se desmarca, pues se pone como nula, como no confirmada...
        }

        $booking->confirmation_date = $confirmationDate;

        $booking->update([
            'note' => $validated['note'] ?? null,
            'state' => $validated['state'],
            'client_id' => $validated['client_id'],
            'barber_id' => $validated['barber_id'],
            'schedule_id' => $validated['schedule_id'],
            'haircut_id' => $validated['haircut_id'],
            'booking_date' => $validated['booking_date'],
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Reserva actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Reserva eliminada correctamente.');
    }

    public function restore($id)
    {
        $booking = Booking::withTrashed()->findOrFail($id); // Se busca la reserva que esté desactivada, por una ID.

        $booking->restore(); 

        return redirect()->route('admin.bookings.index')->with('success', 'Reserva activada correctamente.');
    }

    public function desactived()
    {
        $bookings = Booking::onlyTrashed()->get(); // Se recogen las reservas desactivadas (eliminados).
        
        return view('admin.bookings.desactived', compact('bookings'));
    }

    public function getAvailableSlots(Request $request)
    {
        try {
            $barberId = $request->input('barber_id');
            $dayInput = trim($request->input('day_name'));
            $clientId = $request->input('client_id');
            $ignoreBookingId = $request->input('ignore_booking_id'); // se recoge el ID de la reserva actual, y por ende, la que se va a ignorar.

            $queryBookings = Booking::where('barber_id', $barberId) // Se obtienen los horarios donde el barbero esté ocupado.
                ->where('state', '!=', 'cancelado');

            if ($ignoreBookingId) {
                $queryBookings->where('id', '!=', $ignoreBookingId); // Se obtienen las reservas que no sean igual a la que hay que ignorar.
            }

            $ocupiedScheduleIds = $queryBookings->pluck('schedule_id')->toArray(); // Se añade como reserva ocupada.

            $daysMap = [ // Se mapean las fechas, para que el día 1 sea lunes, el 2 martes, etc.
                1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 
                4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
            ];

            if ($barberId && !$dayInput) { // Si ha escogido barbero, pero no ha escogido día...
                if ($clientId && $clientId == $barberId) { // Se comprueba que el cliente no sea igual que el barbero...
                    return response()->json([
                        'type' => 'error', 
                        'message' => 'Un peluquero no puede agendarse una cita a sí mismo.'
                    ], 422);
                }

                $query = Schedule::query(); // Se obtienen todos los horarios.
                if (!empty($ocupiedScheduleIds)) { // Si existen horarios ocupados...
                    $query->whereNotIn('id', $ocupiedScheduleIds); // Se realiza mantiene la búsqueda, pero solo aquellos que no esté ocupado el peluquero...
                }
                $allFreeSchedules = $query->get(); // Aquí es donde se obtiene los datos realmente...
                
                $uniqueDays = $allFreeSchedules->unique('day_of_week')->map(function ($schedule) use ($daysMap) { // Se mapean los días...
                    $dayNum = (int)$schedule->day_of_week; // Se obtiene el número del día del horario que se está revisando...
                    return [ // Se devuelve mapeado, con un array, donde tiene el day_value que es el número (1, 2, etc.) y el day name, que se consigue gracias al array asociativo anterior.
                        'day_value' => $dayNum,
                        'day_name'  => $daysMap[$dayNum] ?? 'Desconocido'
                    ];
                })->values()->toArray();

                return response()->json(['type' => 'days', 'data' => $uniqueDays]); // Se devuelve los valores.
            }

            if ($barberId && $dayInput) { // Si ha escogido peluquero y día...
                $query = Schedule::where('day_of_week', $dayInput); // Se obtienen los horarios donde el día, corresponda con el que el usuario escogió
                
                if (!empty($ocupiedScheduleIds)) { // Si hay horarios ocupados...
                    $query->whereNotIn('id', $ocupiedScheduleIds); // Se realiza la búsqueda, pero sin contar los horarios ocupados...
                }
                
                $availableHours = $query->get(); // Se obtiene los horarios...

                $formattedHours = [];
                foreach ($availableHours as $hour) { // Por cada horario...
                    $formattedHours[] = [ // Se formatea en un array, metiendole:
                        'id'          => $hour->id, // ID del horario..
                        'start_time'  => $hour->start_time, // Hora de inicio
                        'finish_time' => $hour->finish_time, // Hora de fin
                    ];
                }

                return response()->json(['type' => 'hours', 'data' => $formattedHours]); // Se devuelve los datos.
            }

            return response()->json(['error' => 'Parámetros insuficientes'], 400);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCalendarBookings() // Esta función es para generar el calendario.
    {
        $bookings = Booking::with(['client', 'barber', 'schedule'])->get(); // Se obtiene las reservas, junto al cliente, barbero y horario asociado.

        $events = $bookings->map(function ($booking) { // Por cada reserva...
            return [
                'id'    => $booking->id, // Se le pasa el ID
                'title' => $booking->client->name . ' - ' . $booking->barber->name, // Se le pasa un título, que en este caso es el nombre del cliente y el del peluquero.
                'start' => $booking->booking_date . 'T' . $booking->schedule->start_time, // Fecha de inicio, esto marcará en el calendario cuando es.
                'end'   => $booking->booking_date . 'T' . $booking->schedule->finish_time, // Fecha de Fin
                'color' => $booking->state === 'completado' ? '#049632' : ($booking->state === 'cancelado' ? '#a13838' : '#927860'), // Esto le marca al calendario pues como está creado.
            ];
        });

        return response()->json($events);
    }
}
