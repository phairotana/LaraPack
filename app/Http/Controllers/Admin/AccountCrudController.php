<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AccountRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AccountCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AccountCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Account');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/account');
        $this->crud->setEntityNameStrings('account', 'accounts');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();
        $this->crud->addColumn([
            'name'  => 'AccountCode',
            'label' => 'Account ID',
            'type'  => 'text'
            
        ]);
        
        $this->crud->addColumn([
            'name'  => 'acc_name',
            'label' => 'Account Name',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'account_number',
            'label' => 'Account Number',
            'type'  => 'text'
        ]);
        $this->crud->addColumn([
            'name'  => 'acc_email',
            'label' => 'Email',
            'type'  => 'text', 
        ]);
        $this->crud->addColumn([
            'name'  => 'acc_phone',
            'label' => 'Phone',
            'type'  => 'text', 
        ]);
        $this->crud->addColumn([
            'name'  => 'industry',
            'label' => 'Industry',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'bank_branch',
            'label' => 'Bank Branch',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'billing_address',
            'label' => 'Billing Address',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'valid_until',
            'label' => 'Valid Until',
            'type'  => 'text'
        ]);
        $this->crud->addColumn([
            'name'  => 'website',
            'label' => 'Website',
            'type'  => 'text' 
        ]);
        $this->crud->addColumn([
            'name'  => 'rating',
            'label' => 'Rating',
            'type'  => 'text' 
        ]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(AccountRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name'  => 'acc_name',
            'label' => 'Account Name',
            'type'  => 'text',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'acc_email',
            'label' => 'Email',
            'type'  => 'email',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'acc_phone',
            'label' => 'Phone',
            'type'  => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'industry',
            'label' => 'Industry',
            'type'  => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'account_number',
            'label' => 'Account Number',
            'type'  => 'number',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'bank_branch',
            'label' => 'Bank Branch',
            'type'  => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'billing_address',
            'label' => 'Billing Address',
            'type'  => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'valid_until',
            'label' => 'Valid Until',
            'type'  => 'date_picker',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'website',
            'label' => 'Website',
            'type'  => 'text',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
            ],
        ]);
        $this->crud->addField([
            'name'  => 'rating',
            'label' => 'Rating',
            'type'  => 'number',
            'attributes' => [
                'class' => 'form-control some-class',
                ],
                'wrapperAttributes' => [
                'class' => 'form-group col-md-3'
                ],
        ]);
        $this->crud->addField([
            'name'  => 'acc_description',
            'label' => 'Description',
            'type'  => 'textarea',
            'wrapperAttributes' => [
                'class' => 'form-group col-md-12'
            ], 
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumn([
                'label'     => 'Account ID',
                'name'      => 'id', 
                'type'      => 'number',
        ]);
        $this->crud->addColumn([
            'label'     => 'Account Name',
            'name'      => 'acc_name', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Account Number',
            'name'      => 'account_number', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Email',
            'name'      => 'acc_email', 
            'type'      => 'email',
        ]);
        $this->crud->addColumn([
            'label'     => 'Phone:',
            'name'      => 'acc_phone', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Industry',
            'name'      => 'industry',
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Bank Branch',
            'name'      => 'bank_branch', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Billing Address',
            'name'      => 'billing_address', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Valid Until',
            'name'      => 'valid_until', 
            'type'      => 'date_picker',
        ]);
        $this->crud->addColumn([
            'label'     => 'Website',
            'name'      => 'website', 
            'type'      => 'text',
        ]);
        $this->crud->addColumn([
            'label'     => 'Rating',
            'name'      => 'rating', 
            'type'      => 'number',
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
