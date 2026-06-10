@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                            <path fill="rgb(209, 199, 183)" d="M144 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm0 64a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm224 0a96 96 0 1 1 0-192 96 96 0 1 1 0 192zm0-64a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM152 249.4L256 353.4l104-104c14-14 36.6-14 50.6 0s14 36.6 0 50.6L306.6 404l104 104c14 14 14 36.6 0 50.6s-36.6 14-50.6 0L256 454.6 152 558.6c-14 14-36.6 14-50.6 0s-14-36.6 0-50.6l104-104L101.4 300c-14-14-14-36.6 0-50.6s36.6-14 50.6 0z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Nuevo Servicio</p>
                </div>
            </div>

            <a href="{{ route('admin.haircuts.index') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
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
            
            <form method="POST" action="{{ route('admin.haircuts.store') }}" enctype="multipart/form-data" class="font-poppins text-[#413B36]">
                @csrf

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Información del Corte
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[1.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="name" class="font-semibold text-[0.9rem]">Nombre<span class="text-rose-700">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ej: Degradado Mullet, Corte Tradicional..." required 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="price" class="font-semibold text-[0.9rem]">Precio (€) <span class="text-rose-700">*</span></label>
                        <input type="number" name="price" id="price" step="0.01" min="0" value="{{ old('price') }}" placeholder="Ej: 14.50" required 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="duration" class="font-semibold text-[0.9rem]">Duración (Minutos) <span class="text-rose-700">*</span></label>
                        <input type="number" name="duration" id="duration" min="1" value="{{ old('duration') }}" placeholder="Ej: 30" required 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="description" class="font-semibold text-[0.9rem]">Descripción</label>
                        <textarea name="description" id="description" rows="4" placeholder="Describe los detalles del servicio, técnicas utilizadas o si incluye lavado..." 
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all resize-none">{{ old('description') }}</textarea>
                    </div>

                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Disponibilidad
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
                                Servicio Disponible
                            </label>
                            <p class="text-stone-500 text-[0.8rem] mt-[0.1rem]">
                                Si está marcado, los clientes podrán seleccionar este tipo de corte al solicitar una reserva.
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
                        Guardar Servicio
                    </button>
                </div>

            </form>
        </div>
    </main>
@endsection