@extends('teacher.master')
@section('content')
<div id="app">
    <myside></myside>
    <div class="container" >
        <router-view></router-view>
    </div>
</div>
@endsection