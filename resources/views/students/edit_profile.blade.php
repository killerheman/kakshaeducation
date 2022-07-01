@extends('students.includes.master')
@section('main-container')  

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha Education Student</h4>
            </div>
          </div>
        </div>
      </div>

 <div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/student/dashboard')}}">Student</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">{{$student[0]['student_name']}}</a></li>
              
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
                        <img src="{{url('assets/images/student')}}/{{$student[0]['pic']}}" alt="Student Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <a href="" class="btn" data-toggle="modal" data-target="#imgupdate">
                            <i class="ti-pencil-alt"></i>
                        </a>
                        <div class="mt-1">
                        <h4>{{$student[0]['student_name']}}</h4>
                        <p class="text-secondary mb-1">{{$student[0]['email']}}</p>    
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
                                {{$student[0]['student_name']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['email']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['mobile']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Qualification</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['education']}}
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
            <!--Bank Details-->

            <div class="col-md-12">
                <div class="card mb-3">
                   <div class="card-header">
                        <h5>Bank Info</h5>
                   </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">A/C Holder Name :</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['acname']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">A/C Number : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['acnumber']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Branch : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['branch']}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">IFSC : </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student[0]['ifsc']}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="" class="btn" data-toggle="modal" data-target="#bankinfo">
                                    <i class="ti-pencil-alt"></i>
                                </a>  
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>

            <!--Bank details end-->
        </div>
        <!-- first row end for image and contact information -->
        <!-- row for address and personal details -->
        
        <!-- row for address personal details end  -->
      
    </div>
    @include('students.edit_modal')
</div>
</div>

@endsection