@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('/assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="{{url('/courses')}}">Course <i class="fa fa-chevron-right"></i></a></span></p>
                <h1 class="mb-0 bread">{{$course[0]['course_name']}}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-5 ftco-animate item-center p-4">
                    <h1>{{$course[0]['course_name']}}</h1>
                    <img src="{{url('assets/images/course')}}/{{$course[0]['pic']}}" alt="" class="img-fluid shadow bg-white rounded">
                </div>
                <div class="col-lg-7 ftco-animate p-4">
                    <div class="justify-content">
                        <p>{!! $course[0]['short_desc'] !!}</p>
                    </div>
                    <div class="table-responsive-md table-responsive-sm table-responsive-lg mr-3">
                        <table class="table align-middle">
                            <thead>
                                <tr scope="row">
                                    <th>Course Price</th>
                                    <th>Offer Price</th>
                                    <th>Referral Price</th>
                                    <th>Course Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i> <span>{{$course[0]['price']}}</span></td>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i> <span>{{$course[0]['offer_pice']}}</span></td>
                                    <td><i class="fa fa-inr" aria-hidden="true"></i> <span>{{$course[0]['referal_pice']}}</span></td>
                                    <td><i class="fa fa-clock-o" aria-hidden="true"></i> <span>{{$course[0]['duration']}}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><a href="javascript:void(0)" class="btn btn-secondary">Enroll Now</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 ftco-animate p-5">
                    <p>{!! $course[0]['long_desc'] !!}</p>
                    <a href="javascript:void(0)" class="btn btn-secondary">Enroll Now</a>
                </div>
                <div class="col-lg-5 ftco-animate  item-center p-5">
                    
                    <img src="{{url('assets/images/course')}}/{{$course[0]['pic_2']}}" alt="" class="img-fluid shadow bg-white rounded">
                </div> 
                <div class="col-lg-9 d-flex align-items-center p-5">
                    <iframe frameborder="0" scrolling="no" src="https://www.youtube.com/embed/{{$course[0]['video_link']}}" style="width: 100%; height:350px;" >
                    </iframe>
               </div>
                <div class="col-lg-3 d-flex align-items-center p-5">
                    <a href="javascript:void(0)" class="btn btn-secondary">Enroll Now</a>
                </div>
               
            </div>
        </div>
    </div>
</section> 
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection

