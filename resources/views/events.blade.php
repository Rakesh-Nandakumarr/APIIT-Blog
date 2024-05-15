<x-app-layout meta-title="Events Calendar">
    <div class="container max-w-4xl mx-auto py-6">
    
        <div id="calendar"></div>
        @auth()
        @if (Auth::user()->stafftype == 'Apiit Management')
        <a href="/calendar/events" class="bg-teal-600 text-white rounded py-2 px-4 mx-auto">Add Events</a>
        @endif
        @endauth
    </div>
    
     <script> 
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '8:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
        
</x-app-layout>