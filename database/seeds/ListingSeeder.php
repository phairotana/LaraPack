<?php

use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ListingSeeder
     * @return void
     */
    public function run()
    {
        factory(App\Models\Listing::class, 15)->create();
        
    }
}
