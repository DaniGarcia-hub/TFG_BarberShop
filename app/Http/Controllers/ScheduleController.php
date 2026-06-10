<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::all();
        $schedulesDesactived = Schedule::onlyTrashed()->count();

        return view('admin.schedules.index', compact('schedules', 'schedulesDesactived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        $validated = $request->validated(); // Se validan los datos...

        $schedule = Schedule::create([ // Se crea el horario...
            'day_of_week' => $validated['day_of_week'],
            'shift_type' => $validated['shift_type'],
            'start_time' => $validated['start_time'],
            'finish_time' => $validated['finish_time'],
        ]);

        if (!$request->has('active')){ // Si no se ha marcado como horario activo... 
            $schedule->delete(); // Se desactiva...
        }

        return redirect()->route('admin.schedules.index')->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $validated = $request->validated();

        $schedule->update([ // Se actualiza el horario...
            'day_of_week' => $validated['day_of_week'],
            'shift_type' => $validated['shift_type'],
            'start_time' => $validated['start_time'],
            'finish_time' => $validated['finish_time'],
        ]);

        if (!$request->has('active')){ // Si no se ha marcado como horario activo... 
            $schedule->delete(); // Se desactiva...
        } else {
            $schedule->restore(); // Sino, se vuelve a activar.
        }
        return redirect()->route('admin.schedules.index')->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Horario desactivado correctamente.');
    }

    public function restore($id)
    {
        $schedule = Schedule::withTrashed()->findOrFail($id); // Se busca el horario que esté desactivado, por una ID.

        $schedule->restore(); 

        return redirect()->route('admin.schedules.index')->with('success', 'Horario activado correctamente.');
    }

    public function desactived()
    {
        $schedules = Schedule::onlyTrashed()->get(); // Se recogen los horarios desactivados (eliminados).
        
        return view('admin.schedules.desactived', compact('schedules'));
    }
}
