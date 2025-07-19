<h1>Profilo di {{ $user->name }}</h1>
<p> Follower: {{ $user->followers->count() }}</p>



@auth
    @if ($user->id !== Auth::id())
        @if ($user->followers->contains('follower_id', Auth::id()))
            <form action="{{ route('user.unfollow', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Smetti di seguire</button>
            </form>
        @else
            <form action="{{ route('user.follow', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Segui</button>
            </form>
        @endif
    @endif
@endauth

<ul>
    @foreach ($activities as $activity)
        <li>
            {{ $activity->type }} ({{ $activity->date }})
            @if ($activity->amount)
                — Quantità: {{ $activity->amount }}
            @endif
            @if ($activity->note)
                — Note: {{ $activity->note }}
            @endif
        </li>
    @endforeach
</ul>