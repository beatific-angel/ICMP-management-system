@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('assets/img/pages/signin.jpg')}}" alt="sing up image"></figure>
                <a href="sign_up.html" class="signup-image-link">Create an account</a>
            </div>
            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                @if (session('error'))
                    <span class="text-danger"> {{ session('error') }}</span>
                @endif
                <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <div class="">
                            <input id="email" type="email" class="form-control input-height @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input id="password" type="password" class="form-control input-height @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="agree-term" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                            me</label>
                    </div>
                    <div class="form-group form-button">
                        <button class="btn btn-round btn-primary" name="signin" id="signin">Login</button>
                    </div>
                </form>
                <div class="social-login">
                    <a class="small" href="{{route('password.request')}}">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
