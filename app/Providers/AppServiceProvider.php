<?php

namespace App\Providers;

// use App\Observers\ListingObserver;
// use App\Models\Listing;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Listing::observe(ListingObserver::class);
    }
}
