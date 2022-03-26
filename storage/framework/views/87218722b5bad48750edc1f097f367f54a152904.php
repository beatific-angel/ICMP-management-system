

<?php if(Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <i class="material-icons f-left"></i>
        <strong>Success !</strong> <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <i class="material-icons f-left"></i>
        <strong>Error !</strong> <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\resources\views/common/alert.blade.php ENDPATH**/ ?>