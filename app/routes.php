<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'DocsController@getIndex');
Route::controller('/docs', 'DocsController');

Route::controller('/account', 'AccountController');

Route::get('/e/{id}', 'ObjectController@getObject');

Route::group(array('prefix' => 'api/v1', 'before' => 'api'), function () {
    Route::resource('thing', 'ApiObjectController'); // @todo remove
    Route::resource('object', 'ApiObjectController');
});
Route::group(array('domain' => 'api.stor.ag', 'prefix' => 'v1', 'before' => 'api'), function () {
    Route::resource('object', 'ApiObjectController');
});


Route::group(array('prefix' => 'panel', 'before' => 'auth'), function () {
    Route::get('/', function () {
        return Redirect::to('/panel/user');
    });
    Route::controller('user', 'UserHomeController');
    Route::resource('object', 'UserObjectController');
    Route::resource('keys', 'UserKeysController');

    Route::get('settings', 'UserHomeController@getSettings');
});

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function () {
    Route::resource('object', 'AdminObjectController');
    Route::resource('user', 'AdminUserController');
});
