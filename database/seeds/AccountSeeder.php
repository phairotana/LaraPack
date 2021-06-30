<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=AccountSeeder
     * @return void
     */
    public function run()
    {
        factory(App\Models\Account::class, 15)->create();
    }
}
