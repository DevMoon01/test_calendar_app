<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Calendario eventi</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
</head>


<style>
    #calendar {
        max-width: 900px;
        margin: auto;
        background-color: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <h1> I tuoi eventi a calendario</h1>
    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'it', //  Traduzioni italiane
                events: '{{ route('calendar.events') }}', //  Carica eventi
                eventClick: function (info) {
                    alert('📌 ' + info.event.title + '\n Dal ' + info.event.start.toISOString().split('T')[0]);
                }
            });

            calendar.render();
        });
    </script>
</body>

</html>