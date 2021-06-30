<?php

namespace App\Observers;

use App\Models\Listing;

class ListingObserver
{
    /**
     * Handle the listing "created" event.
     *
     * @param  \App\Models\Listing  $listing
     * @return void
     */
    public function created(Listing $listing)
    {
        // static::created(function ($obj) {
        //     $obj->property()->update(['listing_id' => $obj->id]);
        // });
        // static::updating(function ($obj) {
        //     if($obj->is_close == 1){
        //         if($obj->id == $obj->property->listing_id){
        //             $obj->property()->update(['listing_id' => null]);
        //         }
        //     }
        // });
    }

    /**
     * Handle the listing "updated" event.
     *
     * @param  \App\Models\Listing  $listing
     * @return void
     */
    public function updated(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "deleted" event.
     *
     * @param  \App\Models\Listing  $listing
     * @return void
     */
    public function deleted(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "restored" event.
     *
     * @param  \App\Models\Listing  $listing
     * @return void
     */
    public function restored(Listing $listing)
    {
        //
    }

    /**
     * Handle the listing "force deleted" event.
     *
     * @param  \App\Models\Listing  $listing
     * @return void
     */
    public function forceDeleted(Listing $listing)
    {
        //
    }
}
