@extends('layouts.admin')

@section('content')
<main class="bg-[#262929] pt-[2rem] md:pt-[4rem] pb-[6rem] px-[2vw] md:px-[4vw]">
    
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center border-b border-[#927860] pb-[1.5rem] mb-[2.5rem] gap-[1.5rem] w-full">
        <div>
            <div class="flex gap-[0.5rem] md:gap-[1vw] items-center px-[12px] py-[0.2rem] rounded-full bg-[#101111] w-max">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#D1C7B7] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-[#D1C7B7]"></span>
                </span>
                <p class="font-bebas text-[1rem] md:text-[1.2rem] uppercase tracking-wider text-[#E5E5E5] px-[0.25rem]">Control Interno</p>
            </div>
            <h1 class="text-[#E5E5E5] text-[2.2rem] md:text-[3.5rem] font-girassol font-thin uppercase mt-[0.5rem] leading-tight">
                Panel de Administración
            </h1>
        </div>
        
        <a href="{{ url('/') }}" class="w-full lg:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#413B36] bg-[#D1C7B7] py-[0.5rem] px-[2rem] rounded-[0.4rem] border border-[#927860] uppercase no-underline font-bebas text-[1.2rem] md:text-[1.3rem] shadow-lg hover:bg-[#EBE6E1] transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
            Ver Sitio Público
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[1.25rem] mb-[3rem]">
        <div class="bg-[#EBE6E1] p-[1.25rem] rounded-[8px] border-l-4 border-[#927860] shadow-md flex items-center justify-between">
            <div>
                <p class="font-poppins text-[0.8rem] uppercase tracking-wider text-[#413B36] font-semibold">Citas</p>
                <h3 class="font-bebas text-[2.4rem] text-[#413B36] mt-[0.25rem]">14 Reservas</h3>
            </div>
            <div class="p-[0.6rem] bg-[#D1C7B7] rounded-[8px] text-[#413B36] shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
            </div>
        </div>

        <div class="bg-[#EBE6E1] p-[1.25rem] rounded-[8px] border-l-4 border-[#927860] shadow-md flex items-center justify-between">
            <div>
                <p class="font-poppins text-[0.8rem] uppercase tracking-wider text-[#413B36] font-semibold">Servicios</p>
                <h3 class="font-bebas text-[2.4rem] text-[#413B36] mt-[0.25rem]">5 Activos</h3>
            </div>
            <div class="p-[0.6rem] bg-[#D1C7B7] rounded-[8px] text-[#413B36] shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
            </div>
        </div>

        <div class="bg-[#EBE6E1] p-[1.25rem] rounded-[8px] border-l-4 border-[#927860] shadow-md flex items-center justify-between">
            <div>
                <p class="font-poppins text-[0.8rem] uppercase tracking-wider text-[#413B36] font-semibold">Personal</p>
                <h3 class="font-bebas text-[2.4rem] text-[#413B36] mt-[0.25rem]">3 Barberos</h3>
            </div>
            <div class="p-[0.6rem] bg-[#D1C7B7] rounded-[8px] text-[#413B36] shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </div>
    </div>

    <div id="calendar" class="bg-[#EBE6E1] p-[1.5rem] rounded-[8px] shadow-xl border border-[#413B36]/20 text-[#413B36]">

    </div>

    <br>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-[2rem]">
        
        <div class="lg:col-span-4 flex flex-col gap-[1.25rem]">
            <h2 class="text-[#E5E5E5] font-girassol text-[1.6rem] font-thin uppercase tracking-wide">
                Gestión BarberShop
            </h2>
            
            <a href="{{ route('admin.bookings.index') }}" class="flex items-center justify-between bg-[#EFECE5] p-[1.1rem] rounded-[6px] border border-[#413B36] no-underline transition-all duration-300 hover:translate-x-2 shadow-sm">
                <div class="flex items-center gap-[0.75rem]">
                    <div class="p-[0.5rem] bg-[#262929] rounded-[4px] text-[#E5E5E5]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                    </div>
                    <span class="font-poppins font-semibold text-[#413B36] text-[1rem]">Reservas</span>
                </div>
                <span class="bg-[#927860] text-white font-bebas text-[0.9rem] px-[0.6rem] py-[0.1rem] rounded-full">Abrir</span>
            </a>

            <a href="{{ route('admin.haircuts.index') }}" class="flex items-center justify-between bg-[#EFECE5] p-[1.1rem] rounded-[6px] border border-[#413B36] no-underline transition-all duration-300 hover:translate-x-2 shadow-sm">
                <div class="flex items-center gap-[0.75rem]">
                    <div class="p-[0.5rem] bg-[#262929] rounded-[4px] text-[#E5E5E5]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/><path d="M3 12c0 1.66 4 3 9 3s9-1.34 9-3"/></svg>
                    </div>
                    <span class="font-poppins font-semibold text-[#413B36] text-[1rem]">Servicios</span>
                </div>
                <span class="bg-[#927860] text-white font-bebas text-[0.9rem] px-[0.6rem] py-[0.1rem] rounded-full">Abrir</span>
            </a>

            <a href="{{ route('admin.schedules.index') }}" class="flex items-center justify-between bg-[#EFECE5] p-[1.1rem] rounded-[6px] border border-[#413B36] no-underline transition-all duration-300 hover:translate-x-2 shadow-sm">
                <div class="flex items-center gap-[0.75rem]">
                    <div class="p-[0.5rem] bg-[#262929] rounded-[4px] text-[#E5E5E5]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <span class="font-poppins font-semibold text-[#413B36] text-[1rem]">Horarios</span>
                </div>
                <span class="bg-[#927860] text-white font-bebas text-[0.9rem] px-[0.6rem] py-[0.1rem] rounded-full">Abrir</span>
            </a>

            @role('admin')
            <a href="{{ route('admin.users.index') }}" class="flex items-center justify-between bg-[#EFECE5] p-[1.1rem] rounded-[6px] border border-[#413B36] no-underline transition-all duration-300 hover:translate-x-2 shadow-sm">
                <div class="flex items-center gap-[0.75rem]">
                    <div class="p-[0.5rem] bg-[#262929] rounded-[4px] text-[#E5E5E5]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                    </div>
                    <span class="font-poppins font-semibold text-[#413B36] text-[1rem]">Usuarios</span>
                </div>
                <span class="bg-[#927860] text-white font-bebas text-[0.9rem] px-[0.6rem] py-[0.1rem] rounded-full">Abrir</span>
            </a>
            @endrole
        </div>
    </div>
</main>

<style>
    @media (max-width: 1023px) {

    #calendar {
        padding: 0.5rem !important;
    }

    .fc-list-day-side-text {
        display: none !important;
    }

    .fc-list-day-text {
        font-size: 0.95rem !important;
        font-weight: 700;
    }

    .fc-list-event-time {
        width: 65px !important;
        min-width: 65px !important;
        font-size: 0.8rem !important;
        white-space: nowrap !important;
    }

    .fc-list-event-title {
        font-size: 0.85rem !important;
        line-height: 1.2 !important;
    }

    .fc-list-event-title a,
    .fc-list-event-title {
        white-space: normal !important;
        word-break: break-word !important;
        overflow-wrap: break-word !important;
    }

    .fc-list-event-graphic {
        width: 10px !important;
    }

    .fc-list-event td {
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    .fc-toolbar-title {
        font-size: 1.3rem !important;
    }

    .fc .fc-button {
        padding: 0.35rem 0.55rem !important;
    }

    .fc-list-table {
        width: 100% !important;
        table-layout: auto !important;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function getView() {
            return window.innerWidth < 1024 ? 'listWeek' : 'dayGridMonth';
        }

        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: getView(),
            locale: 'es', // Idioma en español...
            slotMinTime: '08:00:00', // Hora de inicio del calendario...
            slotMaxTime: '21:00:00', // Hora máxima del calendario...
            height: 'auto',
            firstDay: 1, // Primer día el lunes.
            events: "{{ route('admin.bookings.calendar-json') }}",
            slotEventOverlap: false,
            eventClick: function(info) {
                window.location.href = `/bookings/${info.event.id}`;
            },
            buttonText: window.innerWidth < 1024 
            ? {
                today: 'Hoy',
            }
            : {
                today: 'Hoy',
                month: 'Calendario',
                listWeek: 'Lista Semanal'
            },
            headerToolbar: window.innerWidth < 1024
            ? {
                left: 'prev,next',
                center: 'title',
                right: ''
            }
            : {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listWeek'
            },
            eventTimeFormat: { hour: '2-digit', minute: '2-digit', meridian: false },
            noEventsText: 'No hay reservas programadas para esta semana.',
        });
        calendar.render();

        window.addEventListener('resize', () => {
            const newView = getView();

            if (calendar.view.type !== newView) {
                calendar.changeView(newView);
            }
        });
    });
</script>
@endsection