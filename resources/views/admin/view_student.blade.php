@extends('admin.includes.master')
@section('admin-container')
@if($student != "" || $student != NULL)
@foreach($student as $stu)
<?php $name = $stu->student_name; ?>
@section('title',$name.' KakshaEducation')
<div class="content-wrapper">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('/admin/student/list')}}">Students</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)"></a>{{$stu->student_name}}</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    <!-- first row for image and contact information -->
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <!-- card for image and name -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{url('assets/images/student')}}/{{$stu->pic}}" alt="student Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <div class="mt-3">
                            <h4>{{$stu->student_name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / end img and name card -->
        </div>
        <!-- card contact information -->
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$stu->student_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$stu->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$stu->mobile}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Education Deatils</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$stu->education}}
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
        <!-- card contact information end -->
    </div>
</div>
@endforeach
@endif
@endsection