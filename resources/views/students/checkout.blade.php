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
              <li class="breadcrumb-item active" aria-current="page"><a href="{{url('/student/profile')}}">{{$mycourse[0]->student_name}}</a></li>

            </ol>
        </nav>
        @if(session::has('msg'))
        <div class="alert alert-danger">{{ session::get('msg') }}</div>
        @endif
        <!-- /Breadcrumb -->
        <!-- first row for image and contact information -->
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <!-- card for image and name -->
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{url('assets/images/course')}}/{{$mycourse[0]->pic}}" alt="Student Profile image" class="rounded-circle" style="height:150px; width:150px;">
                        <div class="mt-3">
                        <h4>{{$mycourse[0]->course_name}}</h4>
                        <p class="text-secondary mb-1">&#x20B9; {{$mycourse[0]->offer_pice}}.00</p>
                        </div>
                    </div>

                    <form action="{{ route('razorpay.payment.store') }}" method="POST" class="text-center" >
                       <input type="hidden" name="stid" value="{{ $mycourse[0]->student_id }}"/>
                       <input type="hidden" name="cid" value="{{ $mycourse[0]->course_id }}" />
                       <input type="hidden" name="pay" value="{{ $mycourse[0]->offer_pice }}" />
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="{{$mycourse[0]->offer_pice}}00"
                                data-buttontext="Ckeckout"
                                data-name="Kaksha Education"
                                data-description="{{$mycourse[0]->course_name}}"
                                data-image="{{ asset('assets/images/logo/logo.png') }}"
                                data-prefill.name="{{$mycourse[0]->student_name}}"
                                data-prefill.email="{{$mycourse[0]->email}}"
                                data-prefill.contact="{{$mycourse[0]->mobile}}"
                                data-theme.color="#">
                        </script>


                    </form>
                    </div>
                </div>
                <!-- / end img and name card -->

            </div>

            <!-- card contact information -->
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$mycourse[0]->student_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$mycourse[0]->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$mycourse[0]->mobile}}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- card contact information end -->

            <!-- card contact information end -->

        </div>
        <!-- first row end for image and contact information -->
        <!-- row for address and personal details -->

        <!-- row for address personal details end  -->
        <!-- row for qualification -->

        <!-- row for qualification end -->
    </div>
</div>
</div>
<style>
    .razorpay-payment-button
    {
        background-color:blueviolet;
        border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
        border-radius: 8px;
        font-size: 16px;
    }
</style>

@endsection
