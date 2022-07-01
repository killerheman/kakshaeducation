<div class="container">
<!-- Modal Image -->
<div class="modal fade " id="imgupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update your Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row text-center">
                <div class="col-12">
                    <img  src="{{url('/assets/images/logo/logo.png')}}"  alt="profile" class="img-fluid" height="150" width="150" >
                    <div class="text-center ">
                        <h5 class="mt-3">!! Welcome to Kaksha Education !!</h5>
                        <h5 class="mb-3">!! Update your Profile Image !!</h5>
                    </div>
                    <form action="{{url('/student/profile/img')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control" required>
                                        @if($errors->has('image'))
                                          <span style="color:red">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="text-right mb-3 mr-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Save Change</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Personal Info -->
<div class="modal fade" id="personalinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update your Detail</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="row text-center">
                    <div class="col-12">
                        <img  src="{{url('/assets/images/logo/logo.png')}}"  alt="profile" class="img-fluid" height="150" width="150" >
                        <div class="text-center">
                            <h5 class="mt-3">!! Welcome to Kaksha Education !!</h5>
                            <h5 class="mb-4">!! Update Your Personal Information !!</h5>
                        </div>
                        <form action="{{url('/student/profile/details')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column text-left">
                                        <div class="form-group">
                                            <input type="hidden" disabled readonly name="stu_id" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label for="name" class="form-group">Your Name:</label>
                                            <input type="text" name="name" id="name" required class="form-control" value="{{$student[0]['student_name']}}">
                                            @if($errors->has('name'))
                                              <span style="color:red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="form-group">Your Email Address:</label>
                                            <input type="email" name="email" id="email" required class="form-control" value="{{$student[0]['email']}}">
                                            @if($errors->has('email'))
                                              <span style="color:red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="mobile" class="form-group">Your Contact Number:</label>
                                            <input type="tel" name="mobile" id="mobile" required class="form-control" value="{{$student[0]['mobile']}}">
                                            @if($errors->has('mobile'))
                                              <span style="color:red">{{$errors->first('mobile')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="qualification" class="form-group">Qualification:</label>
                                            <input type="text" name="qualification" id="qualification" required class="form-control" value="{{$student[0]['education']}}">
                                            @if($errors->has('qualification'))
                                              <span style="color:red">{{$errors->first('qualification')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="text-right mb-3 mr-3">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Save Change</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Address Details -->

<!-- Modal Bank Info -->
<div class="modal fade" id="bankinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fill your Detail</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="row text-center">
                    <div class="col-12">
                        <img  src="{{url('/assets/images/logo/logo.png')}}"  alt="profile" class="img-fluid" height="150" width="150" >
                        <div class="text-center">
                            <h5 class="mt-3">!! Welcome to Kaksha Education !!</h5>
                            <h5 class="mb-4">!! Update Your Personal Information !!</h5>
                        </div>
                        <form action="{{url('/student/bank/details')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column text-left">
                                        <div class="form-group">
                                            <input type="hidden" disabled readonly name="stu_id" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label for="acname" class="form-group">A/C Holder Name:</label>
                                            <input type="text" name="acname" id="acname" required class="form-control">
                                            @if($errors->has('acname'))
                                              <span style="color:red">{{$errors->first('acname')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="acnumber" class="form-group">A/C Number:</label>
                                            <input type="text" name="acnumber" id="acnumber" required class="form-control">
                                            @if($errors->has('acnumber'))
                                              <span style="color:red">{{$errors->first('acnumber')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="branch" class="form-group">Branch :</label>
                                            <input type="text" name="branch" id="branch" required class="form-control">
                                            @if($errors->has('branch'))
                                              <span style="color:red">{{$errors->first('branch')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="ifsc" class="form-group">IFSC:</label>
                                            <input type="text" name="ifsc" id="ifsc" required class="form-control">
                                            @if($errors->has('ifsc'))
                                              <span style="color:red">{{$errors->first('ifsc')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="text-right mb-3 mr-3">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Save Change</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

<!-- Modal Address Details -->
