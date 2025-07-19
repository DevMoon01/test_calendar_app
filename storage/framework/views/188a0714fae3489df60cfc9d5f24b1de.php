<h1>Profilo di <?php echo e($user->name); ?></h1>
<p>👥 Follower: <?php echo e($user->followers->count()); ?></p>



<?php if(auth()->guard()->check()): ?>
    <?php if($user->id !== Auth::id()): ?>
        <?php if($user->followers->contains('follower_id', Auth::id())): ?>
            <form action="<?php echo e(route('user.unfollow', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit">Smetti di seguire</button>
            </form>
        <?php else: ?>
            <form action="<?php echo e(route('user.follow', $user->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit">Segui</button>
            </form>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<ul>
    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($activity->type); ?> (<?php echo e($activity->date); ?>)
            <?php if($activity->amount): ?>
                — Quantità: <?php echo e($activity->amount); ?>

            <?php endif; ?>
            <?php if($activity->note): ?>
                — Note: <?php echo e($activity->note); ?>

            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/users/profile.blade.php ENDPATH**/ ?>