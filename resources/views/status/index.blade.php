{{--Created by Beatific Angel    20222/3/22 9.00 am --}}
@extends('layouts.app')

@section('title', 'Device Status')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Device List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('device.index')}}">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
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
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="example4">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Device Name</th>
                                <th>Group Name</th>
                                <th>IP Address</th>
                                <th>Status</th>
                                <th>Last Seen</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="device_status" class="device_status">
                            @if($devicestatus)
                                @foreach($devicestatus as $status)
                                    <tr class="odd">
                                        <td>{{$status->id}}</td>
                                        <td>{{$status->name}}</td>
                                        <td>
                                            <?php
                                                $groups = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                                                echo $groups[0]->name;
                                            ?>
                                            </td>
                                        <td>{{$status->ipaddress}}</td>
                                        <td></td>
                                        <td>{{$status->last_seen}}</td>
                                        <td>
                                            <a href="{{ route('device.edit', ['id' => $device->id]) }}" class="tblEditBtn">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a class="tblDelBtn" href="{{ route('device.delete', ['id' => $device->id]) }}" id="devicedelete">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
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
