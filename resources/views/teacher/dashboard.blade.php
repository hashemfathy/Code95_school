@extends('teacher.master')
@section('content')
<div id="app">
    <Myside></Myside>
    <div class="container" >
        <router-view></router-view>
    </div>
</div>
@endsection
