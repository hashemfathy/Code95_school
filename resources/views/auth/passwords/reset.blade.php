@extends('master')
@section('content')
<div class="login-box">
    <div class="box-header">
        <h3>Forgot Password ?</h3>
    </div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="email">{{ __('E-Mail Address') }}</label>
        <br/>
        <input id="email" type="email" class="col-md-8 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <br/>
        <label for="password">{{ __('Password') }}</label>
        <br/>
        <input id="password" type="password" class="col-md-8 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <br/>
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <br/>
        <input id="password-confirm" type="password" class="col-md-8" name="password_confirmation" required autocomplete="new-password">
        <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
    </form>
</div>
@endsection
