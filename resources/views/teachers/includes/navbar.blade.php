<!-- partial:partials/_navbar -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{url('/assets/images/logo/logo.png')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="#"><img src="{{url('/assets/images/logo/logo.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{url('assets/images/teacher')}}/{{$teacher[0]['pic']}}" alt="{{$teacher[0]['teacher_name']}}"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{url("/teacher/profile")}}">
                <i class="ti-user text-primary"></i>
               Profile
              </a>
              <a class="dropdown-item" href="{{url('/teacher/logout')}}">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
              <a class="dropdown-item" data-toggle="modal" data-target="#changepass" >
                <i class="ti-unlock text-primary"></i>
                  Change Password
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <!-- Modal change password -->
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                          <img  src="{{url('/assets/images/logo/logo.png')}}" alt="profile" class="img-fluid" height="150" width="150" >
                          <h5 class="mt-3">!! Welcome to Kaksha Education!!</h5>
                          <h5 class="mb-4">!! Update Your Password !!</h5>
                        </div>
                        <form action="{{url('/teacher/changepassword')}}" class="needs-validation" id="" method="POST" enctype="multipart/form-data">
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
          </div>
        </div>
    </div>
    </div>