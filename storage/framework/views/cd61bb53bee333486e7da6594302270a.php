<!-- 👋 Form di registrazione utente -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
</head>

<body>
    <h1>Registrati</h1>

    <!-- 🛑 Visualizza errori di validazione -->
    <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="color:red;"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <!-- 📩 Form che invia i dati alla route POST /register -->
    <form action="<?php echo e(route('register.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?> <!-- 🛡️ Protezione contro CSRF -->

        <!-- 🧑 Nome -->
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required><br><br>

        <!-- 📧 Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <!-- 🔒 Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>


        <!-- 🔒 Conferma Password -->
        <label for="password">Password:</label>
        <input type="password" name="password_confirmation" id="password" required><br><br>

        <!-- 🚀 Invio -->
        <button type="submit">Registrati</button>
    </form>
</body>

</html><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/auth/register.blade.php ENDPATH**/ ?>