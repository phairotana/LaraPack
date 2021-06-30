<div class="card card-primary">
  <div class="card-header with-border">
    <div class="row">
      <div class="col-md-8">
        <h5 class="font-weight-600 mb-0">Property Information</h5>
      </div>
      <div class="col-md-4">
        <label class="mb-0 float-right">
          <i class="font-weight-600">Status : AA</i>
          <i class="text-warning text-capitalize"></i>
        </label>
      </div>
    </div>
  </div>
  
  <div class="card-body" style="">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="text-property-id">
          <div>
            <span>Property ID : </span>
              <a href="#">{{ $entry->ConcatenateID }}</a>
          </div>
        </div>
        <span>Create Date : {{ $entry->created_at->format('d M Y') }}</span>
      </div>
    </div>
    <!-- Slider property images -->
    <div id="myCarousel" class="carousel slide text-center">
      
      <div class="carousel-inner">
        @foreach ($entry->property->images as $key => $img)
          <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
            <img class="d-block w-100" src="{{asset('storage/'.$img)}}" alt="First slide">
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <ol class="mt-2" >
        @foreach ($entry->property->images as $key => $img)
          <li class="list-inline-item">
              <a data-target="#myCarousel" data-slide-to="{{$key}}" class="{{ $key == 0 ? 'active' : '' }}">
                <img src="{{asset('storage/'.$img)}}" height="50" class="rounded img-hover">
              </a>
          </li>
        @endforeach
      </ol>
    </div>

    <div class="row">
      <div class="col-8 col-sm-6 col-md-8">
        <label class="font-weight-600 font-size-25">Vacant Land</label> 
        <label class="font-weight-600 font-size-25">For Sale</label>
      </div>
      <div class="col-4 col-sm-6 col-md-4">
        <div class="text-right">
          <div class="font-weight-600 font-size-25">$832.00</div>
          {{-- <div class="font-weight-600 font-size-25">$143.00/month</div> --}}
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-6 col-sm-6 col-md-4">
        <div>Title Deed</div>
        <div class="font-weight-600">{{ $entry->property->title_deed_type }}</div>
      </div>
      <div class="col-6 col-sm-6 col-md-8">
        <div class="">Totla Size</div>
        <div class="font-weight-600">{{ $entry->property->land_area . "m"}}<sup>2</sup></div>
      </div>
    </div>

  </div>
</div>






