<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ContactSeeder
     * @return void
     */
    public function run()
    {
        factory(App\Models\Contact::class, 15)->create();
    }
}
