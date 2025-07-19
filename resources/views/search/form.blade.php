<h1>Cerca attività da copiare</h1>
<form action="{{ route('search.results') }}" method="GET">
    @csrf
    <label for="type">Tipo di attività:</label>
    <input type="text" name="type" id="type" required>
    <button type="submit">Cerca</button>
</form>