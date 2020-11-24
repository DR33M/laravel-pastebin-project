@extends('layout.master')

@section('title', 'Change Password')

@section('content')
    <div class="page settings-page">

        <div class="content__title">{{ __('Change Password') }}</div>

        <form method="POST" class="left-form" action="{{ route('update-password') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn -big">
                        {{ __('Change Password') }}
                    </button>
                </div>
            </div>
        </form>
        <fieldset class="login-field">
            <legend>RELATED PAGES</legend>
            <a href="{{ route('settings') }}" class="btn -medium">{{ __('Settings') }}</a><br>
            <a href="#" class="btn -medium">{{ __('Delete Account') }}</a><br>
        </fieldset>
    </div>
@endsection
