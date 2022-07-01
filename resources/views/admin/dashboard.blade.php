@extends('admin.includes.master')
@section('title', ' KakshaEducation Dashboard- Admin')
@section('admin-container')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h4 class="font-weight-bold mb-0">Kaksha-Education Dashboard</h4>
        </div>
        <div>
            <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
              <i class="ti-clipboard btn-icon-prepend"></i>Report
            </button>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <a href="{{url('/admin/list/courses')}}">
          <p class="card-title text-md-center text-xl-left">Courses</p>
          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
            <i class="ti-book icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
          </div>
          </a>
          <div class="text-right">
            <a href=""><span class="btn text-primary ml-1 ti-angle-double-right"></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <a href="{{url('/admin/students/list')}}">
          <p class="card-title text-md-center text-xl-left">Students</p>
          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
            <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
          </div>
          </a>
          <div class="text-right">
            <a href=""><span class="btn text-primary ml-1 ti-angle-double-right"></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <a href="{{url('/admin/teachers/list')}}">
          <p class="card-title text-md-center text-xl-left">Teachers</p>
          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
            <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
          </div>
          </a>
          <div class="text-right">
            <a href=""><span class="btn text-primary ml-1 ti-angle-double-right"></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <a href="{{url('/admin/enquiries/list')}}">
          <p class="card-title text-md-center text-xl-left">Enquiries</p>
          <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">34040</h3>
            <i class="ti-comments icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
          </div>
          </a>
          <div class="text-right">
            <a href=""><span class="btn text-primary ml-1 ti-angle-double-right"></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection