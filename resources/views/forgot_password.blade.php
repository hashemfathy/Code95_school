@extends('master')
@section('content')
<div class="login-box">
    <div class="box-header">
        <h3>Forgot Password ?</h3>
    </div>
    <form action="{{ route('password.email') }}" method="post">
    @csrf
        <label for="email"> Your Email address</label>
        <br/>
        <input class="col-md-8" required type="text" name="email" id="email">
        <br/>
        <button type="submit">Send reset email</button>
        </form>
        <br/>
</div>
@endsection