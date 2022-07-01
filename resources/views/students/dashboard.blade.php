@extends('students.includes.master')
@section('main-container')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Kaksha Education Student: {{$student[0]['student_name']}}</h4>
        </div>
        @if(Session::has('flash_message'))
          <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
        @endif
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <a href="">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">MY REFERRALS</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $refferal->count() }}</h3>
              <i class="ti-gift icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <a href="">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">My Earning</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $totalrefamt }}</h3>
              <i class="ti-stats-up icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <a href="javascript:viod(0)">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">My Courses</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$mycourse->count()}}</h3>
              <i class="ti-book icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <a href="{{url('/student/courses')}}">
          <div class="card-body">
            <p class="card-title text-md-center text-xl-left">All Courses</p>
            <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
              <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$allcourse->count()}}</h3>
              <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
          <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">My Courses</span>
          <h2 class="mb-4">My picked courses</h2>
          </div>
          @foreach ($mycourse as $courses)
        <div class="col-md-4 ftco-animate card">
          <div class="project-wrapp card-body">
              <a href="{{url('/student/course')}}/{{$courses->cour_id}}/{{$courses->alias}}" class="imgg" style="background-image: url(/assets/images/course/{{$courses->pic}}); width:100%; height:110px;">
            </a>
            <div class="text p-4">
                <h5><a href="{{url('/student/course')}}/{{$courses->cour_id}}/{{$courses->alias}}" >{{$courses->course_name}}</a> <a href="{{ url('student/check') }}/{{ $courses->cour_id }}"  class="btn btn-info">Pay Now</a></h4>
            </div>
          </div>
        </div>
        @endforeach
        </div>
    </div>
 </section>
</div>
<!-- content-wrapper ends -->

@endsection



