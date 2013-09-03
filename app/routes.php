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
    Route::resource('object', 'ApiVersionOne\ObjectController');
    Route::controller('status', 'ApiVersionOne\StatusController');
});
Route::group(array('domain' => 'api.stor.ag', 'prefix' => 'v2', 'before' => 'api'), function () {
    Route::controller('status', 'ApiVersionTwo\StatusController');
    Route::resource('cfs', 'ApiVersionTwo\CfsController');
    Route::resource('key', 'ApiVersionTwo\KeyController');
});

if(App::environment() === 'local') {
    // We only want to register these routes for development, as production would route somewhere else.
    Route::group(array('prefix' => 'api/v1', 'before' => 'api'), function () {
        Route::resource('object', 'ApiVersionOne\ObjectController');
        Route::controller('status', 'ApiVersionOne\StatusController');
    });
    Route::group(array('prefix' => 'api/v2', 'before' => 'api'), function () {
        Route::controller('status', 'ApiVersionTwo\StatusController');
        //Route::resource('cfs', 'ApiVersionTwo\CfsController');
        Route::resource('key', 'ApiVersionTwo\KeyController');

        // We'll need custom routes for our CFS resource
        //Route::resource('cfs{segments}', 'ApiVersionTwo\ApiCfsController')->where('segments', '(.*)');


        //$type = \CFS\Helper::type(Request::path());
        $type = 'file';

        if($type === 'folder') {
            Route::get('cfs{path}', 'ApiVersionTwo\CFS\FolderController@index')->where('path', '(.*)');
            Route::post('cfs{path}', 'ApiVersionTwo\CFS\FolderController@store')->where('path', '(.*)');
            Route::put('cfs{path}', 'ApiVersionTwo\CFS\FolderController@update')->where('path', '(.*)');
            Route::patch('cfs{path}', 'ApiVersionTwo\CFS\FolderController@update')->where('path', '(.*)');
            Route::delete('cfs{path}', 'ApiVersionTwo\CFS\FolderController@destroy')->where('path', '(.*)');
        } elseif($type === 'file') {
            Route::get('cfs', 'ApiVersionTwo\CFS\FolderController@index');
            Route::get('cfs{path}', 'ApiVersionTwo\CFS\FileController@index')->where('path', '(.*)');
            Route::post('cfs{path}', 'ApiVersionTwo\CFS\FileController@store')->where('path', '(.*)');
            Route::put('cfs{path}', 'ApiVersionTwo\CFS\FileController@update')->where('path', '(.*)');
            Route::patch('cfs{path}', 'ApiVersionTwo\CFS\FileController@update')->where('path', '(.*)');
            Route::delete('cfs{path}', 'ApiVersionTwo\CFS\FileController@destroy')->where('path', '(.*)');
        } else {
            return Response::api('Operation Failed: CFS Lookup', 500);
        }
    });
}

/**
 * Routes for logged in users
 */
Route::group(array('prefix' => 'panel', 'before' => 'auth'), function () {
    Route::get('/', function () {
        return Redirect::to('/panel/user');
    });
    Route::controller('user', 'Panel\HomeController');
    Route::resource('object', 'Panel\ObjectController');
    Route::resource('cfs', 'Panel\CfsController');
    Route::resource('keys', 'Panel\KeysController');

    Route::controller('billing', 'Panel\BillingController');

    // Apps
    //Route::controller('dropbox', 'UserDropboxController');

    Route::get('settings', 'Panel\HomeController@getSettings');
});

/**
 * Routes for admins
 */
Route::group(array('prefix' => 'admin', 'before' => 'admin'), function () {
    Route::controller('home', 'AdminHomeController');
    Route::resource('log', 'AdminLogController');
    Route::resource('object', 'AdminObjectController');
    Route::resource('user', 'AdminUserController');
    Route::resource('key', 'AdminKeyController');
});
