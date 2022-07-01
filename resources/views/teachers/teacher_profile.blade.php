@extends('teachers.includes.master')
@section('main-container')  
@if($teacher != "" || $teacher != NULL)
@foreach($teacher as $teac)
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha Education Teacher</h4>
            </div>
          </div>
        </div>
      </div>

 <div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/profile')}}">Teacher</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/profile')}}">{{$teac->teacher_name}}</a></li>
              
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
                        <img src="{{url('assets/images/teacher')}}/{{$teac->pic}}" alt="Student Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <div class="mt-3">
                        <h4>{{$teac->teacher_name}}</h4>
                        <p class="text-secondary mb-1">{{$teac->email}}</p>
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
                                <a class="btn btn-info " href="{{url('/teacher/edit_profile')}}">Edit Profile</a>
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
        <!-- first row end for image and contact information -->
        <!-- row for address and personal details -->
        <div class="row gutters-sm">
            <div class="col-md-12">
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
            
        </div>
        <!-- row for address personal details end  -->
        <!-- row for qualification -->
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
        <!-- row for qualification end -->
    </div>
</div>
</div>
@endforeach
@endif

@endsection