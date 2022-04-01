{{--Created by Beatific Angel    2022/3/25 11.00 am --}}
@extends('layouts.app')

@section('title', 'Edit Ticket')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Ticket</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="{{route('ticket.index')}}">Ticket</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Ticket</li>
                </ol>
            </div>
        </div>
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Edit Ticket</header>
                        <a  href="<?php echo e(route('ticket.print_ticket')); ?>" id="panel-print" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                            data-upgraded=",MaterialButton"
                            onclick="event.preventDefault(); document.getElementById('ticket_print_form').submit();">
                            <i class="material-icons">print</i>
                        </a>
                        <form id="ticket_print_form" action="{{ route('ticket.print_ticket') }}" method="POST" style="display: none;">
                            <input id="ticket_id_print" type="text" class="form-control" name="ticket_id_print"
                                   value="{{ $ticket->ticket_id }}" >
                            <input id="customer_id_print" type="text" class="form-control" name="customer_id_print"
                                   value="{{ $ticket->customer_id }}" >
                            <input id="device_id_print" type="text" class="form-control" name="device_id_print"
                                   value="{{ $ticket->device_id }}" >
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal offset-sm-2" id="ticket_form" action="{{route('ticket.update')}}" role="form" method="POST">
                            {!! csrf_field() !!}

                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label form-control-label">Title</label>
                                <div class="col-md-7">
                                    <input id="title" type="text" class="form-control" name="title"
                                           value="{{ $ticket->title }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_id" class="col-md-2 col-form-label form-control-label">Selected Customer</label>

                                <div class="col-md-7">
                                    <?php
                                    $selectedcustomer = DB::select(DB::raw('select * from customers where id = ' . $ticket->customer_id));
                                    ?>
                                    <select id="user_id" type="category" class="form-control" name="user_id" readonly>
                                        <option value="{{ $ticket->customer_id }}">{{ $selectedcustomer[0]->short_name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row {{ $errors->has('device_id') ? ' has-error' : '' }}">
                                <label for="device_id" class="col-md-2 col-form-label form-control-label">Select Device</label>

                                <div class="col-md-7">
                                    <?php
                                    $selecteddevice = DB::select(DB::raw('select * from devices where id = ' . $ticket->device_id));
                                    ?>
                                    <select id="device_id" type="category" class="form-control" name="device_id" readonly>
                                        <option value="{{ $ticket->device_id }}">{{ $selecteddevice[0]->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-2 col-form-label form-control-label">Status</label>
                                <div class="col-md-7">
                                    <select id="status" type="" class="form-control" name="status">
                                        <option value="">Select Status</option>
                                        <option value="open"  {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                        <option value="in-progress" {{ $ticket->status == 'in-progress' ? 'selected' : '' }}>In-Progress</option>
                                        <option value="ready-to-bill" {{ $ticket->status == 'ready-to-bill' ? 'selected' : '' }}>Ready-to-Bill</option>
                                        <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="message" class="col-md-2 col-form-label form-control-label">Message</label>

                                <div class="col-md-7">
                                    <textarea rows="5" id="message" class="form-control" name="message">{{$ticket->message}}</textarea>
                                </div>
                            </div>
                            <input id="ticket_id" type="hidden" class="form-control" name="ticket_id"
                                   value="{{ $ticket->ticket_id }}" readonly>

                            <div class="form-group row col-12">
                                <div class="col-md-4 col-6" style="text-align: right">
                                    <button type="submit" class="btn btn-primary" >
                                        <i class="fas fa-ticket-alt"></i> Update Ticket
                                    </button>
                                </div>
                                <div class="col-md-4 col-3">
                                    <a href="{{ route('ticket.index') }}" class="btn btn-secondary-alt">Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
<style>
    .btn-primary {
        background: #07B9F9;
        box-shadow: 1px 1px 30px 0 rgb(0 0 0 / 20%);
        text-decoration: none;
        color: #fff;
        border-radius: 65px;
        padding: 10px 45px;
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
    }
    .btn-secondary {
        box-shadow: 1px 1px 30px 0 rgb(0 0 0 / 20%);
        text-decoration: none;
        border-radius: 65px;
        padding: 10px 45px;
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
    }
    @media (max-width: 768px) {
        .btn-primary {
            padding: 10px 20px;
        }
        .btn-secondary {
            padding: 10px 15px;
        }
    }
</style>
@endsection
