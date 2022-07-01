@extends('admin.includes.master')
@section('title', 'KakshaEducation Admin Change password')
@section('admin-container')
<div class="content-wrapper">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">Change Password</a></li>
    </ol>
  </nav>
  <!-- /Breadcrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha-Education Admin Change Password</h4>
            </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            @if(Session::has('flash_message'))
              <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
            @endif
            
            <div class="card">
              <div class="card-header bg-info">
                <h3 class="text-light">Admin Change Password</h3>
              </div>
                <div class="card-body">
                  <form action="{{url('/admin/changepassword')}}" class="needs-validation" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="pass">Old Password:</label>
                          <input type="password" class="form-control" name="old_password" id="pass" placeholder="Enter old password">
                          @error('old_password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="new-pass">New Password:</label>
                          <input type="password" class="form-control" name="new_password" id="new-pass" placeholder="Enter new password">
                          @error('new_password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="Confirm-New-Password">Confirm New Password:</label>
                          <input type="password" class="form-control" name="Confirm_New_Password" id="Confirm-New-Password" placeholder="Re-enter new password">
                          @error('Confirm_New_Password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="submit" class="form-control btn btn-info" value="Save Change">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
