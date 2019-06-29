@extends('admin.master')
@section('content')
<div id="content">
  <div id="content-header">
    <h1>Edit teacher</h1>
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
            <h5>edit teacher</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('updateAdminTeacher',[$teacher->id])}}" name="edit_teacher" id="edit_teacher" novalidate="novalidate">
            @csrf 
              <div class="control-group">
                <label class="control-label">teacher Name</label>
                <div class="controls">
                  <input type="text" value="{{$teacher->name}}" name="name" id="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">teacher email</label>
                <div class="controls">
                  <input type="text" value="{{$teacher->email}}" name="email" id="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">teacher password</label>
                <div class="controls">
                  <input type="text" name="password" id="password">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">phone number</label>
                <div class="controls">
                  <input type="text" value="{{$teacher->teacher->phone_number}}" name="phone_number" id="phone_number">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">address</label>
                <div class="controls">
                  <input style="width:300px;"name="address" value="{{$teacher->address}}" id="address">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">photo</label>
                <div class="controls">
                  <input name="image"id="image" value="{{$teacher->photo}}"type="file" />
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="update teacher" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection