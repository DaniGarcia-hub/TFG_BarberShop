@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                            <path fill="rgb(209, 199, 183)" d="M144 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm0 64a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm224 0a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm0-64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM152 249.4L256 353.4l104-104c14-14 36.6-14 50.6 0s14 36.6 0 50.6L306.6 404l104 104c14 14 14 36.6 0 50.6s-36.6 14-50.6 0L256 454.6 152 558.6c-14 14-36.6 14-50.6 0s-14-36.6 0-50.6l104-104L101.4 300c-14-14-14-36.6 0-50.6s36.6-14 50.6 0z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Detalles del Servicio</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-[0.75rem] w-full sm:w-auto">
                <a href="{{ route('admin.haircuts.edit', $haircut->id) }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#EBE6E1] py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.1rem] shadow-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                    </svg>
                    Editar Corte
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
                <div class="w-[5.5rem] h-[5.5rem] bg-[#413B36] text-[#D1C7B7] flex items-center justify-center rounded-full border-2 border-[#927860] font-girassol text-[2.2rem] uppercase select-none shadow-inner mb-[1rem]">
                    H{{ $haircut->id }}
                </div>
                
                <h2 class="text-[#413B36] font-bebas text-[1.6rem] uppercase tracking-wide leading-tight">
                    {{ $haircut->name }}
                </h2>
                <p class="text-[#413B36]/60 font-poppins text-[0.8rem] mb-[1.5rem]">
                    ID: {{ $haircut->id }}
                </p>

                <div class="w-full pt-[1rem] border-t border-[#413B36]/10 flex flex-col items-center">
                    <p class="text-stone-500 font-poppins text-[0.75rem] uppercase tracking-wider font-semibold mb-[0.3rem]">Estado</p>
                    
                    @if($haircut->trashed())
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
                    Datos del Servicio
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem] mb-[2.5rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Precio</p>
                        <p class="text-[#413B36] text-[1.5rem] font-bold mt-[0.1rem]">
                            {{ number_format($haircut->price, 2, ',', '.') }} €
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Tiempo Estimado</p>
                        <p class="text-[#413B36] text-[1.5rem] font-bold mt-[0.1rem]">
                            {{ $haircut->duration }} <span class="text-[1rem] font-normal text-stone-500">minutos</span>
                        </p>
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Datos adicionales
                </h3>
                
                <div class="mb-[2.5rem]">
                    <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold mb-[0.4rem]">Descripción</p>
                    <div class="bg-[#FAFAFA] border border-[#413B36]/15 rounded-[6px] p-[1.25rem] text-[#413B36] text-[0.95rem] leading-relaxed shadow-inner">
                        {{ $haircut->description ?? 'Sin descripción.' }}
                    </div>
                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.25rem]">
                    Información del Sistema
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-[2rem] gap-y-[1.25rem]">
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Fecha de Creación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $haircut->created_at->format('d/m/Y H:i:\h\s') }} 
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-stone-500 text-[0.75rem] uppercase tracking-wide font-semibold">Última Modificación</p>
                        <p class="text-[#413B36] text-[0.9rem] font-medium mt-[0.1rem]">
                            {{ $haircut->updated_at->format('d/m/Y H:i:\h\s') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection