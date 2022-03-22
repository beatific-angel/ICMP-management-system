{{--Created by Beatific Angel    20222/3/22 03.30 pm --}}
@extends('layouts.app')

@section('title', 'Users List')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Users List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('users.index')}}">Users</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Users List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Users List</header>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('users.create')}}" id="addRow"
                                       class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table
                            class="table table-striped table-bordered table-hover table-checkable order-column valign-middle"
                            id="user_lists">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Mobile </th>
                                <th> Email </th>
                                <th> Create Date </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody id="user_list" class="user_list">
                            @foreach($users as $user)
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        <img src="../assets/img/admin.png" alt="">
                                    </td>
                                    <td class="left">{{$user->id}}</td>
                                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                                    <td><a href="tel:{{$user->phone}}">
                                            {{$user->phone}} </a></td>
                                    <td><a href="mailto:{{$user->email}}">
                                            {{$user->email}} </a></td>
                                    <td class="left">{{$user->created_at}}</td>
                                    <td>
                                        <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="tblEditBtn">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="tblDelBtn">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
