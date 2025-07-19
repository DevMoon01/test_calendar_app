<!-- 🔐 Form di login -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Accedi</h1>

    <!-- 🔔 Mostra errori -->
    <?php if($errors->any()): ?>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="color:red;"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <!-- 📩 Form login -->
    <form action="<?php echo e(route('login.submit')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <!-- 📧 Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <!-- 🔒 Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <!-- ✅ Invio -->
        <button type="submit">Login</button>
    </form>
</body>

</html><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/auth/login.blade.php ENDPATH**/ ?>