@extends('admin.master')
@section('content')
<<div id="content">
  <div id="content-header">
    <h1>Subjects</h1>
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
            <a type="submit" style="height:75%;" href="{{route('get.AddSubject')}}" id="addsubjectbutton"class="btn btn-primary">Add Subject</a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Subject Code</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Level</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Teachers</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Action</h4></th>
                </tr>
              </thead>
              <tbody>
              @foreach($subjects as $subject)
                <tr class="gradeX">
                  <td style="text-align:center;"><h5 style="font-size:20px;color:blue;">{{$subject->subject_code}}</h5></td>
                  <td style="text-align:center;"><h5>{{$subject->level->name}}</h5></td>
                  <td ><h5>@foreach($subject->teachers as $teacher)<a style="width:200px;float:left;" href="{{route('view.adminTeacher',[$teacher->user_id])}}">{{$teacher->user->name}}</a> 
                  
                  <div style="text-align:center;">{{implode(' , ',$teacher->classrooms->where('level_id',$subject->level_id)->pluck('name')->toArray())}} <a style="float:right;"class="icon-trash"onclick="return confirm('Are you sure ?')" href="{{route('delete.SubjectTeacher',['teacher'=>$teacher->id,'subject'=>$subject->id])}}"></a></div>
                  
                  <br> @endforeach</h5></td>

                  <td style="text-align:center;"class="center"><a href="{{route('get.addAdminSubjectTeacher',[$subject->id])}}" class="btn btn-primary">add teacher</a> <a href="#myModal{{$subject->id}}" data-toggle="modal" class="btn btn-warning">edit subject code</a> <a onclick="return confirm('Are you sure ?')" href="{{route('delete.adminSubject',[$subject->id])}}" class="btn btn-danger">Delete</a></td>
                </tr>
                <!-- ----------edit subject code modal------- -->
                <div id="myModal{{$subject->id}}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h2>update Subject Code</h2>
                  </div>
                  <div class="modal-body">
                    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('updateSubjectCode',[$subject->id])}}" name="update_subjectCode" id="update_subjectCode" novalidate="novalidate">
                      @csrf 
                      <div class="control-group">
                        <label class="control-label">subject code</label>
                        <div class="controls">
                          <input type="text" value="{{$subject->subject_code}}" name="subject_code" id="subject_code">
                        </div>
                      </div>
                      <div class="form-actions">
                        <input type="submit" value="update" class="btn btn-success">
                      </div>
                    </form>
                  </div>
                </div>
                <!-- ------------------------------------ -->
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