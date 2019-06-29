@extends('admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Edit subject</h1>
  </div>
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
      <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>
              {!! session()->get('flush_errors') !!}
          </strong>
      </div>
    @endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>edit subject</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('updateAdminSubject',[$subject->id])}}" name="edit_subject" id="edit_subject" novalidate="novalidate">
            @csrf 
              <div class="control-group">
                <label class="control-label">Select Level</label>
                <div class="controls"style="width:15%;">
                  <select name="level_id">
                    @foreach($level as $level)
                    <option name="selection"value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">subject code</label>
                <div class="controls">
                  <input type="text" value="{{$subject->subject_code}}" name="subject_code" id="subject_code">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">subject teachers</label>
                <div class="controls">
                  <input type="text" value="" name="teachers" id="teachers">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="update subject" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection