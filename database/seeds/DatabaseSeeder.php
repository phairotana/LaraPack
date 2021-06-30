<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * =========== Run Seeder =========
     * composer dump-autoload
     * php artisan db:seed
     * php artisan db:seed --class=UserSeeder
     * php artisan migrate:fresh --seed
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AccountSeeder::class,
            ContactSeeder::class,
            PropertySeeder::class,
            UnitSeeder::class,
            // ListingSeeder::class,

        ]);
    }
}