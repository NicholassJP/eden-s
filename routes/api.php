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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API'], function () {

    //Content
    Route::get('getcontent', 'GeneralContentController@getContent');
    Route::put('editcontent', 'GeneralContentController@updateContent');

    //Service
    Route::get('getservice', 'ServiceController@getService');
    Route::post('insertservice', 'ServiceController@insertService');
    Route::delete('deleteservice', 'ServiceController@deleteService');
    Route::put('updateservice', 'ServiceController@updateService');

    //Product
    Route::get('getproduct', 'ProductController@getProduct');
    Route::post('insertproduct', 'ProductController@insertProduct');
    Route::delete('deleteproduct', 'ProductController@deleteProduct');
    Route::put('updateproduct', 'ProductController@updateProduct');
});
