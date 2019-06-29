@extends('master')
@section('content')
@if (session()->has('flush_errors'))
<div class="alert alert-danger alert-block">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
        {!! session()->get('flush_errors') !!}
    </strong>
</div>
@endif
<div class="login-box">
    <div class="box-header">
        <h3>Log In</h3>
    </div>
    <form action="{{route('post.TeacherLogin')}}" method="post">
    @csrf
        <label for="email">Email</label>
        <br/>
        <input required type="text" name="email" id="email">
        <br/>
        <label for="password">Password</label>
        <br/>
        <input required type="password" name="password" id="password">
        <br/>
        <button type="submit">Sign In</button>
        </form>
        <br/>
        <a href="#"><p class="small">Forgot your password?</p></a> 
</div>
@endsection