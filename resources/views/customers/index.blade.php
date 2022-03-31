{{--Created by Beatific Angel    20222/3/22 03.30 pm --}}
@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Customer List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('customers.index')}}">Customers</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Customer List</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>All Customer List</header>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="{{route('customers.create')}}" id="addRow"
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
                                <th> Address </th>
                                <th> Create Date </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody id="customer_list" class="customer_list">
                            @foreach($customers as $customer)
                                <tr class="odd gradeX">
                                    <td class="patient-img">
                                        <img src="../assets/img/admin.png" alt="">
                                    </td>
                                    <td class="left">{{$customer->id}}</td>
                                    <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                    <td><a href="tel:{{$customer->phone}}">
                                            {{$customer->phone}} </a></td>
                                    <td><a href="mailto:{{$customer->email}}">
                                            {{$customer->email}} </a></td>
                                    <td class="left">{{$customer->address}}</td>
                                    <td class="left">{{$customer->created_at}}</td>
                                    <td>
                                        <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="tblEditBtn">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{ route('customers.delete', ['id' => $customer->id]) }}" class="tblDelBtn">
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
