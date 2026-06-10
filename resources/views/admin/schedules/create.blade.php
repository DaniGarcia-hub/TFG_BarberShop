@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18">
                            <!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                            <path fill="rgb(209, 199, 183)" d="M256 72C322.3 72 376 125.7 376 192C376 258.3 322.3 312 256 312C189.7 312 136 258.3 136 192C136 125.7 189.7 72 256 72zM226.3 368L285.7 368C289.6 368 293.6 368.1 297.5 368.4C281.3 396.6 272 429.2 272 464C272 505.8 285.4 544.5 308 576L77.7 576C61.3 576 48 562.7 48 546.3C48 447.8 127.8 368 226.3 368zM320 464C320 384.5 384.5 320 464 320C543.5 320 608 384.5 608 464C608 543.5 543.5 608 464 608C384.5 608 320 543.5 320 464zM464 384C455.2 384 448 391.2 448 400L448 464C448 472.8 455.2 480 464 480L512 480C520.8 480 528 472.8 528 464C528 455.2 520.8 448 512 448L480 448L480 400C480 391.2 472.8 384 464 384z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Nuevo Horario</p>
                </div>
            </div>

            <a href="{{ route('admin.schedules.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
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
            
            <form method="POST" action="{{ route('admin.schedules.store') }}" class="font-poppins text-[#413B36]">
                @csrf

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Configuración del Tramo Horario
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[2.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="day_of_week" class="font-semibold text-[0.9rem]">Día de la Semana <span class="text-rose-700">*</span></label>
                        <select name="day_of_week" id="day_of_week" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            <option value="1" {{ old('day_of_week') == '1' ? 'selected' : '' }}>Lunes</option>
                            <option value="2" {{ old('day_of_week') == '2' ? 'selected' : '' }}>Martes</option>
                            <option value="3" {{ old('day_of_week') == '3' ? 'selected' : '' }}>Miércoles</option>
                            <option value="4" {{ old('day_of_week') == '4' ? 'selected' : '' }}>Jueves</option>
                            <option value="5" {{ old('day_of_week') == '5' ? 'selected' : '' }}>Viernes</option>
                            <option value="6" {{ old('day_of_week') == '6' ? 'selected' : '' }}>Sábado</option>
                            <option value="7" {{ old('day_of_week') == '7' ? 'selected' : '' }}>Domingo</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="shift_type" class="font-semibold text-[0.9rem]">Tipo de Turno <span class="text-rose-700">*</span></label>
                        <select name="shift_type" id="shift_type" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            <option value="mañana" {{ old('shift_type') == 'mañana' ? 'selected' : '' }}>Mañana</option>
                            <option value="tarde" {{ old('shift_type') == 'tarde' ? 'selected' : '' }}>Tarde</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="start_time" class="font-semibold text-[0.9rem]">Hora de Inicio <span class="text-rose-700">*</span></label>
                        <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}" required 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="finish_time" class="font-semibold text-[0.9rem]">Hora de Fin <span class="text-rose-700">*</span></label>
                        <input type="time" name="finish_time" id="finish_time" value="{{ old('finish_time') }}" required 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Disponibilidad y Estado
                </h3>

                <div class="grid grid-cols-1 gap-[1.5rem] mb-[2.5rem]">
                    <div class="flex items-center gap-[0.75rem] bg-[#101111]/5 border border-[#413B36]/10 rounded-[6px] p-[1rem] w-full md:w-max">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="active" id="active" value="1" 
                                {{ old('active', '1') == '1' ? 'checked' : '' }}
                                class="w-4 h-4 text-[#927860] bg-[#FAFAFA] border-[#413B36]/30 rounded focus:ring-[#927860] cursor-pointer">
                        </div>
                        <div class="font-poppins select-none">
                            <label for="active" class="font-semibold text-[0.95rem] text-[#413B36] cursor-pointer">
                                Horario Activado
                            </label>
                            <p class="text-stone-500 text-[0.8rem] mt-[0.1rem]">
                                Si está activado, este bloque de horas estará disponible inmediatamente para asignarse en las reservas operativas.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-[1.5rem] border-t border-[#413B36]/10">
                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#927860] hover:text-white py-[0.7rem] px-[2.5rem] rounded-[0.4rem] border border-[#927860] uppercase font-bebas text-[1.3rem] shadow-lg tracking-wider cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        Guardar Horario
                    </button>
                </div>

            </form>
        </div>
    </main>
@endsection