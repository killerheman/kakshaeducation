<div class="container-fluid page-body-wrapper">
  <!-- partial:partials/_sidebar -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="ti-shield menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="ti-palette menu-icon"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography">Typography</a></li>
          </ul>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{url('/teacher/profile')}}">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/teacher/dashboard')}}">
          <i class="ti-view-list-alt menu-icon"></i>
          <span class="menu-title">Courses</span>
        </a>
      </li>
      
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="ti-user menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen"> Lockscreen </a></li>
          </ul>
        </div>
      </li> --}}
    </ul>
  </nav>
  <!-- partial -->
  <div class="main-panel">