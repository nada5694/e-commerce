@extends('layouts.website.master')

@section('title')
    Login
@endsection

@section('content')
<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input style="border-radius:5px" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input style="border-radius:5px" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 login">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <div class="pt-2">Don't have an account? <a href="{{ route('register') }}" style="color: #0e74d4;"><u>Register</u></a></div>
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-4 Social" style="margin-top: 5%; ">
                            <label>or Login with Your Social Media Account:</label>
                            <a href="{{ route('github-open-auth') }}" class="btn btn-github btn-user btn-block" style="background-color: black;">
                                <i class="fa-brands fa-github"></i>&nbsp;&nbsp;Login with GitHub
                            </a>

                            <a href="{{ route('facebook-open-auth') }}" class="btn btn-facebook btn-user btn-block" >
                                <i class="fab fa-facebook-f fa-fw"></i>&nbsp;&nbsp;Login with Facebook
                            </a>

                            <a href="{{ route('google-open-auth') }}" class="btn btn-google btn-user btn-block">
                                <i class="fa-brands fa-google"></i>&nbsp;&nbsp;Login with Google Account
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
