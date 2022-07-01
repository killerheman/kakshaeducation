<div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/admin/dashboard')}}">
            <i class="ti-shield menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#course" aria-expanded="false" aria-controls="course">
            <i class="ti-book menu-icon"></i>
            <span class="menu-title">Courses</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="course">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('/admin/list/courses')}}">List Course</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('/admin/course')}}">Add New Course</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#student" aria-expanded="false" aria-controls="student">
            <i class="ti-user menu-icon"></i>
            <span class="menu-title">Students</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="student">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('/admin/student/list')}}"> List students </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#teacher" aria-expanded="false" aria-controls="teacher">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Teachers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="teacher">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/admin/teachers/list')}}"> List Teachers </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/admin/teachers/add')}}"> Add Teachers </a></li>
              </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#enquiry" aria-expanded="false" aria-controls="enquiry">
              <i class="ti-comments menu-icon"></i>
              <span class="menu-title">Enquiries</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="enquiry">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/admin/enquires/list')}}"> Conatcts </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('/admin/careers/list')}}"> Careers </a></li>
              </ul>
            </div>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">