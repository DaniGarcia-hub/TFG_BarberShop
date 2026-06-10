@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="18" height="18">
                            <path fill="rgb(209, 199, 183)" d="M416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64zM438 225.7C427.3 217.9 412.3 220.3 404.5 231L285.1 395.2L233 343.1C223.6 333.7 208.4 333.7 199.1 343.1C189.8 352.5 189.7 367.7 199.1 377L271.1 449C276.1 454 283 456.5 289.9 456C296.8 455.5 303.3 451.9 307.4 446.2L443.3 259.2C451.1 248.5 448.7 233.5 438 225.7z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Detalles de la Reserva</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-[0.75rem] w-full sm:w-auto">
                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#EBE6E1] py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.1rem] shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                    Editar Reserva
                </a>
                
                <a href="{{ route('admin.bookings.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#E5E5E5] bg-[#413B36] hover:bg-[#101111] py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-[#413B36] uppercase no-underline font-bebas text-[1.1rem] shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                    </svg>
                    Volver
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-[2rem] items-start w-full">
            
            <div class="bg-[#EBE6E1] rounded-[8px] p-[2rem] shadow-xl border border-[#413B36]/20 flex flex-col items-center text-center">
                <div class="w-[5.5rem] h-[5.5rem] bg-[#413B36] text-[#D1C7B7] flex items-center justify-center rounded-full border-2 border-[#927860] font-girassol text-[2rem] uppercase select-none shadow-inner mb-[1rem]">
                    Nº{{ $booking->id }}
                </div>
                
                <h2 class="text-[#413B36] font-bebas text-[1.6rem] uppercase tracking-wide leading-tight">
                    Reserva Solicitada
                </h2>
                <p class="text-[#413B36]/60 font-poppins text-[0.8rem] mb-[1.5rem]">
                    Por: {{ $booking->client->name }}
                </p>

                <div class="w-full pt-[1rem] border-t border-[#413B36]/10 flex flex-col items-center">
                    <p class="text-stone-500 font-poppins text-[0.75rem] uppercase tracking-wider font-semibold mb-[0.4rem]">Estado de la Reserva</p>
                    
                    @if($booking->state === 'pendiente')
                        <span class="inline-block bg-amber-600 text-white text-[0.85rem] font-semibold px-[1.25rem] py-[0.25rem] rounded-[4px] uppercase tracking-wider font-poppins shadow-sm">
                            Pendiente
                        </span>
                    @elseif($booking->state === 'completado')
                        <span class="inline-block bg-emerald-800 text-white text-[0.85rem] font-semibold px-[1rem] py-[0.25rem] rounded-[4px] uppercase tracking-wider font-poppins shadow-sm">
                            Completado
                        </span>
                    @else
                        <span class="inline-block bg-rose-800 text-white text-[0.85rem] font-semibold px-[1rem] py-[0.25rem] rounded-[4px] uppercase tracking-wider font-poppins shadow-sm">
                            Cancelado
                        </span>
                    @endif
                </div>
            </div>

            <div class="bg-[#EBE6E1] rounded-[8px] p-[1.5rem] md:p-[2.5rem] shadow-xl lg:col-span-2 border border-[#413B36]/20 text-[#413B36] font-poppins">
                
                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Identificadores
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem] mb-[2.5rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Cliente</p>
                        <a href="{{ route('admin.users.show', $booking->client->id) }}" class="text-[#413B36] text-[1rem] font-medium mt-[0.1rem]">
                            {{ $booking->client->name }} <span class="text-stone-400 text-[0.85rem] font-normal">[ID: {{ $booking->client_id }}]</span>
                        </a>
                        @if($booking->client && $booking->client->trashed())
                            <span class="text-[1rem] text-rose-700 ml-[0.25rem]" title="Este cliente ha sido dado de baja">¡Dado de baja!</span>
                        @endif
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Peluquero Asignado</p>
                        <a href="{{ route('admin.users.show', $booking->barber->id) }}" class="text-[#413B36] text-[1rem] font-medium mt-[0.1rem]">
                            {{ $booking->barber->name }} <span class="text-stone-400 text-[0.85rem] font-normal">[ID: {{ $booking->barber_id }}]</span>
                        </a>
                        @if($booking->barber && $booking->barber->trashed())
                            <span class="text-[1rem] text-rose-700 ml-[0.25rem]" title="Este cliente ha sido dado de baja">¡Dado de baja!</span>
                        @endif
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Detalles Reserva
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem] mb-[2.5rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Fecha</p>
                        <p class="text-[#413B36] text-[1rem] font-medium mt-[0.1rem]">
                            {{ $booking->booking_date }} 
                        </p>
                    </div>

                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Horario Asignado</p>
                        <a href="{{ route('admin.schedules.show', $booking->schedule->id) }}" class="text-[#413B36] text-[1rem] font-bold mt-[0.1rem]">
                            {{ $booking->schedule->day_name }} 
                            <span class="font-normal text-[0.9rem] text-stone-600">
                                ({{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->schedule->finish_time)->format('H:i') }})
                            </span>
                            <span class="text-stone-400 text-[0.85rem] font-normal">[ID: {{ $booking->schedule->id }}]</span>
                        </a>
                        @if($booking->schedule && $booking->schedule->trashed())
                            <span class="text-[1rem] text-rose-700 ml-[0.25rem]" title="Este cliente ha sido dado de baja">¡Horario eliminado!</span>
                        @endif
                    </div>

                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Tipo Turno</p>
                        <div class="flex items-center gap-[0.4rem] mt-[0.15rem]">
                            @if($booking->schedule->shift_type === 'mañana')
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

                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Tipo Corte</p>
                        <a href="{{ route('admin.haircuts.show', $booking->haircut->id) }}" class="text-[#413B36] text-[1rem] font-medium mt-[0.1rem]">
                            {{ $booking->haircut->name }} <span class="text-stone-400 text-[0.85rem] font-normal">[ID: {{ $booking->haircut->id }}]</span>
                        </a>
                        @if($booking->haircut && $booking->haircut->trashed())
                            <span class="text-[1rem] text-rose-700 ml-[0.25rem]" title="Este cliente ha sido dado de baja">¡Corte eliminado!</span>
                        @endif
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Observaciones
                </h3>
                
                <div class="mb-[2.5rem]">
                    <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold mb-[0.3rem]">La reserva dice:</p>
                    <div class="bg-[#FAFAFA] border border-[#413B36]/15 rounded-[6px] p-[1rem] text-[#413B36] text-[0.95rem] italic leading-relaxed shadow-inner">
                        "{{ $booking->note ?? 'Sin anotaciones.' }}"
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Información del Sistema
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-[1.5rem] gap-y-[1.25rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Fecha de Solicitud</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $booking->created_at->format('d/m/Y H:i:\h\s') }} 
                        </p>
                    </div>

                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Última Modificación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $booking->updated_at->format('d/m/Y H:i:\h\s') }}
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Fecha de Confirmación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            @if($booking->confirmation_date)
                                <span class="text-emerald-800 font-semibold">{{ \Carbon\Carbon::parse($booking->confirmation_date)->format('d/m/Y H:i:\h\s') }}</span>
                            @else
                                <span class="text-stone-400 italic">Sin Confirmar</span>
                            @endif
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection