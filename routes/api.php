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

    //Activities
    // Route::get('getactivities', 'ActivitiesController@getActivities');
    // Route::get('getcategoryactivities', 'ActivitiesController@getCategoryActivities');
    // Route::get('getspecificactivities', 'ActivitiesController@getSpecificActivities');
    // Route::delete('deleteactivities', 'ActivitiesController@deleteActivities');
    // Route::post('insertactivities', 'ActivitiesController@insertActivities');
    // Route::put('updateactivities', 'ActivitiesController@updateActivities');

    Route::get('getcontent', 'GeneralContentController@getContent');
    Route::put('editcontent', 'GeneralContentController@updateContent');
});
