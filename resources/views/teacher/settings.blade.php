@extends('teacher.master')
@section('content')
<div id="content" style="margin:38px 220px;width:80%" >
  <div id="content-header">
    <h1>teacher settings</h1>
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
              <h5>Update Password</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{ route('update.teacherPassword') }}" name="Tepassword_validate" id="Tepassword_validate" novalidate="novalidate">
                @csrf
                <div class="control-group">
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="current_Tepwd" id="current_Tepwd" />
                    <span id='chkTepwd'></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_Tepwd" id="new_Tepwd" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm password</label>
                  <div class="controls">
                    <input type="password" name="confirm_Tepwd" id="confirm_Tepwd" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="update" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection