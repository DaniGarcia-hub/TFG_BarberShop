@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus-icon lucide-user-round-plus">
                            <path d="M2 21a8 8 0 0 1 13.292-6"/>
                            <circle cx="10" cy="8" r="5"/>
                            <path d="M19 16v6"/>
                            <path d="M22 19h-6"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Editando: {{ $user->name }} (ID:{{ $user->id }})</p>
                </div>
            </div>

            <a href="{{ route('admin.users.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-left-dash-icon lucide-arrow-big-left-dash">
                    <path d="M13 9a1 1 0 0 1-1-1V4.707a.707.707 0 0 0-1.207-.5l-6.94 6.94a1.207 1.207 0 0 0 0 1.707l6.94 6.94a.707.707 0 0 0 1.207-.5V16a1 1 0 0 1 1-1h2a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1z"/>
                    <path d="M20 9v6"/>
                </svg>
                Volver atrás
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-rose-900/40 border-l-4 border-rose-500 rounded-[6px] p-[1rem] mb-[2rem] text-[#E5E5E5] font-poppins text-[0.9rem] shadow-md">
                <p class="font-bold uppercase font-bebas text-[1.1rem] tracking-wider text-rose-300 mb-[0.25rem]">Por favor, corrige los siguientes errores:</p>
                <ul class="list-disc pl-[1.25rem] space-y-[0.1rem]">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.5rem] md:p-[2.5rem] shadow-xl w-full border border-[#413B36]/20">
            
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="font-poppins text-[#413B36]">
                @csrf
                @method('PUT')

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">Datos obligatorios de la cuenta</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[2.5rem]">
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="name" class="font-semibold text-[0.9rem]">Nombre Completo <span class="text-rose-700">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required 
                               class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="email" class="font-semibold text-[0.9rem]">Correo Electrónico <span class="text-rose-700">*</span></label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required 
                               class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="password" class="font-semibold text-[0.9rem]">Contraseña <span class="text-rose-700">*</span></label>
                        <input type="password" name="password" id="password"
                               class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all" placeholder="Mínimo 8 caracteres">
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">Información Adicional (Opcionales)</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-[1.5rem] mb-[2.5rem]">
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="telefono" class="font-medium text-[0.9rem] text-[#413B36]/80">Teléfono <span class="text-[0.8rem] text-stone-500">(Opcional)</span></label>
                        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $user->telefono) }}" 
                               class="bg-[#FAFAFA] border border-[#413B36]/20 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="fecha_nacimiento" class="font-medium text-[0.9rem] text-[#413B36]/80">Fecha de Nacimiento <span class="text-[0.8rem] text-stone-500">(Opcional)</span></label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}" 
                               class="bg-[#FAFAFA] border border-[#413B36]/20 rounded-[6px] px-[0.8rem] py-[0.5rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="role" class="font-semibold text-[0.9rem]">Rol del Usuario <span class="text-rose-700">*</span></label>
                        <select name="role" id="role" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            <option value="cliente" {{ old('role', $user->roles->isEmpty() ? 'cliente' : '') == 'cliente' ? 'selected' : '' }}>Cliente (Predeterminado)</option>
                            <option value="peluquero" {{ old('role', $user->hasRole('peluquero') ? 'peluquero' : '') == 'peluquero' ? 'selected' : '' }}>Peluquero</option>
                            <option value="admin" {{ old('role', $user->hasRole('admin') ? 'admin' : '') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-[0.75rem] bg-[#101111]/5 border border-[#413B36]/10 rounded-[6px] p-[1rem] mb-[3rem]">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="verify_email" id="verify_email" value="1" {{ old('verify_email', $user->email_verified_at ? '1' : '') == '1' ? 'checked' : '' }}
                                class="w-4 height-4 text-[#927860] bg-[#FAFAFA] border-[#413B36]/30 rounded focus:ring-[#927860] cursor-pointer">
                        </div>
                        <div class="font-poppins select-none">
                            <label for="verify_email" class="font-semibold text-[0.95rem] text-[#413B36] cursor-pointer">
                                Cuenta Verificada
                            </label>
                            <p class="text-stone-500 text-[0.8rem] mt-[0.1rem]">
                                Si se activa, el usuario no necesitará confirmar su correo electrónico para acceder a la web.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-[0.4rem] mb-[3rem]">
                    <label for="direccion" class="font-medium text-[0.9rem] text-[#413B36]/80">Dirección Residencial <span class="text-[0.8rem] text-stone-500">(Opcional)</span></label>
                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $user->direccion) }}" placeholder="Calle, Número, Piso, Ciudad"
                           class="w-full bg-[#FAFAFA] border border-[#413B36]/20 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                </div>

                <div class="flex justify-end pt-[1.5rem] border-t border-[#413B36]/10">
                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#927860] hover:text-white py-[0.7rem] px-[2.5rem] rounded-[0.4rem] border border-[#927860] uppercase font-bebas text-[1.3rem] shadow-lg tracking-wider cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        Guardar Usuario
                    </button>
                </div>
            </form>
            @if($user->trashed())
                <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" class="w-full sm:w-auto inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-white bg-emerald-700 hover:bg-emerald-800 py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-emerald-950 uppercase font-bebas text-[1.1rem] shadow-md cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        Activar Cuenta
                    </button>
                </form>
            @else
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="w-full sm:w-auto inline" onsubmit="return confirm('¿Estás seguro de que deseas desactivar esta cuenta de usuario? El usuario no podrá iniciar sesión hasta que sea activada de nuevo.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-white bg-rose-800 hover:bg-rose-900 py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-rose-950 uppercase font-bebas text-[1.1rem] shadow-md cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                        Desactivar Cuenta
                    </button>
                </form>
            @endif
        </div>
    </main>
@endsection