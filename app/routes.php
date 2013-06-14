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


/*
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
*/

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


        $type = \CFS\Helper::type(Request::path());

        if($type === 'folder') {
            Route::get('cfs{path}', 'ApiVersionTwo\CFS\CFSFolderController@index')->where('path', '(.*)');
            Route::post('cfs{path}', 'ApiVersionTwo\CFS\CFSFolderController@store')->where('path', '(.*)');
            Route::put('cfs{path}', 'ApiVersionTwo\CFS\CFSFolderController@update')->where('path', '(.*)');
            Route::patch('cfs{path}', 'ApiVersionTwo\CFS\CFSFolderController@update')->where('path', '(.*)');
            Route::delete('cfs{path}', 'ApiVersionTwo\CFS\CFSFolderController@destroy')->where('path', '(.*)');
        } elseif($type === 'file') {
            Route::get('cfs', 'ApiVersionTwo\CFS\CFSFolderController@index');
            Route::get('cfs{path}', 'ApiVersionTwo\CFS\CFSFileController@index')->where('path', '(.*)');
            Route::post('cfs{path}', 'ApiVersionTwo\CFS\CFSFileController@store')->where('path', '(.*)');
            Route::put('cfs{path}', 'ApiVersionTwo\CFS\CFSFileController@update')->where('path', '(.*)');
            Route::patch('cfs{path}', 'ApiVersionTwo\CFS\CFSFileController@update')->where('path', '(.*)');
            Route::delete('cfs{path}', 'ApiVersionTwo\CFS\CFSFileController@destroy')->where('path', '(.*)');
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
    Route::controller('user', 'UserHomeController');
    Route::resource('object', 'UserObjectController');
    Route::resource('cfs', 'UserCfsController');
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
    Route::resource('key', 'AdminKeyController');
});
