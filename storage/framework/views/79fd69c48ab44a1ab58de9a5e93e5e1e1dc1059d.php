<?php $__env->startSection('title', 'Customer List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Customer List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('customers.index')); ?>">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Customer List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Customer List</header>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('customers.create')); ?>" id="addRow"
                                       class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="user_lists">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th> Email </th>
                                <th> Address </th>
                                <th> Create Date </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody id="customer_list" class="customer_list">
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        <img src="../assets/img/admin.png" alt="">
                                    </td>
                                    <td class="left"><?php echo e($customer->id); ?></td>
                                    <td><?php echo e($customer->first_name); ?> <?php echo e($customer->last_name); ?></td>
                                    <td><a href="tel:<?php echo e($customer->phone); ?>">
                                            <?php echo e($customer->phone); ?> </a></td>
                                    <td><a href="mailto:<?php echo e($customer->email); ?>">
                                            <?php echo e($customer->email); ?> </a></td>
                                    <td class="left"><?php echo e($customer->address); ?></td>
                                    <td class="left"><?php echo e($customer->created_at); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('customers.edit', ['id' => $customer->id])); ?>" class="tblEditBtn">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?php echo e(route('customers.delete', ['id' => $customer->id])); ?>" class="tblDelBtn">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                            </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/customers/index.blade.php ENDPATH**/ ?>