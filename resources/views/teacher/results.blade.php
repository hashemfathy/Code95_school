@extends('teacher.master')
@section('content')
@if (session()->has('flush_errors'))
<div class="alert alert-danger alert-block" style="margin:38px 220px;width:77.3%">
<button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
        {!! session()->get('flush_errors') !!}
    </strong>
</div>
@endif
    <results :level_id={{$level_id}} :classroom_id={{$classroom_id}} :subject_id={{$subject}}></results>
@endsection
