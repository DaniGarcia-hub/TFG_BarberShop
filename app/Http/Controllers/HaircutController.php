<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHaircutRequest;
use App\Http\Requests\UpdateHaircutRequest;
use App\Models\Haircut;

class HaircutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $haircuts = Haircut::all();
        $haircutsDesactived = Haircut::onlyTrashed()->count();

        return view('admin.haircuts.index', compact('haircuts', 'haircutsDesactived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.haircuts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHaircutRequest $request)
    {
        $validated = $request->validated();

        $haircut = Haircut::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'duration' => $validated['duration'],
        ]);

        if (!$request->has('active')){ // Si no se ha marcado como corte activo... 
            $haircut->delete(); // Se desactiva...
        }

        return redirect()->route('admin.haircuts.index')->with('success', 'Corte creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Haircut $haircut)
    {
        return view('admin.haircuts.show', compact('haircut'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Haircut $haircut)
    {
        return view('admin.haircuts.edit', compact('haircut'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHaircutRequest $request, Haircut $haircut)
    {
        $validated = $request->validated();

        $haircut->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'duration' => $validated['duration'],
        ]);

        if (!$request->has('active')){ // Si no se ha marcado como corte activo... 
            $haircut->delete(); // Se desactiva...
        } else {
            $haircut->restore(); // Sino, se vuelve a activar.
        }

        return redirect()->route('admin.haircuts.index')->with('success', 'Corte actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Haircut $haircut)
    {
        $haircut->delete();

        return redirect()->route('admin.haircuts.index')->with('success', 'Corte desactivado correctamente.');
    }

    public function restore($id)
    {
        $haircut = Haircut::withTrashed()->findOrFail($id); // Se busca el corte que esté desactivado, por una ID.

        $haircut->restore(); 

        return redirect()->route('admin.haircuts.index')->with('success', 'Corte activado correctamente.');
    }

    public function desactived()
    {
        $haircuts = Haircut::onlyTrashed()->get(); // Se recogen los cortes desactivados (eliminados).
        
        return view('admin.haircuts.desactived', compact('haircuts'));
    }
}
