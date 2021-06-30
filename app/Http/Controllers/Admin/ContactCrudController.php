<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ContactCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContactCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Contact');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/contact');
        $this->crud->setEntityNameStrings('contact', 'contacts');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        // select2 filter
        $this->crud->addFilter([
            'name'  => 'con_type',
            'type'  => 'select2',
            'label' => 'Contact Type'
        ], 
        function () {
            return [
                '-' => '-',
                'Owner' => 'Owner',
                'Agent' => 'Agent',
                'Brokery' => 'Brokery',
                'Buyer' => 'Buyer',
            ];
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'con_type', $value);
        });
        // simple filter
        $this->crud->addFilter([
            'type'  => 'text',
            'name'  => 'con_address',
            'label' => 'Address'
        ], 
        false, 
        function($value) { // if the filter is active
            $this->crud->addClause('where', 'con_address', 'LIKE', "%$value%");
        });

        $this->crud->addColumn([
            'name'  => 'ContactCode',
            'label' => 'ID',
            'type'  => 'text'
        ]);
        $this->crud->addColumn([
            'name'  => 'FullName',
            'label' => 'Name',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'con_phone',
            'label' => 'Mobile Phone',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'occupation',
            'label' => 'Position/Occupation',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'con_type',
            'label' => 'Contact Type',
            'type'  => 'text', 
        ]);
        $this->crud->addColumn([
            'name'  => 'AccountName',
            'label' => 'Account',
            'type'  => 'text', 
        ]);
        $this->crud->addColumn([
            'name'  => 'identify_card',
            'label' => 'Identify Card No',
            'type'  => 'text', 
        ]);
        $this->crud->addColumn([
            'name'  => 'con_address',
            'label' => 'Address',
            'type'  => 'text', 
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ContactRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();
    
        $this->crud->addField([
            'name'  => 'salutation',
            'label' => "Salutation",
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'Mr.' => 'Mr.',
                'Ms.' => 'Ms.',
                'Mrs.' => 'Mrs.',
                'Others' => 'Others',
                ],
            'attributes' => [
                'class' => 'form-control some-class ',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'first_name',
            'label' => 'First Name',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'last_name',
            'label' => 'Last Name',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'con_type',
            'label' => 'Contact Type',
            'type'  => 'select_from_array',
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
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'prefix' => '<i class=\'nav-icon la la-phone\'></i>',
            'name'  => 'con_phone',
            'label' => 'Mobile Phone',
            'type'  => 'text',
            'options' => [
                '-' => '-',
                'owner' => 'Owner',
                'agent' => 'Agent',
                'broker' => 'Broker',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'con_email',
            'label' => 'Email',
            'type'  => 'email',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'label'       => 'Account',
            'type'        => "select2_from_ajax",
            'name'        => 'account_id', // the column that contains the ID of that connected entity
            'entity'      => 'accounts', // the method that defines the relationship in your Model
            'attribute'   => "acc_name", // foreign key attribute that is shown to user
            'data_source' => url("contact"), // url to controller search function (with /{id} should return model)
            // OPTIONAL
            'placeholder'             => "Select account", // placeholder for the select
            'minimum_input_length'    => 2, // minimum characters to type before querying results
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'occupation',
            'label' => 'Occupation',
            'type'  => 'select_from_array',
            'options' => [
                '-' => '-',
                'Agriculture' => 'Agriculture',
                'Consulting' => 'Consulting',
                'Education' => 'Education',
                'Engineering' => 'Engineering',
                'Financial' => 'Financial',
                'Medical' => 'Medical',
                'Real estate' => 'Real estate',
                'Technology' => 'Technology',
                'Other' => 'Other',
                ],
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'identify_card',
            'label' => 'Identity Card',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'con_house_no',
            'label' => 'House No',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'con_street_no',
            'label' => 'Street No',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'con_zip_postalcode',
            'label' => 'Zip postalcode',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
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
            'label' => 'Village',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([ // image
            'label'     => "Profile Image",
            'name'      => "profile",
            'type'      => 'image',
            'upload'    => true,
            'crop'      => true, 
            'disk'      => 'public',
            'aspect_ratio' => 1, 
            // 'prefix' => 'vector/upload/' 
        ]); 
    }

    // Preview Contact 
    protected function setupShowOperation()
    {
        $this->crud->setShowView('backpack.contacts.showContacts');
    }
    
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
