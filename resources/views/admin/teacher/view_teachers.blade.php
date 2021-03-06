@extends('admin.master')
@section('content')
<<div id="content">
  <div id="content-header">
    <h1>Teachers</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-plus-sign"></i> </span>
            <a type="submit" style="height:75%;" href="{{route('get.AddTeacher')}}" id="addteacherbutton"class="btn btn-primary">Add teacher</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Name</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>email</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>phone number</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>address</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Photo</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
              @foreach($teachers as $teacher)
                <tr class="gradeX">
                  <td style="text-align:center;"><h5 style="font-size:20px;color:blue;">{{$teacher->name}}</h5></td>
                  <td style="text-align:center;"><h5>{{$teacher->email}}</h5></td>
                  <td style="text-align:center;"><h5>{{$teacher->teacher->phone_number}}</h5></td>
                  <td style="text-align:center;"><h5>{{$teacher->address}}</h5></td>
                  <td style="text-align:center;"><h5><?php if($teacher->photo){?><img style="width:50px;" src="{{URL::to('img/backend_img/teachers/small/'.$teacher->photo)}}"><?php }else{ echo ("No photo");} ?> </h5></td>
                  <td style="text-align:center;"class="center"><a href="{{route('view.adminTeacher',[$teacher->id])}}" class="btn btn-success">View</a> <a href="{{route('get.editAdminTeacher',[$teacher->id])}}" class="btn btn-primary">Edit</a> <a onclick="return confirm('Are you sure ?')" href="{{route('delete.adminTeacher',[$teacher->id])}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection