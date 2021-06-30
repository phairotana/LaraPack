<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserSeeder
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create();
    }
}
