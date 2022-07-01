@extends('admin.includes.master')
@section('title', 'KakshaEducation update Course')
@section('admin-container')
<div class="content-wrapper">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb" class="main-breadcrumb mt-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page"><a href="{{url('/admin/list/courses')}}">Course</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0)">Update Course</a></li>
      
    </ol>
  </nav>
  <!-- /Breadcrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0">Kaksha-Education update Course</h4>
            </div>
            <div>
              <a href="{{url('/admin/course')}}" class="btn btn-primary btn-icon-text btn-rounded" >
                <i class="fas fa-plus-circle"></i> Add new
              </a>
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
                <h3 class="text-light">Update Your Course</h3>
              </div>
                <div class="card-body">
                  <form action="{{url('/admin/course/update')}}/{{$update[0]['cour_id']}}" class="needs-validation" id="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="course-name">Course Name:</label>
                          <input type="text" value="{{$update[0]['course_name']}}" class="form-control" name="course" id="course-name" placeholder="Enter course name">
                          @error('course')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="Course-Price">Course Price:</label>
                          <input type="text" value="{{$update[0]['price']}}" class="form-control" name="course_price" id="Course-Price" placeholder="Enter Course price">
                          @error('course_price')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="offer_pice">Offer Price:</label>
                          <input type="text" value="{{$update[0]['offer_pice']}}" class="form-control" name="offer_pice" id="offer_pice" placeholder="Enter offer price">
                          @error('offer_pice')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="referal_pice">Referal Price:</label>
                          <input type="text" value="{{$update[0]['referal_pice']}}" class="form-control" name="referal_pice" id="referal_pice" placeholder="Enter referal price">
                          @error('referal_pice')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="duration">Course Duration:</label>
                          <select type="text" class="form-control" name="duration" id="duration">
                            <option selected disabled value="">--Select course duration--</option>
                            <option value="3 Months">3 Months</option>
                            <option value="3 Months">6 Months</option>
                            <option value="3 Months">1 Year</option>
                            <option value="3 Months">2 Years</option>
                          </select>
                          @error('duration')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="form-group col-md-8">
                            <label for="pic">Course Image:</label>
                            <input type="file" class="form-control" name="pic" id="pic" accept="image/*" onchange="pic1File(event)">
                            @error('pic')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                            @enderror
                          </div>
                          <div class="col-md-4">
                            <div class="img-fluide">
                              <img id="pic1" src="{{url('assets/images/course')}}/{{$update[0]['pic']}}" class="img-fluid img-thumbnail"/>
                              <script>
                              var pic1File = function(event) {
                                  var reader = new FileReader();
                                  reader.onload = function(){
                                  var output = document.getElementById('pic1');
                                  output.src = reader.result;
                                  };
                                  reader.readAsDataURL(event.target.files[0]);
                              };
                              </script>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row">
                          <div class="form-group col-md-8">
                            <label for="pic_2">Course Image 2:</label>
                            <input type="file" class="form-control" name="pic_2" id="pic_2" accept="image/*" onchange="pic2File(event)">
                            @error('pic_2')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                            @enderror
                          </div>
                          <div class="col-md-4">
                            <div class="img-fluide">
                              <img id="pic2" src="{{url('assets/images/course')}}/{{$update[0]['pic_2']}}" class="img-fluid img-thumbnail"/>
                              <script>
                              var pic2File = function(event) {
                                  var reader = new FileReader();
                                  reader.onload = function(){
                                  var output = document.getElementById('pic2');
                                  output.src = reader.result;
                                  };
                                  reader.readAsDataURL(event.target.files[0]);
                              };
                              </script>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <label for="video_link">Video Link:</label>
                        <input type="link" value="{{$update[0]['video_link']}}" class="form-control" name="video_link" id="video_link" placeholder="Enter YouTube video link... eg: https://www.youtube.com/channel/UCKDSPxVlTLMbtPfx1s-VSQQ">
                        @error('video_link')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-12">
                        <label for="short_desc">Short Description:</label>
                        <textarea class="form-control" name="short_desc" id="short_desc" placeholder="Enter course short overviews......." rows="5" >
                            {!!$update[0]['short_desc']!!}
                        </textarea>
                        @error('short_desc')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-12">
                        <label for="long_desc">Long Description:</label>
                        <textarea class="form-control" name="long_desc" id="long_desc" placeholder="Enter course long overviews......." rows="5" >
                            {!!$update[0]['long_desc']!!}
                        </textarea>
                        @error('long_desc')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                        @enderror
                      </div>
                      <div class="form-group col-md-12">
                        <input type="submit" class="form-control btn btn-info" value="Update">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
