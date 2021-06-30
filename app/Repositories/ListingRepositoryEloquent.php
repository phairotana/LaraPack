<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ListingRepository;
use App\Models\Listing;
use App\Validators\ListingValidator;

/**
 * Class ListingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ListingRepositoryEloquent extends BaseRepository implements ListingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Listing::class;
    }

    public function listingRepositoryStore($entry, $request){
        // dd($this->model->all());
        if (!empty($request)) {
            $listing = $this->model->create([
            'property_id' => $request->id,
            'sale_commission' => $request->sale_commission,
            'rental_commission' => $request->rental_commission,
            'excusive_date'  => $request->excusive_date,
            'exclusive_expires_date'  => $request->exclusive_expires_date,
            'status'  => $request->status,
            'show_on_map'  => $request->show_on_map,
            'show_agent_on_website'  => $request->show_agent_on_website,
            'display_on_first_page'  => $request->display_on_first_page,
            'additional_items'  => $request->additional_items,
            ]);
            return $listing;
        }
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
