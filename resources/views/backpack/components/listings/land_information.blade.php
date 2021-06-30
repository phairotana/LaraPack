<div class="card card-primary">
    <div class="card-header with-border">
        <h3 class="card-title">land Information</h3> 
    </div>
    <div class="card-body" style="">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Width:</p>
                    <p>{{optional($entry->property)->land_width ?? 'N/A'}}m</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Land Area By Title Deed:</p>
                    <p>{{optional($entry->property)->land_area_by_title_deed ?? 'N/A'}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Title Deed Type:</p>
                    <p>{{optional($entry->property)->title_deed_type ?? 'N/A'}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Length:</p>
                    <p>{{optional($entry->property)->land_length ?? 'N/A'}}m</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Shape:</p>
                    <p>{{optional($entry->property)->shape ?? 'N/A'}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Title Deed No.:</p>
                    <p>{{optional($entry->property)->title_deed_no ?? 'N/A'}}</p>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <div class="form-group">
                    <p class="font-weight-bold mb-0">Land Area:</p>
                    <p>{{optional($entry->property)->land_area ?? 'N/A'}}m<sup>2</sup></p>
                </div>
            </div>
        </div>
    </div>
</div>