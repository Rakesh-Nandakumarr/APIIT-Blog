<?php
use App\Models\Event;
use function Livewire\Volt\{state, mount};

state([
    'events' => []
]);

// dd(Event::All());

mount(function(){
    $this->events = (new Event())->get();
});


?>

<div>
    <div id="calendar"></div>
     <script> 
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '8:00:00',
                    slotMaxTime: '19:00:00',
                    // events: [
                    //     {
                    //         title: 'Event 1',
                    //         start: '2024-01-01T10:00:00',
                    //         end: '2024-01-01T12:00:00'
                    //     },
                    //     {
                    //         title: 'Event 2',
                    //         start: '2024-01-02T14:00:00',
                    //         end: '2024-01-02T16:00:00'
                    //     },
                    //     {
                    //         title: 'Event 3',
                    //         start: '2024-01-03T09:00:00',
                    //         end: '2024-01-03T11:00:00'
                    //     }
                    // ],

                    events: @json($events),
                });
                calendar.render();
            });
        </script>
</div>
