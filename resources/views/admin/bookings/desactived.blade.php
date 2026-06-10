@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-rose-400">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-rose-300 px-[0.25rem]">Reservas Eliminadas</p>
                </div>
            </div>

            <a href="{{ route('admin.bookings.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#E5E5E5] bg-[#413B36] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#413B36] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#101111] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                </svg>
                Ver Reservas Activas
            </a>
        </div>

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.25rem] shadow-xl w-full overflow-x-auto scrolling-touch border border-[#413B36]/20 text-[#413B36]">
            @if ($bookings->count() > 0)
            <table id="bookings_deleted_table" class="w-full text-left border-collapse min-w-[1100px] font-poppins text-[0.9rem] text-[#413B36]">
                <thead>
                    <tr class="border-b-2 border-[#413B36] text-[#413B36] font-bebas text-[1.2rem] uppercase tracking-wider">
                        <th class="pb-[1rem] px-[0.5rem] w-[5%]">ID</th>
                        <th class="pb-[1rem] w-[15%]">Cliente [ID]</th>
                        <th class="pb-[1rem] w-[15%]">Peluquero [ID]</th>
                        <th class="pb-[1rem] w-[20%]">Horario [ID]</th>
                        <th class="pb-[1rem] w-[15%]">Observación</th>
                        <th class="pb-[1rem] w-[15%]">F. Eliminación</th>
                        <th class="pb-[1rem] text-center w-[15%]">Restaurar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[rgba(65,59,54,0.15)]">
                    @foreach ($bookings as $booking)
                        <tr class="hover:bg-[rgba(209,199,183,0.25)] transition-colors duration-150">
                            <td class="py-[1rem] px-[0.5rem] font-bold text-[#927860]">
                                #{{ $booking->id }}
                            </td>
                            
                            <td class="py-[1rem] font-medium text-[#413B36]">
                                {{ $booking->client->name }} [{{ $booking->client->id }}]
                            </td>
                            
                            <td class="py-[1rem] text-[#413B36]/90 font-medium">
                                {{ $booking->barber->name }} [{{ $booking->barber->id }}]
                            </td>
                            <td class="py-[1rem] text-[#413B36]/80 whitespace-nowrap">
                                <span class="font-semibold text-[#927860]">{{ $booking->schedule->day_name }}</span> 
                                <span class="text-[0.85rem]">
                                    ({{ \Carbon\Carbon::parse($booking->schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->schedule->finish_time)->format('H:i') }})
                                    [{{ $booking->schedule->id }}]
                                </span>
                            </td>

                            <td class="py-[1rem] text-[#413B36]/70 max-w-[180px] truncate" title="{{ $booking->note }}">
                                {{ $booking->note ?? 'Sin observaciones.' }}
                            </td>
                            
                            <td class="py-[1rem] text-rose-700 font-medium whitespace-nowrap">
                                {{ $booking->deleted_at->format('d/m/Y H:i') }}
                            </td>
                            
                            <td class="py-[1rem] text-center">
                                <div class="flex items-center justify-center gap-[0.5rem]">
                                    <form action="{{ route('admin.bookings.restore', $booking->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Deseas restaurar esta reserva para que vuelva a estar activa en el sistema?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white p-[0.4rem] rounded transition-colors duration-150 cursor-pointer" title="Restaurar Reserva">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h2>No se encontraron reservas eliminadas.</h2>
            @endif

        </div>
    </main>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#bookings_deleted_table').DataTable();
    } );
</script>
@endsection