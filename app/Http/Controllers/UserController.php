<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $cuentasDesactivadas = User::onlyTrashed()->count();

        return view('admin.users.index', compact('users', 'cuentasDesactivadas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $emailVerified = isset($validated['verify_email']) && $validated['verify_email'] == '1' ? now() : null;

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'telefono' => $validated['telefono'],
            'direccion' => $validated['direccion'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'email_verified_at' => $emailVerified,
        ]);

        if ($validated['role'] !== 'cliente') {
            $user->assignRole($validated['role']);
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->has('verify_email')){ // Si la petición contiene el check.
            if (is_null($user->email_verified_at)){ // Si actualmente no está validado el correo...
                $user->email_verified_at = now(); // Se valida, poniendole la fecha actual...
            }
        } else { // Significa que no ha marcado la casilla... 
            $user->email_verified_at = null; // Y por ende, se le quita la validación del correo..
        }

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'telefono' => $validated['telefono'],
            'direccion' => $validated['direccion'],
            'fecha_nacimiento' => $validated['fecha_nacimiento'],
            'email_verified_at' => $user->email_verified_at,
        ]);

        if (!empty($validated['password'])) { // Si ha enviado una contraseña y está correctamente validada...
            $user->update([ // Se actualiza la contraseña del usuario.
                'password' => Hash::make($validated['password'])
            ]);
        }

        if ($validated['role'] === 'cliente') { // Si el rol es cliente...
            $user->syncRoles([]); // Se le quita los roles al usuario.
        } else { // Si es diferente de cliente...
            $user->syncRoles([$validated['role']]); // Se le quitan los roles actuales, y se le pone el rol que ha puesto en el formulario...
        }

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario desactivado correctamente.');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id); // Se busca el usuario que esté desactivado, por una ID.

        $user->restore(); 

        return redirect()->route('admin.users.index')->with('success', 'Cuenta activada correctamente.');
    }

    public function desactived()
    {
        $users = User::onlyTrashed()->get(); // Se recogen los usuarios desactivados (eliminados).
        
        return view('admin.users.desactived', compact('users'));
    }
}
