<nav class="navbar navbar-light bg-light mt-3">
    <div class="navbar-brand font-weight-600">Title Deed Information</div>
  </nav>
  <div class="row">
    <div class="form-group-sm col-sm-6 mt-3">
      <label>Title Deed Type : {{ $entry->title_deed_type }}</label><br>
      <label class="mb-0">Issued Year : {{ $entry->issued_year }}</label>
    </div>
    <div class="form-group-sm col-sm-6 mt-3">
      <label>Title Deed No. : {{ $entry->title_deed_no }}</label><br>
      <label class="mb-0">Parcel No. : {{ $entry->parcel_no }}</label><br>
    </div>
  </div>
  <div class="bg-light mt-3 mb-3">
    <div class="m-0 p-3">
      <label class="p-1" for="">Title Deed Photos :</label><br>
        @foreach ($entry->title_deed_photos as $key => $title_deed_photo)
          <a class="example-image-link " href="{{asset('storage/'.$title_deed_photo)}}" data-lightbox="example-1">
            <img class="example-image img-thumbnail mr-1 mb-2" src="{{asset('storage/'.$title_deed_photo)}}" alt="image-1" style="height: 80px">
          </a>
        @endforeach
    </div>
  </div>
