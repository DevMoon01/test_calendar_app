<h1>Cerca attività da copiare</h1>
<form action="<?php echo e(route('search.results')); ?>" method="GET">
    <?php echo csrf_field(); ?>
    <label for="type">Tipo di attività:</label>
    <input type="text" name="type" id="type" required>
    <button type="submit">Cerca</button>
</form><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/search/form.blade.php ENDPATH**/ ?>