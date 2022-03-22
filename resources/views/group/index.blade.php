@extends('layouts.app')

@section('title', 'Permissions')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Group List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Group</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Group List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Group List</header>
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
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('group.create')}}" id="addRow" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="example4">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Group Name</th>
                                <th>Group Owner</th>
                                <th>Device Lists</th>
                                <th>Up Devices</th>
                                <th>Down Devices</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($groups)
                                @foreach($groups as $group)
                                    <tr class="odd">
                                <td>{{$group->id}}</td>
                                <td>{{$group->name}}</td>
                                <td>{{$group->owner}}</td>
                                <td>+123 4567890</td>
                                <td>test@example.com</td>
                                <td>1998</td>
                                <td>
                                    <a href="{{ route('group.edit', ['id' => $group->id]) }}" class="tblEditBtn">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="tblDelBtn" href="/group/delete?id={{$group->id}}" id="groupdelete">
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

