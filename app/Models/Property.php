<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'properties';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    
    public function convertToListing($crud = false)
    {
        $listingId = optional($this->listing)->id;
        $listingStatus = optional($this->listing)->status;
        if ($listingId && $listingStatus == 1) {
            return '<a href="' . route('listing.edit', $listingId) . '" class="btn btn-sm btn-primary " target="_blank" title="edit"><i class="la la-edit"></i></a>';
        }
            return '<a href="' . route('listing.create') . '?property_id=' . $this->id . '" class="btn btn-sm btn-primary" target="_blank" title="convert to listing"><i class="la la-retweet"></i></a>';
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
    public function owner() {
        return $this->belongsTo('App\Models\Contact', 'owner_id', 'id');
    }

    public function contact() {
        return $this->belongsTo('App\Models\Contact', 'contact_id', 'id');
    }

    public function units() {
        return $this->hasMany('App\Models\Unit');
    }
    public function listings() {
        return $this->hasMany('App\Models\Listing', 'property_id', 'id');
    }
    public function listing() {
        return $this->belongsTo('App\Models\Listing', 'listing_id', 'id');
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

    public function getAddressAttribute()
    {
        return "{$this->house_no}, {$this->street_no}, {$this->province}, {$this->district}, {$this->commune}, {$this->village}";
    }
     public function getConcatenateIDAttribute()
    {
        return str_pad($this->id, 6, "0", STR_PAD_LEFT);
    }
    public function getConcatenateIdNameAttribute()
    {
        // return optional($this->properties)->id;
        return "{$this->ConcatenateID} : {$this->name}";
    }
   

    // public function getFullNameAttribute()
    // {
    //     return "{$this->first_name} {$this->last_name}";
    // }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'title_deed_photos' => 'array',
        'agreement_file' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setFrontAttribute($value)
    {
        $attribute_name = "photo_front_side";
        // or use your own disk, defined in config/filesystems.php
        // $disk = config('backpack.base.root_disk_name'); 
        $disk = "public";
        // destination path relative to the disk above
        $destination_path = "images"; 

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it 
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    public function setLeftAttribute($value)
    {
        $attribute_name = "photo_left_side";
        $disk = "public";
        $destination_path = "images"; 

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            \Storage::disk($disk)->delete($this->{$attribute_name});
            $public_destination_path = Str::replaceFirst('public', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
    public function setRightAttribute($value)
    {
        $attribute_name = "photo_right_side";
        $disk = "public";
        $destination_path = "images"; 

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            \Storage::disk($disk)->delete($this->{$attribute_name});
            $public_destination_path = Str::replaceFirst('public', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
    public function setBackAttribute($value)
    {
        $attribute_name = "photo_back_side";
        $disk = "public";
        $destination_path = "images"; 

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            \Storage::disk($disk)->delete($this->{$attribute_name});
            $public_destination_path = Str::replaceFirst('public', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
    public function setOppositeAttribute($value)
    {
        $attribute_name = "photo_opposite";
        $disk = "public";
        $destination_path = "images"; 

        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $this->attributes[$attribute_name] = null;
        }
        if (Str::startsWith($value, 'data:image'))
        {
            $image = \Image::make($value)->encode('jpg', 90);
            $filename = md5($value.time()).'.jpg';
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            \Storage::disk($disk)->delete($this->{$attribute_name});
            $public_destination_path = Str::replaceFirst('public', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    // Gallery Mutator
    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = "public";
        $destination_path = "uploads";
        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }
    // Upload Title Deed Photos Mutator
    public function setTitleDeedPhotosAttribute($value)
    {
        $attribute_name = "title_deed_photos";
        $disk = "public";
        $destination_path = "uploads";
        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function($obj) {
            if (count((array)$obj->images)) {
                foreach ($obj->images as $file_path) {
                    \Storage::disk('public')->delete($file_path);
                }
            }
            if($obj->photo_front_side) {
                \Storage::disk('public')->delete($obj->photo_front_side);
            }
            if($obj->photo_left_side) {
                \Storage::disk('public')->delete($obj->photo_left_side);
            }
            if($obj->photo_right_side) {
                \Storage::disk('public')->delete($obj->photo_right_side);
            }
            if($obj->photo_back_side) {
                \Storage::disk('public')->delete($obj->photo_back_side);
            }
            if($obj->photo_opposite) {
                \Storage::disk('public')->delete($obj->photo_opposite);
            }
            if (count((array)$obj->title_deed_photos)) {
                foreach ($obj->title_deed_photos as $file_path) {
                    \Storage::disk('public')->delete($file_path);
                }
            }
        });
    }

}
