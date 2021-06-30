<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('property', 'PropertyCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('account', 'AccountCrudController');
    Route::crud('unit', 'UnitCrudController');
    Route::crud('listing', 'ListingCrudController');
}); // this should be the absolute last line of this