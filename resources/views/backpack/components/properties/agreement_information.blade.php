<nav class="navbar navbar-light bg-light mt-3">
    <div class="navbar-brand font-weight-600">Agreement information</div>
</nav>
  <div class="row mt-3">
    <div class="col-6 col-sm-6 col-md-6">
      <label for="">Agreement Type : {{ $entry->agreement_type ?? 'N/A' }}</label>
    </div>
    <div class="col-6 col-sm-6 col-md-6">
      <label for="">Signed Date : {{ \Carbon\Carbon::parse($entry->agreement_sign_date)->format('j F, Y') }}</label><br>
      <label for="">Expired Date : {{ \Carbon\Carbon::parse($entry->agreement_expired_date)->format('j F, Y') }}</label>
    </div>
  </div>

  <nav class="text-black">
    <div class="row">
      <div class="col-6 col-sm-6 col-md-12"></div>
    </div>
  </nav>
  <div class="">
    <div class="row">
      <div class="col-6 col-sm-6 col-md-6">
        <div class="navbar bg-light mt-3 p-2 font-weight-bold">
          <span class="ml-2">Owner Information</span>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-md-6">
        <div class="bg-light mt-3 p-2 font-weight-bold">
          <span class="ml-2">Land Specialist</span>
        </div>
      </div>
    </div>
  </div>
  <nav class=" p-1 text-black mt-2">
    <div class="row ">
      <div class="col-6 col-sm-6 col-md-6">
        <label class="text-capitalize" for="">- Full Name : 
          <a class="text-capitalize" target="_blank" href="#">{{ optional($entry->owner)->FullName ?? 'N/A' }}</a>
        </label><br>
        <label for="">- Mobile Phone :
          <a href="#" class="text-capitalize">{{ optional($entry->owner)->con_phone ?? 'N/A' }}</a>
        </label><br>
        <label for="">- Business Phone : </label><br>
        <label for="">- Contact Type : {{ optional($entry->owner)->con_type ?? 'N/A' }}</label>
      </div>
      <div class="col-6 col-sm-6 col-md-6">
        <label class="text-capitalize" for="">- Full Name : 
          <a class="text-capitalize" target="_blank" href="#">{{ optional($entry->contact)->FullName ?? 'N/A' }}</a>
        </label><br>
        <label for="">- Mobile Phone :
          <a href="#" class="text-capitalize">{{ optional($entry->contact)->con_phone ?? 'N/A' }}</a>
        </label><br>
        <label for="">- Business Phone : </label><br>
        <label for="">- Contact Type : {{ optional($entry->contact)->con_type ?? 'N/A' }}</label>
      </div>
    </div>
  </nav>
