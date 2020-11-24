@extends('layout.master')

@section('title', 'Login page')

@section('content')
    <div class="page login-page">

        <div class="content__title">{{ __('Login') }}</div>
        <div class="content__text">
            <div class="notice">
                To login you can use any of these social media accounts:
            </div>
        </div>
        <form method="POST" class="left-form" action="{{ route('login') }}">
            @csrf

            <div class="form-group row required">
                <label for="email" class="control-label col-sm-3">{{ __('E-Mail Address') }}: </label>
                <div class="col-sm-6 col-md-9 field-wrapper">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row required">
                <label for="password" class="control-label col-sm-3">{{ __('Password') }}: </label>
                <div class="col-sm-6 col-md-9 field-wrapper">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-9 offset-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn -big">
                        {{ __('Login') }}
                    </button>
                </div>
            </div>
        </form>
        <fieldset class="login-field">
            <legend>RELATED PAGES</legend>
            <a href="/register" class="btn -medium">Create New Account?</a><br>
            <a href="/password/reset" class="btn -medium">Forgot Password?</a><br>
        </fieldset>
    </div>
@endsection
