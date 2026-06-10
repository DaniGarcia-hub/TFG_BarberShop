<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[4vw] max-w-[1400px] mx-auto w-full">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                            <path fill="rgb(209, 199, 183)" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H40c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H408c17.7 0 32-14.3 32-32s14.3-32-32-32H256V80z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">
                        Agendar Nueva Cita
                    </p>
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/>
                </svg>
                Volver al Panel
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-rose-900/40 border-l-4 border-rose-500 rounded-[6px] p-[1rem] mb-[2rem] text-[#E5E5E5] font-poppins text-[0.9rem] shadow-md">
                <p class="font-bold uppercase font-bebas text-[1.1rem] tracking-wider text-rose-300 mb-[0.25rem]">Inconveniente al reservar:</p>
                <ul class="list-disc pl-[1.25rem] space-y-[0.1rem]">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.5rem] md:p-[2.5rem] shadow-xl w-full border border-[#413B36]/20 mb-[1.5rem]">
            
            <form method="POST" action="{{ route('clientbookings.store') }}" class="font-poppins text-[#413B36]">
                @csrf

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Selección de Personal y Servicio
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[2.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem]">
                        <label class="font-semibold text-[0.9rem]">Cliente Solicitante</label>
                        <input type="text" disabled class="bg-[#FAFAFA]/60 border border-[#413B36]/20 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none text-stone-500 cursor-not-allowed font-medium" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="barber_id" class="font-semibold text-[0.9rem]">Escoge tu Peluquero <span class="text-rose-700">*</span></label>
                        <select name="barber_id" id="barber_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            <option value="" disabled selected>Selecciona un barbero...</option>
                            @foreach($barbers as $barber)
                                <option value="{{ $barber->id }}" {{ old('barber_id') == $barber->id ? 'selected' : '' }}>
                                    {{ $barber->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="haircut_id" class="font-semibold text-[0.9rem]">Servicio a realizar <span class="text-rose-700">*</span></label>
                        <select name="haircut_id" id="haircut_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            <option value="" disabled selected>Selecciona un servicio...</option>
                            @foreach($haircuts as $haircut)
                                <option value="{{ $haircut->id }}" {{ old('haircut_id') == $haircut->id ? 'selected' : '' }}>
                                    {{ $haircut->name }} ({{ number_format($haircut->price, 2, ',', '.') }} €) - {{ $haircut->duration }} min
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Fecha y Horario de la Cita
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[1.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="booking_date" class="font-semibold text-[0.9rem]">Fecha de la Cita <span class="text-rose-700">*</span></label>
                        <input type="text" name="booking_date" id="booking_date" required placeholder="Selecciona una fecha..."
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all cursor-pointer" value="{{ old('booking_date') }}">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="schedule_id" class="font-semibold text-[0.9rem]">Horario Deseado <span class="text-rose-700">*</span></label>
                        <select name="schedule_id" id="schedule_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all">
                            <option value="" disabled selected>Selecciona primero una fecha...</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="note" class="font-semibold text-[0.9rem]">Notas adicionales o preferencias</label>
                        <textarea name="note" id="note" rows="4" placeholder="¿Quieres dejarnos alguna indicación?" class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all resize-none">{{ old('note') }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end pt-[1.5rem] border-t border-[#413B36]/10 gap-[0.75rem] flex-wrap">
                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#927860] hover:text-white py-[0.7rem] px-[2.5rem] rounded-[0.4rem] border border-[#927860] uppercase font-bebas text-[1.3rem] shadow-lg tracking-wider cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/>
                        </svg>
                        Confirmar Cita
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#booking_date", {
                locale: "es",
                dateFormat: "Y-m-d", // Formato que leerá de la BD.
                minDate: "today", // Esto prohibirá escoger fechas que ya hayan pasado...
                disable: [
                    function(date) {
                        return (date.getDay() === 0); // Desactiva los domingos, pues no se podrán escoger.
                    }
                ],
                onChange: function(selectedDates, dateStr, instance) {
                    const scheduleSelect = document.getElementById('schedule_id');
                    if(scheduleSelect.value !== "") {
                        scheduleSelect.style.borderColor = '#927860';
                    }
                }
            });

            const barber = document.getElementById('barber_id');
            const dateInput = document.getElementById('booking_date');
            const schedule = document.getElementById('schedule_id');

            function cargarHoras() {
                if (!barber.value || !dateInput.value) return;

                let day = new Date(dateInput.value).getDay(); // Pillamos el día que ha escogido el usuario.
                if (day === 0) day = 7; // Si cae domingo, le ponemos el valor de 7, para que no sea el 0 ya que se empieza por el 1 (lunes).

                const bookingId = "{{ $booking->id ?? '' }}"; // esto sirve para poder meterle el parámetro en la URL con un valor que viene de PHP.
                let url = `{{ route('clientbookings.available-slots') }}?barber_id=${barber.value}&day_name=${day}&booking_date=${dateInput.value}&ignore_booking_id=${bookingId}`;

                fetch(url) // Llamada a la función que me cargará las horas.
                    .then(res => res.json())
                    .then(result => {
                        schedule.innerHTML = '<option value="" disabled selected>Selecciona una hora...</option>';
                        
                        result.data.forEach(slot => { // por cada horario disponible..
                            const option = document.createElement('option'); // Se crea una opción nueva...
                            option.value = slot.id; // Su valor va a ser el ID del hroario...
                            option.textContent = `${slot.start_time.substring(0, 5)} - ${slot.finish_time.substring(0, 5)}`; // El texto que tendrá, será la hora de incio y de fin.

                            schedule.appendChild(option);
                        });
                    });
            }

            barber.addEventListener('change', cargarHoras);
            dateInput.addEventListener('change', cargarHoras);

        });

    </script>
    
</x-app-layout>