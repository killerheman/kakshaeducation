@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Login<i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Login</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="col-md-12">
                    @if(Session::has('flash_message'))
                        <div class="alert {!! Session('status') !!}" role="alert">{!! Session('flash_message') !!}</div>
                    @endif
                </div>
                @if(Session::has('error'))
                <div class="alert alert-danger mt-2 mb-2 text-center">
                    <span class="">
				        {{Session::get('error')}}
				    </span>
                </div>
				@endif
            </div>
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-6 col-md-6 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 d-flex align-self-stretch ftco-animate">
                                        <img src="assets/images/logn.png" style="height: 100%; width:100%;" class="shadow p-3 mb-5 bg-white rounded"/>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 order-md-last d-flex align-items-stretch">
                        <div class="contact-wrap w-100 p-md-5">
                                <form method="POST" id="contactForm" name="contactForm" class="contactForm" action="{{url('/stulogin')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <h4>Login with Kaksha Education</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-5"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                            @if($errors->has('email'))
                                                <span style="color:red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="password">Password</label>
                                                <input type="password" class="form-control" name="password" id="email" placeholder="Password">
                                            </div>
                                            @if($errors->has('password'))
                                                <span style="color:red">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="col-md-12 text-center mt-3">
                                            <div class="form-group">
                                                <input type="submit" value="login" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-3">
                                            <div class="form-group">
                                                <span>Don't have an account please </span>
                                                <a href="{{url('/registration')}}">SignUp</a>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
