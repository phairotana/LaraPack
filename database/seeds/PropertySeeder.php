<?php

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=PropertySeeder
     * @return void
     */
    public function run()
    {
        factory(App\Models\Property::class, 15)->create();
    }
}
