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

    Route::get('/admin/teams/', 'Admin\TeamsController@index');
    Route::post('/admin/teams', 'Admin\TeamsController@store');
    Route::get('/admin/teams/create', 'Admin\TeamsController@create');
    Route::get('/admin/teams/{team}/edit', 'Admin\TeamsController@edit');
    Route::put('/admin/teams/{team}', 'Admin\TeamsController@update');
});
