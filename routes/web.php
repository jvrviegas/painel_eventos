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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscriptions', 'EventSubscriptionController@index');

Route::get('/test', 'EventSubscriptionController@index')->name('test');

/* AUTOCOMPLETE ROUTES */
Route::get('search', 'SearchController@index')->name('search');
Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');
Route::post('search', 'SearchController@search');

Route::group(['prefix' => 'admin'], function(){
    Voyager::routes();

    /* Route::get('/event-subscriptions', ['uses' => 'EventController@subscriptions', 'as' => 'event-subscriptions']); */
    Route::get('/events/{id}/presence_list', 'EventController@presence_list')->name('presence_list');
    /* Route::get('/events/{id}/subscriptions', 'EventController@subscriptions')->name('event-subscriptions'); */
});

