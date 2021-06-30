<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'account_id' => Account::all()->random()->id,
        'last_sync_modify' => now(),
        'con_type' => $faker->randomElement($array = array ('Owner','Agency','Broker')),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'con_email' => $faker->freeEmail,
        'con_phone' => $faker->phoneNumber,
        'con_street_no' => $faker->streetAddress,
        'con_house_no' => $faker->buildingNumber,
        'province' => $faker->city,
        'district' => $faker->word,
        'commune' => $faker->word,
        'village' => $faker->word,
        'con_address' => $faker->address,
        'con_zip_postalcode' => $faker->postcode,
        'con_latitude' => $faker->latitude($min = -90, $max = 90) ,
        'con_longitude' => $faker->longitude($min = -180, $max = 180),
        'identify_card' => $faker->creditCardNumber,
        'profile' => $faker->imageUrl($width = 640, $height = 480),
        'salutation' => $faker->randomElement($array = array ('Mr.','Ms.','Mrs.','Others')),
        'occupation' => $faker->randomElement($array = array ('Agriculture.','Consulting.','Education.','Engineering','Financial','Medical','Real estate','Technology','Other')),
    ];
});
