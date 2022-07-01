@extends('admin.includes.master')
@section('admin-container')
@if($teacher != "" || $teacher != NULL)
@foreach($teacher as $teac)
<?php $name = $teac->teacher_name; ?>
@section('title',$name.' KakshaEducation')
<div class="content-wrapper">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('/admin/teachers/list')}}">Teacher</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)"></a>{{$teac->teacher_name}}</li>
          
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    <!-- first row for image and contact information -->
    <div class="row gutters-sm">
        <div class="col-12">
            @if(Session::has('flash_message'))
            <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
            @endif
        </div>
        <div class="col-md-4 mb-3">
            <!-- card for image and name -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{url('assets/images/teacher')}}/{{$teac->pic}}" alt="Teacher Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <div class="mt-3">
                            <h4>{{$teac->teacher_name}}</h4>
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
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a class="btn btn-info " href="{{url('/admin/teacher/update')}}/{{$teac->teach_id}}">Edit Profile</a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->teacher_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->mobile}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        {{$teac->address}}
                        </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
        <!-- card contact information end -->
    </div>
    <!-- row for address and personal details -->
    <div class="row gutters-sm">
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Address Details</h5> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Country:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->country_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">State:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->state_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">City:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->city_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Address:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->address}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Pin Code:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$teac->pin_code}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- first col-md-6 end  -->
        <!-- personal details -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Qualification Details</h4> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="mb-0">Highest Qualifiaction:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{$teac->highest_quali}}
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                        <h6 class="mb-0">Curriculum Vitae:</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            <a href="{{url('assets/cv/teacher')}}/{{$teac->cv}}" class="btn btn-info" target="_blank" download=""><i class="fas fa-file-download"></i></a>
                            
                        </div>
                    </div>
                    <hr>
                </div>

            </div>
        </div>
    </div>
    <!-- row for address personal details end  -->
    {{-- row for assign course --}}
    <div class="row gutters-sm">
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Teacher's Assigned Courses</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Course Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($course_teacher as $items)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$items->course_name}}</td>
                                    <td>
                                        <a href="{{url('/admin/teacher/course/assigned/delete')}}/{{$items->id}}/{{$teac->teach_id}}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Teacher's Assigned Courses</h5>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/teachers/assign/course')}}" class="needs-validation" id="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" readonly value="{{$teac->teach_id}}" name="teacher_id">
                            <div class="form-group col-md-12">
                              <label for="course">Select Course:</label>
                              <select class="form-control" name="course" id="course">
                                <option selected disabled value="">--Select Course--</option>
                                @foreach ($course as $item)
                                <option value="{{$item->cour_id}}">{{$item->course_name}}</option>
                                @endforeach
                              </select>
                              @if($errors->has('course'))
                              <span class="text-danger">{{$errors->first('course')}}</span>
                              @endif
                            </div>
                          <div class="form-group col-md-12">
                            <input type="submit" class="form-control btn btn-info" value="Assign Course">
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection