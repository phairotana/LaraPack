
@if(isset($entry))
    @foreach($entry->units as $key => $unit)
        <div class="col-md-12 building-wrapper p-4">
            <div class="row border border-dark rounded pt-3 mb-3">
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <nav class="navbar navbar-light bg-light mt-3">
                                <span class="navbar-brand mb-0 h4">@lang('Basic Information')</span>
                            </nav>
                        </div>
                        @include('crud::fields.hidden', [
                            "field" => [  
                                'name'  => 'unit_id',
                                'value' => $unit->id,
                                'label' => '',
                                'type'  => 'hidden',
                                
                            ]
                        ])
                        @include('crud::fields.select_from_array', [
                            "field" => [  
                                'value' => $unit->unit_project_building,
                                'name'  => 'unit_project_building',
                                'label' => 'Parents Project',
                                'type'  => 'select_from_array',
                                'options' => [
                                    '-' => '-',
                                    'Borey Peng Hout' => 'Borey Peng Hout',
                                    'Borey Leng Navatra' => 'Borey Leng Navatra',
                                ],
                                'attributes' => [
                                    'class' => 'form-control some-class',
                                ], 
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.text', [
                            "field" => [ 
                                'value' => $unit->unit_project_name,
                                'name'  => 'unit_project_name',
                                'label' => 'Project Name',
                                'type'  => 'text',
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.text', [
                            "field" => [ 
                                'value' => $unit->unit_name,
                                'name'  => 'unit_name',
                                'label' => 'Building Name/House Type',
                                'type'  => 'text',
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.select_from_array', [
                            "field" => [  
                                'value' => $unit->unit_current_use,
                                'name'  => 'unit_current_use',
                                'label' => 'Current Use',
                                'type'  => 'select_from_array',
                                'options' => [
                                    '-' => '-',
                                    'School' => 'School',
                                    'Office' => 'Office',
                                    'Restaurant' => 'Restaurant',
                                ],
                                'attributes' => [
                                    'class' => 'form-control some-class',
                                ], 
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.select_from_array', [
                            "field" => [  
                                'value' => $unit->unit_style,
                                'name'  => 'unit_style',
                                'label' => 'Style',
                                'type'  => 'select_from_array',
                                'options' => [
                                    '-' => '-',
                                    'Modern' => 'Modern',
                                    'Classic' => 'Classic',
                                ],
                                'attributes' => [
                                    'class' => 'form-control some-class',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_width,
                                'name'  => 'unit_width',
                                'label' => 'Width',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_length,
                                'name'  => 'unit_length',
                                'label' => 'Length',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],         
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->gross_floor_area,
                                'name'  => 'gross_floor_area',
                                'label' => 'Gross Floor Area',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                        "field" => [
                            'value' => $unit->net_floor_area,
                            'name'  => 'net_floor_area',
                            'label' => 'Net Floor Area',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_bedroom,
                                'name'  => 'unit_bedroom',
                                'label' => '# of Bedroom',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ], 
                                ]
                            ])
                            @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_bathroom,
                                'name'  => 'unit_bathroom',
                                'label' => '#of Bathroom',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                            ])
                            @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_livingroom,
                                'name'  => 'unit_livingroom',
                                'label' => '# of Livingroom',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                            ])
                            @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->unit_diningroom,
                                'name'  => 'unit_diningroom',
                                'label' => '# of Diningroom',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                            ])
                            @include('crud::fields.number', [
                                "field" => [ 
                                    'value' => $unit->unit_floor,
                                    'name'  => 'unit_floor',
                                    'label' => '# of Floor',
                                    'type'  => 'number',
                                    'attributes' => [
                                        'class' => 'form-control',
                                        ],
                                        'wrapperAttributes' => [
                                        'class' => 'form-group col-md-12'
                                        ], 
                                    ]
                                ])
                            @include('crud::fields.number', [
                            "field" => [
                                'value' => $unit->unit_stories,
                                'name'  => 'unit_stories',
                                'label' => '# of Stories',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                            ])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <nav class="navbar navbar-light bg-light mt-3">
                                <span class="navbar-brand mb-0 h4">@lang('Features')</span>
                            </nav>
                        </div>
                        @include('crud::fields.number', [
                            "field" => [
                                'value' => $unit->unit_car_parking,
                                'name'  => 'unit_car_parking',
                                'label' => 'Car Parkings',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                        ])
                        @include('crud::fields.number', [
                        "field" => [ 
                            'value' => $unit->unit_motor_parking,
                            'name'  => 'unit_motor_parking',
                            'label' => 'Motor Parkings',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [
                                'value' => $unit->swimming_pool,
                                'name'  => 'swimming_pool',
                                'label' => 'Swimming poor',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                            ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [
                                'value' => $unit->fitness_gym,
                                'name'  => 'fitness_gym',
                                'label' => 'fitness gym',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                            ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [ 
                                'value' => $unit->lift,
                                'name'  => 'lift',
                                'label' => 'Lift',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [
                                'value' => $unit->balcony,
                                'name'  => 'balcony',
                                'label' => 'Balcony',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                        'class' => 'form-group col-md-12'
                                    ],    
                            ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [ 
                                'value' => $unit->kitchen,
                                'name'  => 'kitchen',
                                'label' => 'Kitchen',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ],
                                ]
                        ])
                        @include('crud::fields.checkbox', [
                            "field" => [
                                'value' => $unit->security,
                                'name'  => 'security',
                                'label' => 'Security Guard',
                                'type'  => 'checkbox',
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])

                        <div class="form-group col-md-12">
                            <nav class="navbar navbar-light bg-light mt-3">
                                <span class="navbar-brand mb-0 h4">@lang('Other')</span>
                            </nav>
                        </div>
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->cost_estimate,
                                'name'  => 'cost_estimate',
                                'label' => 'Cost Estimates',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ], 
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->useful_life,
                                'name'  => 'useful_life',
                                'label' => 'Useful Life',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->effective_age,
                                'name'  => 'effective_age',
                                'label' => 'Effective Ages',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'value' => $unit->completion_year,
                                'name'  => 'completion_year',
                                'label' => 'Completion Year',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-md-12 building-wrapper p-4">
        <div class="row border border-dark rounded pt-3 mb-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-12">
                        <nav class="navbar navbar-light bg-light mt-3">
                            <span class="navbar-brand mb-0 h4">@lang('Basic Information')</span>
                        </nav>
                    </div>
                    @include('crud::fields.select_from_array', [
                        "field" => [  
                            'name'  => 'unit_project_building',
                            'label' => 'Parents Project',
                            'type'  => 'select_from_array',
                            'options' => [
                                '-' => '-',
                                'Borey Peng Hout' => 'Borey Peng Hout',
                                'Borey Leng Navatra' => 'Borey Leng Navatra',
                            ],
                            'attributes' => [
                                'class' => 'form-control some-class',
                            ], 
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.text', [
                        "field" => [ 
                            'name'  => 'unit_project_name',
                            'label' => 'Project Name',
                            'type'  => 'text',
                            'wrapperAttributes' => [
                            'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.text', [
                        "field" => [ 
                            'name'  => 'unit_name',
                            'label' => 'Building Name/House Type',
                            'type'  => 'text',
                            'wrapperAttributes' => [
                            'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.select_from_array', [
                        "field" => [  
                            'name'  => 'unit_current_use',
                            'label' => 'Current Use',
                            'type'  => 'select_from_array',
                            'options' => [
                                '-' => '-',
                                'School' => 'School',
                                'Office' => 'Office',
                                'Restaurant' => 'Restaurant',
                            ],
                            'attributes' => [
                                'class' => 'form-control some-class',
                            ], 
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.select_from_array', [
                        "field" => [  
                            'name'  => 'unit_style',
                            'label' => 'Style',
                            'type'  => 'select_from_array',
                            'options' => [
                                '-' => '-',
                                'Modern' => 'Modern',
                                'Classic' => 'Classic',
                            ],
                            'attributes' => [
                                'class' => 'form-control some-class',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_width',
                            'label' => 'Width',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_length',
                            'label' => 'Length',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],         
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'gross_floor_area',
                            'label' => 'Gross Floor Area',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                    "field" => [
                        'name'  => 'net_floor_area',
                        'label' => 'Net Floor Area',
                        'type'  => 'number',
                        'attributes' => [
                            'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_bedroom',
                            'label' => '# of Bedroom',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ], 
                            ]
                        ])
                        @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_bathroom',
                            'label' => '#of Bathroom',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_livingroom',
                            'label' => '# of Livingroom',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'unit_diningroom',
                            'label' => '# of Diningroom',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                        @include('crud::fields.number', [
                            "field" => [ 
                                'name'  => 'unit_floor',
                                'label' => '# of Floor',
                                'type'  => 'number',
                                'attributes' => [
                                    'class' => 'form-control',
                                    ],
                                    'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                    ], 
                                ]
                            ])
                        @include('crud::fields.number', [
                        "field" => [
                            'name'  => 'unit_stories',
                            'label' => '# of Stories',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                        ])
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="form-group col-md-12">
                        <nav class="navbar navbar-light bg-light mt-3">
                            <span class="navbar-brand mb-0 h4">@lang('Features')</span>
                        </nav>
                    </div>
                    @include('crud::fields.number', [
                        "field" => [
                            'name'  => 'unit_car_parking',
                            'label' => 'Car Parkings',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                    ])
                    @include('crud::fields.number', [
                    "field" => [ 
                        'name'  => 'unit_motor_parking',
                        'label' => 'Motor Parkings',
                        'type'  => 'number',
                        'attributes' => [
                            'class' => 'form-control',
                            ],
                            'wrapperAttributes' => [
                            'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [
                            'name'  => 'swimming_pool',
                            'label' => 'Swimming poor',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                        ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [
                            'name'  => 'fitness_gym',
                            'label' => 'fitness gym',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                        ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [ 
                            'name'  => 'lift',
                            'label' => 'Lift',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [
                            'name'  => 'balcony',
                            'label' => 'Balcony',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                    'class' => 'form-group col-md-12'
                                ],    
                        ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [ 
                            'name'  => 'kitchen',
                            'label' => 'Kitchen',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                                ],
                            ]
                    ])
                    @include('crud::fields.checkbox', [
                        "field" => [
                            'name'  => 'security',
                            'label' => 'Security Guard',
                            'type'  => 'checkbox',
                            'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])

                    <div class="form-group col-md-12">
                        <nav class="navbar navbar-light bg-light mt-3">
                            <span class="navbar-brand mb-0 h4">@lang('Other')</span>
                        </nav>
                    </div>
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'cost_estimate',
                            'label' => 'Cost Estimates',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                                ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ], 
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'useful_life',
                            'label' => 'Useful Life',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'effective_age',
                            'label' => 'Effective Ages',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                    @include('crud::fields.number', [
                        "field" => [ 
                            'name'  => 'completion_year',
                            'label' => 'Completion Year',
                            'type'  => 'number',
                            'attributes' => [
                                'class' => 'form-control',
                            ],
                                'wrapperAttributes' => [
                                'class' => 'form-group col-md-12'
                            ],
                        ]
                    ])
                </div>
            </div>
        </div>
    </div>
@endif


