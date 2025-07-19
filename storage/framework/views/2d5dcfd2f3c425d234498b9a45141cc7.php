<h1>Crea nuovo evento</h1>

<form action="<?php echo e(route('event.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label>Titolo:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Descrizione:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Località:</label><br>
    <input type="text" name="location"><br><br>

    <label>Data inizio:</label><br>
    <input type="date" name="start_date" required><br><br>

    <label>Data fine:</label><br>
    <input type="date" name="end_date" required><br><br>

    <label for="category">Categoria evento:</label>
    <select name="category" id="category" required>
        <option value="compleanno">Compleanno</option>
        <option value="festival">Festival</option>
        <option value="allenamento">Allenamento</option>
        <option value="altro">Altro</option>
    </select>
    <br><br>

    <button type="submit">Crea Evento</button>
</form><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/events/create.blade.php ENDPATH**/ ?>