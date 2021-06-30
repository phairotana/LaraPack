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
<!-- =================================== -->
<div class="container animated fadeIn p-0">
  <div class="row">


    <div class="col-md-9">
      <div class="main-content">

        <div class="card p-3">

          @include('backpack.components.properties.property_information')
          @include('backpack.components.properties.property_basic_information')
          @include('backpack.components.properties.property_dimension')
          @include('backpack.components.properties.title_deed_information')
          @include('backpack.components.properties.price&commission')
          @include('backpack.components.properties.building_information')
          @include('backpack.components.properties.agreement_information')
          @include('backpack.components.properties.additional_information')
          @include('backpack.components.properties.more_info')
       
        </div>
        
      </div>
    </div>

  </div>
</div>


@endsection

@section('after_styles')
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
  <link rel="stylesheet" href="{{ asset('packages/backpack/crud/contact/show.css') }}">
@endsection

@section('after_scripts')
	<script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('packages/backpack/crud/js/show.js') }}"></script>
  <script>
    $('.collapse show').collapse('hide');

  </script>
@endsection
