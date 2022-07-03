@extends('include.master')
@section('main-container')
<div class="hero-wrap js-fullheight" style="background-image: url('assets/images/bg_1.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span style="text-shadow: 0 0 3px #000f, 0 0 5px #0000FF;font-size 80px;" class="subheading">Welcome To Kaksha Education</span>
          <h1 class="mb-4" style="-webkit-text-stroke: 1px white;text-shadow: 0 0 3px #FF0000">We are the leading online learning platform for making learning.</h1>
          <p class="caps" style="text-shadow: 0 0 3px #000f, 0 0 5px #0000FF;font-size 80px;">Enhance and level up your skills with Kaksha Education</p>
          <p class="mb-0"><a href="{{url('/courses')}}" class="btn btn-primary">Our Course</a></p>
      </div>
    </div>
  </div>
</div>
<section class="ftco-section ftco-no-pb ftco-no-pt">
   <div class="container">
      <div class="row">
         <div class="col-md-7"></div>
         <div class="col-md-5 order-md-last">
          <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Get Enquiry</h3>
              <form action="{{url('/enquiry')}}" class="signup-form" method="post" id="frmContactus">
                  @csrf
                 <div class="form-group">
                    <label class="label" for="name">Full Name</label>
                    <input type="text" class="form-control" placeholder="Your Name..." name="name"  required="">
                    @if($errors->has('name'))
                        <span style="color:navy">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="label" for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="email@gmail.com" name="email" required="">
                    @if($errors->has('email'))
                        <span style="color:navy">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                 <label class="label" for="mobile">Mobile No.</label>
                 <input id="mobile" type="text" class="form-control" placeholder="91 .........." name="mobile" required="" pattern="[6789][0-9]{9}">
                 @if($errors->has('mobile'))
                 <span style="color:navy">{{$errors->first('mobile')}}</span>
             @endif
             </div>
             <div class="form-group">
                 <label class="label" for="message">Message</label>
                 <textarea id="message" type="text" class="form-control" placeholder="Enter message" name="message" required=""></textarea>
                 @if($errors->has('message'))
                 <span style="color:navy">{{$errors->first('message')}}</span>
             @endif
             </div>
             <div class="form-group d-flex justify-content-end mt-5">
                 <button type="submit" class="btn btn-primary submit" name="submit" id="submit">Enquiry</button>
             </div>
         </form>
         <span id="msg"></span>
     </div>
 </div>
</div>
</div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
              <h2 class="mb-4">Pick our Online Course</h2>
          </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($course_top as $top_cou_items)
            <div class="col-md-3 col-lg-2">
               <a href="{{url('/course')}}/{{$top_cou_items->cour_id}}/{{$top_cou_items->alias}}" class="course-category img d-flex align-items-center justify-content-center" style="background-image: url(/assets/images/course/{{$top_cou_items->pic}})">
                    <div class="text w-100 text-center">
                     <h3>{{$top_cou_items->course_name}}</h3>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="col-md-12 text-center mt-5">
                <a href="{{url('/courses')}}" class="btn btn-secondary">See All Courses</a>
            </div>
        </div>
    </div>
</section>
{{-- course section started here --}}
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Start Learning Today</span>
                <h2 class="mb-4">Pick Your Course</h2>
            </div>
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
    </div>
</section>
<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(assets/images/bg_4.jpg);">
 <div class="overlay"></div>
 <div class="container">
    <div class="row">
       <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
         <div class="block-18 d-flex align-items-center">
            <div class="icon"><span class="flaticon-online"></span></div>
            <div class="text">
             <strong class="number" data-number="100 ">0</strong>
             <span>Online Courses</span>
         </div>
     </div>
 </div>
 <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
     <div class="block-18 d-flex align-items-center">
        <div class="icon"><span class="flaticon-graduated"></span></div>
        <div class="text">
         <strong class="number" data-number="4500">0</strong>
         <span>Students Enrolled</span>
     </div>
 </div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
 <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-instructor"></span></div>
    <div class="text">
     <strong class="number" data-number="15">0</strong>
     <span>Experts Instructors</span>
 </div>
</div>
</div>
<div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
 <div class="block-18 d-flex align-items-center">
    <div class="icon"><span class="flaticon-tools"></span></div>
    <div class="text">
     <strong class="number" data-number="750">0</strong>
     <span>Hours Content</span>
 </div>
</div>
</div>
</div>
</div>
</section>

<section class="ftco-section ftco-about img">
   <div class="container">
      <div class="row d-flex">
         <div class="col-md-12 about-intro">
            <div class="row">
               <div class="col-md-6 d-flex">
                  <div class="d-flex about-wrap">
                     <div class="img d-flex align-items-center justify-content-center" style="background-image:url(assets/images/about-1.jpg);">
                     </div>
                     <div class="img-2 d-flex align-items-center justify-content-center" style="background-image:url(assets/images/about.jpg);">
                     </div>
                 </div>
             </div>
             <div class="col-md-6 pl-md-5 py-5">
              <div class="row justify-content-start pb-3">
                  <div class="col-md-12 heading-section ftco-animate">
                     <span class="subheading">Enhance And learn new skills with Kaksha Education.</span>
                     <h2 class="mb-4">Learn Anything You Want Today</h2>
                     <p>Kaksha is an E-learning platform, where you can learn new skills or enhance them. kaksha education providing best and advanced online learning platform that changes the thinking of peoples about Online learning.</p>
                     <p><a href="{{url('/contact')}}" class="btn btn-primary">Get in touch with us</a></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
