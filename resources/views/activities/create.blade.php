<!--  Form per inserire una nuova attività -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Nuova Attività</title>
</head>

<body>
    <h1>Registra attività</h1>

    <!--  Mostra errori di validazione -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <!--  Form -->
    <form action="{{ route('activity.store') }}" method="POST">
        @csrf <!--  Protezione CSRF -->

        <!--  Tipo attività -->
        <label for="type">Tipo:</label>
        <select name="type" required>
            <option value="nuoto">Nuoto</option>
            <option value="ginnastica">Ginnastica</option>
            <option value="attrezzi">Attrezzi</option>
            <option value="corsa">Corsa</option>
            <option value="camminata">Camminata</option>
            <option value="calcio">Calcio</option>
        </select>
        <br><br>

        <!--  Quantità -->
        <label for="amount">Quantità (es. minuti, calorie, litri):</label>
        <input type="number" name="amount" id="amount"><br><br>

        <!--  Note -->
        <label for="note">Note (opzionale):</label>
        <textarea name="note" id="note"></textarea><br><br>

        <!--  Data -->
        <label for="date">Data:</label>
        <input type="date" name="date" id="date" required><br><br>

        <!--  Invia -->
        <button type="submit">Salva attività</button>
    </form>
</body>

</html>