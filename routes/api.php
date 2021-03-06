<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('states', 'States@index');
Route::get('states/{id}', 'States@show');
Route::get('incidents/{state_id}', 'Incidents@getByState');
Route::post('subscribers/store', 'Subscribers@store');
Route::get('settings/get', 'Settings@get');
Route::get('newsFeeds', 'NewsFeeds@index');