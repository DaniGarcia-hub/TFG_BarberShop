@extends('layouts.admin')

@section('content')
    <main class="bg-[#262929] pt-[1rem] md:pt-[2rem] pb-[6rem] px-[1vw]">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1rem] w-full">
            <div>
                <div class="flex gap-[0.5rem] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                    <figure class="flex items-center justify-center text-[#D1C7B7]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="16" height="16">
                            <path fill="rgb(209, 199, 183)" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm305.7 142.7c-6.2-6.2-16.4-6.2-22.6 0L224 393.4l-31.1-31.1c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l42.4 42.4c6.2 6.2 16.4 6.2 22.6 0l112-112c6.2-6.2 6.2-16.4 0-22.6z"/>
                        </svg>
                    </figure>
                    <p class="font-bebas text-[1rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">
                        Modificando Reserva: #{{ $booking->id }}
                    </p>
                </div>
            </div>

            <a href="{{ url()->previous() }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[1.5rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] shadow-md hover:bg-[#EBE6E1] transition-all duration-300">
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

        <div class="bg-[#EBE6E1] rounded-[8px] p-[1.5rem] md:p-[2.5rem] shadow-xl w-full border border-[#413B36]/20 mb-[1.5rem]">
            
            <form method="POST" action="{{ route('admin.bookings.update', $booking->id) }}" class="font-poppins text-[#413B36]">
                @csrf
                @method('PUT')

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Información Humana
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[2.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="client_id" class="font-semibold text-[0.9rem]">Cliente <span class="text-rose-700">*</span></label>
                        <select name="client_id" id="client_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id', $booking->client_id) == $client->id ? 'selected' : '' }}>
                                    {{ $client->name }} [ID: {{ $client->id }}]
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="barber_id" class="font-semibold text-[0.9rem]">Peluquero <span class="text-rose-700">*</span></label>
                        <select name="barber_id" id="barber_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            @foreach($barbers as $barber)
                                <option value="{{ $barber->id }}" {{ old('barber_id', $booking->barber_id) == $barber->id ? 'selected' : '' }}>
                                    {{ $barber->name }} [ID: {{ $barber->id }}]
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="haircut_id" class="font-semibold text-[0.9rem]">Tipo Corte <span class="text-rose-700">*</span></label>
                        <select name="haircut_id" id="haircut_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] focus:ring-1 focus:ring-[#927860] transition-all">
                            @foreach($haircuts as $haircut)
                                <option value="{{ $haircut->id }}" {{ old('haircut_id', $booking->haircut_id) == $haircut->id ? 'selected' : '' }}>
                                    {{ $haircut->name }} ({{ number_format($haircut->price, 2, ',', '.') }} €) - {{ $haircut->duration }} min
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <h3 class="font-bebas text-[1.4rem] uppercase tracking-wider text-[#927860] border-b border-[#413B36]/10 pb-[0.3rem] mb-[1.5rem]">
                    Observaciones e Interfaz Temporal
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-[1.5rem] mb-[1.5rem]">
                    
                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="booking_date" class="font-semibold text-[0.9rem]">Fecha de la Cita <span class="text-rose-700">*</span></label>
                        <input type="date" name="booking_date" id="booking_date" required min="{{ date('Y-m-d') }}"
                            class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all" value="{{ old('booking_date', $booking->booking_date) }}">
                    </div>

                    <div class="flex flex-col gap-[0.4rem]">
                        <label for="schedule_id" class="font-semibold text-[0.9rem]">Horario <span class="text-rose-700">*</span></label>
                        <select name="schedule_id" id="schedule_id" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all">
                            </select>
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="state" class="font-semibold text-[0.9rem]">Estado Reserva <span class="text-rose-700">*</span></label>
                        <select name="state" id="state" required class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all">
                            <option value="pendiente" {{ old('state', $booking->state) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="completado" {{ old('state', $booking->state) == 'completado' ? 'selected' : '' }}>Completado</option>
                            <option value="cancelado" {{ old('state', $booking->state) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 gap-[1.5rem] md:col-span-2 mb-[1rem]">
                        <div class="flex items-center gap-[0.75rem] bg-[#101111]/5 border border-[#413B36]/10 rounded-[6px] p-[1rem] w-full">
                            <div class="flex items-center h-5">
                                <input type="checkbox" name="confirmed" id="confirmed" value="1" {{ old('confirmed', !empty($booking->confirmation_date) ? '1' : '') == '1' ? 'checked' : '' }}
                                    class="w-4 h-4 text-[#927860] bg-[#FAFAFA] border-[#413B36]/30 rounded focus:ring-[#927860] cursor-pointer">
                            </div>
                            <div class="font-poppins select-none">
                                <label for="confirmed" class="font-semibold text-[0.95rem] text-[#413B36] cursor-pointer">
                                    Reserva Confirmada
                                </label>
                                <p class="text-stone-500 text-[0.8rem] mt-[0.1rem]">
                                    @if($booking->confirmation_date)
                                        Confirmada el: {{ \Carbon\Carbon::parse($booking->confirmation_date)->format('d/m/Y H:i') }}
                                    @else
                                        Esta reserva aún no ha sido confirmada. Márcala para confirmarla.
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-[0.4rem] md:col-span-2">
                        <label for="note" class="font-semibold text-[0.9rem]">Notas u Observaciones</label>
                        <textarea name="note" id="note" rows="4" class="bg-[#FAFAFA] border border-[#413B36]/30 rounded-[6px] px-[0.8rem] py-[0.6rem] outline-none focus:border-[#927860] transition-all resize-none">{{ old('note', $booking->note) }}</textarea>
                    </div>
                </div>

                <div class="flex justify-end pt-[1.5rem] border-t border-[#413B36]/10 gap-[0.75rem] flex-wrap">
                    <button type="submit" class="w-full sm:w-auto flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] hover:bg-[#927860] hover:text-white py-[0.7rem] px-[2.5rem] rounded-[0.4rem] border border-[#927860] uppercase font-bebas text-[1.3rem] shadow-lg tracking-wider cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>

        <div class="flex justify-start w-full">
            @if($booking->trashed())
                <form action="{{ route('admin.bookings.restore', $booking->id) }}" method="POST" class="w-full sm:w-auto">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-white bg-emerald-700 hover:bg-emerald-800 py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-emerald-950 uppercase font-bebas text-[1.1rem] shadow-md cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        Restaurar Reserva
                    </button>
                </form>
            @else
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="w-full sm:w-auto" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-white bg-rose-800 hover:bg-rose-900 py-[0.5rem] px-[1.25rem] rounded-[0.4rem] border border-rose-950 uppercase font-bebas text-[1.1rem] shadow-md cursor-pointer transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                        </svg>
                        Eliminar Reserva
                    </button>
                </form>
            @endif
        </div>
    </main>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const clientSelect = document.getElementById('client_id');
        const barberSelect = document.getElementById('barber_id');
        const dateInput = document.getElementById('booking_date');
        const scheduleSelect = document.getElementById('schedule_id');

        const currentScheduleId = "{{ $booking->schedule_id }}";

        if (dateInput.value && barberSelect.value) {
            triggerHoursLoading(currentScheduleId);
        }

        clientSelect.addEventListener('change', function () {
            const clientId = this.value;

            barberSelect.value = "";
            barberSelect.disabled = !clientId;
            if(!clientId) {
                barberSelect.classList.add('opacity-60');
            } else {
                barberSelect.classList.remove('opacity-60');
            }

            resetSelect(scheduleSelect, 'Selecciona primero un peluquero y una fecha...');
        });

        barberSelect.addEventListener('change', function () {
            triggerHoursLoading(null);
        });

        dateInput.addEventListener('change', function () {
            triggerHoursLoading(null);
        });

        function triggerHoursLoading(targetScheduleId) {
            const barberId = barberSelect.value;
            const rawDate = dateInput.value;

            if (!barberId || !rawDate) {
                resetSelect(scheduleSelect, 'Selecciona primero un peluquero y una fecha...');
                return;
            }

            const chosenDate = new Date(rawDate);
            let dayOfWeek = chosenDate.getDay(); 
            if (dayOfWeek === 0) dayOfWeek = 7;

            loadHours(barberId, dayOfWeek, targetScheduleId);
        }

        function loadHours(barberId, dayValue, selectedScheduleId) {
            const clientId = clientSelect.value;

            scheduleSelect.innerHTML = '<option value="" disabled selected>Cargando horas libres...</option>';
            scheduleSelect.disabled = true;
            scheduleSelect.classList.add('opacity-60');

            fetch(`{{ route('admin.bookings.available-slots') }}?barber_id=${barberId}&day_name=${dayValue}&client_id=${clientId}&ignore_booking_id={{ $booking->id }}`)
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(err => {
                            alert(err.message);
                            barberSelect.value = "";
                            resetSelect(scheduleSelect, 'Selecciona primero un peluquero y una fecha...');
                            throw new Error(err.message);
                        });
                    }
                    return response.json();
                })
                .then(result => {
                    scheduleSelect.innerHTML = '';

                    if (!result.data || result.data.length === 0) {
                        scheduleSelect.innerHTML = '<option value="" disabled selected>⚠️ No quedan horas libres para este día</option>';
                        return;
                    }

                    scheduleSelect.innerHTML = '<option value="" disabled selected>Selecciona una hora disponible...</option>';
                    result.data.forEach(schedule => {
                        const startTime = schedule.start_time.substring(0, 5);
                        const finishTime = schedule.finish_time.substring(0, 5);

                        const option = document.createElement('option');
                        option.value = schedule.id;
                        option.textContent = `${startTime} - ${finishTime}`;
                        
                        if (selectedScheduleId && schedule.id == selectedScheduleId) {
                            option.selected = true;
                        }
                        scheduleSelect.appendChild(option);
                    });
                    scheduleSelect.disabled = false;
                    scheduleSelect.classList.remove('opacity-60');
                })
                .catch(error => console.error(error));
        }

        function resetSelect(selectElement, text) {
            selectElement.innerHTML = `<option value="" disabled selected>${text}</option>`;
            selectElement.disabled = true;
            selectElement.classList.add('opacity-60');
        }
    });
</script>
@endsection