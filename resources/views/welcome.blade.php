@extends('master')
@section('content')
<div class="welcomeForm">
    <div class="login">
        <h2 style="margin-left:190px;">Log In as ?</h2>
        <a class='btn btn-default' href="{{route('get.AdminLogin')}}" type="submit">Admin</a>
        <a class='btn btn-default' href="{{route('get.TeacherLogin')}}" type="submit">Teacher</a>
        <a class='btn btn-default' href="{{route('get.StudentLogin')}}" type="submit">Student</a>
    </div>
</div>        
@endsection