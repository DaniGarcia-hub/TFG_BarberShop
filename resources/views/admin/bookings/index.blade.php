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
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Reservas Activas</p>
                </div>
                <h1 class="text-[#E5E5E5] text-[2.2rem] md:text-[3rem] font-girassol font-thin uppercase mt-[0.5rem] leading-tight">
                    Listado de Reservas
                </h1>
            </div>

            <div class="flex-1 p-[1.5rem] md:p-[2.5rem] overflow-y-auto bg-[#262929]">
                @include('components.alert')
            </div>
            
            <div class="flex flex-col sm:flex-row gap-[0.75rem] w-full sm:w-auto">
                <a href="{{ route('admin.bookings.create') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                    </svg>
                    Nueva Reserva
                </a>

                @if ($bookingsDesactived > 0)
                <a href="{{ route('admin.bookings.desactived') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="20" height="20">
                        <path fill="rgb(1, 4, 10)" d="M544.1 256L552 256C565.3 256 576 245.3 576 232L576 88C576 78.3 570.2 69.5 561.2 65.8C552.2 62.1 541.9 64.2 535 71L483.3 122.8C439 86.1 382 64 320 64C191 64 84.3 159.4 66.6 283.5C64.1 301 76.2 317.2 93.7 319.7C111.2 322.2 127.4 310 129.9 292.6C143.2 199.5 223.3 128 320 128C364.4 128 405.2 143 437.7 168.3L391 215C384.1 221.9 382.1 232.2 385.8 241.2C389.5 250.2 398.3 256 408 256L544.1 256zM573.5 356.5C576 339 563.8 322.8 546.4 320.3C529 317.8 512.7 330 510.2 347.4C496.9 440.4 416.8 511.9 320.1 511.9C275.7 511.9 234.9 496.9 202.4 471.6L249 425C255.9 418.1 257.9 407.8 254.2 398.8C250.5 389.8 241.7 384 232 384L88 384C74.7 384 64 394.7 64 408L64 552C64 561.7 69.8 570.5 78.8 574.2C87.8 577.9 98.1 575.8 105 569L156.8 517.2C201 553.9 258 576 320 576C449 576 555.7 480.6 573.4 356.5z"/>
                    </svg>
                    Reservas Eliminadas
                </a>
                @endif
            </div>
        </div>

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.25rem] shadow-xl w-full overflow-x-auto scrolling-touch border border-[#413B36]/20 text-[#413B36]">
            @if ($bookings->count() > 0)
            <table id="bookings_table" class="w-full text-left border-collapse min-w-[1200px] font-poppins text-[0.9rem] text-[#413B36]">
                <thead>
                    <tr class="border-b-2 border-[#413B36] text-[#413B36] font-bebas text-[1.2rem] uppercase tracking-wider">
                        <th class="pb-[1rem] px-[0.5rem] w-[5%]">ID</th>
                        <th class="pb-[1rem] w-[14%]">Cliente [ID]</th>
                        <th class="pb-[1rem] w-[14%]">Peluquero [ID]</th>
                        <th class="pb-[1rem] w-[16%]">Tipo Corte</th>
                        <th class="pb-[1rem] w-[18%]">Fecha</th>
                        <th class="pb-[1rem] text-center w-[8%]">Obs.</th>
                        <th class="pb-[1rem] w-[11%]">Estado</th>
                        <th class="pb-[1rem] w-[12%]">Confirmación</th>
                        <th class="pb-[1rem] w-[12%]">Creación</th>
                        <th class="pb-[1rem] text-center w-[10%]">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[rgba(65,59,54,0.15)]">
                    @foreach ($bookings as $booking)
                        <tr class="hover:bg-[rgba(209,199,183,0.25)] transition-colors duration-150">
                            <td class="py-[1rem] px-[0.5rem] font-bold text-[#927860]">
                                #{{ $booking->id }}
                            </td>
                            
                            <td class="py-[1rem] font-medium {{ $booking->client->trashed() ? 'text-rose-700' : 'text-[#413B36]' }}">
                                {{ $booking->client->name }} [{{ $booking->client->id }}]
                            </td>
                            
                            <td class="py-[1rem] font-medium {{ $booking->barber->trashed() ? 'text-rose-700' : 'text-[#413B36]/90' }}">
                                {{ $booking->barber->name }} [{{ $booking->barber->id }}]
                            </td>

                            <td class="py-[1rem] font-medium {{ $booking->haircut->trashed() ? 'text-rose-700' : 'text-[#413B36]' }}">
                                {{ $booking->haircut->name }}
                            </td>

                            <td class="py-[1rem] text-[#413B36]/80 whitespace-nowrap">
                                <span class="font-semibold text-[#927860]">{{ $booking->booking_date }}</span>
                            </td>

                            <td class="py-[1rem] text-center">
                                @if(!empty($booking->note))
                                    <span class="inline-flex items-center justify-center bg-emerald-100 text-emerald-800 p-[0.35rem] rounded-25 cursor-help shadow-sm border border-emerald-200" title="{{ $booking->note }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"/>
                                        </svg>
                                    </span>
                                @else
                                    <span class="inline-flex items-center justify-center bg-rose-100 text-rose-800 p-[0.35rem] rounded-25 shadow-sm border border-rose-200" title="Sin observaciones">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                                        </svg>
                                    </span>
                                @endif
                            </td>

                            <td class="py-[1rem]">
                                @if($booking->state === 'pendiente')
                                    <span class="bg-amber-600/10 text-amber-800 border border-amber-600/20 text-[0.75rem] font-bold px-[0.6rem] py-[0.15rem] rounded-[4px] uppercase tracking-wider font-poppins">
                                        Pendiente
                                    </span>
                                @elseif($booking->state === 'completado')
                                    <span class="bg-emerald-700/10 text-emerald-800 border border-emerald-700/20 text-[0.75rem] font-bold px-[0.6rem] py-[0.15rem] rounded-[4px] uppercase tracking-wider font-poppins">
                                        Completado
                                    </span>
                                @else
                                    <span class="bg-rose-700/10 text-rose-800 border border-rose-700/20 text-[0.75rem] font-bold px-[0.6rem] py-[0.15rem] rounded-[4px] uppercase tracking-wider font-poppins">
                                        Cancelado
                                    </span>
                                @endif
                            </td>
                            
                            <td class="py-[1rem] text-[#413B36]/80 text-[0.85rem] whitespace-nowrap">
                                {{ $booking->confirmation_date ? \Carbon\Carbon::parse($booking->confirmation_date)->format('d/m/Y H:i') : 'N/A' }}
                            </td>

                            <td class="py-[1rem] text-[#413B36]/80 text-[0.85rem] whitespace-nowrap">
                                {{ $booking->created_at->format('d/m/Y H:i') }}
                            </td>
                            
                            <td class="py-[1rem] text-center">
                                <div class="flex items-center justify-center gap-[0.5rem]">
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="bg-[#049632] hover:bg-[#037a29] text-[#E5E5E5] p-[0.4rem] rounded transition-colors duration-150" title="Ver Detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="16" height="16">
                                            <path fill="rgb(255, 255, 255)" d="M320 96C239.2 96 174.5 132.8 127.4 176.6C80.6 220.1 49.3 272 34.4 307.7C31.1 315.6 31.1 324.4 34.4 332.3C49.3 368 80.6 420 127.4 463.4C174.5 507.1 239.2 544 320 544C400.8 544 465.5 507.2 512.6 463.4C559.4 419.9 590.7 368 605.6 332.3C608.9 324.4 608.9 315.6 605.6 307.7C590.7 272 559.4 220 512.6 176.6C465.5 132.9 400.8 96 320 96zM176 320C176 240.5 240.5 176 320 176C399.5 176 464 240.5 464 320C464 399.5 399.5 464 320 464C240.5 464 176 399.5 176 320zM320 256C320 291.3 291.3 320 256 320C244.5 320 233.7 317 224.3 311.6C223.3 322.5 224.2 333.7 227.2 344.8C240.9 396 293.6 426.4 344.8 412.7C396 399 426.4 346.3 412.7 295.1C400.5 249.4 357.2 220.3 311.6 224.3C316.9 233.6 320 244.4 320 256z"/>
                                        </svg>
                                    </a>
                                    
                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="bg-[#413B36] hover:bg-[#927860] text-[#E5E5E5] p-[0.4rem] rounded transition-colors duration-150" title="Editar Reserva">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-700 hover:bg-rose-800 text-white p-[0.4rem] rounded transition-colors duration-150 cursor-pointer" title="Archivar Reserva">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/>
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
                <h2 class="py-[2rem] text-center font-medium text-[#413B36]/50 italic">
                    No se encontraron reservas registradas en el sistema.
                </h2>
            @endif
        </div>
    </main>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#bookings_table').DataTable({
            order: [[8, 'asc']],
        });
    });
</script>
@endsection