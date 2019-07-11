@extends('admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>add new teacher</h1>
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
            <h5>add new teacher</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('updateAdminSubjectTeacher',[$subject->id])}}" name="add_subject_teacher" id="add_subject_teacher" novalidate="novalidate">
            @csrf 
              <div class="control-group">
                  <label class="control-label">select classroom</label>
                  <div class="controls">
                    <select class="js-example-basic-multiple" name="classroom">
                      @foreach($classrooms as $classroom)
                      <option value="{{$classroom->id}}">{{$classroom->name}}</option>
                      @endforeach
                    </select> 
                  </div>
              </div>
              <div class="control-group">
                  <label class="control-label">subject teacher</label>
                  <div class="controls">
                    <select class="js-example-basic-multiple" name="teacher">
                      @foreach($teachers as $teacher)
                      <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                      @endforeach
                    </select> 
                  </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add teacher" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection