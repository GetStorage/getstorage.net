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

Route::group(array('domain' => 'api.stor.ag', 'prefix' => 'v1', 'before' => 'api'), function () {
    Route::resource('object', 'ApiVersionOne\ApiObjectController');
    Route::controller('status', 'ApiVersionOne\ApiStatusController');
});
Route::group(array('domain' => 'api.stor.ag', 'prefix' => 'v2', 'before' => 'api'), function () {
    Route::controller('status', 'ApiVersionTwo\ApiStatusController');
    Route::resource('cfs', 'ApiVersionTwo\ApiCfsController');
    Route::resource('key', 'ApiVersionTwo\ApiKeyController');
});

if(App::environment() === 'local') {
    // We only want to register these routes for development, as production would route somewhere else.
    Route::group(array('prefix' => 'api/v1', 'before' => 'api'), function () {
        Route::resource('object', 'ApiVersionOne\ApiObjectController');
        Route::controller('status', 'ApiVersionOne\ApiStatusController');
    });
    Route::group(array('prefix' => 'api/v2', 'before' => 'api'), function () {
        Route::controller('status', 'ApiVersionTwo\ApiStatusController');
        //Route::resource('cfs', 'ApiVersionTwo\ApiCfsController');
        Route::resource('key', 'ApiVersionTwo\ApiKeyController');

        // We'll need custom routes for our CFS resource
        //Route::resource('cfs{segments}', 'ApiVersionTwo\ApiCfsController')->where('segments', '(.*)');
        Route::resource('cfs', 'ApiVersionTwo\ApiCfsController@index');
        Route::get('cfs{segments}', 'ApiVersionTwo\ApiCfsController@index')->where('segments', '(.*)');
        Route::post('cfs{segments}', 'ApiVersionTwo\ApiCfsController@store')->where('segments', '(.*)');
        Route::put('cfs{segments}', 'ApiVersionTwo\ApiCfsController@update')->where('segments', '(.*)');
        Route::patch('cfs{segments}', 'ApiVersionTwo\ApiCfsController@update')->where('segments', '(.*)');
        Route::delete('cfs{segments}', 'ApiVersionTwo\ApiCfsController@destroy')->where('segments', '(.*)');
    });
}

/**
 * Routes for logged in users
 */
Route::group(array('prefix' => 'panel', 'before' => 'auth'), function () {
    Route::get('/', function () {
        return Redirect::to('/panel/user');
    });
    Route::controller('user', 'UserHomeController');
    Route::resource('object', 'UserObjectController');
    Route::resource('keys', 'UserKeysController');

    Route::controller('billing', 'UserBillingController');

    // Apps
    //Route::controller('dropbox', 'UserDropboxController');

    Route::get('settings', 'UserHomeController@getSettings');
});

/**
 * Routes for admins
 */
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function () {
    Route::controller('home', 'AdminHomeController');
    Route::resource('log', 'AdminLogController');
    Route::resource('object', 'AdminObjectController');
    Route::resource('user', 'AdminUserController');
});