</div>
</section>
<section class="ftco-section testimony-section bg-light">
   <div class="overlay" style="background-image: url(assets/images/bg_2.jpg);"></div>
   <div class="container">
    <div class="row pb-4">
      <div class="col-md-7 heading-section ftco-animate">
         <span class="subheading">Why Kaksha Education?</span>
         <h2 class="mb-4">What Are Students Says</h2>
     </div>
 </div>
</div>
<div class="container container-2">
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel">
          <div class="item">
            <div class="testimony-wrap py-4">
              <div class="text">
                 <p class="star">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </p>
                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                <div class="d-flex align-items-center">
                   <div class="user-img" style="background-image: url(assets/images/person_1.jpg)"></div>
                   <div class="pl-3">
                      <p class="name">Roger Scott</p>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="item">
    <div class="testimony-wrap py-4">
      <div class="text">
         <p class="star">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </p>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        <div class="d-flex align-items-center">
           <div class="user-img" style="background-image: url(assets/images/person_2.jpg)"></div>
           <div class="pl-3">
              <p class="name">Roger Scott</p>
              
          </div>
      </div>
  </div>
</div>
</div>
<div class="item">
    <div class="testimony-wrap py-4">
      <div class="text">
         <p class="star">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </p>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        <div class="d-flex align-items-center">
           <div class="user-img" style="background-image: url(assets/images/person_3.jpg)"></div>
           <div class="pl-3">
              <p class="name">Roger Scott</p>
              
          </div>
      </div>
  </div>
</div>
</div>
<div class="item">
    <div class="testimony-wrap py-4">
      <div class="text">
         <p class="star">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </p>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        <div class="d-flex align-items-center">
           <div class="user-img" style="background-image: url(assets/images/person_1.jpg)"></div>
           <div class="pl-3">
              <p class="name">Roger Scott</p>
              
          </div>
      </div>
  </div>
</div>
</div>
<div class="item">
    <div class="testimony-wrap py-4">
      <div class="text">
         <p class="star">
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        </p>
        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        <div class="d-flex align-items-center">
           <div class="user-img" style="background-image: url(assets/images/person_2.jpg)"></div>
           <div class="pl-3">
              <p class="name">Roger Scott</p>
              
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="ftco-intro ftco-section ftco-no-pb">
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-12 text-center">
          <div class="img"  style="background-image: url(assets/images/bg_4.jpg);">
             <div class="overlay"></div>
             <h2>We Are KakshaEducation An Online Learning Center</h2>
             <p>We can manage your dream building A small river named Duden flows by their place</p>
             <p class="mb-0"><a href="{{url('/contact')}}" class="btn btn-primary px-4 py-3">Enroll Now</a></p>
         </div>
     </div>
 </div>
</div>
</section>
<section class="ftco-section services-section">
  <div class="container">
    <div class="row d-flex">
      <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
         <div class="w-100 mb-4 mb-md-0">
            <span class="subheading">Why You Join us ?</span>
            <h2 class="mb-4">We Are KakshaEducation An Online Learning Center</h2>
            <p>1. Kaksha education providing courses in your Regional languages.</p>
            <p>2. kaksha offer the courses at very low cost that no other platform can offer you.</p>
            <p>3. Kaksha members get the certificates for their respective courses that helps in their future growth.</p>
            <p>4. kaksha provides variety of courses from all the domains.( technical, General and Cultural etc.)</p>
            <p>5. Kaksha Provides you a lot of opportunities that helps you in financial stage.</p>
            
     </div>
 </div>
 <div class="col-md-6">
     <div class="row">
        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
          <div class="services">
            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tools"></span></div>
            <div class="media-body">
              <h3 class="heading mb-3">Top Quality Content</h3>
              <p>Kaksha Education is an E-Learning platform thats provide you a wide variety of courses and certification programs.</p>
          </div>
      </div>      
    </div>
  <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
      <div class="services">
        <div class="icon icon-2 d-flex align-items-center justify-content-center"><span class="flaticon-instructor"></span></div>
        <div class="media-body">
          <h3 class="heading mb-3">Highly Skilled Instructor</h3>
          <p>There are really two important criteria for any teacher. First of all, he or she must know a subject area and must know it well.</p>
      </div>
  </div>    
</div>
<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
  <div class="services">
    <div class="icon icon-3 d-flex align-items-center justify-content-center"><span class="flaticon-quiz"></span></div>
    <div class="media-body">
      <h3 class="heading mb-3">World Class &amp; Quiz</h3>
      <p>World Class Tests were conceived by the Department for Education on KakshaEducation</p>
  </div>
</div>      
</div>
<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
  <div class="services">
    <div class="icon icon-4 d-flex align-items-center justify-content-center"><span class="flaticon-browser"></span></div>
    <div class="media-body">
      <h3 class="heading mb-3">Get Certified</h3>
      <p>Kaksha members get the certificates for their respective courses that helps in their future growth.</p>
  </div>
</div>      
</div>
</div>
</div>
</div>
</div>
</section>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
<script>
    $( document ).ready(function() {
      //alert( "ready!" );
  
      jQuery('#frmContactus').on('submit',function(e){
        //alert();
      jQuery('#msg').html('');
      jQuery('#submit').html('Please wait');
      jQuery('#submit').attr('disabled',true);
      jQuery.ajax({
        url:'/enquiry',
        type:'post',
        data:jQuery('#frmContactus').serialize(),
        success:function(result){
            jQuery('#msg').html(result);
        swal({
              title: "Good job!",
              text: "Your query send successfully send!",
              icon: "success",
              button: "Ok",
            });
        jQuery('#submit').html('Submit');
        jQuery('#submit').attr('disabled',false);

        jQuery('#frmContactus')[0].reset();
      }
      });
      e.preventDefault();
      });
  }); 
  </script>
@endsection
