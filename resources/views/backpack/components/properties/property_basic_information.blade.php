<nav class="navbar navbar-light bg-light mt-3">
    <div for="" class="navbar-brand font-weight-600">Property Basic Information</div>
  </nav>
  <div class="row">
    <div class="form-group-sm col-sm-6 mt-3">
      <label>Record Type : {{ $entry->record_type }}</label><br>
      <label>Property Type : Vacant Land</label><br>
      <label>Current Use : {{ $entry->current_use }}</label><br>
      <label>Data Source : {{ $entry->data_source }}</label><br>
    </div>
    <div class="form-group-sm col-sm-6 mt-3">
      <label>Tenure : {{ $entry->tenure_type }}</label><br>
      <label>Zoning : {{ $entry->zone_type }}</label><br>
      <label>View : {{ $entry->view }}</label><br>
      <label>Topography : {{ $entry->topography }}</label><br>
      <label>Shape : {{ $entry->land_shape_type }}</label>
    </div>
  </div>