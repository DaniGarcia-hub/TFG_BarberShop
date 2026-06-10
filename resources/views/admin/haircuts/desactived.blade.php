@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-rose-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                            <path fill="rgb(248, 113, 113)" d="M144 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm0 64a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm224 0a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm0-64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM152 249.4L256 353.4l104-104c14-14 36.6-14 50.6 0s14 36.6 0 50.6L306.6 404l104 104c14 14 14 36.6 0 50.6s-36.6 14-50.6 0L256 454.6 152 558.6c-14 14-36.6 14-50.6 0s-14-36.6 0-50.6l104-104L101.4 300c-14-14-14-36.6 0-50.6s36.6-14 50.6 0z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-rose-300 px-[0.25rem]">Cortes Desactivados</p>
                </div>
            </div>

            <a href="{{ route('admin.haircuts.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#E5E5E5] bg-[#413B36] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#413B36] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#101111] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                </svg>
                Ver Cortes Activos
            </a>
        </div>

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.25rem] shadow-xl w-full overflow-x-auto scrolling-touch border border-[#413B36]/20 text-[#413B36]">
            @if ($haircuts->count() > 0)
            <table id="haircuts_deleted_table" class="w-full text-left border-collapse min-w-[1000px] font-poppins text-[0.9rem] text-[#413B36]">
                <thead>
                    <tr class="border-b-2 border-[#413B36] text-[#413B36] font-bebas text-[1.2rem] uppercase tracking-wider">
                        <th class="pb-[1rem] px-[0.5rem] w-[8%]">ID</th>
                        <th class="pb-[1rem] w-[22%]">Nombre</th>
                        <th class="pb-[1rem] w-[35%]">Descripción</th>
                        <th class="pb-[1rem] w-[15%]">Precio</th>
                        <th class="pb-[1rem] w-[10%]">Duración</th>
                        <th class="pb-[1rem] text-center w-[15%]">Restaurar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[rgba(65,59,54,0.15)]">
                    @foreach ($haircuts as $haircut)
                        <tr class="hover:bg-[rgba(209,199,183,0.25)] transition-colors duration-150">
                            <td class="py-[1rem] px-[0.5rem] font-bold text-[#927860]">
                                #{{ $haircut->id }}
                            </td>
                            
                            <td class="py-[1rem] font-medium text-[#413B36]">
                                {{ $haircut->name }}
                            </td>
                            
                            <td class="py-[1rem] text-[#413B36]/80 max-w-[300px] truncate" title="{{ $haircut->description }}">
                                {{ $haircut->description ?? 'Sin descripción.' }}
                            </td>

                            <td class="py-[1rem] text-[#413B36] font-semibold whitespace-nowrap">
                                {{ number_format($haircut->price, 2, ',', '.') }} €
                            </td>

                            <td class="py-[1rem] text-[#413B36]/80 whitespace-nowrap">
                                {{ $haircut->duration }} min
                            </td>
                            
                            <td class="py-[1rem] text-center">
                                <div class="flex items-center justify-center gap-[0.5rem]">
                                    <form action="{{ route('admin.haircuts.restore', $haircut->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Deseas restaurar este corte?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white p-[0.4rem] rounded transition-colors duration-150 cursor-pointer" title="Restaurar Servicio">
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
                <h2>No se encontraron cortes de pelo desactivados.</h2>
            @endif

        </div>
    </main>
@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#haircuts_deleted_table').DataTable();
    });
</script>
@endsection