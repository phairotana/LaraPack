<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use App\Models\Property;
use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'property_id' => Property::all()->random()->id,
        'owner_id' => Contact::all()->random()->id,   
        'contact_id' => Contact::all()->random()->id,

        //[Building Description]
        //Basic Information
        'unit_project_building' => $faker->randomElement($array = array ('Borey Peng Hout','Borey Leng Navatra')),
        'unit_name' => $faker->name,
        'unit_style' => $faker->randomElement($array = array ('Modern','Classic')),
        'unit_width' => $faker->numberBetween(1, 1000),
        'unit_length' => $faker->numberBetween(1, 1000),
        'gross_floor_area' => $faker->numberBetween(1, 1000),
        'net_floor_area' => $faker->numberBetween(1, 1000),
        'unit_bedroom' => $faker->numberBetween(1, 10),
        'unit_bathroom' => $faker->numberBetween(1, 10),
        'unit_livingroom' => $faker->numberBetween(1, 10),
        'unit_diningroom' => $faker->numberBetween(1, 10),
        'unit_floor' => $faker->numberBetween(1, 100),
        'unit_stories' => $faker->numberBetween(1, 100),
        //Features
        'unit_car_parking' => $faker->numberBetween(1, 10),
        'unit_motor_parking' => $faker->numberBetween(1, 10),
        'swimming_pool' => $faker->boolean,
        'fitness_gym' => $faker->boolean,
        'lift' => $faker->boolean,
        'balcony' => $faker->boolean,
        'kitchen' => $faker->boolean,
        'security' => $faker->boolean,
        //Other
        'cost_estimate' => $faker->numberBetween(1, 1000),
        'useful_life' => $faker->numberBetween(1, 100),
        'effective_age' => $faker->numberBetween(1, 100),
        'completion_year' => $faker->year($max = 'now'),

        'created_by' => $faker->name,
        'updated_by' => $faker->name,


        // 'unit_area' => $faker->numberBetween(1, 1000),
        // 'door' => $faker->numberBetween(1, 100),
        // 'parking' => $faker->numberBetween(1, 10),
        // 'design_appeal_type' => $faker->word,
        // 'quality_type' => $faker->,
        // 'roofing_type' => $faker->,
        // 'unit_code' => $faker->numberBetween(1, 1000),
        // 'building_type' => $faker->randomElement($array = array ('Building','Flat')),
        // 'unit_gallery' => $faker->imageUrl($width = 640, $height = 480),
        // 'main_walls' => $faker,
        // 'ceiling' => $faker,
        // 'flooring_materials' => $faker,
        // 'window_frames' => $faker,
        // 'neighborhood' => $faker->,
        // 'other_facilities' => $faker->,
        // 'floor_plan' => $faker->,
        // 'rent_income_per_month_if_any' => $faker->numberBetween(1, 1000),
        // 'price_per_sqm' => $faker->numberBetween(1, 1000),

    ];
});
