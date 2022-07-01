@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Disclaimer<i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Disclaimer</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper p-5">
                    <h3>Disclaimer</h3>
                    <p>1. The information provided by Kaksha Education Foundation (“Company”, “we”, “our”, “us”) on kakshaeducation.com(the “Site”)  is for pure education purposes only. </p>
                    <p>2. All information on this site is provided in good faith, however, we make no responsibility or warranty of any kind regarding the validity or completeness of any information present on the website</p>
                    <p>3. We don’t aim to help anyone earn monetary benefits with our company. The video lectures and the course material present on the website are purely for learning and education purposes.</p>
                    <p>4. The amount which is paid by anyone on the website is only for the purchase of the courses which they like to buy. No amount paid by the customer shall be considered an affiliate.</p>
                    <p>5. We don’t provide any types of tips or fundamental advice to any of our users. The content available in the present and the future will be only for educating the people.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
