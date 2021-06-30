
       
@include('crud::fields.image', [
    "field" => [ 
        'label'     => 'Photo Front Side',
        'name'      => 'photo_front_side',
        'type'      => 'image',
        'upload'    => true,
        'aspect_ratio' => 1,
        'default' => asset('imgs/default.png'),
        'wrapperAttributes' => [
            'class' => 'form-group col-md-2',
        ]
    ]
])
{{-- @include('crud::fields.image', [
    "field" => [ 
        'label'     => 'Photo Left Side',
        'name'      => 'photo_left_side',
        'type'      => 'image',
        'upload'    => true,
        'aspect_ratio' => 1,
        'default' => asset('imgs/default.png'),
        'wrapperAttributes' => [
            'class' => 'form-group col-md-2',
        ]
    ]
])
@include('crud::fields.image', [
    "field" => [ 
        'label'     => 'Photo Right Side',
        'name'      => 'photo_right_side',
        'type'      => 'image',
        'upload'    => true,
        'aspect_ratio' => 1,
        'default' => asset('imgs/default.png'),
        'wrapperAttributes' => [
            'class' => 'form-group col-md-2',
        ]
    ]
])
@include('crud::fields.image', [
    "field" => [ 
        'label'     => 'Photo Back Side',
        'name'      => 'photo_back_side',
        'type'      => 'image',
        'upload'    => true,
        'aspect_ratio' => 1,
        'default' => asset('imgs/default.png'),
        'wrapperAttributes' => [
            'class' => 'form-group col-md-2',
        ]
    ]
])
@include('crud::fields.image', [
    "field" => [ 
        'label'     => 'Photo Opposite',
        'name'      => 'photo_opposite',
        'type'      => 'image',
        'upload'    => true,
        'aspect_ratio' => 1,
        'default' => asset('imgs/default.png'),
        'wrapperAttributes' => [
            'class' => 'form-group col-md-2',
        ]
    ]
]) --}}