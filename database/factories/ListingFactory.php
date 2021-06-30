<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use App\Models\Property;
use App\Models\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'property_id' => Property::all()->random()->id,
        'owner_id' => Contact::all()->random()->id,
        'contact_id' => Contact::all()->random()->id,
        'sale_list_price' => $faker->numberBetween(1, 1000),
        'rent_list_price' => $faker->numberBetween(1, 1000),
        'sale_commission' => $faker->numberBetween(1, 1000),
        'rental_commission' => $faker->numberBetween(1, 1000),
        'show_price_per_spm' => $faker->numberBetween(1, 1000),
        'show_on_map' => $faker->boolean,
        'display_on_first_page' => $faker->boolean,
        'status' => $faker->boolean,
        'show_agent_on_website' => $faker->boolean,
        'is_rent' => $faker->boolean,
        'is_sale' => $faker->boolean,
        // 'is_close' => $faker->,
        // 'excusive_date' => now(),
        // 'exclusive_expires_date' => now(),
        // 'exclusive_listing' => $faker->,
        // 'close_reason' => $faker->,
        'code' => $faker->numberBetween(1, 1000),
        'total_rates' => $faker->numberBetween(1, 9),
        'total_user_rates' => $faker->numberBetween(1, 9),
        'additional_items' => $faker->paragraph,
        // 'published_at' => dateTime(),
        // 'publsihed_by' => $faker->name,
        // 'created_by' => $faker->name,
        // 'updated_by' => $faker->name,
        // 'created_at' => now(),
        // 'updated_at' => now(),


    ];
});
