@extends('admin.includes.master')
@section('title', 'KakshaEducation view Course')
@section('admin-container')
<div class="content-wrapper">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{url('/admin/teachers/list')}}">Course</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">{{$course[0]['course_name']}}</a></li>
          
        </ol>
    </nav>
    <!-- /Breadcrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha-Education Course: {{$course[0]['course_name']}}</h4>
            </div>
            <div>
                <a href="{{url('/admin/course/update')}}/{{$course[0]['cour_id']}}" class="btn btn-primary btn-icon-text btn-rounded" >
                  <i class="ti-pencil-alt btn-icon-prepend"></i>Update
                </a>
            </div>
          </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="main-body">
                <!-- first row for image and contact information -->
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <!-- card for image and name -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{url('/assets/images/course')}}/{{$course[0]['pic']}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <!-- / end img and name card -->
                    </div>
        
                    <!-- card contact information -->
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Short Description</h4>
                            </div>
                            <div class="card-body justify-content">
                                {!! $course[0]['short_desc'] !!}
                                <hr>
                            </div>
                        </div>
        
                    </div>
                    <!-- card contact information end -->
                </div>
                <!-- first row end for image and contact information -->
                <!-- row for address and personal details -->
                <div class="row gutters-sm">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h4>Long Description</h4> 
                            </div>
                            <div class="card-body justify-content">
                                {!! $course[0]['long_desc'] !!}
                            </div>
                        </div>
                    </div>
                    <!-- first col-md-6 end  -->
                    <!-- personal details -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{url('/assets/images/course')}}/{{$course[0]['pic_2']}}" alt="" class="img-fluid">
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row for address personal details end  -->
                <!-- row for qualification -->
        <div class="row gutters-sm">
            <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h4>Qualification Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Course Price</th>
                                    <th>Offer Price</th>
                                    <th>Referral Price</th>
                                    <th>Duration</th>
                                    <th>Video link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="fas fa-rupee-sign"> {{$course[0]['price']}}</span>
                                    </td>
                                    <td>
                                        <span class="fas fa-rupee-sign"> {{$course[0]['offer_pice']}}</span>
                                    </td>
                                    <td>
                                        <span class="fas fa-rupee-sign"> {{$course[0]['referal_pice']}}</span>
                                    </td>
                                    <td>
                                        <span class="fas fa-clock"> {{$course[0]['duration']}}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center p-5">
                                            <iframe frameborder="0" scrolling="no" src="https://www.youtube.com/embed/{{$course[0]['video_link']}}">
                                            </iframe>
                                       </div>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>

            </div>


            </div>
        </div>
        <!-- row for qualification end -->
                
            </div>
        </div>
    </section>
</div>
@endsection