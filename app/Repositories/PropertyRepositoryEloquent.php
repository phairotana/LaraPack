<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PropertyRepository;
use App\Models\Property;
use App\Validators\PropertyValidator;

/**
 * Class PropertyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PropertyRepositoryEloquent extends BaseRepository implements PropertyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Property::class;
    }
    public function repositoryPropertyStore($entry, $request){
        // dd($this->model->all());
        if (!empty($request)) {
            $property = $this->model->create([
                // 'owner_id' => $request->owner_id,
                // 'contact_id' => $request->contact_id,
                'name' => $request->name,
                'sale_price_asking' => $request->sale_price_asking,
                'sale_price_asking_date' => $request->sale_price_asking_date,
                'sale_price_asking_date_by' => $request->sale_price_asking_date_by,
                'sale_price' => $request->sale_price,
                'sale_price_date' => $request->sale_price_date,
                'sale_price_updated_by' => $request->sale_price_updated_by,
                'sale_list_price' => $request->sale_list_price,
                'sale_list_price_date' => $request->sale_list_price_date,
                'sale_list_price_updated_by' => $request->sale_list_price_updated_by,
                'sold_price' => $request->sold_price,
                'sold_price_date' => $request->sold_price_date,
                'sold_price_updated_by' => $request->sold_price_updated_by,
                'rent_price_asking' => $request->rent_price_asking,
                'rent_price_asking_date' => $request->rent_price_asking_date,
                'rent_price_asking_updated_by' => $request->rent_price_asking_updated_by,
                'rent_price' => $request->rent_price,
                'rent_price_date' => $request->rent_price_date,
                'rent_price_updated_by' => $request->rent_price_updated_by,
                'rent_list_price' => $request->rent_list_price,
                'rent_list_date' => $request->rent_list_date,
                'rent_list_price_updated_by' => $request->rent_list_price_updated_by,
                'rented_price' => $request->rented_price,
                'rented_price_date' => $request->rented_price_date,
                'rented_price_update_by' => $request->rented_price_update_by,
                'zip_postalcode' => $request->zip_postalcode,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'published_at' => $request->published_at,
                'published_by' => $request->published_by,
                // 'unit_total_bathroom',
                // 'unit_total_bedroom',
                // 'unit_total_livingroom',
                // 'unit_total_floor',
                // 'unit_total_parking',
                // 'unit_total_car_parking',
                // 'unit_total_motor_parking',
                // 'unit_total_diningroom',
                // 'unit_total_doors',
                // 'land_area_by_title_deed',
                // 'note',
                // 'location_grade',
                'label_type' => $request->label_type,
                'building_width' => $request->building_width,
                'building_length' => $request->building_length,
                'building_height' => $request->building_height,
                'building_area' => $request->building_area,
                'photo_front_side' => $request->photo_front_side,
                'photo_left_side' => $request->photo_left_side,
                'photo_right_side' => $request->photo_right_side,
                'photo_back_side' => $request->photo_back_side,
                'photo_opposite' => $request->photo_opposite,
                'images' => $request->images,
                // Address
                'street_no' => $request->street_no,
                'house_no' => $request->house_no,
                'province' => $request->province,
                'district' => $request->district,
                'commune' => $request->commune,
                'village' => $request->village,
                'address' => $request->address,
                // Property Basic Information
                'record_type' => $request->record_type,
                'tenure_type' => $request->tenure_type,
                'type' => $request->type,
                'zone_type' => $request->zone_type,
                'current_use' => $request->current_use,
                'view' => $request->view,
                'data_source' => $request->data_source,
                'topography' => $request->topography,
                'land_width' => $request->land_width,
                'land_shape_type' => $request->land_shape_type,
                'land_area' => $request->land_area,
                'land_length' => $request->land_length,
                'project_building' => $request->project_building,
                //Title Deed Information
                'title_deed_type' => $request->title_deed_type,
                'title_deed_no' => $request->title_deed_no,
                'issued_year' => $request->issued_year,
                'parcel_no' => $request->parcel_no,
                'title_deed_photos' => $request->title_deed_photos,
               // Property Information
               'is_rent' => $request->is_rent,
               'is_sale' => $request->is_sale,
               'description' => $request->description,
                // 'stories',
                // 'shape' => $faker->,
                // 'functional_utilities' => $faker-> ,
                // 'main_street' => $faker->address,
                // 'property_code',
                // 'code',
                'created_by' => $request->created_by,
                'updated_by' => $request->updated_by,
                'created_at' => $request->created_at,
                'updated_at' => $request->updated_at,
                'deleted_at' => $request->deleted_at,
            ]);
            return $property;
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
