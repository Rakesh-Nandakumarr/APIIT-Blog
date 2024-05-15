<?php
use App\Models\Event;
use function Livewire\Volt\{state};

// dd(Event::All());


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
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
</div>
