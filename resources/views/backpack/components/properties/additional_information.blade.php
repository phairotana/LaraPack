<nav class="navbar navbar-light bg-light mt-3">
    <label for="" class="navbar-brand mb-0 h3 font-weight-600">Additional Information</label>
</nav>
  <div class="description-content mt-2">
    <div class="property-description-value text-justify">
      <p>{!! $entry->description !!}</p>
    </div>
  </div>

  @foreach($entry->units as $unit) 
    <div class="card">
      <div class="card-header with-border p-3">
        <div class="row">
          <div class="col-md-8">
            <h5 class="font-weight-600 mb-0">Building Information</h5>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Facing Type:</p>
              <p>{{ $entry->view ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Floor:</p>
              <p>{{ $entry->unit_total_floor ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Stories:</p>
              <p>{{ $entry->stories ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Diningroom:</p>
              <p>{{ $entry->unit_total_diningroom ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Bathroom:</p>
              <p>{{ $entry->unit_total_bathroom ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Building Width:</p>
              <p>{{ $entry->building_width ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Livingroom:</p>
              <p>{{ $entry->unit_total_livingroom ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Bedroom:</p>
              <p>{{ $entry->unit_total_bedroom ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Building Length:</p>
              <p>{{ $entry->building_length ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Car Parking:</p>
              <p>{{ $entry->unit_total_car_parking ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Total Motor Parking:</p>
              <p>{{ $entry->unit_total_motor_parking ?? 'N/A' }}</p>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="form-group">
              <p class="font-weight-bold mb-0">Building Area:</p>
              <p>{{ $entry->building_area ?? 'N/A' }}</p>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table border mb-0">
                <thead class="thead-light">
                  <tr>
                    <th>Building Name/House Type</th>
                    <th>Type</th>
                    <th># of Stories</th>
                    <th>Width</th>
                    <th>Length</th>
                    <th>Area</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr data-toggle="collapse" data-target="#collapseUnit" aria-expanded="false" aria-controls="collapseUnit">
                      <td class="show_building" style="cursor: pointer"><i class="la la-plus-square-o mr-1"></i> {{ $unit->unit_name ?? 'N/A' }}</td>
                      <td class="show_building" style="cursor: pointer">{{$entry->type ?? 'N/A'}}</td>
                      <td class="show_building" style="cursor: pointer">{{ $unit->unit_stories ?? 'N/A' }}</td>
                      <td class="show_building" style="cursor: pointer">{{ $unit->unit_width ?? 'N/A'}}m</td>
                      <td class="show_building" style="cursor: pointer">{{ $unit->unit_length ?? 'N/A'}}m</td>
                      <td class="show_building" style="cursor: pointer">{{ $unit->unit_area ?? 'N/A' }}<sup>2</sup></td>
                      <td>
                    <div class="btn-group building-dropdown-toggle">
                      <button type="button" class="btn btn-secondary p-0" data-toggle="dropdown" aria-expanded="false">
                        <i class="nav-icon la la-cog p-1"></i>
                      </button>
                      <ul class="dropdown-menu">
                        <li>
                          <button type="button" id="macf-edit14-button" class="btn btn-info dropdown-item macf-edit14-button"><i class="la la-pencil-square text-info"></i>Edit
                          <!----></button>
                        </li>
                        <li>
                          <button type="button" data-id="14" class="btn btn-danger dropdown-item text-danger delete-building">
                            <i class="la la-trash text-danger"></i>Delete
                          </button>
                        </li>
                      </ul>
                    </div>
                    </td>
                  </tr>
                  <tr class="collapse" id="collapseUnit">
                    <td colspan="7">
                      <div class="contact-information-content">
                        @foreach ($entry->title_deed_photos as $key => $title_deed_photo)
                          <a class="example-image-link " href="{{asset('storage/'.$title_deed_photo)}}" data-lightbox="example-1">
                            <img class="example-image img-thumbnail mr-1 mb-2" src="{{asset('storage/'.$title_deed_photo)}}" alt="image-1" style="height: 80px">
                          </a>
                        @endforeach
                        
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Code</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-8 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Building Name/House Type</span>:  {{ $unit->unit_name ?? 'N/A' }}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Type</span>: {{ $entry->type ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Floor</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Stories</span>: {{ $unit->unit_stories ?? 'N/A' }}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Width</span>: {{ $unit->unit_width ?? 'N/A'}} m
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Length</span>: {{ $unit->unit_length ?? 'N/A'}} m
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Area</span>: {{ $unit->unit_area ?? 'N/A' }}<sup>2</sup>
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Cost Estimates</span>: {{ '$'.number_format($unit->cost_estimate, 2) ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Bedroom</span>: {{ $unit->unit_bedroom ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Bathroom</span>: {{ $unit->unit_bathroom ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Dining Room</span>: {{ $unit->unit_diningroom ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold"># of Living Room</span>: {{ $unit->unit_livingroom ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Motor Parkings</span>: {{ $unit->unit_motor_parking ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Car Parkings</span>: {{ $unit->unit_car_parking ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Useful Life</span>: {{ $unit->useful_life ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Effective Ages</span>: {{ $unit->effective_age ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Completion Year</span>: {{ $unit->completion_year ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Roofing Type</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Quality Type</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Design Appeal Type</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Gross Floor Area</span>: {{ $unit->gross_floor_area ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Net Floor Area</span>: {{ $unit->net_floor_area ?? 'N/A'}}
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Flooring Materials</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Floor Plan</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Main Walls</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Ceiling</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Window Frames</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Other Facilities</span>: N/A
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Kitchen</span>:
                                  @if($unit->kitchen == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Balcony</span>:
                                  @if($unit->balcony == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Swimming Pool</span>:
                                  @if($unit->swimming_pool == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Security Guard</span>:
                                  @if($unit->security == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Fitness Gym</span>:
                                  @if($unit->fitness_gym == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-4 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Lift</span>:
                                  @if($unit->lift == 1) 
                                    <i class="la la-check"></i>
                                  @else 
                                    <i class="la la-times"></i>
                                  @endif
                              </div>
                            </div>
                            <div class="col-lg-8 col-6 px-0">
                              <div class="form-group">
                                <span class="font-weight-bold">Rent Income Per Month</span>:
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          <div class="modal fade" id="modalConfirmDeleteTaskActivity" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteTaskActivityTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="swal-icon swal-icon--warning">
                    <span class="swal-icon--warning__body"></span>
                    <span class="swal-icon--warning__dot"></span>
      
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
                      <button class="swal-button swal-button--delete bg-danger text-capitalize btnConfirmDeleteTaskActivity">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        
      </div>
    </div>
  @endforeach
