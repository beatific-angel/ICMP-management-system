<?php if(auth()->guard()->check()): ?>
    

    <?php $__env->startSection('title', 'Permission Error'); ?>

    <?php $__env->startSection('content'); ?>
        <div class="container-fluid">

            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Page Not Found!</p>
                <p class="text-gray-500 mb-0">It looks like you are trying to access wrong page!</p>
                <a href="<?php echo e(route('home')); ?>">← Back to Dashboard</a>
            </div>

        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/errors/404.blade.php ENDPATH**/ ?>