<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Http\Requests\ListingRequest;
use App\Repositories\UnitRepositoryEloquent;
use App\Repositories\PropertyRepositoryEloquent;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

/**
 * Class ListingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ListingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{update as traitUpdate;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */

    
    public function setup()
    {
        CRUD::setModel(\App\Models\Listing::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/listing');
        CRUD::setEntityNameStrings('listing', 'listings');

        //Share View
        // $property =  $this->crud->setShowView('backpack.properties.showProperties');
        // view()->share([
        //     'preview_property' => $property,
        // ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    
    protected function setupListOperation()
    {
        $this->crud->removeButton('create');
        $this->crud->addButtonFromModelFunction('top', 'add_Listing', 'addListing', 'end');
        $this->crud->addButtonFromModelFunction('line', 'btnForceDelete', 'forceDelete', 'end');
        // CRUD::setFromDb(); // columns

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */

        // text filter
        $this->crud->addFilter([
            'name'  => 'id',
            'type'  => 'text',
            'label' => 'Property ID'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'id', 'LIKE', "%$value%");
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
        // dropdown filter
        $this->crud->addFilter([
            'name'  => 'status',
            'type'  => 'dropdown',
            'label' => 'Status'
        ], [
            'Status' => 'Active',
        ], function($value) { // if the filter is active
            if(!empty($value)) {
                if($value == 'Status') {
                    $this->crud->addClause('where', 'status', 1);
                }
            }
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
        // ========== preview listing =============
        $this->crud->addColumn([
            'name'  => 'ListingCode',
            'label' => 'Property ID',
            'type'  => 'text'
        ]);
        $this->crud->addColumn([
            'name'  => 'PropertyName',
            'label' => 'Property Name',
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
            'name'  => 'status',
            'label' => 'Active',
            'type'  => 'check' 
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
        $this->crud->addColumn([
            'name'  => 'excusive_date',
            'label' => 'Exclusive Date',
            'type'  => 'date' 
        ]);
        
        $this->crud->addColumn([
            'name' => 'exclusive_expires_date',
            'label' => 'Expires Date',
            'type' => 'date',
        ]);
        
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ListingRequest::class);
        // CRUD::setFromDb(); // fields
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */

        $propertyID = '';
        // $property = Property::where('id', $this->crud->getRequest()->property_id)->first();

        if ($this->crud->getRequest()->property_id) {
        $propertyID = $this->crud->getRequest()->property_id;
            $this->crud->addField([
                'label' => 'Property',
                'type' => 'select',
                'name' => '',
                'attribute' => 'ConcatenateIdName',
                'entity' => 'property',
                'model' => "App\Models\Property",
                'options' => (function ($query) {
                    return $query->where('id', $this->crud->getRequest()->property_id)->get();
                }),
                'default' => $propertyID,
                'attributes' => ['disabled' => 'disabled']
            ]);
        } else {
            $getCurrentEditRecord = $this->crud->getEntry($this->crud->getRequest()->id);
            $propertyID = $getCurrentEditRecord->property_id;
                $this->crud->addField([
                    'label' => 'Property',
                    'type' => 'select',
                    'name' => '',
                    'entity' => 'property',
                    'attribute' => 'ConcatenateIdName',
                    'model' => "App\Models\Property",
                    'options' => (function ($query) use ($getCurrentEditRecord) {
                        return $query->where('id', $getCurrentEditRecord->property_id)->get();
                    }),
                    'default' => $getCurrentEditRecord->property_id,
                    'attributes' => ['disabled' => 'disabled']
                ]);
        }
        $this->crud->addField([
            'name' => 'property_id',
            'type' => 'hidden',
            'default' => $propertyID
        ]);

        $this->crud->addField([
            'name'  => 'is_sale',
            'label' => 'Sale',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'is_rent',
            'label' => 'Rent',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-9'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'sale_list_price',
            'label' => 'Listing sale Price',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'rent_list_price',
            'label' => 'Listing Rental Price',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
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
                'class' => 'form-group col-md-3'
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
                'class' => 'form-group col-md-3'
            ], 
        ]);
        $this->crud->addField([
            'name'  => 'sale_commission',
            'label' => 'Sale Commission',
            'type'  => 'number',
            'attributes' => [
                'class' => 'form-control',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ], 
        ]);
        $this->crud->addField([
            'name'  => 'rental_commission',
            'label' => 'Rental Commission',
            'type'  => 'number',
            'attributes' => [
                'class' => 'form-control',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ], 
        ]);
        $this->crud->addField([
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
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
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
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'status',
            'label' => 'Active',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'show_on_map',
            'label' => 'Show on map',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'display_on_first_page',
            'label' => 'Display on first pageShow on map',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'show_agent_on_website',
            'label' => 'Show agent on website',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'show_price_per_square_meter',
            'label' => 'Show price per square meter',
            'type'  => 'checkbox',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-12'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'additional_items',
            'label' => 'Additional items',
            'type'  => 'textarea',
            'attributes' => [
                'rows' => '5', 
            ]
        ]);
    }

    // Preview properties
    protected function setupShowOperation()
    {
        $this->crud->setShowView('backpack.listings.showListing');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
