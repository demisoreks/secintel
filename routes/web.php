<?php

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

$link_id = (int) config('var.link_id');

Route::get('/', [
    'as' => 'welcome', 'uses' => 'WelcomeController@index'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);

Route::get('incident_types/{incident_type}/disable', [
    'as' => 'incident_types.disable', 'uses' => 'IncidentTypesController@disable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('incident_types/{incident_type}/enable', [
    'as' => 'incident_types.enable', 'uses' => 'IncidentTypesController@enable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::resource('incident_types', 'IncidentTypesController')->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::bind('incident_types', function($value, $route) {
    return App\SecIncidentType::findBySlug($value)->first();
});

Route::get('incidents/{incident}/delete', [
    'as' => 'incidents.delete', 'uses' => 'IncidentsController@destroy'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('incidents/{incident}/disable', [
    'as' => 'incidents.disable', 'uses' => 'IncidentsController@disable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('incidents/{incident}/enable', [
    'as' => 'incidents.enable', 'uses' => 'IncidentsController@enable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::resource('incidents', 'IncidentsController')->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::bind('incidents', function($value, $route) {
    return App\SecIncident::findBySlug($value)->first();
});

Route::resource('states', 'StatesController')->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::bind('states', function($value, $route) {
    return App\SecState::findBySlug($value)->first();
});

Route::get('settings', [
    'as' => 'settings', 'uses' => 'SettingsController@index'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::put('settings/update', [
    'as' => 'settings.update', 'uses' => 'SettingsController@update'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);

Route::get('news_feeds/{news_feed}/delete', [
    'as' => 'news_feeds.delete', 'uses' => 'NewsFeedsController@destroy'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('news_feeds/{news_feed}/disable', [
    'as' => 'news_feeds.disable', 'uses' => 'NewsFeedsController@disable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('news_feeds/{news_feed}/enable', [
    'as' => 'news_feeds.enable', 'uses' => 'NewsFeedsController@enable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::resource('news_feeds', 'NewsFeedsController')->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::bind('news_feeds', function($value, $route) {
    return App\SecNewsFeed::findBySlug($value)->first();
});

Route::get('subscribers/{subscriber}/disable', [
    'as' => 'subscribers.disable', 'uses' => 'SubscribersController@disable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('subscribers/{subscriber}/enable', [
    'as' => 'subscribers.enable', 'uses' => 'SubscribersController@enable'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::get('subscribers', [
    'as' => 'subscribers.index', 'uses' => 'SubscribersController@index'
])->middleware(['auth.user', 'auth.access:'.$link_id.',Manager']);
Route::bind('subscribers', function($value, $route) {
    return App\SecSubscriber::findBySlug($value)->first();
});