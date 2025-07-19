<!--  Form di registrazione utente -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>

<body>
    <h1>Registrati</h1>

    <!--  Visualizza errori di validazione -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!--  Form che invia i dati alla route POST /register -->
    <form action="{{ route('register.submit') }}" method="POST">
        @csrf <!--  Protezione contro CSRF -->

        <!--  Nome -->
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required><br><br>

        <!--  Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <!--  Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>


        <!--  Conferma Password -->
        <label for="password">Password:</label>
        <input type="password" name="password_confirmation" id="password" required><br><br>

        <!--  Invio -->
        <button type="submit">Registrati</button>
    </form>
</body>

</html>