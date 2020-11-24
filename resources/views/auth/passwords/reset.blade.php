@extends('layout.master')

@section('title', 'Reset page')

@section('content')
<div class="page reset-page">

    <div class="content__title">{{ __('Reset Password') }}</div>

    <form method="POST" class="left-form" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row required">
            <label for="email" class="control-label col-sm-3">{{ __('E-Mail Address') }}: </label>
            <div class="col-sm-6 col-md-9 field-wrapper">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $email) }}" required autocomplete="email" autofocus>
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
        <div class="form-group row required">
            <label for="password-confirm" class="control-label col-sm-3">{{ __('Confirm Password') }}: </label>

            <div class="col-sm-6 col-md-9 field-wrapper">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 col-md-9 offset-md-3">
                <button type="submit" class="btn -big">
                    {{ __('Reset Password') }}
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
