<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UnitRepository;
use App\Models\Unit;
use App\Validators\UnitValidator;

/**
 * Class UnitRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UnitRepositoryEloquent extends BaseRepository implements UnitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Unit::class;
    }
    public function repositoryStore($entry, $request){
        // dd($this->model->all());
        if (!empty($request)) {
            $unit_create = $this->model->create([
            'unit_project_building' => $request->unit_project_building,
            'unit_project_name' => $request->unit_project_name,
            'unit_name' => $request->unit_name,
            'unit_current_use' => $request->unit_current_use,
            'unit_style' => $request->unit_style,
            'cost_estimate'  => $request->cost_estimate,
            'unit_width'  => $request->unit_width,
            'unit_length'  => $request->unit_length,
            'unit_area'  => $request->unit_area,
            'unit_floor'  => $request->unit_floor,
            'unit_stories'  => $request->unit_stories,
            'useful_life'  => $request->useful_life,
            'effective_age'  => $request->effective_age,
            'completion_year'  => $request->completion_year,
            'unit_bedroom'  => $request->unit_bedroom,
            'unit_bathroom'  => $request->unit_bathroom,
            'unit_livingroom'  => $request->unit_livingroom,
            'unit_diningroom'  => $request->unit_diningroom,
            'unit_car_parking'  => $request->unit_car_parking,
            'unit_motor_parking'  => $request->unit_motor_parking,
            'gross_floor_area'  => $request->gross_floor_area,
            'net_floor_area'  => $request->net_floor_area,
            'kitchen'  => $request->kitchen,
            'balcony'  => $request->balcony,
            'swimming_pool'  => $request->swimming_pool,
            'security'  => $request->security,
            'fitness_gym'  => $request->fitness_gym,
            'lift'  => $request->lift,
            ]);
            return $unit_create;
        }
    }
    public function repositoryUpdate($entry, $request){
        $unit_id = $request->unit_id;
        if (!empty($request)) {
            $unit_update = $this->model->where('id', $unit_id)->update([
                'unit_project_building' => $request->unit_project_building,
                'unit_project_name' => $request->unit_project_name,
                'unit_name' => $request->unit_name,
                'unit_current_use' => $request->unit_current_use,
                'unit_style' => $request->unit_style,
                'cost_estimate'  => $request->cost_estimate,
                'unit_width'  => $request->unit_width,
                'unit_length'  => $request->unit_length,
                'unit_area'  => $request->unit_area,
                'unit_floor'  => $request->unit_floor,
                'unit_stories'  => $request->unit_stories,
                'useful_life'  => $request->useful_life,
                'effective_age'  => $request->effective_age,
                'completion_year'  => $request->completion_year,
                'unit_bedroom'  => $request->unit_bedroom,
                'unit_bathroom'  => $request->unit_bathroom,
                'unit_livingroom'  => $request->unit_livingroom,
                'unit_diningroom'  => $request->unit_diningroom,
                'unit_car_parking'  => $request->unit_car_parking,
                'unit_motor_parking'  => $request->unit_motor_parking,
                'gross_floor_area'  => $request->gross_floor_area,
                'net_floor_area'  => $request->net_floor_area,
                'kitchen'  => $request->kitchen,
                'balcony'  => $request->balcony,
                'swimming_pool'  => $request->swimming_pool,
                'security'  => $request->security,
                'fitness_gym'  => $request->fitness_gym,
                'lift'  => $request->lift,
            ]);
            return $unit_update;
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
