<center>
    <h1>Ticket Information</h1>
    <table class="table" >
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Device IP</th><th>Group</th><th>Issue</th><th>Created At</th></tr>
            <tr><td><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><?php echo e($user->phone); ?></td>
                <td><?php echo e($device->ipaddress); ?></td>
                <td><?php
                    $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                    echo $groups[0]->name;
                    ?></td>
                <td><?php echo e($ticket->message); ?></td>
                <td><?php echo e($ticket->created_at); ?></td>
            </tr>
</center>
<script>
    window.print();
</script>
<?php /**PATH C:\xampp\htdocs\resources\views/tickets/print.blade.php ENDPATH**/ ?>