@extends('include.master')
@section('main-container')
<section class="hero-wrap hero-wrap-2" style="background-image: url('assets/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Refund Policy<i class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Refund Policy</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper p-5">
                    <h3>Refund Policy</h3>
                    <p>We issue refunds for the purchases within 24 hours of the original purchase of the packages.</p>
                    <p>A payment gateway fee @ 2% of the paid amount and processing fee @10% of the paid amount will be deducted from the amount to be refunded.</p>
                    <p>No Refund will be given to the customer for the purchase of any package made by the customer directly from the Kaksha Education website “www.kakshaeducation.com” or through the affiliate link of the person who referred him to the Dericca Education website after 24 hours of the purchase under any circumstances.</p>
                    <p>For the refund, you need to mail at refund@kakshaeducation.com In the following format with a registered e-mail ID only.</p>
                    <p>Full Name –</p>
                    <p>Registered e-mail ID –</p>
                    <p>Registration date –</p>
                    <p>Screen shot of Payment Invoice with date and time (You must have received on e-mail/message when you paid) –</p>
                    <p>Reason for refund –</p>
                    <p>*No refund request will be accepted without above mentioned details.</p>
                    <p>Please note that for the “Refund” you need to mail us only at refund@refundkakshaeducation.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
