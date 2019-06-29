@extends('admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Add student</h1>
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
            <h5>add student</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('add.student')}}" name="add_student" id="add_student" novalidate="novalidate">
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
                <label class="control-label">Select classroom</label>
                <div class="controls"style="width:15%;">
                  <select name="classroom_id">
                    @foreach($classroom as $classroom)
                    <option name="selection"value="{{$classroom->id}}">{{$classroom->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">student Name</label>
                <div class="controls">
                  <input type="text" value="{{ old('name') }}" name="name" id="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">student email</label>
                <div class="controls">
                  <input type="text" value="{{ old('email') }}" name="email" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">student password</label>
                <div class="controls">
                  <input type="text" name="password" id="password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">parent phone</label>
                <div class="controls">
                  <input type="text" value="{{ old('parent_phone') }}" name="parent_phone" id="parent _hone">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">address</label>
                <div class="controls">
                  <input style="width:300px;"name="address" value="{{ old('address') }}" id="address">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">photo</label>
                <div class="controls">
                  <input name="image"id="image"type="file" />
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="add student" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection