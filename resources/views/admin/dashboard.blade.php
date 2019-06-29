@extends('admin.master')
@section('content')
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Dashboard</a></div>
  </div>
<!--End-breadcrumbs-->
<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lg span3"> <a href=""> <i class="icon-user"></i>Teachers</a><i ><strong style="font-weight:bolder;font-size:20px;color:white;">{{$teachers->count()}}</strong></i></li>
        <li class="bg_lo span3"> <a href=""> <i class="icon-user"></i>Students</a><i ><strong style="font-weight:bolder;font-size:20px;color:white;">{{$students->count()}}</strong></i></li>
      </ul>
    </div>
<!--End-Action boxes-->    
  </div>
</div>
@endsection