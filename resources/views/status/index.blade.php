{{--Created by Beatific Angel    20222/3/23 9.00 am --}}
@extends('layouts.app')

@section('title', 'ICMP Device status')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Devices Status</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('device.index')}}">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                                <th>Last Seen</th>
                            </tr>
                            </thead>
                            <tbody id="device_status" class="device_status">

                            @if($status_lists)
                                @foreach($status_lists as $key => $device)

                                    <tr class="odd">
                                        <td><i data-feather="monitor"></i></td>
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
                                        <td>{{$device->updated_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
