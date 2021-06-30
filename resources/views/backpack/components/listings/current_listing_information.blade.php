
<div class="main-content">
    <div class="card card-primary">
    <div class="card-header with-border">
        <h5 class="card-title">Current listing information</h5>
    </div>

    <div class="card-body" style="">
        <div class="content-right-wrapper p-0">
        <div class="contact-information-content">
            <input type="hidden" id="hidden_listing_id" value="27">
            <div class="row listing_wrap">
            <div class="col-12">
                <span class="font-weight-600">Listing ID : </span>
                <a href="#" class="text-primary">
                    <u>{{ $entry->ListingCode}}</u>
                </a>
            </div>
            <div class="col-6">
                <div class="form-group">
                <span class="text-primary font-weight-600">Sale</span>
                <p><span class="text-primary text-break">{{'$'.number_format($entry->sale_list_price, 2)}}</span></p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <span class="text-success font-weight-600">Rent</span>
                    <p><span class="text-success text-break">{{'$'.number_format($entry->rent_list_price, 2)}}</span></p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <span class="font-weight-600">Sale Commission</span>
                    <p><span class="text-success text-break">{{'$'.number_format($entry->sale_commission, 2)}}</span></p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <span class="font-weight-600">Rental Commission</span>
                    <p><span class="text-success text-break">{{'$'.number_format($entry->rental_commission, 2)}}</span></p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <span class="font-weight-600">Owner name</span>
                    <p>{{ optional($entry->owner)->FullName }}</p>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <span class="font-weight-600">Agency name</span>
                    <p>{{ optional($entry->contact)->FullName }}</p>
                </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <span class="font-weight-600">Sign Date</span>
                <p>{{ \Carbon\Carbon::parse($entry->excusive_date)->format('j F, Y') }}</p>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <span class="font-weight-600">Expired Date</span>
                <p>{{ \Carbon\Carbon::parse($entry->exclusive_expires_date)->format('j F, Y') }}</p>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group checkbox">
            <input type="checkbox" class="js_checkbox mr-2" id="is_sale" name="is_sale" data-id="{{ $entry->id }}" value="{{ $entry->is_sale }}" {{ $entry->is_sale ? 'checked' : '' }}>
                <span class="font-weight-600">Sale</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <input type="checkbox" class="js_checkbox mr-2" id="is_rent" name="is_rent" data-id="{{ $entry->id }}" value="{{ $entry->is_rent }}" {{ $entry->is_rent ? 'checked' : '' }}>
                <span class="font-weight-600">Rent</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group" title="Active">
                <input type="checkbox" class="js_checkbox mr-2" id="status" name="status" data-id="{{ $entry->id }}" value="{{ $entry->status }}" {{ $entry->status ? 'checked' : '' }}>
                <span class="font-weight-600">Active</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group" title="Show on map">
                <input type="checkbox" class="js_checkbox mr-2" id="show_on_map" name="show_on_map" data-id="{{ $entry->id }}" value="{{ $entry->show_on_map }}" {{ $entry->show_on_map ? 'checked' : '' }}>
                <span class="font-weight-600">Show map</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group" title="Display on first page">
                <input type="checkbox" class="js_checkbox mr-2" id="display_on_first_page" name="display_on_first_page" data-id="{{ $entry->id }}" value="{{ $entry->display_on_first_page }}" {{ $entry->display_on_first_page ? 'checked' : '' }}>
                <span class="font-weight-600">Display</span>
            </div>
            </div>
            <div class="col-6">
            <div class="form-group" title="Show agent on website">
                <input type="checkbox" class="js_checkbox mr-2" id="show_agent_on_website" name="show_agent_on_website" data-id="{{ $entry->id }}" value="{{ $entry->show_agent_on_website }}" {{ $entry->show_agent_on_website ? 'checked' : '' }}>
                <span class="font-weight-600">Show agent</span>
            </div>
            </div>
            <div class="col-12">
            <div class="form-group mb-1" title="Show price per square meter">
                <input type="checkbox" class="js_checkbox mr-2" id="show_price_per_square_meter" name="show_price_per_square_meter" data-id="{{ $entry->id }}" value="{{ $entry->show_price_per_square_meter }}" {{ $entry->show_price_per_square_meter ? 'checked' : '' }}>
                <span class="font-weight-600">Show price per square meter</span>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
        
</div> 


