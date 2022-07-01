@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Registration <i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">courses</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						@foreach ($course as $cou_items)
						<div class="col-md-4 ftco-animate">
							<div class="project-wrap">
								<a href="{{url('/course')}}/{{$cou_items->cour_id}}/{{$cou_items->alias}}" class="img" style="background-image: url(/assets/images/course/{{$cou_items->pic}})">
									<span class="price">Buy Now</span>
								</a>
								<div class="text p-4">
									<h3><a href="{{url('/course')}}/{{$cou_items->cour_id}}/{{$cou_items->alias}}">{{$cou_items->course_name}}</a></h3>
									<ul class="d-flex justify-content-between">
									<li><span class="flaticon-shower"></span>Price</li>
									<li><span class="flaticon-shower"></span>Offer</li>
									<li><span class="flaticon-shower"></span>Gst</li>
								</ul>
									<ul class="d-flex justify-content-between">
										<li><span class="fa fa-inr"></span><del>{{$cou_items->price}}</del></li>
										<li><span class="fa fa-inr"></span>{{$cou_items->offer_pice}}</li>
										<li><span class="fa fa-inr"></span>{{$cou_items->referal_pice}}</li>
									</ul>
							</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row mt-5">
						<div class="col-12 text-center">
							<div class="block-27">
								<li class="prev">{{$course->onEachSide(0)->links('pagination::bootstrap-4')}}</li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
