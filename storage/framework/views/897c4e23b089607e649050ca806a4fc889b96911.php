<?php $__env->startSection('title', 'ICMP Device status'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Devices Status</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('device.index')); ?>">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Devices status</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Devices Status</header>
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
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="example4">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Device Name</th>
                                <th>Group Name</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <th>Up %</th>
                                <th>Down %</th>
                                <th>Last Seen</th>
                            </tr>
                            </thead>
                            <tbody id="device_status" class="device_status">

                            <?php if($status_lists): ?>
                                <?php $__currentLoopData = $status_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr class="odd">
                                        <td><i data-feather="monitor"></i></td>
                                        <td><?php echo e($device->deviceid); ?></td>
                                        <td><?php echo e($device->devicename); ?></td>
                                        <td>
                                            <?php
                                                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                                                echo $groups[0]->name;
                                            ?>
                                            </td>
                                        <td><?php echo e($device->ipaddress); ?></td>
                                        <td>
                                            <?php if($device->status == 'alive'): ?>
                                                <i class="fas fa-circle col-green me-2"></i>
                                            <?php else: ?>
                                                <i class="fas fa-circle col-red me-2"></i>
                                            <?php endif; ?>
                                            <?php echo e($device->status); ?></td>
                                        <td><?php
                                            $allcnt = $device->access_count;$up_count = $device->up_count;$down_count = $device->down_count;
                                            $up_per = $up_count/$allcnt*100;
                                            $down_per = $down_count/$allcnt*100;
                                            echo $up_per. "%";
                                            ?></td>
                                        <td><?php
                                            echo $down_per. "%";
                                            ?></td>
                                        <td><?php echo e($device->updated_at); ?></td>
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
<script>
    var ajax_call = function () {
        $.ajax({
            url: '/getdevicestatus',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                console.log(response);
                document.getElementById('device_status').innerHTML = response.get_status;
            }
        });
    };
    var interval = 20000; // where X is your every X minutes
    setInterval(ajax_call, interval);
</script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/status/index.blade.php ENDPATH**/ ?>