@extends('admin.master')
@section('content')
<<div id="content">
  <div id="content-header">
    <h1>{{$student->name}}</h1>
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
            <h5 >{{$student->name}} Card</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span3">
                <table class="">
                  <tbody>
                    <tr><img style="" src="{{URL::to('img/backend_img/students/small/'.$student->photo)}}"></tr>
                  </tbody>
                </table>
              </div>
              <div class="span8">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                    <tr>
                      <td style="width:20%">Student name:</td>
                      <td ><strong>{{$student->name}}</strong></td>
                    </tr>
                    <tr>
                      <td>Classroom :</td>
                      <td><strong>{{$student->student->classroom->name}}</strong></td>
                    </tr>
                    <tr>
                      <td>Level:</td>
                      <td><strong>{{$student->student->level->name}}</strong></td>
                    </tr>
                  <td >student Address:</td>
                    <td ><br>
                      {{$student->address}}<br>
                      parent No: {{$student->student->parent_phone}} <br>
                      Email: {{$student->email}} </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> </span>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                <th style="background-color:#DDD9CD;"><h4>subject code</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>level</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>classroom</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Result/100</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>teacher</h4></th>
                </tr>
              </thead>
              <tbody>
              @foreach($student as $student)
                <tr class="gradeX">
                  <td style="text-align:center;"><h5 style="font-size:20px;color:blue;"></h5></td>
                  <td style="text-align:center;"><h5></h5></td>
                  <td style="text-align:center;"><h5></h5></td>
                  <td style="text-align:center;"><h5></h5></td>
                  <td style="text-align:center;"><h5></h5></td>
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