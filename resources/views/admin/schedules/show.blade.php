@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Detalles del Horario</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-[0.75rem] w-full sm:w-auto">
                <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#EBE6E1] py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.1rem] shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                    Editar Horario
                </a>
                
                <a href="{{ url()->previous() }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#E5E5E5] bg-[#413B36] hover:bg-[#101111] py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-[#413B36] uppercase no-underline font-bebas text-[1.1rem] shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Volver
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-[2rem] items-start w-full">
            
            <div class="bg-[#EBE6E1] rounded-[8px] p-[2rem] shadow-xl border border-[#413B36]/20 flex flex-col items-center text-center">
                <div class="w-[5.5rem] h-[5.5rem] bg-[#413B36] text-[#D1C7B7] flex items-center justify-center rounded-full border-2 border-[#927860] font-girassol text-[2.5rem] uppercase select-none shadow-inner mb-[1rem]">
                    {{ $schedule->day_of_week }}
                </div>
                
                <h2 class="text-[#413B36] font-bebas text-[1.8rem] uppercase tracking-wide leading-tight">
                    {{ $schedule->day_name }} </h2>
                <p class="text-[#413B36]/60 font-poppins text-[0.8rem] mb-[1.5rem]">
                    ID: #{{ $schedule->id }}
                </p>

                <div class="w-full pt-[1rem] border-t border-[#413B36]/10 flex flex-col items-center">
                    <p class="text-stone-500 font-poppins text-[0.75rem] uppercase tracking-wider font-semibold mb-[0.3rem]">Estado</p>
                    
                    @if($schedule->trashed())
                        <span class="inline-block bg-rose-800 text-white text-[0.85rem] font-semibold px-[1rem] py-[0.25rem] rounded-[4px] uppercase tracking-wider font-poppins shadow-sm">
                            Desactivado
                        </span>
                    @else
                        <span class="inline-block bg-emerald-800 text-white text-[0.85rem] font-semibold px-[1rem] py-[0.25rem] rounded-[4px] uppercase tracking-wider font-poppins shadow-sm">
                            Activo
                        </span>
                    @endif
                </div>
            </div>

            <div class="bg-[#EBE6E1] rounded-[8px] p-[1.5rem] md:p-[2.5rem] shadow-xl lg:col-span-2 border border-[#413B36]/20 text-[#413B36] font-poppins">
                
                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Distribución del Tiempo
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem] mb-[2.5rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Hora de  Inicio</p>
                        <p class="text-[#413B36] text-[1.2rem] font-bold mt-[0.1rem]">
                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} hs
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Hora de Fin</p>
                        <p class="text-[#413B36] text-[1.2rem] font-bold mt-[0.1rem]">
                            {{ \Carbon\Carbon::parse($schedule->finish_time)->format('H:i') }} hs
                        </p>
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Tipo de Horario
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem] mb-[2.5rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Tramo del Turno</p>
                        <div class="flex items-center gap-[0.4rem] mt-[0.15rem]">
                            @if($schedule->shift_type === 'mañana')
                                <span class="flex items-center gap-[0.3rem] bg-amber-700/10 text-amber-800 text-[0.75rem] font-bold px-[0.6rem] py-[0.15rem] rounded-full uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="M4.93 4.93l1.41 1.41"/><path d="M17.66 17.66l1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="M6.34 17.66l-1.41 1.41"/><path d="M19.07 4.93l-1.41 1.41"/>
                                    </svg>
                                    Mañana
                                </span>
                            @else
                                <span class="flex items-center gap-[0.3rem] bg-indigo-900/10 text-indigo-900 text-[0.75rem] font-bold px-[0.6rem] py-[0.15rem] rounded-full uppercase">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/>
                                    </svg>
                                    Tarde
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Información del Sistema
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Fecha de Creación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $schedule->created_at->format('d/m/Y H:i:\h\s') }} 
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Última Modificación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $schedule->updated_at->format('d/m/Y H:i:\h\s') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection