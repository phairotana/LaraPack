<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'units';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'property_id',
        'unit_project_building',
        'unit_project_name',
        'unit_name',
        'unit_current_use',
        'unit_style',
        'unit_width',
        'unit_length',
        'unit_area',
        'gross_floor_area',
        'net_floor_area',
        'unit_bedroom',
        'unit_bathroom',
        'unit_livingroom',
        'unit_diningroom',
        'unit_floor',
        'unit_stories',
        'unit_car_parking',
        'unit_motor_parking',
        'swimming_pool',
        'fitness_gym',
        'lift',
        'balcony',
        'security',
        'kitchen',
        'cost_estimate',
        'effective_age',
        'useful_life',
        'completion_year',
     ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function property() {
        return $this->belongsTo('App\Models\Property', 'property_id', 'id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
