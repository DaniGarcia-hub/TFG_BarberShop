@if (session('success') || session('error') || session('warning') || $errors->any())
    @php
        // 1. Detectamos qué tipo de notificación viene en la sesión de Laravel
        $type = 'success';
        $message = '';
        
        if (session('success')) {
            $type = 'success';
            $message = session('success');
        } elseif (session('error') || $errors->any()) {
            $type = 'error';
            // Si son errores de validación, ponemos un mensaje genérico (los detalles ya los pinta el Form Request)
            $message = session('error') ?? 'Se han detectado errores en el formulario. Por favor, revísalo.';
        } elseif (session('warning')) {
            $type = 'warning';
            $message = session('warning');
        }

        // 2. Mapeamos los colores de la paleta Barber Shop según el tipo de alerta
        $styles = [
            'success' => [
                'bg' => 'bg-[#927860]/20', // Tu bronce corporativo con opacidad
                'border' => 'border-[#927860]',
                'text' => 'text-[#E5E5E5]',
                'title' => '¡OPERACIÓN EXITOSA!',
                'icon' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>'
            ],
            'error' => [
                'bg' => 'bg-rose-950/40', // Fondo rojizo oscuro premium
                'border' => 'border-rose-600',
                'text' => 'text-[#E5E5E5]',
                'title' => '¡HA OCURRIDO UN ERROR!',
                'icon' => '<circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>'
            ],
            'warning' => [
                'bg' => 'bg-amber-950/30', // Fondo ámbar oscuro
                'border' => 'border-amber-500',
                'text' => 'text-[#E5E5E5]',
                'title' => 'ADVERTENCIA DEL SISTEMA',
                'icon' => '<path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/>'
            ]
        ][$type];
    @endphp

    <div x-data="{ open: true }" 
         x-show="open"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="{{ $styles['bg'] }} border-l-4 {{ $styles['border'] }} rounded-[6px] p-[1rem] mb-[2rem] flex items-start justify-between gap-[1rem] shadow-lg max-w-full backdrop-blur-sm animate-fade-in">
        
        <div class="flex gap-[0.8rem]">
            <figure class="shrink-0 mt-[0.15rem] {{ $type === 'success' ? 'text-[#D1C7B7]' : ($type === 'error' ? 'text-rose-400' : 'text-amber-400') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    {!! $styles['icon'] !!}
                </svg>
            </figure>
            
            <div class="font-poppins">
                <p class="font-bebas text-[1.1rem] tracking-wider uppercase leading-none {{ $type === 'success' ? 'text-[#D1C7B7]' : ($type === 'error' ? 'text-rose-300' : 'text-amber-300') }}">
                    {{ $styles['title'] }}
                </p>
                <p class="{{ $styles['text'] }} text-[0.85rem] mt-[0.2rem] font-medium opacity-90 leading-relaxed">
                    {{ $message }}
                </p>
            </div>
        </div>

        <button @click="open = false" class="text-[#E5E5E5]/40 hover:text-[#E5E5E5] transition-colors cursor-pointer mt-[0.1rem]">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

    </div>
@endif