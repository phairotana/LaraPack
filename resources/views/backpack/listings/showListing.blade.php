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

    <div class="col-md-8">
      <div class="main-content">

        @include('backpack.components.listings.slide_building_information')
        @include('backpack.components.listings.address')
        @include('backpack.components.listings.description')
        @include('backpack.components.listings.land_information')
        @include('backpack.components.listings.building_information')
        @include('backpack.components.listings.more_info')

      </div>
    </div>

    <div class="col-md-4">
      @include('backpack.components.listings.current_listing_information')
      @include('backpack.components.listings.owner&contact_information')
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
    $(function(){
          
      $(".listing_wrap .js_checkbox").click(function(){
          var value = this.checked ? 1 : 0;
          var type = $(this).attr('name');
          var listingId = $(this).data('id');
          $(this).val(this.checked ? 1 : 0);

          $.ajax({
              dataType: "json",
              url: "{{ URL('listing') }}",
              data: { value : value, listingId : listingId, type : type },
              success: function (respond) {
                console.log(respond);
                  if(respond.message){
                      new Noty({
                      text: 'Your check have been changed.',
                      type: 'success'
                      }).show();    

                  }else{                            
                      new Noty({
                          text: 'You could not close this listing.',
                          type: 'danger'
                      }).show();
                  }              
              },
          });
      })
    });
  </script>


  <script>
    $('.collapse show').collapse('hide');
  </script>
@endsection