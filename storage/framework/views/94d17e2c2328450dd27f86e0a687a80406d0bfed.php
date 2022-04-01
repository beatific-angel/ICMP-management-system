
<!DOCTYPE html>
<html lang="en">


<?php echo $__env->make('common.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <?php echo $__env->make('common.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-container">
                <!-- Sidebar -->
                <?php echo $__env->make('common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End of Sidebar -->
                <div class="page-content-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        <?php echo $__env->make('common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <?php echo $__env->yieldContent('scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/popper/popper.js')); ?>"></script>
    <script src="<?php echo e('assets/plugins/jquery-blockui/jquery.blockui.min.js'); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/feather/feather.min.js')); ?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
    <!-- Common js-->
    <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/layout.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/theme-color.js')); ?>"></script>
    <!-- material -->
    <script src="<?php echo e(asset('assets/plugins/material/material.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/flatpicker/js/flatpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/material-select/getmdl-select.js')); ?>"></script>

    <!-- data table -->
    <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/table/table_data.js')); ?>"></script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\resources\views/layouts/app.blade.php ENDPATH**/ ?>