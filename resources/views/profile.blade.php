{{--Created by Beatific Angel    20222/3/21 11.00 am --}}
@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Profile</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="{{route('home')}}">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                </ol>
            </div>
        </div>
        {{-- Alert Messages --}}
        @include('common.alert')
        <div class="row">
            <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Basic Information</header>
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
                            <div class="row">
                                <div class="col-md-3 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img class="rounded-circle mt-5" width="150px" src="{{ asset('assets/img/admin.png') }}">
                                        <span class="font-weight-bold">{{ auth()->user()->username }}</span>
                                        <span class="text-black-50"><i>Role:Admin</i></span>
                                        <span class="text-black-50">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                                <div class="col-md-9 border-right">
                                    <form action="{{ route('profile.update') }}" method="POST">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                    <label class="mdl-textfield__label">First Name</label>
                                                    <input type="text" class="mdl-textfield__input @error('firstname') is-invalid @enderror"
                                                           name="first_name" placeholder="First Name"
                                                           value="{{ old('first_name') ? old('first_name') : auth()->user()->firstname }}">

                                                    @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                    <label class="mdl-textfield__label">Last Name</label>
                                                    <input type="text" name="last_name"
                                                           class="mdl-textfield__input @error('lastname') is-invalid @enderror"
                                                           value="{{ old('last_name') ? old('last_name') : auth()->user()->lastname }}"
                                                           placeholder="Last Name">

                                                    @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                    <label class="mdl-textfield__label">Phone</label>
                                                    <input type="text" class="mdl-textfield__input @error('phone') is-invalid @enderror" name="mobile_number"
                                                           value="{{ old('phone') ? old('phone') : auth()->user()->phone }}"
                                                           placeholder="Mobile Number">
                                                    @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-12 p-t-20 text-center">
                                            <button type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Update Profile</button>
                                        </div>
                                    </form>

                                    <hr>
                                    {{-- Change Password --}}
                                    <form action="{{ route('profile.change-password') }}" method="POST">
                                        @csrf
                                        <div class="row mt-2">
                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

                                                <input type="password" name="current_password" class="mdl-textfield__input @error('current_password') is-invalid @enderror" placeholder="Current Password" required>
                                                @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                    <label class="mdl-textfield__label">Current Password</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

                                                <input type="password" name="new_password" class="mdl-textfield__input @error('new_password') is-invalid @enderror" required placeholder="New Password">
                                                @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                    <label class="mdl-textfield__label">New Password</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 p-t-20">
                                                <div
                                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">

                                                <input type="password" name="new_confirm_password" class="mdl-textfield__input @error('new_confirm_password') is-invalid @enderror" required placeholder="Confirm Password">
                                                @error('new_confirm_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                    <label class="mdl-textfield__label">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 p-t-20 text-center">
                                            <button type="submit"
                                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
@endsection

