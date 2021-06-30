<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UnitRequest;
use App\Http\Requests\PropertyRequest;
use App\Repositories\UnitRepositoryEloquent;
use App\Repositories\ListingRepositoryEloquent;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class PropertyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */

class PropertyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{update as traitUpdate;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    
    protected $unitRepository;
    protected $listingRepository;
    public function setup()
    {
        // listing URL
        $this->isListing = $this->crud->passToView['isListing'] = $this->crud->getRequest()->is_listing === 'true';
        $entityName = $this->isListing ? 'listing' : 'property';
        $entityNames = $this->isListing ? 'listings' : 'properties';

        $this->crud->setModel('App\Models\Property');
        if($this->crud->getRequest()->is_listing === 'true') {
            $this->crud->setRoute(config('backpack.base.route_prefix') . '/property' . '?is_listing');
        } else {
            $this->crud->setRoute(config('backpack.base.route_prefix') . '/property');
        }
        
        $this->crud->setEntityNameStrings('property', 'properties');

        if ($this->isListing) {
            $this->crud->setEntityNameStrings($entityName, $entityNames);
        }
        // repositories
        $this->unitRepository = resolve(UnitRepositoryEloquent::class);
        $this->listingRepository = resolve(ListingRepositoryEloquent::class);

   

    }
    
