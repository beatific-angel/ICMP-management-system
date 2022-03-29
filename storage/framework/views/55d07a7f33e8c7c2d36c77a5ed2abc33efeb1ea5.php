
<tbody id="device_status" class="device_status">

<?php if($devices): ?>
    <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr class="odd">
            <td><img src="<?php echo e(asset('assets/img/monitor.svg')); ?>" alt=""></td>
            <td><?php echo e($device->id); ?></td>
            <td><?php echo e($device->name); ?></td>
            <td>
                <?php
                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                echo $groups[0]->name;
                ?>
            </td>
            <td><?php echo e($device->ipaddress); ?></td>
            <td>
                <?php if($devicestatus[$key] == 'alive'): ?>
                    <i class="fas fa-circle col-green me-2"></i>
                <?php else: ?>
                    <i class="fas fa-circle col-red me-2"></i>
                <?php endif; ?>
                <?php echo e($devicestatus[$key]); ?></td>
            <td>Just Now</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</tbody>
<?php /**PATH C:\xampp\htdocs\resources\views/status/status.blade.php ENDPATH**/ ?>