<?php
/**
 * Client routes
 *
 * @author     Michael <resourcemode@yahoo.com>
 */
Route::group(['middleware' => ['web', 'auth', 'routeName'], 'namespace' => 'Client'], function () {

    Route::get('history', ['as' => 'historyIndex', 'uses' => 'HistoryController@getIndex']);
    Route::post('history', ['as' => 'historyCreate', 'uses' => 'HistoryController@createHistory']);
    Route::get('history/user', ['as' => 'history.user', 'uses' => 'HistoryController@getHistoryByUser']);

    Route::get('media', ['as' => 'media', 'uses' => 'MediaController@getAll']);

    Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
});

Route::group(['middleware' => ['web', 'routeName'], 'namespace' => 'Client'], function () {

    Route::get('/', ['as' => 'homeIndex', 'uses' => 'HomeController@getIndex']);

    Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
});
