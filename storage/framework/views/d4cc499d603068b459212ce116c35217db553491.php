<!DOCTYPE html>
<html lang="en">


<?php echo $__env->make('auth.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <div class="main">

        
        <?php echo $__env->yieldContent('content'); ?>

    </div>


<?php echo $__env->make('auth.includes.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/auth/layouts/app.blade.php ENDPATH**/ ?>