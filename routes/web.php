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
    return view('home');
});

Route::get('/teams', 'TeamsController@index');

Route::get('/riders', 'RidersController@index');

Route::get('/tracks', 'TracksController@index');

Auth::routes();


Route::middleware('auth')->group(function() {
    Route::get('/admin', function() {
        return view('backend.admin');
    });

    Route::resource('/admin/teams', Admin\TeamsController::class);
    Route::resource('/admin/countries', Admin\CountriesController::class);
    Route::resource('/admin/bikes', Admin\BikesController::class);
    Route::resource('/admin/riders', Admin\RidersController::class);
    Route::resource('/admin/tracks', Admin\TracksController::class);
});
