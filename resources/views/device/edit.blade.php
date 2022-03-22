{{--Created by Beatific Angel    20222/3/22 9.00 am --}}
@extends('layouts.app')

@section('title', 'Edit Device')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Update Device</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('device.index')}}">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Update Device</li>
                </ol>
            </div>
        </div>
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="{{ route('device.update') }}" class="form-horizontal"
                      id="device_form" enctype="multipart/form-data"
                      method="post">
                    {{ csrf_field() }}
                    <div class="card-box">
                        <div class="card-head">
                            <header>Update Device</header>
                            <button id="panel-button"
                                    class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here
                                </li>
                            </ul>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="devicename" name="devicename" value="{{$device->name}}">
                                    <label class="mdl-textfield__label">Device Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <?php
                                    $selected_group = DB::select(DB::raw('select * from groups where id = ' . $device->groupid));
                                    ?>
                                    <input class="mdl-textfield__input" type="text" id="groupname" name="groupname" readonly value="<?php echo $selected_group[0]->name; ?>"
                                           tabIndex="-1">
                                    <label for="groupname" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="groupname" class="mdl-textfield__label">Select Group</label>
                                    <ul data-mdl-for="groupname" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        @foreach($groups as $group)
                                            <li class="mdl-menu__item" data-val="{{$group->id}}" >{{$group->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="ipaddress" name="ipaddress" value="{{$device->ipaddress}}">
                                    <label class="mdl-textfield__label">IP Address</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea class="mdl-textfield__input" rows="3" id="devicedescription" name="devicedescription">{{$device->description}}</textarea>
                                    <label class="mdl-textfield__label" for="text7">Device Description</label>
                                </div>
                            </div>
                            <input class="mdl-textfield__input" type="hidden" id="deviceid" name="deviceid" value="{{$device->id}}">
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">
                                    Update
                                </button>
                                <a href="{{route('device.index')}}"
                                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
