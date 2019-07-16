@extends('master')
@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="login-box">
    <div class="box-header">
        <h3>Forgot Password ?</h3>
    </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
                <label for="email">{{ __('E-Mail Address') }}</label>
                <br/>
                <input id="email" class="col-md-8" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit">{{ __('Send Password Reset Link') }}</button>
        </form>
</div>
@endsection