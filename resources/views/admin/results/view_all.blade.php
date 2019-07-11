@extends('admin.master')
@section('content')
<<div id="content">
  <div id="content-header">
    <h1>Results</h1>
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
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th style="background-color:#DDD9CD;"><h4>Student name</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Level</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Classroom</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Subject</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>Degree</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>full degree</h4></th>
                  <th style="background-color:#DDD9CD;"><h4>subject teacher</h4></th>
                </tr>
              </thead>
              <tbody>
                @foreach($result as $result)
                  <tr class="gradeX">
                    <td style="text-align:center;"><h5 style="font-size:20px;color:blue;">{{$result->student->user->name}}</h5></td>
                    <td style="text-align:center;"><h5>{{$result->level->name}}</h5></td>
                    <td style="text-align:center;"><h5>{{$result->classroom->name}}</h5></td>
                    <td style="text-align:center;"><h5>{{$result->subject->subject_code}}</h5></td>
                    <td style="text-align:center;background-color:<?php if($result->degree <(0.5 * $result->full_degree)){?>red;<?php } ?>#7bf759;"><h5>{{$result->degree}}</h5></td>
                    <td style="text-align:center;"><h5>{{$result->full_degree}}</h5></td>
                    <td style="text-align:center;"><h5>{{$result->teacher->user->name}}</h5></td>
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