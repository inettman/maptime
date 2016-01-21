<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'RegionController@index')->name('home');
Route::get('region/{id}', 'RegionController@show')->name('region');
Route::get('city/{id}', 'CityController@show')->name('city');
Route::get('location/town-{id}', function($id)
{
    return Redirect::route('city', array($id));
});
Route::get('location/region-{id}', function($id)
{
    return Redirect::route('region', array($id));
});
