
<tbody id="home_group_status">
<?php if($groups): ?>
    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="odd">
            <td><?php echo e($group->id); ?></td>
            <td><?php echo e($group->name); ?></td>
            <td><?php echo e($devicelists[$key]); ?></td>
            <td class="bg-success"><?php echo e($uplists[$key]); ?></td>
            <td class="bg-danger"><?php echo e($downlists[$key]); ?></td>
            <td>
                <a href="<?php echo e(route('group.edit', ['id' => $group->id])); ?>" class="tblEditBtn">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="tblDelBtn" href="<?php echo e(route('group.delete', ['id' => $group->id])); ?>" id="groupdelete">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</tbody>
<?php /**PATH C:\xampp\htdocs\resources\views/status/groupstatus.blade.php ENDPATH**/ ?>