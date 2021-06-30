<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'last_sync_modify' => now(),
        'account_number' => $faker->numberBetween(1, 1000),
        'bank_branch' => $faker->word,
        'billing_address' => $faker->address,
        'valid_until' => $faker->DateTime(),
        'acc_name' => $faker->company,
        'acc_email' => $faker->unique()->safeEmail,
        'acc_phone' => $faker->phoneNumber,
        'industry' => $faker->company,
        'rating' => $faker->numberBetween(1, 10),
        'website' => $faker->text(20),
        'acc_description' => $faker->paragraph($nb = 3, $asText = false),
    ];
});
