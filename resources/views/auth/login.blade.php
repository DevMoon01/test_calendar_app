<!--  Form di login -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Accedi</h1>

    <!--  Mostra errori -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!--  Form login -->
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <!--  Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <!--  Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <!--  Invio -->
        <button type="submit">Login</button>
    </form>
</body>

</html>