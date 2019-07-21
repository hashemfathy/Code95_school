@extends('admin.master')
@section('content')
<<div id="content">
  <div id="content-header">
    <h1>{{$teacher->user->name}}</h1>
  </div>
  @if (session()->has('flush_errors'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{!! session()->get('flush_errors') !!}</strong>
  </div>
  @endif
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
            <h5 >{{$teacher->user->name}} Card</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span3">
                <table class="">
                  <tbody>
                    <tr><img style="" src="{{URL::to('img/backend_img/teachers/small/'.$teacher->user->photo)}}"></tr>
                  </tbody>
                </table>
              </div>
              <div class="span8">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                      <tr>
                        <td style="width:20%">teacher name:</td>
                        <td ><strong>{{$teacher->user->name}}</strong></td>
                      </tr>
                      <td >teacher Address:</td>
                      <td ><br>
                        {{$teacher->user->address}}<br>
                        parent No: {{$teacher->phone_number}} <br>
                        Email: {{$teacher->user->email}} </td>
                    </tr>
                    </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection