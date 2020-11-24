@extends('layout.master')

@section('title', 'Email')

@section('content')
<div class="page email-page">

    <div class="content__title">{{ __('Reset Password') }}</div>
    <div class="content__text">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form method="POST" class="left-form" action="{{ route('password.email') }}">
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

        <div class="form-group row">
            <div class="col-md-6 offset-md-3">
                <button type="submit" class="btn -big">
                    {{ __('Send Password Reset Link') }}
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

