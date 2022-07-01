@extends('include.master')
@section('main-container')
<div class="hero-wrap js-fullheight" style="background-image: url('assets/images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate">
          <span class="subheading">Welcome to Kaksha Education</span>
          <h1 class="mb-4">We Are Online Platform For Make Learn</h1>
          <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          <p class="mb-0"><a href="{{url('/course')}}" class="btn btn-primary">Our Course</a></p>
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
                @if(Session::has('error'))
                  <div class="alert alert-danger mt-2 mb-2 text-center">
                      <span>{{Session::get('error')}}</span>
                  </div>
                @endif
                <h3 class="mb-4">Teacher Login</h3>
                <form action="{{url('/teacher/login')}}" class="signup-form" method="POST">
                  @csrf
                  <div class="form-group">
                      <label class="label" for="email">Email Address</label>
                      <input type="text" class="form-control" placeholder="email/mobile" name="email">
                      @if($errors->has('email'))
                      <span style="color:red">{{$errors->first('email')}}</span>
                      @endif
                    </div>
                  <div class="form-group">
                   <label class="label" for="password">Password.</label>
                   <input id="password" type="password" class="form-control" placeholder="Enter password" name="password">
                    @if($errors->has('password'))
                      <span style="color:red">{{$errors->first('password')}}</span>
                    @endif
                  </div>
               <div class="form-group d-flex justify-content-end mt-5">
                   <button type="submit" class="btn btn-primary submit"><span>Login</span></button>
               </div>
           </form>
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
                       <p class="name">Soni Prajapati</p>
                       <span class="position">Web Designer</span>
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
               <p class="name">Shiva Gupta</p>
               <span class="position">Marketing Manager</span>
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
               <p class="name">Harikesh Kumar</p>
               <span class="position">Marketing Manager</span>
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
               <p class="name">Ravi Kumar</p>
               <span class="position">Marketing Manager</span>
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
               <p class="name">Shivam Jaiswal</p>
               <span class="position">Marketing Manager</span>
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
@endsection
