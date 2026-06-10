<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#EBE6E1] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-[1.5rem] text-[#413B36]">
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-[#927860]/20 pb-[1rem] mb-[1.5rem] gap-[1rem] w-full">
                        <h2 class="font-girassol font-semibold text-[2.2rem]">Mis Reservas</h2>
                        
                        <a href="{{ route('clientbookings.create') }}" class="w-full sm:w-auto text-center flex items-center justify-center gap-[0.5rem] text-[#EBE6E1] bg-[#413B36] hover:bg-[#927860] py-[0.6rem] px-[1.5rem] rounded-[0.4rem] border border-[#413B36] uppercase no-underline font-bebas text-[1.2rem] shadow-md transition-all duration-300 tracking-wider cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Agendar Nueva Cita
                        </a>
                    </div>

                    <div id="calendar"></div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.20/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function getView() {
            return window.innerWidth < 1024 ? 'listYear' : 'dayGridMonth';
        }

        const calendarEl = document.getElementById('calendar');
        
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: getView(),
            locale: 'es',
            height: 'auto',
            firstDay: 1,
            events: "{{ route('clientbookings.calendar-json') }}",
            eventClick: function(info) {
                let url = "{{ route('clientbookings.show', ':id') }}";
                url = url.replace(':id', info.event.id);
                window.location.href = url;
            },
            buttonText: window.innerWidth < 1024 
            ? {
                today: 'Hoy',
            }
            : {
                today: 'Hoy',
                month: 'Calendario',
                listYear: 'Lista Anual'
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
                right: 'dayGridMonth,listYear'
            },
            eventTimeFormat: { hour: '2-digit', minute: '2-digit', meridian: false },
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