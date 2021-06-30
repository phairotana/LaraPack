<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Listing extends Model
{
    use CrudTrait;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'listings';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['is_sale','is_rent', 'status', 'show_on_map', 'display_on_first_page', 'show_agent_on_website', 'show_price_per_square_meter'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function addListing($crud = false)
    {
        // return '<a class="btn btn-sm btn-link" target="_blank" href="http://google.com?q='.urlencode($this->text).'" data-toggle="tooltip" title="Just a demo custom button."><i class="fa fa-search"></i> Google it</a>';
        return '<a class="btn btn-primary" target="_self" href="property/create?is_listing=true" data-toggle="tooltip"><i class="la la-plus"></i>Add listing</a>';
        
    }
    public function forceDelete($crud = false)
    {
        return '<a class="btn btn-sm btn-danger" target="_blank" href="http://google.com?q='.urlencode($this->text).'" data-toggle="tooltip" title="Force Delete"><i class="la la-times"></i></a>';
        // return '<a class="btn btn-sm btn-danger" target="_blank" href="listing/create?property_id='.urlencode($this->id).'" data-toggle="tooltip" title="Force Delete"><i class="la la-times"></i></a>';
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function property() {
        return $this->belongsTo('App\Models\Property');
    }

    
    // public function units() {
    //     return $this->hasMany('App\Models\Unit');
    // }
    
    public function owner() {
        return $this->belongsTo('App\Models\Contact', 'owner_id', 'id');
    }

    public function contact() {
        return $this->belongsTo('App\Models\Contact', 'contact_id', 'id');
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
    
    public function getListingCodeAttribute()
    {
        return str_pad($this->property_id, 6, "0", STR_PAD_LEFT);
        
    }
    public function getPropertyNameAttribute()
    {
        return optional($this->property)->name;
        
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();

         static::created(function ($listing) {
            $listing->property()->update(['listing_id' => $listing->id]);
        });
        // static::updating(function ($listing) {
        //     if($listing->is_close == 1){
        //         if($listing->id == $listing->property->listing_id){
        //             $listing->property()->update(['listing_id' => null]);
        //         }
        //     }
        // });
    }
}
