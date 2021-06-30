
@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.preview') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid d-print-none">
    	<a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
		<h2>
	        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
	        <small>{!! $crud->getSubheading() ?? mb_ucfirst(trans('backpack::crud.preview')).' '.$crud->entity_name !!}.</small>
	        @if ($crud->hasAccess('list'))
	          <small class=""><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
	        @endif
	    </h2>
    </section>
@endsection

@section('content')
<div class="container-fluid animated fadeIn p-0">
  <div class="row">
      <div class="col-md-3">
        <div class="card card-primary p-2">
          <div class="card-header p-1">
            <h5>User Info</h5>
          </div>
          <div class="card-body card-profile pt-2 pb-0">
          
            @if(!($entry->profile))
              <img src="{{ asset('imgs/default-user.png') }}" alt="User Avatar" class="profile-user-img img-responsive img-fluid d-block mx-auto rounded-circle img-thumbnail">
            @else
              <img src="{{asset('storage/'.$entry->profile)}}" alt="User Avatar" class="profile-user-img img-responsive img-fluid d-block mx-auto rounded-circle img-thumbnail">
             @endif
  
            <div class="text-center">
              <h3 class="text-center text-break"> {{ $entry->FullName }}</h3>
                <span class="text-muted"><i class="la la-bank"></i> {{ optional($entry->accounts)->acc_name }}</span> <br>
                <span class="text-muted"><i class="la la-briefcase"></i> {{ $entry->occupation }}</span> <br>
                <span class="text-muted"><i class="la la-user"></i> {{ $entry->id }}</span>
            </div>
          </div>

          <ul class="list-group">
            <li class="list-group-item border-left-0 border-right-0">
              <i class="nav-icon la la-phone mr-1"></i>
              <a href="#" class="text-dark"> {{ $entry->con_phone }}</a>
            </li>
            <li class="list-group-item border-left-0 border-right-0">
              <i class="nav-icon la la-envelope mr-1"></i><a class="text-dark text-break"> {{ $entry->con_email}}</a>
            </li>
            <li class="list-group-item border-left-0 border-right-0">
              <strong><i class="la la-map-marker margin-r-5"></i></strong>
              <span class="text-dark text-break"> {{ $entry->Address }}</span>
            </li>
            <li class="list-group-item border-left-0 border-right-0 pb-0">
            </li>
          </ul>
          <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
        </div>
      </div>

      <div class="col-md-9 pl-0">
        <div class="mnb-custom d-flex flex-wrap w-100 mb-3 bg-white">
          <div class="d-flex justify-content-between flex-wrap w-100">
            <ul class="nav" role="tabTitle">
              <li class="nav-item">
                <a class="nav-link">
                  <i class="la la-home"></i>Inoformation
                </a>
            </li>
          </ul>
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="tablist">
              <a class="nav-link active" data-toggle="tab" href="#ZjY3YjQ2ZjgtMzdhNC00Zjg3LWIwYjctMmJkZmIyZDg1M2M40" role="tab" aria-selected="true">My Tasks</a>
            </li>
            <li class="nav-item" role="tablist">
              <a class="nav-link" data-toggle="tab" href="#ownerProperty" role="tab" aria-selected="false">Owner Property</a>
            </li>
            <li class="nav-item" role="tablist">
              <a class="nav-link " data-toggle="tab" href="#contactProperty" role="tab">Property</a>
            </li>
            <li class="nav-item" role="tablist">
              <a class="nav-link " data-toggle="tab" href="#ZjY3YjQ2ZjgtMzdhNC00Zjg3LWIwYjctMmJkZmIyZDg1M2M43" role="tab">Listing</a>
            </li>
          </ul>
        </div>
        <div class="tab-content w-100">
          <div class="tab-pane fade active show" id="ZjY3YjQ2ZjgtMzdhNC00Zjg3LWIwYjctMmJkZmIyZDg1M2M40" role="tabpanel" aria-labelledby="My Tasks">
            <div class="d-flex mb-3 justify-content-end">
              <button type="button" id="macf-taskActivity-button" class="float-right macf-taskActivity-button btn btn-primary btn-sm macf-taskActivity-button"><i class="fa la la-plus fa-lg"></i>Add task
              <!----></button>
            </div>
            <div class="content-right-wrapper">
              <div class="contact-information-content">
                <div class="container pl-0">
        
                  <div class="row">
                    <div class="col-md-12 pr-0">
          
                    </div>
                  </div>
        
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="modalConfirmDeleteTaskActivityContact" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteTaskActivityContactTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="swal-icon swal-icon--warning">
                      <span class="swal-icon--warning__body">
                        <span class="swal-icon--warning__dot"></span>
                      </span>
                    </div>
                    <div class="text-center">
                      <div class="swal-title my-0">Warning</div>
                        <div class="swal-text mb-4">Are you sure you want to delete this task ?</div>
                      </div>
                      <div class="text-right">
                        <div class="swal-button-container">
                          <button class="swal-button swal-button--cancel bg-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="swal-button-container">
                          <button class="swal-button swal-button--delete bg-danger text-capitalize btnConfirmDeleteTaskActivityContact">Delete</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @foreach ($entry->properties as $property)
              @if(!empty($property->owner_id))
              <div class="tab-pane fade" id="ownerProperty" role="tabpanel" aria-labelledby="Owner Property">
                <div class="col-md-12 p-0">
                  <a href="#" class="text-decoration-none">
                    <div class="d-flex border mb-3">
                      <div class="p-2 w-200">
                        @if(!empty($property->photo_front_side))
                          <img src="{{$property->photo_front_side}}"  width="200" alt="photo_front_side">
                        @else
                          <img src="{{ asset('imgs/default.png') }}" width="200" alt="Default-Image">
                        @endif
                      </div>
                      <div class="p-2 flex-fill">
                        {{-- <h4 class="card-title"><b></b> <span class="float-right">001056</span></h4>
                        <p class="text-description mb-2">Land with Village in Beong kok</p> --}}
                        <h5 class="card-title">
                          <b>{{ $property->project_building}}</b> 
                          <span class="float-right">{{ $property->id }}</span>
                        </h5>
                        <small class="text-muted">
                          <span>{{ Str::limit($property->Address, 60) }}</span> /
                          <span>{{ $property->zone_type }}</span>/
                          <span>{{ \Carbon\Carbon::parse($property->created_at)->format('d-M-Y')}}</span>
                        </small>
                        <div class="row pt-1">
                          <div class="col-6">
                            <div class="text-primary text-break">
                              <strong>Sale Price: {{ '$'.number_format($property->sale_price, 2)}}</strong>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="text-success text-break">
                              <strong>Rent Price: {{ '$'.number_format($property->rent_price, 2)}}</strong>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <span class="thumbnail-small">
  
                              @foreach($property->images as $key => $image)
                                <img class="img-fluid small-thumbnail" src="{{asset('storage/'.$image)}}" alt="Card image cap">
                              @endforeach
  
                            </span>
                            
                          </div>
                          <div class="col-md-6">
                            <img src="https://testing.z1central.com/assets/default.png" class="img-fluid border-0 p-0 small-thumbnail float-right" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              @endif
            @endforeach

            @foreach ($entry->properties as $property)
            @if(!empty($property->contact_id))
            <div class="tab-pane fade" id="contactProperty" role="tabpanel" aria-labelledby="Owner Property">
              <div class="col-md-12 p-0">
                <a href="#" class="text-decoration-none">
                  <div class="d-flex border mb-3">
                    <div class="p-2 w-200">
                      @if(!empty($property->photo_front_side))
                        <img src="{{$property->photo_front_side}}"  width="200" alt="photo_front_side">
                      @else
                        <img src="{{ asset('imgs/default.png') }}" width="200" alt="Default-Image">
                      @endif
                    </div>
                    <div class="p-2 flex-fill">
                      {{-- <h4 class="card-title"><b></b> <span class="float-right">001056</span></h4>
                      <p class="text-description mb-2">Land with Village in Beong kok</p> --}}
                      <h5 class="card-title">
                        <b>{{ $property->project_building}}</b> 
                        <span class="float-right">{{ $property->id }}</span>
                      </h5>
                      <small class="text-muted">
                        <span>{{ Str::limit($property->Address, 60) }}</span> /
                        <span>{{ $property->zone_type }}</span>/
                        <span>{{ \Carbon\Carbon::parse($property->created_at)->format('d-M-Y')}}</span>
                      </small>
                      <div class="row pt-1">
                        <div class="col-6">
                          <div class="text-primary text-break">
                            <strong>Sale Price: {{ '$'.number_format($property->sale_price, 2)}}</strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="text-success text-break">
                            <strong>Rent Price: {{ '$'.number_format($property->rent_price, 2)}}</strong>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <span class="thumbnail-small">

                            @foreach($property->images as $key => $image)
                              <img class="img-fluid small-thumbnail" src="{{asset('storage/'.$image)}}" alt="Card image cap">
                            @endforeach

                          </span>
                          
                        </div>
                        <div class="col-md-6">
                          <img src="https://testing.z1central.com/assets/default.png" class="img-fluid border-0 p-0 small-thumbnail float-right" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            @endif
          @endforeach
        
            
            <div class="tab-pane fade " id="ZjY3YjQ2ZjgtMzdhNC00Zjg3LWIwYjctMmJkZmIyZDg1M2M42" role="tabpanel" aria-labelledby="Property">
              <div class="col-md-12 p-0">
                <a href="https://testing.z1central.com/admin/property/1057/show" class="text-decoration-none">
                  <div class="d-flex border mb-3">
                    <div class="p-2 w-200">
                      <img src="https://testing.z1central.com/thumbnail/medium/uploads/images/202007/46bbb3c4451d4eed7dbfc17fff05276b.jpeg" width="200">
                    </div>
                    <div class="p-2 flex-fill">
                      {{-- <h4 class="card-title"><b></b> <span class="float-right">001057</span></h4>
                      <p class="text-description mb-2">Village in Toul kok</p> --}}
                      <h4 class="card-title">
                        <b>Land with Village in Beong kok</b> 
                        <span class="float-right">001056</span>
                      </h4>
                      <small class="text-muted">
                        <span>Tuol Kouk, Phnom Penh Capital</span> /
                        <span>Residential Property</span>/
                        <span>06-Jul-2020</span>
                      </small>
                      <div class="row pt-2">
                        <div class="col-6">
                          <div class="text-primary text-break">
                            <strong>Sale Price:$500,000.00</strong>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="text-success text-break">
                            <strong>Rent Price:</strong>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <span class="thumbnail-small">
                            <img src="https://testing.z1central.com/uploads/images/202007/46bbb3c4451d4eed7dbfc17fff05276b.jpeg" class="img-fluid small-thumbnail" alt="Card image cap">
                          </span>
                        </div>
                        <div class="col-md-6">
                          <img src="https://testing.z1central.com/assets/default.png" class="img-fluid border-0 p-0 small-thumbnail float-right" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="tab-pane fade " id="ZjY3YjQ2ZjgtMzdhNC00Zjg3LWIwYjctMmJkZmIyZDg1M2M43" role="tabpanel" aria-labelledby="Listing">
              <div class="col-md-12 p-0">
                <a href="https://testing.z1central.com/admin/listing/29/show" class="text-decoration-none">
                  <div class="d-flex border mb-3">
                    <div class="p-2 w-200">
                      <img src="https://testing.z1central.com/thumbnail/medium/uploads/images/202007/970606273abc9d232951a68585504b1e.jpeg" width="200">
                    </div>
                    <div class="p-2 flex-fill">
                      <h4 class="card-title">
                        <b>Land with Village in Beong kok</b> 
                        <span class="float-right">001056</span>
                      </h4>
                        
                        <small class="text-muted">
                          <span>Tuol Kouk, Phnom Penh Capital</span> /
                          <span>Residential Property</span>/
                          <span>06-Jul-2020</span>
                        </small>
                        <div class="row pt-2">
                          <div class="col-6">
                            <div class="text-primary text-break">
                              <strong>Sale Price:</strong>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="text-success text-break">
                              <strong>Rent Price:</strong>
                            </div>
                          </div>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                          <span class="thumbnail-small">
                            <img src="https://testing.z1central.com/uploads/images/202007/970606273abc9d232951a68585504b1e.jpeg" class="img-fluid small-thumbnail" alt="Card image cap">
                        </span>
     
                      </div>
                      <div class="col-md-6">
                        <img src="https://testing.z1central.com/assets/default.png" class="img-fluid border-0 p-0 small-thumbnail float-right" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        </div>
        </div>
  </div>
</div>  
@endsection

@section('after_styles')
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/show.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('packages/backpack/crud/contact/show.css') }}">
@endsection

@section('after_scripts')
	<script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('packages/backpack/crud/js/show.js') }}"></script>
@endsection
