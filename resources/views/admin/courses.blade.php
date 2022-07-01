@extends('admin.includes.master')
@section('title', 'KakshaEducation list courses')
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
                            <h2 class="card-title">List of all courses</h2>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/course')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add new</a>
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
                          Course name
                        </th>
                        <th>
                          Price
                        </th>
                        <th>
                          Offer Price
                        </th>
                        <th>
                          Referal Pice
                        </th>
                        <th>
                            Duration
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
                      @foreach ($course as $items)
                      <tr>
                        <td>
                            {{$i}}
                        </td>
                        <td>
                          {{$items->course_name}}
                        </td>
                        <td>
                          <span class="fas fa-rupee-sign"></span>
                          {{$items->price}}
                        </td>
                        <td>
                            <span class="fas fa-rupee-sign"></span>
                            {{$items->offer_pice}}
                        </td>
                        <td>
                            <span class="fas fa-rupee-sign"></span>
                            {{$items->referal_pice}}
                        </td>
                        <td>
                            <span class="fas fa-clock"></span>
                            {{$items->duration}}
                        </td>
                        <td>
                          @if ($items->status == true)
                          <a href="{{url('/admin/course/status')}}/{{$items->cour_id}}/false" class="btn btn-success"><i class="fas fa-check-circle"></i></i></a>
                          @else
                          <a href="{{url('/admin/course/status')}}/{{$items->cour_id}}/true" class="btn btn-danger"><i class="fas fa-times-circle"></i></i></a>
                          @endif
                        </td>
                        <td>
                            <a href="{{url('/admin/course/view')}}/{{$items->cour_id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="{{url('/admin/course/update')}}/{{$items->cour_id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="{{url('/admin/course/delete')}}/{{$items->cour_id}}" class="btn btn-danger"><i class="fas fa-trash-restore-alt"></i></a>
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