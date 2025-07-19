<h1>Utenti che hanno registrato: <?php echo e($request->type); ?></h1>

<?php if($users->isEmpty()): ?>
    <p>Nessun utente trovato.</p>
<?php else: ?>
    <ul>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(route('user.profile', $user->id)); ?>">
                    <?php echo e($user->name); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/search/results.blade.php ENDPATH**/ ?>