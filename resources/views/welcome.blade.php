@extends('master')
@section('content')
<div class="welcomeForm">
@if (session()->has('flush_message'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
        {!! session()->get('flush_message') !!}
    </strong>
</div>
@endif
    <div class="login">
        <h2 style="margin-left:190px;">Log In as ?</h2>
        <a class='btn btn-default' href="{{route('get.AdminLogin')}}" type="submit">Admin</a>
        <a class='btn btn-default' href="{{route('get.TeacherLogin')}}" type="submit">Teacher</a>
        <a class='btn btn-default' href="{{route('get.StudentLogin')}}" type="submit">Student</a>
    </div>
</div>        
@endsection