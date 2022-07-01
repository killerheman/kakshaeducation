@extends('admin.includes.master')
@section('title', 'KakshaEducation list students')
@section('admin-container')
<div class="content-wrapper">
    @if(Session::has('flash_message'))
      <div class="alert {!! session('status') !!}" role="alert"><em> {!! session('flash_message') !!}</em></div>
    @endif
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="card-title">List of all student</h2>
                        </div>
                    </div>
                </div>
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th>
                          S/N
                        </th>
                        <th>
                          Student's name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                          Profile pic
                        </th>
                        <th>
                            Highest Qualification
                        </th>
                        <th>
                          A/C Holder Name
                        </th>
                        <th>
                          A/C Number
                        </th>
                        <th>
                           Branch
                        </th>
                        <th>
                          IFSC
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php $i=1; ?>
                      @foreach ($student as $items)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$items->student_name}}
                        </td>
                        <td>
                            <span class="fas fa-envelope-open-text"></span>
                            <a href="mailto:{{$items->email}}" target="_blank">
                              {{$items->email}}
                            </a>
                        </td>
                        <td>
                            <span class="fas fa-phone"></span>
                            <a href="tel:{{$items->mobile}}">
                              {{$items->mobile}}
                              </a>
                        </td>
                        <td class="py-1">
                            <img src="{{url('assets/images/student/')}}/{{$items->pic}}" alt="student image"/>
                          </td>
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$items->education}}
                        </td>
                        <td>
                            <span class="fas fa-user-circle"></span>
                            {{$items->acname}}
                        </td>
                        <td>
                            <span class="fas fa-list-ol"></span>
                            {{$items->acnumber}}
                        </td>
                        <td>
                            <span class="fas fa-code-branch"></span>
                            {{$items->branch}}
                        </td>
                        <td>
                            <span class="fas fa-info"></span>
                            {{$items->ifsc}}
                        </td>
                        <td>
                          <a href="{{url('/admin/student/block')}}/{{$items->stu_id }}/false" class="btn btn-success"><i class="fas fa-check-circle"></i></i></a>
                        </td>
                        <td>
                            <a href="{{url('/admin/student/view')}}/{{$items->stu_id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{url('/admin/student/delete')}}/{{$items->stu_id }}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
      {{-- blocked students list --}}
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="card-title text-danger">List of all blocked student</h2>
                        </div>
                        
                    </div>
                </div>
              <div class="card-body">
                
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th>
                          S/N
                        </th>
                        <th>
                          Student's name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                          Profile pic
                        </th>
                        <th>
                            Highest Qualification
                        </th>
                        <th>
                            Status
                        </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php $i=1; ?>
                      @foreach ($block_student as $bitems)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$bitems->student_name}}
                        </td>
                        <td>
                            <span class="fas fa-envelope-open-text"></span>
                            <a href="mailto:{{$bitems->email}}" target="_blank">
                              {{$bitems->email}}
                            </a>
                        </td>
                        <td>
                            <span class="fas fa-phone"></span>
                            <a href="tel:{{$bitems->mobile}}">
                              {{$bitems->mobile}}
                              </a>
                        </td>
                        <td class="py-1">
                            <img src="{{url('assets/images/student/')}}/{{$bitems->pic}}" alt="student image"/>
                          </td>
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$bitems->highest_quali}}
                        </td>
                        <td>
                          <a href="{{url('/admin/student/block')}}/{{$bitems->stu_id}}/true" class="btn btn-danger"><i class="fas fa-times-circle"></i></i></a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>
@endsection