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
                    <form action="{{url('/teacher/profile/img')}}" method="POST" enctype="multipart/form-data">
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
                        <form action="{{url('/teacher/profile/details')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column text-left">
                                        <div class="form-group">
                                            <input type="hidden" disabled readonly name="stu_id" class="form-control">
                                        </div>
                                        <div class="form-group ">
                                            <label for="name" class="form-group">Your Name:</label>
                                            <input type="text" name="name" id="name" required class="form-control" value="{{$teac->teacher_name}}">
                                            @if($errors->has('name'))
                                              <span style="color:red">{{$errors->first('name')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="form-group">Your Email Address:</label>
                                            <input type="email" name="email" id="email" required class="form-control" value="{{$teac->email}}">
                                            @if($errors->has('email'))
                                              <span style="color:red">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="mobile" class="form-group">Your Contact Number:</label>
                                            <input type="tel" name="mobile" id="mobile" required class="form-control" value="{{$teac->mobile}}">
                                            @if($errors->has('mobile'))
                                              <span style="color:red">{{$errors->first('mobile')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group ">
                                            <label for="address" class="form-group">Your Address:</label>
                                            <input type="text" name="address" id="address" required class="form-control" value="{{$teac->address}}">
                                            @if($errors->has('address'))
                                              <span style="color:red">{{$errors->first('mobile')}}</span>
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
<div class="modal fade" id="addressdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update your Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- dfghj --}}

            <div class="row text-center">
                <div class="col-12">
                    <img  src="{{url('/assets/images/logo/logo.png')}}"  alt="profile" class="img-fluid" height="150" width="150" >
                    <div class="text-center">
                        <h5 class="mt-3">!! Welcome to Kaksha Education !!</h5>
                        <h5 class="mb-4">!! Update Your Address Information !!</h5>
                    </div>
                    <form action="" method="" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column text-left">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="pin" class="form-group">Pin Code:</label>
                                            <input type="number" name="pin" id="pin" class="form-control" required value="{{$teac->pin_code}}">
                                            @if($errors->has('pin'))
                                                <span style="color:red">{{$errors->first('pin')}}</span>
                                            @endif
                                        </div> 

                                    </div>
                                    
                                
                                    <div class="form-group ">
                                        <label for="addr">Address:</label>
                                        <textarea type="text" name="address" id="addr" cols="30" rows="3" class="form-control" placeholder="Enter your home address" required value="{{$teac->address}}">{{$teac->address}}</textarea>
                                        @if($errors->has('address'))
                                            <span style="color:red">{{$errors->first('address')}}</span>
                                        @endif
                                    </div>
                                                 
                                        
                                </div>

                            </div>
                            <div class="text-right mb-2 mr-3">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info">Save Change</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- ghj --}}
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
</div>





