
<div class="mnb-custom d-flex flex-wrap w-100 mb-3 bg-white">
    <div class="d-flex justify-content-between flex-wrap w-100">
        <ul class="nav" role="tabTitle">
        <li class="nav-item">
            <a class="nav-link">
                <i class="la la-home"></i>More Info
            </a>
        </li>
        </ul>
        <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="tablist">
            <a class="nav-link active" data-toggle="tab" href="#taskTab" role="tab">Tasks</a>
        </li>
        <li class="nav-item" role="tablist">
            <a class="nav-link " data-toggle="tab" href="#priceTab" role="tab">Prices</a>
        </li>
        <li class="nav-item" role="tablist">
            <a class="nav-link " data-toggle="tab" href="#priceHistoryTab" role="tab">Price History</a>
        </li>
        </ul>
    </div>
    <div class="tab-content w-100">
        <div class="tab-pane fade show active" id="taskTab" role="tabpanel" aria-labelledby="Tasks">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Property Task Activities</h3>
                    <div class="card-tools pull-right">
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="la la-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="la la-times"></i></button> --}}
                    </div>
                </div>

    
                <div class="card-footer" style="">
                    <button type="button" id="macf-taskActivity-button" class="float-right macf-taskActivity-button btn btn-primary btn-sm macf-taskActivity-button"><i class="la la la-plus la-lg"></i>Add task
                    <!----></button>
                </div>
            </div>
    
            <div class="modal fade" id="modalConfirmDeleteTaskActivity" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeleteTaskActivityTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <div class="swal-icon swal-icon--warning">
                        <span class="swal-icon--warning__body">
                        <span class="swal-icon--warning__dot"></span>
                        </span>
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

        <div class="tab-pane fade " id="priceTab" role="tabpanel" aria-labelledby="Prices">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Property Price</h3>
                    <div class="card-tools pull-right">
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="la la-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="la la-times"></i></button> --}}
                    </div>
                </div>
        
                <div class="card-body" style="">
                </div>
        
                <div class="card-footer" style="">
                    <button type="button" id="macf-current_property_price-button" class="btn btn-sm btn-info btn-flat float-right macf-current_property_price-button"><i class="la la-edit"></i>Update price
                    <!----></button>
                </div>
            </div>
        </div>

        <div class="tab-pane fade " id="priceHistoryTab" role="tabpanel" aria-labelledby="Price History">
            <div class="card card-primary">
                <div class="card-header with-border">
                    <h3 class="card-title">Price History</h3>
                    <div class="card-tools pull-right">
                        {{-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="la la-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="la la-times"></i></button> --}}
                    </div>
                </div>

                <div class="card-body" style="">
                </div>
        
                <div class="card-footer" style="">
                    <button type="button" id="macf-new_property_price-button" class="btn btn-sm btn-primary btn-flat float-right macf-new_property_price-button"><i class="la la-plus"></i>Add new price
                    <!----></button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalConfirmDeletePriceHistory" tabindex="-1" role="dialog" aria-labelledby="modalConfirmDeletePriceHistoryTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="swal-icon swal-icon--warning">
                            <span class="swal-icon--warning__body">
                                <span class="swal-icon--warning__dot"></span>
                            </span>
                        </div>
                        <div class="text-center">
                            <div class="swal-title my-0">Warning</div>
                                <div class="swal-text mb-4">Are you sure you want to delete this item ?</div>
                        </div>
                        <div class="text-right">
                            <div class="swal-button-container">
                                <button class="swal-button swal-button--cancel bg-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="swal-button-container">
                                <button class="swal-button swal-button--delete bg-danger text-capitalize btnConfirmDeletePriceHistory">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>