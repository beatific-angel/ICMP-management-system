<?php $__env->startSection('title', 'Devices'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Device List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('device.index')); ?>">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Device List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Device List</header>
                        <button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="sdntmenu">
                            <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                here</li>
                        </ul>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('device.create')); ?>" id="addRow" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="example4">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Device Name</th>
                                <th>User Name</th>
                                <th>Group Name</th>
                                <th>IP Address</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="device_status" class="device_status">
                            <?php if($devices): ?>
                                <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd">
                                        <td><?php echo e($device->id); ?></td>
                                        <td><?php echo e($device->name); ?></td>
                                        <td>
                                            <?php
                                            $users = DB::select(DB::raw('select * from users where id = ' . $device->userid));
                                            echo $users[0]->username;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                                                echo $groups[0]->name;
                                            ?>
                                            </td>
                                        <td><?php echo e($device->ipaddress); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('device.edit', ['id' => $device->id])); ?>" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn" href="<?php echo e(route('device.delete', ['id' => $device->id])); ?>" id="devicedelete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/device/index.blade.php ENDPATH**/ ?>