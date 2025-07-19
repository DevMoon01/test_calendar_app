<!--  Pagina dashboard per utenti loggati -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Benvenuto, {{ Auth::user()->name }} 👋</h1>

    <p>Questa è la tua dashboard personale.</p>

    <!--  Logout -->
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
        <a href="{{ route('activity.create') }}">Crea attività</a>
        <a href="{{ route('search.page') }}">Cerca altre attività</a>
        <a href="{{ route('event.create') }}">Crea nuovo evento</a>
        <a href="{{ route('calendar') }}">Visualizza calendario</a>
    </form>



    <hr>

    <h2>Le tue attività recenti</h2>

    @if ($activities->isEmpty())
        <p>Nessuna attività registrata.</p>
    @else
        <ul>
            @foreach ($activities as $activity)
                <li>
                    <strong>{{ $activity->type }}</strong>
                    ({{ $activity->date }})
                    @if ($activity->amount)
                        — Quantità: {{ $activity->amount }}
                    @endif
                    @if ($activity->note)
                        — Note: {{ $activity->note }}
                    @endif
                </li>
            @endforeach
        </ul>
    @endif



    <hr>



    @if ($events->isEmpty())
        <p>Nessun evento creato.</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    <strong>{{ $event->title }}</strong>
                    ({{ $event->start_date }} - {{ $event->end_date }})<br>
                    @if($event->location)
                        📍 {{ $event->location }}<br>
                    @endif
                    @if($event->description)
                        📝 {{ $event->description }}
                    @endif
                </li>
                <br>
            @endforeach
        </ul>
    @endif



</body>

</html>