{{--Created by Beatific Angel    20222/3/23 9.00 am --}}
<tbody id="device_status" class="device_status">

@if($devices)
    @foreach($devices as $key => $device)

        <tr class="odd">
            <td><img src="{{asset('assets/img/monitor.svg')}}" alt=""></td>
            <td>{{$device->id}}</td>
            <td>{{$device->name}}</td>
            <td>
                <?php
                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                echo $groups[0]->name;
                ?>
            </td>
            <td>{{$device->ipaddress}}</td>
            <td>
                @if($devicestatus[$key] == 'alive')
                    <i class="fas fa-circle col-green me-2"></i>
                @else
                    <i class="fas fa-circle col-red me-2"></i>
                @endif
                {{$devicestatus[$key]}}</td>
            <td>Just Now</td>
        </tr>
    @endforeach
@endif
</tbody>
