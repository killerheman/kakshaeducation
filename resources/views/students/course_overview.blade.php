@extends('students.includes.master')
@section('main-container')
<div class="content-wrapper">
     <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/student/dashboard')}}">Student</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="{{url('/student/courses')}}">Course</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">{{$course[0]['course_name']}}</a></li>
    </ol>
  </nav>
  <!-- /Breadcrumb -->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                            Buy Now
                          </button>
                        <img class="d-block w-100" src="{{url('/assets/images/course')}}/{{$course[0]['pic']}}" alt="First slide" style="width: 100%; height:290px;">
                    </div>
                    <div class="carousel-item">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                            Buy Now
                          </button>
                        <img class="d-block w-100" src="{{url('/assets/images/course')}}/{{$course[0]['pic_2']}}" alt="Second slide" style="width: 100%; height:290px;">
                    </div>
                    </div>
                    {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="row gutters-sm mt-2">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Course Details</h5> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Course Price</th>
                                        <th>Offer Price</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="fas fa-rupee-sign"></span> <del>{{$course[0]['price'] }}</del></td>
                                        <td><span class="fas fa-rupee-sign"></span> {{$course[0]['offer_pice'] }}</td>
                                        <td>{{$course[0]['duration'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Short Description</h5> 
                    </div>
                    <div class="card-body">
                        {!! $course[0]['short_desc'] !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Long Description</h5> 
                    </div>
                    <div class="card-body">
                       {!! $course[0]['long_desc'] !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Course Overview</h5> 
                    </div>
                    <div class="card-body">
                       <!-- 21:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$course[0]['video_link']}}"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="{{url('/student/course/buy')}}" method="POST">
                @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" readonly value="{{$course[0]['cour_id']}}" name="course_id">
              <input type="hidden" readonly value="{{$course[0]['price']}}" name="course_amt">
              <input type="hidden" readonly value="{{$stu_id = Session::get('stu_id')}}" name="student_id">
              <div class="form-group">
                  <input type="text" class="form-control" name="reffer_by" placeholder="Have refferal id">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Buy</button>
            </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection