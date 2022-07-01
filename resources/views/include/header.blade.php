@include('include.head')
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('assets/images/logo/logo.png') }}" alt="tag" style="height:4rem; width:auto;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
      </button>
   
      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">About</a></li>
            <li class="nav-item"><a href="{{url('/courses')}}" class="nav-link">Course</a></li>
            <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact us</a></li>
            <li class="nav-item"><a href="{{url('career')}}" class="nav-link">Career</a></li>
            <li class="nav-item"><a href="{{url('/login')}}" class="nav-link">Login/Register</a></li>
        </ul>
      </div>
   </div>
   </nav>
   <!-- END nav -->