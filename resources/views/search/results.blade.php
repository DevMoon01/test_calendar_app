<h1>Utenti che hanno registrato: {{ $request->type }}</h1>

@if ($users->isEmpty())
    <p>Nessun utente trovato.</p>
@else
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('user.profile', $user->id) }}">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endif