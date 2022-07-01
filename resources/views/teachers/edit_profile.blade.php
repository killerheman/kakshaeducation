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
              <li class="breadcrumb-item"><a href="#">Teacher</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">{{$teac->teacher_name}}</a></li>
              
            </ol>
        </nav>
        <!-- /Breadcrumb -->
        <!-- first row for image and contact information -->
        @if(Session::has('flash_message'))
              <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
            @endif
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <!-- card for image and name -->
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{url('assets/images/teacher')}}/{{$teac->pic}}" alt="Student Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <a href="" class="btn" data-toggle="modal" data-target="#imgupdate">
                            <i class="ti-pencil-alt"></i>
                        </a>
                        <div class="mt-1">
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
                   <div class="card-header">
                        <h5>Personal Info</h5>
                   </div>
                    <div class="card-body">
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
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="" class="btn" data-toggle="modal" data-target="#personalinfo">
                                    <i class="ti-pencil-alt"></i>
                                </a>  
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
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <!-- <a href="" class="btn" data-toggle="modal" data-target="#addressdetails">
                                    <i class="ti-pencil-alt"></i>
                                </a>   -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- first col-md-6 end  -->
            <!-- personal details -->
            
        </div>
        <!-- row for address personal details end  -->
      
    </div>
    @include('teachers.edit_modal')
</div>
</div>
@endforeach
@endif
@endsection