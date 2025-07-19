<!-- 🎯 Pagina dashboard per utenti loggati -->
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Benvenuto, <?php echo e(Auth::user()->name); ?> 👋</h1>

    <p>Questa è la tua dashboard personale.</p>

    <!-- 🔓 Logout -->
    <form action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <button type="submit">Logout</button>
        <a href="<?php echo e(route('activity.create')); ?>">Crea attività</a>
        <a href="<?php echo e(route('search.page')); ?>">Cerca altre attività</a>
        <a href="<?php echo e(route('event.create')); ?>">Crea nuovo evento</a>
        <a href="<?php echo e(route('calendar')); ?>">Visualizza calendario</a>
    </form>



    <hr>

    <h2>Le tue attività recenti</h2>

    <?php if($activities->isEmpty()): ?>
        <p>Nessuna attività registrata.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <strong><?php echo e($activity->type); ?></strong>
                    (<?php echo e($activity->date); ?>)
                    <?php if($activity->amount): ?>
                        — Quantità: <?php echo e($activity->amount); ?>

                    <?php endif; ?>
                    <?php if($activity->note): ?>
                        — Note: <?php echo e($activity->note); ?>

                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>



    <hr>



    <?php if($events->isEmpty()): ?>
        <p>Nessun evento creato.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <strong><?php echo e($event->title); ?></strong>
                    (<?php echo e($event->start_date); ?> - <?php echo e($event->end_date); ?>)<br>
                    <?php if($event->location): ?>
                        📍 <?php echo e($event->location); ?><br>
                    <?php endif; ?>
                    <?php if($event->description): ?>
                        📝 <?php echo e($event->description); ?>

                    <?php endif; ?>
                </li>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>



</body>

</html><?php /**PATH E:\Sviluppo\Progetti\Condivise\resources\views/dashboard.blade.php ENDPATH**/ ?>