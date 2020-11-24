@extends('layout.master')

@section('title', 'Profile settings')

@section('content')
    <div class="page settings-page">

        <div class="content__title">{{ __('My Profile Settings') }}</div>

        <form method="POST" class="left-form" action="{{ route('update-settings') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form_frame row">
                <div class="form_left col-sm-3">
                    {{ __('Name') }}:
                </div>
                <div class="form_right col-sm-6 col-md-9">
                    <span>{{ $user->name }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="control-label col-sm-3">{{ __('E-Mail Address') }}: </label>
                <div class="col-sm-6 col-md-9 field-wrapper">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="form_frame row">
                <div class="form_left col-sm-3">
                    {{ __('Email Status') }}:
                </div>
                <div class="form_right col-sm-6 col-md-9">
                    <span style="color: {{ $user->email_verified_at ? 'green' : 'red' }}">{{ $user->email_verified_at ? __('Verified!') : __('Not Verified!') }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="avatar" class="control-label col-sm-3">{{ __('Avatar') }}: </label>

                <div class="col-sm-6 col-md-9 field-wrapper">
                    <img src="/{{ $user->avatar }}" alt="">
                    <input id="avatar" class="@error('avatar') is-invalid @enderror" type="file" name="avatar">

                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-5">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn -big mt-3">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
        <fieldset class="login-field">
            <legend>RELATED PAGES</legend>
            <a href="{{ route('change-password') }}" class="btn -medium">{{ __('Change Password') }}</a><br>
            <a href="#" class="btn -medium">{{ __('Delete Account') }}</a><br>
        </fieldset>
    </div>
@endsection
