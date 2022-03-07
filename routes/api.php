<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::group(['middleware'=>'auth:api'], function (){
        Route::group(['namespace'=>'Fruit', 'prefix'=>'fruits'], function (){
            Route::get('/', 'IndexController');
        });
    });

});



Route::group(['namespace'=>'User', 'prefix'=>'users'], function (){
    Route::post('/', 'StoreController');
});



