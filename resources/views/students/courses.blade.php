@extends('students.includes.master')
@section('main-container')    
<div class="content-wrapper">
    <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/student/dashboard')}}">Student</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">Courses</a></li>
    </ol>
  </nav>
  <!-- /Breadcrumb -->
  @if(Session::has('flash_message'))
              <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
            @endif
  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center p-2">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h3 class="mb-4">List of all Courses by KakshaEducation</h3>
            </div>
            @foreach ($course as $items)
            <div class="col-md-4 heading-section text-center ftco-animate">
                <div class="card">
                    <div class="card-body">
                        <div class="project-wrapp">
                            <a href="{{url('/student/course')}}/{{$items->cour_id}}/{{$items->alias}}" class="imgg" style="background-image: url(/assets/images/course/{{$items->pic}}); width:100%; height:110px;">
                          </a>
                          <div class="text p-4">
                              <h4><a href="{{url('/student/course')}}/{{$items->cour_id}}/{{$items->alias}}" >{{$items->course_name}}</a></h4>
                              @if(in_array($items->cour_id,$stcourse))
                              <h4 class="text-success">Already Purchase</h4>
                              @else
                       
                              <h4><a href="{{url('/student/course')}}/{{$items->cour_id}}/{{$items->alias}}" class="btn btn-info">Buy Now</a></h4>

                              @endif
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
  </section>
</div>
@endsection