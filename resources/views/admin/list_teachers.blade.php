@extends('admin.includes.master')
@section('title', 'KakshaEducation list teachers')
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
                            <h2 class="card-title">List of all teacher</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/teachers/add')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add new</a>
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
                          Techer's name
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
                        <th>
                            Action
                        </th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php $i=1; ?>
                      @foreach ($teacher as $items)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$items->teacher_name}}
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
                            <img src="{{url('assets/images/teacher/')}}/{{$items->pic}}" alt="Teacher image"/>
                          </td>
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$items->highest_quali}}
                        </td>
                        <td>
                          <a href="{{url('/admin/teacher/block')}}/{{$items->teach_id}}/false" class="btn btn-success"><i class="fas fa-check-circle"></i></i></a>
                        </td>
                        <td>
                            <a href="{{url('/admin/teacher/view')}}/{{$items->teach_id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{url('/admin/teacher/update')}}/{{$items->teach_id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{url('/admin/teacher/delete')}}/{{$items->teach_id}}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
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
      {{-- blocked teachers list --}}
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="card-title text-danger">List of all blocked teacher</h2>
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
                          Techer's name
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
                      @foreach ($block_teacher as $bitems)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$bitems->teacher_name}}
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
                            <img src="{{url('assets/images/teacher/')}}/{{$bitems->pic}}" alt="Teacher image"/>
                          </td>
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$bitems->highest_quali}}
                        </td>
                        <td>
                          <a href="{{url('/admin/teacher/block')}}/{{$bitems->teach_id}}/true" class="btn btn-danger"><i class="fas fa-times-circle"></i></i></a>
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