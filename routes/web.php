<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', 'Custom\ContactController@index');
Route::get('property', 'Custom\PropertyController@index');
Route::get('listing', 'Custom\ListingController@update');

Route::get('property/ajax', 'Custom\PropertyController@contactAjax');
// CRUD::resource('property', 'Custom\PropertyController');
