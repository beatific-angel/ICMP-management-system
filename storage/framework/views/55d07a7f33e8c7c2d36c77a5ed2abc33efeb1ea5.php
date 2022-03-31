
<tbody id="device_status" class="device_status">

<?php if($status_lists): ?>
    <?php $__currentLoopData = $status_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr class="odd">
            <td><img src="<?php echo e(asset('assets/img/monitor.svg')); ?>" alt=""></td>
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
            <td>Just Now</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</tbody>
<?php /**PATH C:\xampp\htdocs\resources\views/status/status.blade.php ENDPATH**/ ?>