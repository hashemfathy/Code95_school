@extends('master')
@section('content')
<div class="error">
    @if ($errors->any())
    <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    </div>
    @endif         
</div>
@if (session()->has('flush_errors'))
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
        {!! session()->get('flush_errors') !!}
    </strong>
</div>
@endif
<div class="row">
    <div class="col-sm-5"> 
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Login to our site</h3>
                    <p>Enter Email and password to log in:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{route('post.StudentLogin')}}" method="post" class="login-form">
                @csrf
                    <div class="form-group">
                        <label class="sr-only" for="form-Email">Email</label>
                        <input required type="text" name="email" placeholder="Email..." class="form-Email form-control" id="form-Email">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input required type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                    </div>
                    <button type="submit" class="btn">Sign in!</button>
                </form>
                <br/>
                <a href="{{route('password.request')}}"><p class="small">Forgot your password?</p></a>
            </div>
        </div>   
    </div>
    <div class="col-sm-1 middle-border"></div>
    <div class="col-sm-1"></div> 
     
    <div class="col-sm-5">         
        <div class="form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{route('student.register')}}" method="post" id="register" class="registration-form">
                @csrf
                    <div class="form-group">
                        <label class="sr-only" for="form-name">name</label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="name..." class="form-name form-control" id="form-name" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" value="{{ old('email') }}" name="email" placeholder="Email..." class="form-email form-control" id="form-email"required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password"required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Confirm password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm password..." class="form-password form-control" id="form-password"required>
                        <span id='message'></span>
                    </div>
                    <button type="submit" class="btn">Sign me up!</button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection