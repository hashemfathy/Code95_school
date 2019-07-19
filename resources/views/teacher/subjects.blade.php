@extends('teacher.master')
@section('content')
    <subjects :subjects={{$subjects}} :level_id={{$level_id}} :classroom_id={{$classroom_id}}></subjects>
@endsection
