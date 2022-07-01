@extends('admin.includes.master')
@section('title', 'KakshaEducation list contacts')
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
                            <h2 class="card-title">List of all careers enquiries</h2>
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
                          Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                          Qualification
                        </th>
                        <th>
                            Experience
                        </th>
                        <th>
                            Curriculum Vitae
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
                      @foreach ($career as $items)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$items->name}}
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
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$items->highest_quali}}
                          </td>
                        <td>
                            <span class="fab fa-buromobelexperte"></span>
                            {{$items->experience}}
                        </td>
                        <td>
                            <a href="{{url('assets/cv/career')}}/{{$items->cv}}" class="btn btn-info" target="_blank" download="">
                                <i class="fas fa-file-download"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/admin/career/complete')}}/{{$items->id}}/true" class="btn btn-danger">
                                <i class="fas fa-times-circle"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{url('/admin/career/delete')}}/{{$items->id}}" class="btn btn-danger">
                                <i class="fas fa-trash-restore-alt"></i>
                            </a>
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
      {{-- blocked contacts list --}}
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 class="card-title text-success">List of all completed careers enquiries</h2>
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
                            Name
                          </th>
                          <th>
                              Email
                          </th>
                          <th>
                            Mobile
                          </th>
                          <th>
                            Qualification
                          </th>
                          <th>
                              Experience
                          </th>
                          <th>
                              Curriculum Vitae
                          </th>
                          <th>
                              Status
                          </th>
                        </tr>
                      </thead>
                    <tbody class="text-center">
                      <?php $i=1; ?>
                      @foreach ($cpmed_career as $Citems)
                      <tr>
                        <td>
                            {{$i}}
                            
                        </td>
                        <td>
                          {{$Citems->name}}
                        </td>
                        <td>
                            <span class="fas fa-envelope-open-text"></span>
                            <a href="mailto:{{$Citems->email}}" target="_blank">
                              {{$Citems->email}}
                            </a>
                        </td>
                        <td>
                            <span class="fas fa-phone"></span>
                            <a href="tel:{{$Citems->mobile}}">
                              {{$Citems->mobile}}
                              </a>
                        </td>
                        <td>
                            <span class="fas fa-user-graduate"></span>
                            {{$Citems->highest_quali}}
                          </td>
                        <td>
                            <span class="fab fa-buromobelexperte"></span>
                            {{$Citems->experience}}
                        </td>
                        <td>
                          <a href="" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
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