<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UnitSeeder
     * @return void
     */
    public function run()
    {
        factory(App\Models\Unit::class, 15)->create();
    }
}
