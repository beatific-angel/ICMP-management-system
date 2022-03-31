<center>
    <h1>Ticket Information</h1>
    <table class="table" >
        <tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th> IP</th><th>Group</th><th>Issue</th><th>Created At</th></tr>
            <tr><td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $device->ipaddress }}</td>
                <td><?php
                    $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                    echo $groups[0]->name;
                    ?></td>
                <td>{{ $ticket->message }}</td>
                <td>{{ $ticket->created_at }}</td>
            </tr>
</center>
<script>
    window.print();
</script>
