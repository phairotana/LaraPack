<nav class="navbar navbar-light bg-light mt-3">
    <div class="navbar-brand font-weight-600">Building Information</div>
  </nav>
  <div class="mb-3">
    <div class="p-2 mt-3 border rounded">
      <div class="row p-2">
        <div class="col-12">
          <p class="font-weight-600">Building 1</p>
        </div>
        <div class="form-group-sm col-sm-6 mb-2">
          <div class="navbar p-2 font-weight-600 bg-light">
            <span class="ml-2">Basic Information</span>
          </div>
        </div>
        <div class="form-group-sm col-sm-6 mb-2">
          <div class="p-2 font-weight-600 bg-light">
            <span class="ml-2">Features</span>
          </div>
        </div>
        
        @foreach($entry->units as $unit)
        <div class="form-group-sm col-sm-6">
          <label for="">Parent Project Name : {{ $unit->unit_project_name ?? 'N/A' }} </label><br>
          <label for="">Project Name : {{ $unit->unit_project_building ?? 'N/A' }}</label><br>
          <label for="">Building Name/House Type : {{ $unit->unit_name ?? 'N/A' }}</label><br>
          <label for="">Current Use : </label><br>
          <label for="">Style : {{ $unit->unit_style ?? 'N/A' }}</label><br>
          <label for="">Width : {{ $unit->unit_width ?? 'N/A' }}</label><br>
          <label for="">Length : {{ $unit->unit_length ?? 'N/A' }}</label><br>
          <label for="">Total Size : {{ $unit->unit_area ?? 'N/A' }}</label><br>
          <label for="">Gross Floor Area : {{ $unit->gross_floor_area }}</label><br>
          <label for="">Net Floor Area : {{ $unit->net_floor_area }}</label><br>
          <label for=""># of Bedroom : {{ $unit->unit_bedroom ?? 'N/A' }}</label><br>
          <label for=""># of Bathroom : {{ $unit->unit_bathroom ?? 'N/A' }}</label><br>
          <label for=""># of Living Room : {{ $unit->unit_livingroom ?? 'N/A' }}</label><br>
          <label for=""># of Dining Room : {{ $unit->unit_diningroom ?? 'N/A' }}</label><br>
          <label for=""># of Floor : {{ $unit->unit_floor ?? 'N/A' }}</label><br>
          <label for=""># of Stories : {{ $unit->unit_stories ?? 'N/A' }}</label>
        </div>
        <div class="form-group-sm col-sm-6">
          <label for="">Car Parkings : {{ $unit->unit_car_parking ?? 'N/A' }}</label><br>
          <label for="">Motor Parkings : {{ $unit->unit_motor_parking ?? 'N/A' }}</label><br>
          <label for="">Fitness Gym : 
            @if($unit->fitness_gym == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif
          </label><br>
          <label for="">Swimming Pool : 
            @if($unit->swimming_pool == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif  
          </label><br>
          <label for="">Lift :
            @if($unit->lift​​​​ == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif 
          </label><br>
          <label for="">Balcony :
            @if($unit->balcony == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif  
          </label><br>
          <label for="">Kitchen : 
            @if($unit->kitchen == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif
          </label><br>
          <label for="">Security Guard : 
            @if($unit->security == 1) 
              <i class="la la-check"></i>
            @else 
              <i class="la la-times"></i>
            @endif
          </label>
          <div class="mt-2 mb-2 p-2 font-weight-600 bg-light">
            <span class="ml-2">Other</span>
          </div>
          <label for="">Cost Estimate : {{ $unit->cost_estimate }}</label><br>
          <label for="">Useful Life : {{ $unit->useful_life }}</label><br>
          <label for="">Effective Ages : {{ $unit->effective_age }}</label><br>
          <label for="">Completion Year : {{ $unit->completion_year}}</label>
        </div>
        @endforeach
      </div>
    </div>
  </div>