    protected function setupListOperation()
    {
        $this->crud->addButtonFromModelFunction('line', 'btnConvert', 'convertToListing', 'end');
        $this->crud->addButtonFromModelFunction('line', 'btnForceDelete', 'forceDelete', 'end');
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'type',
            'type'  => 'select2',
            'label' => 'Type'
        ], function () {
            return [
                'Vacant_land' => 'Vacant_Land',
                'Agriultural_property' => 'Agriultural Property',
                'Apartment' => 'Apartment',
                'Condominum' => 'Condominum',
                'Commercial Property' => 'Commercial Property',
                'Industrial Property' => 'Industrial Property',
                'Residential Property' => 'Residential Property',
                'Specialized Property' => 'Specialized Property',
                'Mixed-user' => 'Mixed-user',
            ];
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'type', $value);
        });
        // dropdown filter
        $this->crud->addFilter([
            'name'  => 'transaction_type',
            'type'  => 'dropdown',
            'label' => 'Trans.Type'
        ], [
            'is_sale' => 'For Sale',
            'is_rent' => 'For Rent',
            'sale_rent' => 'Sale / Rent',
        ], function($value) { // if the filter is active
            if(!empty($value)) {
                if($value == 'is_sale') {
                    $this->crud->addClause('where', 'is_sale', 1);
                }
                elseif($value == 'is_rent') {
                    $this->crud->addClause('where', 'is_rent', 1);
                }
                else {
                    $this->crud->addClause('where', 'is_sale', 1);
                    $this->crud->addClause('where', 'is_rent', 1);
                }
            }
        });
        // text filter
        $this->crud->addFilter([
            'name'  => 'house_no',
            'type'  => 'text',
            'label' => 'House No'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'house_no', 'LIKE', "%$value%");
        });
        // text filter
        $this->crud->addFilter([
            'name'  => 'street_no',
            'type'  => 'text',
            'label' => 'Street No./Name'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'street_no', 'LIKE', "%$value%");
        });
        // text filter
        $this->crud->addFilter([
            'name'  => 'address',
            'type'  => 'text',
            'label' => 'Address'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'province', 'LIKE', "%$value%");
            $this->crud->addClause('where', 'district', 'LIKE', "%$value%");
            $this->crud->addClause('where', 'commune', 'LIKE', "%$value%");
            $this->crud->addClause('where', 'village', 'LIKE', "%$value%");
        });
        // select2_ajax filter
        $this->crud->addFilter([
            'name'        => 'owner_id',
            'type'        => 'select2_ajax',
            'label'       => 'Owner Information',
            'placeholder' => 'Pick a owner'
        ],
        url('property/ajax'), // the ajax route
        function($value) { // if the filter is active
            if(!empty($value)) {
                $this->crud->addClause('where', 'owner_id', $value);
            }   
        });
        // select2_ajax filter
        $this->crud->addFilter([
            'name'        => 'contact_id',
            'type'        => 'select2_ajax',
            'label'       => 'Land Specialist',
            'placeholder' => 'Pick a agency'
        ],
        url('property/ajax'), // the ajax route
        function($value) { // if the filter is 
            if(!empty($value)) {
                $this->crud->addClause('where', 'contact_id', $value);
            }   
        });
        
        $this->crud->addColumn([
            'name'  => 'photo_front_side',
            'label' => 'Profile Image',
            'type'  => 'image',  
            'prefix' => 'storage',
            'default' => 'asset(imgs/default.png)',
            'height' => '40px',
            'width'  => '40px',
        ]);
            
        $this->crud->addColumn([
            'name'  => 'ConcatenateID',
            'label' => 'Property ID',
            'type'  => 'text'
        ]);
        // $this->crud->addColumn([
        //     'name'  => 'name',
        //     'label' => 'Property Name',
        //     'type'  => 'text'
        // ]);
        $this->crud->addColumn([
            'name'  => 'type',
            'label' => 'Type',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'is_sale',
            'label' => 'For Sale',
            'type'  => 'check' 
        ]);
        $this->crud->addColumn([
            'name'  => 'is_rent',
            'label' => 'For Rent',
            'type'  => 'check' 
        ]);
        $this->crud->addColumn([
            'name' => 'Address',
            'Address' => 'Address',
            'type' => 'address',
        ]);
        $this->crud->addColumn([
            'name'      => 'owner_id',
            'label'     => 'Owner Information',
            'type'      => 'select',
            'entity'    => 'owner',
            'attribute' => 'FullName',
            'model'     => "App\Models\Contact",
        ]);
        $this->crud->addColumn([
            'name'      => 'contact_id',
            'label'     => 'Land Specialist',
            'type'      => 'select',
            'entity'    => 'contact',
            'attribute' => 'FullName',
            'model'     => "App\Models\Contact",
        ]);        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(PropertyRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        //  $this->crud->setFromDb();
        //Property Information
        $this->crud->addField([
            'name'  => '',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Properties Information</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'is_sale',
            'label' => 'Sale',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'is_rent',
            'label' => 'Rent',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'label'       => 'Owner',
            'type'        => "select2_from_ajax",
            'name'        => 'owner_id',
            'entity'      => 'contact', 
            'attribute'   => "Full_Name",
            'data_source' => url("property"), 
            // OPTIONAL
            'placeholder'             => "Pick owner",
            'minimum_input_length'    => 2,
            'model'                   => "App\Models\Contact",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],            
        ]);
        $this->crud->addField([
            'label'       => 'Lans Specialist',
            'type'        => "select2_from_ajax",
            'name'        => 'contact_id',
            'entity'      => 'contact', 
            'attribute'   => "Full_Name", 
            'data_source' => url("property"), 
            // OPTIONAL
            'placeholder'             => "Pick Lans Specialist", 
            'minimum_input_length'    => 2, 
            'model'                   => "App\Models\Contact",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        // Upload Property Photo
        $this->crud->addField([
            'name'  => 'Upload Property Photo',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Upload Property Photo</a>
                        </nav>',
        ]);
        $this->crud->addField([  
            'label'     => 'Photo Front Side',
            'name'      => 'photo_front_side',
            'type'      => 'image',
            'upload'    => true,
            'aspect_ratio' => 1,
            'default' => asset('imgs/photo-front.jpg'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        $this->crud->addField([  
            'label'     => 'Photo Left Side',
            'name'      => 'photo_left_side',
            'type'      => 'image',
            'upload'    => true,
            'aspect_ratio' => 1,
            'default' => asset('imgs/photo-left.jpg'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        $this->crud->addField([ 
            'label'     => 'Photo Right Side',
            'name'      => 'photo_right_side',
            'type'      => 'image',
            'upload'    => true,
            'aspect_ratio' => 1,
            'default' => asset('imgs/photo-right.jpg'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        $this->crud->addField([ 
            'label'     => 'Photo Back Side',
            'name'      => 'photo_back_side',
            'type'      => 'image',
            'upload'    => true,
            'aspect_ratio' => 1,
            'default' => asset('imgs/photo-back.jpg'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        $this->crud->addField([ 
            'label'     => 'Photo Opposite',
            'name'      => 'photo_opposite',
            'type'      => 'image',
            'upload'    => true,
            'aspect_ratio' => 1,
            'default' => asset('imgs/photo-opposite.jpg'),
            'wrapperAttributes' => [
                'class' => 'form-group col-md-2',
            ]
        ]);
        $this->crud->addField([   // Upload Multiple file
            'name'      => 'images',
            'label'     => 'Gallerys',
            'type'      => 'upload_multiple',
            'upload'    => true,
            'prefix'    => 'uploads',
            'temporary' => 10
        ]);

        // Address
        $this->crud->addField([
            'name'  => 'Address_path',
            'label' => 'Address',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Address</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'house_no',
            'type'  => 'text',
            'label' => "House No",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'Street_no',
            'type'  => 'text',
            'label' => 'Street No./Name',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'province',
            'type'  => 'text',
            'label' => 'Province/City',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'district',
            'type'  => 'text',
            'label' => 'District/Khan',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'commune',
            'type'  => 'text',
            'label' => 'Commune/Sangkat',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'village',
            'type'  => 'text',
            'label' => 'Village/Phum',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        // Property Basic Information
        $this->crud->addField([
            'name'  => 'Property Basic Information',
            'label' => 'Land Information',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Property Basic Information</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'record_type',
            'label' => "Record Type",
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'land' => 'Land',
                'building' => 'Building',
            ],
            'attributes' => [
                'class' => 'form-control some-class ',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'tenure_type',
            'type'  => 'select_from_array',
            'label' => 'Tenure',
            'options' => [
                '-' => '-',
                'freehold' => 'Freehold',
                'leasehold' => 'Leasehold',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'type',
            'type'  => 'select_from_array',
            'label' => 'Property Type',
            'options' => [
                '-' => '-',
                'Vacant_land' => 'Vacant_Land',
                'Agriultural_property' => 'Agriultural Property',
                'Apartment' => 'Apartment',
                'Condominum' => 'Condominum',
                'Commercial Property' => 'Commercial Property',
                'Industrial Property' => 'Industrial Property',
                'Residential Property' => 'Residential Property',
                'Specialized Property' => 'Specialized Property',
                'Mixed-user' => 'Mixed-user',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'zone_type',
            'type'  => 'select_from_array',
            'label' => 'Zoning',
            'options' => [
                '-' => '-',
                'residential' => 'Residential',
                'industrial' => 'Industrial',
                'Residential/Commercial' => 'Residential/Commercial',
                'Agricultural' => 'Agricultural',
                'Agricultural/Residential' => 'Agricultural/Residential',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'current_use',
            'label' => 'Current Use',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],    
        ]);
        $this->crud->addField([
            'name'  => 'view',
            'type'  => 'select_from_array',
            'label' => 'View',
            'options' => [
                '-' => '-',
                'North' => 'North',
                'East' => 'East',
                'West' => 'West',
                'South' => 'South'
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'data_source',
            'type'  => 'select_from_array',
            'label' => 'Data Source',
            'options' => [
                '-' => '-',
                'Owner' => 'Owner',
                'Agent' => 'Agent',
                'Brokery' => 'Brokery',
                'Buyer' => 'Buyer',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'topography',
            'type'  => 'select_from_array',
            'label' => 'Topography',
            'options' => [
                '-' => '-',
                'Level' => 'Level',
                'Unlevelled' => 'Unlevelled',
                'Unfilled' => 'Unfilled',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'land_width',
            'label' => 'Land Width',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],    
        ]);
        $this->crud->addField([
            'name'  => 'shape',
            'label' => 'Shape',
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'Rectangle' => 'Rectangle',
                'Square' => 'Square',
                'L-Shape' => 'L-Shape',
                'Triangle' => 'Triangle',
                'irregular' => 'Irregular',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ], 
        ]);
        $this->crud->addField([
            'name'  => 'land_area',
            'label' => 'Total Size',
            'type'  => 'number',
            'attributes' => [
                'id' => 'land_area',
            ],
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'land_length',
            'label' => 'Length',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'project_building',
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
                'class' => 'form-group col-md-6'
                ], 
        ]);
        // Title Deed Information
        $this->crud->addField([
            'name'  => 'Title Deed Information',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Title Deed Information</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'title_deed_type',
            'label' => 'Title Deed Type',
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'Hard' => 'Hard',
                'Soft' => 'Soft',
                'Hard(LMAP)' => 'Hard(LMAP)',
                'Other' => 'Other',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'title_deed_no',
            'label' => 'Title Deed No',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'issued_year',
            'label' => 'Issued Year',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'parcel_no',
            'label' => 'Parcel No.',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ], 
        ]);
        $this->crud->addField([   // Upload Title Deed Photos
            'name'      => 'title_deed_photos',
            'label'     => 'Upload Title Deed Photos',
            'type'      => 'upload_multiple',
            'upload'    => true,
            'prefix'    => 'uploads',
            'temporary' => 10
        ]);
        
        // Building Description
        $this->crud->addField([
            'name'  => 'Building_Description_part',
            'label' => 'Building_Description',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Building Description</a>
                        </nav>'
        ]);
        $this->crud->addField(
            [
                'name'  => 'building_form_input',
                'type'  => 'flexi.building',
            ]
        );
        // Price and Commission
        $this->crud->addField([
            'name'  => 'Price and Commission',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Price and Commission</a>
                        </nav>'
        ]);
        $this->crud->addField(
            [   // Table
                'name'  => 'price_form_input',
                'type'  => 'flexi.price',
            ]
        );

        // Agreement Information
        $this->crud->addField([
            'name'  => 'Agreement Information',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Agreement Information</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'agreement_type',
            'label' => 'Agreement Type',
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'Property Information Form' => 'Property Information Form',
                'Commission Agreement' => 'Commission Agreement',
                'Exclusive Agreement' => 'Exclusive Agreement',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'agreement_sign_date',
            'label' => 'Agreement Sign Date',
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
        ]);
        $this->crud->addField([
            'name'  => 'agreement_expired_date',
            'label' => 'Agreement Expired Date',
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
        ]);
        // $this->crud->addField([   // Upload Multiple file
        //     'name'      => 'agreement_file',
        //     'label'     => 'Upload Agreement File',
        //     'type'      => 'upload_multiple',
        //     'upload'    => true,
        //     'prefix'    => 'uploads',
        //     'temporary' => 10
        // ]);
        if($this->isListing) {
            $this->crud->addField(
                [
                    'name'  => 'append_listing_Property',
                    'type'  => 'flexi.append_listingInProperty',
                ]
            );
        }
        // Additional Information
        $this->crud->addField([
            'name'  => 'Additional Information',
            'type'  => 'custom_html',
            'value' => '<nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Additional Information</a>
                        </nav>'
        ]);
        $this->crud->addField([
            'name'  => 'description',
            'type'  => 'summernote',
            'label' => 'Description',
        ]);
    }

    public function store(){ 
        // dd($this->crud->getRequest());
        $this->priceAndCommission();
        $response = $this->traitStore();
        $unit_create = $this->unitRepository->repositoryStore($this->crud->entry, $this->crud->getRequest());
        $listing = $this->listingRepository->listingRepositoryStore($this->crud->entry, $this->crud->getRequest());
        return $response;
    }

    // Preview properties
    protected function setupShowOperation()
    {
        $this->crud->setShowView('backpack.properties.showProperties');
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    public function update()
    {
        $this->priceAndCommission();
        $response = $this->traitUpdate();
        $unit_update = $this->unitRepository->repositoryUpdate($this->crud->entry, $this->crud->getRequest());
        return $response;
    }

    public function priceAndCommission()
    {
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_price_asking']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_asking_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_list_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_listing_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sold_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sold_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'sale_commission']);
        
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_price_asking']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_asking_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_list_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rent_listing_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rented_price']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rented_price_per_sqm']);
        $this->crud->addField(['type' => 'hidden', 'name' => 'rental_commission']); 
    }

}
