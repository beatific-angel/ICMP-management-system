{{--Created by Beatific Angel    20222/3/23 9.00 am --}}
<tbody id="device_status" class="device_status">

@if($status_lists)
    @foreach($status_lists as $key => $device)

        <tr class="odd">
            <td><img src="{{asset('assets/img/monitor.svg')}}" alt=""></td>
            <td>{{$device->deviceid}}</td>
            <td>{{$device->devicename}}</td>
            <td>
                <?php
                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                echo $groups[0]->name;
                ?>
            </td>
            <td>{{$device->ipaddress}}</td>
            <td>
                @if($device->status == 'alive')
                    <i class="fas fa-circle col-green me-2"></i>
                @else
                    <i class="fas fa-circle col-red me-2"></i>
                @endif
                {{$device->status}}</td>
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
    @endforeach
@endif
</tbody>
