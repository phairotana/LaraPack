@include('crud::fields.custom_html', [
    "field" => [ 
        'name'  => 'Line_break',
        'type'  => 'custom_html',
        'value' => '<div class="border-top col-md-12 mt-4 pt-3">
                        </div>'
    ]
])
@include('crud::fields.number', [
    "field" => [ 
        'name'  => 'sale_commission',
        'label' => 'Sale Commission',
        'type'  => 'number',
        'attributes' => [
            'class' => 'form-control',
        ],
        'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ], 
    ]
])
@include('crud::fields.number', [
    "field" => [ 
        'name'  => 'rental_commission',
        'label' => 'Rental Commission',
        'type'  => 'number',
        'attributes' => [
            'class' => 'form-control',
        ],
        'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ], 
    ]
])
@include('crud::fields.date_picker', [
    "field" => [ 
        'name'  => 'excusive_date',
        'label' => 'Exclusive Date',
        'type'  => 'date_picker',
        // optional:
        'date_picker_options' => [
            'todayBtn' => 'linked',
            'format'   => 'dd-mm-yyyy',
            'language' => 'en'
        ],
        'attributes' => [
            'class' => 'form-control some-class',
            ],
            'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],
    ]
])
@include('crud::fields.date_picker', [
    "field" => [ 
        'name'  => 'exclusive_expires_date',
        'label' => 'Expires Date',
        'type'  => 'date_picker',
        // optional:
        'date_picker_options' => [
            'todayBtn' => 'linked',
            'clearBtn' => true,
            'format'   => 'dd-mm-yyyy',
            'language' => 'en'
        ],
        'attributes' => [
            'class' => 'form-control some-class',
            ],
            'wrapperAttributes' => [
            'class' => 'form-group col-md-6'
        ],
    ]
])
@include('crud::fields.checkbox', [
    "field" => [ 
        'name'  => 'status',
        'label' => 'Active',
        'type'  => 'checkbox',
        'wrapperAttributes' => [
            'class' => 'form-group col-md-3'
        ],
    ]
])
@include('crud::fields.checkbox', [
    "field" => [ 
        'name'  => 'show_on_map',
        'label' => 'Show on map',
        'type'  => 'checkbox',
        'wrapperAttributes' => [
            'class' => 'form-group col-md-3'
        ],
    ]
])
@include('crud::fields.checkbox', [
    "field" => [ 
        'name'  => 'show_agent_on_website',
        'label' => 'Show agent on website',
        'type'  => 'checkbox',
        'wrapperAttributes' => [
            'class' => 'form-group col-md-3'
        ], 
    ]
])
@include('crud::fields.checkbox', [
    "field" => [ 
        'name'  => 'display_on_first_page',
        'label' => 'Display on first pageShow on map',
        'type'  => 'checkbox',
        'wrapperAttributes' => [
            'class' => 'form-group col-md-3'
        ], 
    ]
])
@include('crud::fields.textarea', [
    "field" => [ 
        'name'  => 'additional_items',
        'label' => 'Additional items',
        'type'  => 'textarea',
        'attributes' => [
            'rows' => '5', 
        ]
    ]
])