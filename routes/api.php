<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

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

    // all routes / api here must api authenticated
Route::group(['middleware' =>['api','checkPassword','changeLanguage'],'namespace'=> 'App\Http\Controllers\Api'],function (){

    Route::post('get-main-categories','CategoriesController@index');
    Route::post('get-category-byId','CategoriesController@getCategoryById');
    Route::post('change-category-status','CategoriesController@changeStatus');

    Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
        Route::post('login','AuthController@login');

    });


});

Route::group(['middleware' =>['api','checkPassword','changeLanguage','checkAdminToken:admin-api'],'namespace'=> 'App\Http\Controllers\Api'],function () {
    Route::post('offers','CategoriesController@index');

});
