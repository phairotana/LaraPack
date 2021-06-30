<?php 
    namespace App\traits;
  
    use App\Models\Listing;
    trait ListingTrait
    {
        public static function listingIdInProperty()
        {
            static::created(function ($obj) {
                $obj->property()->update(['listing_id' => $obj->id]);
            });

            static::updating(function ($obj) {
                if($obj->is_close == 1){
                    if($obj->id == $obj->property->listing_id){
                        $obj->property()->update(['listing_id' => null]);
                    }
                }
            });
        }
    }

?>