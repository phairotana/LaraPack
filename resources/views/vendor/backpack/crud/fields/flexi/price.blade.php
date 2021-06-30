    @include('crud::fields.inc.wrapper_start')
        <table class="table border mb-0">
            <thead class="thead">
                <tr>
                    <th class="border text-center" scope="col" rowspan="2"></th>
                    <th class="border text-center" colspan="2" scope="col">Asking Price</th>
                    <th class="border text-center" colspan="2">Negotiable Price</th>
                    <th class="border text-center" colspan="2">Listing price</th>
                    <th class="border text-center" colspan="2">Sold/Rented</th>
                    <th class="border text-center">Commission</th>
                </tr>
                <tr>
                    <th class="border text-center" scope="col" width="10%">Total</th>
                    <th class="border text-center text-nowrap" scope="col" width="10%">Per sqm</th>
                    <th class="border text-center" scope="col" width="10%">Total</th>
                    <th class="border text-center text-nowrap" scope="col" width="10%">Per sqm</th>
                    <th class="border text-center" scope="col" width="10%">Total</th>
                    <th class="border text-center text-nowrap" scope="col" width="10%">Per sqm</th>
                    <th class="border text-center" scope="col" width="10%">Total</th>
                    <th class="border text-center text-nowrap" scope="col" width="10%">Per sqm</th>
                    <th class="border text-center" scope="col" width="10%">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="input-field">
                    <th class="border text-center p-0 align-middle" scope="row">Sale</th>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_price_asking',
                                'value' => $entry->sale_price_asking ?? '',
                                'attributes' => [
                                    'id' => 'sale_price_asking',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_asking_price_per_sqm',
                                'value' => $entry->sale_asking_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'sale_asking_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_price',
                                'value' => $entry->sale_price ?? '',
                                'attributes' => [
                                    'id' => 'sale_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_price_per_sqm',
                                'value' => $entry->sale_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'sale_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]     
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_list_price',
                                'value' => $entry->sale_list_price ?? '',
                                'attributes' => [
                                    'id' => 'sale_list_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ] 
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_listing_price_per_sqm',
                                'value' => $entry->sale_listing_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'sale_listing_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ] 
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sold_price',
                                'value' => $entry->sold_price ?? '',
                                'attributes' => [
                                    'id' => 'sold_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sold_price_per_sqm',
                                'value' => $entry->sold_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'sold_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'sale_commission',
                                'value' => $entry->sale_commission ?? '',
                                'attributes' => [
                                    'id' => 'sale_commission',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                </tr>
                <tr>
                    <th class="border text-center p-0 align-middle" scope="row">Rent</th>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_price_asking',
                                'value' => $entry->rent_price_asking ?? '',
                                'attributes' => [
                                    'id' => 'rent_price_asking',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_asking_price_per_sqm',
                                'value' => $entry->rent_asking_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'rent_asking_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_price',
                                'value' => $entry->rent_price ?? '',
                                'attributes' => [
                                    'id' => 'rent_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_price_per_sqm',
                                'value' => $entry->rent_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'rent_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_list_price',
                                'value' => $entry->rent_list_price ?? '',
                                'attributes' => [
                                    'id' => 'rent_list_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rent_listing_price_per_sqm',
                                'value' => $entry->rent_listing_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'rent_listing_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rented_price',
                                'value' => $entry->rented_price ?? '',
                                'attributes' => [
                                    'id' => 'rented_price',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rented_price_per_sqm',
                                'value' => $entry->rented_price_per_sqm ?? '',
                                'attributes' => [
                                    'id' => 'rented_price_per_sqm',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                    <td class="border text-center p-0">
                        @include('crud::fields.inc_blade.number_no_label', [
                            "field" => [ 
                                'name'  => 'rental_commission',
                                'value' => $entry->rental_commission ?? '',
                                'attributes' => [
                                    'id' => 'rental_commission',
                                    'class' => 'form-control price_and_commission',
                                    'step' => '0.00',
                                ]
                            ]
                        ])
                    </td>
                </tr>
            
            </tbody>
        </table>
    @include('crud::fields.inc.wrapper_end')

    @if ($crud->fieldTypeNotLoaded($field))
        @php
            $crud->markFieldTypeAsLoaded($field);
        @endphp

        {{-- FIELD EXTRA CSS  --}}
        {{-- push things in the after_styles section --}}
        @push('crud_fields_styles')
            <!-- no styles -->
        @endpush

        {{-- FIELD EXTRA JS --}}
        {{-- push things in the after_scripts section --}}
        @push('crud_fields_scripts')
            
            <!-- no scripts -->
            <script type="text/javascript">
                $('#sale_asking_price_per_sqm').attr('step', 'any');
                $('#sale_price_per_sqm').attr('step', 'any');
                $('#sale_listing_price_per_sqm').attr('step', 'any');
                $('#sold_price_per_sqm').attr('step', 'any');
        
                $('#rent_asking_price_per_sqm').attr('step', 'any');
                $('#rent_price_per_sqm').attr('step', 'any');
                $('#rent_listing_price_per_sqm').attr('step', 'any');
                $('#rented_price_per_sqm').attr('step', 'any');

                $(document).ready(function(){
                    $(".price_and_commission").keypress(function(e) {
                        var totalSize = $('#land_area');
                        $(`#${this.getAttribute('id')}`).on('click', function(e) {
                            $(`#${this.getAttribute('id')}`).popover('hide');
                        });
                        if (!totalSize.val()) {
                            e.preventDefault();
                            totalSize.addClass('is-invalid');
                            $(`#${this.getAttribute('id')}`).popover({
                                html: true,
                                content: '<a href="#land_area">Go to</a>',
                                title: "Please input Total Size!"
                            });
                            $(`#${this.getAttribute('id')}`).popover('show');
                            setTimeout(() => {
                                $(`#${this.getAttribute('id')}`).popover('hide');
                            }, 3000);
                        }
                    });
        
                    function calculateSQM(totalSize, thePrice, componentId) {
                        if (totalSize && thePrice) {
                            var x = parseFloat(totalSize);
                            var y = parseFloat(thePrice);
                            var result = (y / x).toFixed(2);
                            // alert(result);
                            $(componentId).val(result);
                        }
                    }
        
                    $(".price_and_commission").on('change', function(e) {
                        var totalSize = $('#land_area').val();
                        var thePrice = this.value;
        
                        if (this.getAttribute('id') == 'sale_price_asking') calculateSQM(totalSize, thePrice, '#sale_asking_price_per_sqm');
                        else if (this.getAttribute('id') == 'sale_price') calculateSQM(totalSize, thePrice, '#sale_price_per_sqm');
                        else if (this.getAttribute('id') == 'sale_list_price') calculateSQM(totalSize, thePrice, '#sale_listing_price_per_sqm');
                        else if (this.getAttribute('id') == 'sold_price') calculateSQM(totalSize, thePrice, '#sold_price_per_sqm');
                        else if (this.getAttribute('id') == 'rent_price_asking') calculateSQM(totalSize, thePrice, '#rent_asking_price_per_sqm');
                        else if (this.getAttribute('id') == 'rent_price') calculateSQM(totalSize, thePrice, '#rent_price_per_sqm');
                        else if (this.getAttribute('id') == 'rent_list_price') calculateSQM(totalSize, thePrice, '#rent_listing_price_per_sqm');
                        else if (this.getAttribute('id') == 'rented_price') calculateSQM(totalSize, thePrice, '#rented_price_per_sqm');
                    });
        
                    $("#land_area").on('change', function(e) {
                        if ($(this).hasClass('is-invalid')) {
                            $(this).removeClass('is-invalid');
                        }
                    });
        
                    $('#sale_commission').keypress(function(e) {
                        var ch = String.fromCharCode(e.which);
                        if (!(/[0-9,%]/).test(ch)) {
                            e.preventDefault();
                        }
                    });
                    $('#rental_commission').keypress(function(e) {
                        var ch = String.fromCharCode(e.which);
                        if (!(/[0-9,%]/).test(ch)) {
                            e.preventDefault();
                        }
                    });
        
                });
        
            </script>

        @endpush
    @endif


