@extends('students.includes.master')
@section('main-container') 

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha Education Student: {{$stu_name[0]['student_name']}}</h4>
            </div>
            <div class="text-right">
                <h4 class="font-weight-bold mb-0">Call Me : <a href="tel:+91-7388094142">+91-7388094142</a></h4>
            </div>
           </div>
        </div>
        <div class="col-md-12">
            @if(Session::has('flash_message'))
              <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
            @endif
        </div>
    </div>
    <!-- Enquiry form -->
    <div class="container">
        <div class="card">
            <div class="card-header bg-info">
              <h3 class="text-light">Have any query or need help send me message!</h3>
            </div>
              <div class="card-body">
                <form action="{{url('/student/enquiry')}}" class="needs-validation" id="" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="sname">Student Name:</label>
                            <input type="text" class="form-control" value="{{$stu_name[0]['student_name']}}" id="sname" placeholder="--Enter agent name--" name="sname" required>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <!-- <div>Please enter college name.</div> -->
                            @if($errors->has('sname'))
                                <span style="color:red">{{$errors->first('sname')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="mail">Student E-Mail:</label>
                            <input type="email" value="{{$stu_name[0]['email']}}" class="form-control" id="mail" placeholder="--Enter Mail Id--" name="mail" required>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <!-- <div>Please enter college name.</div> -->
                            @if($errors->has('mail'))
                                <span style="color:red">{{$errors->first('mail')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile Number:</label>
                            <input type="text" value="{{$stu_name[0]['mobile']}}" class="form-control" id="mobile" placeholder="--Enter agent name--" name="mobile" required>
                            <!-- <div class="valid-feedback">Valid.</div> -->
                            <!-- <div>Please enter college name.</div> -->
                            @if($errors->has('mobile'))
                                <span style="color:red">{{$errors->first('mobile')}}</span>
                            @endif
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group col-md-12">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" placeholder="--Write Message--" name="message" ></textarea>
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <!-- <div>Please enter college name.</div> -->
                        @if($errors->has('message'))
                            <span style="color:red">{{$errors->first('message')}}</span>
                        @endif
                    </div>
                    <div class="form-group col-md-12">
                      <input type="submit" class="form-control btn btn-info" value="Send Message">
                    </div>
                  </div>
                </form>
              </div>
          </div>
    </div>
</div>
@endsection