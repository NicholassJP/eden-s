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
    Route::get('getcontent', 'ContentController@getContent');
    Route::put('editcontent', 'ContentController@updateContent');
    Route::get('gethome', 'ContentController@getHome');
    Route::get('getsv', 'ContentController@getServiceAndProduct');
    Route::get('getproject', 'ContentController@getNews');
    Route::get('getcontact', 'ContentController@getContact');

    //Inbox
    Route::get('getinbox', 'ContactUsController@getInbox');
    Route::post('insertinbox', 'ContactUsController@insertInbox');
    Route::delete('deleteinbox', 'ContactUsController@deleteInbox');

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

    //Category
    Route::get('getcategory', 'CategoryController@getCategory');
    Route::post('insertcategory', 'CategoryController@insertCategory');
    Route::delete('deletecategory', 'CategoryController@deleteCategory');
    Route::put('updatecategory', 'CategoryController@updateCategory');

    //News
    Route::get('getnews', 'NewsController@getNews');
    Route::get('getnewsdetail', 'NewsController@getNewsDetail');
    Route::post('insertnews', 'NewsController@insertNews');
    Route::delete('deletenews', 'NewsController@deleteNews');
    Route::put('updatenews', 'NewsController@updateNews');

    //Person
    Route::get('getperson', 'PersonController@getPerson');
    Route::post('insertperson', 'PersonController@insertPerson');
    Route::delete('deleteperson', 'PersonController@deletePerson');
    Route::put('updateperson', 'PersonController@updatePerson');

    //Partner
    Route::get('getpartner', 'PartnerController@getPartner');
    Route::post('insertpartner', 'PartnerController@insertPartner');
    Route::delete('deletepartner', 'PartnerController@deletePartner');
    Route::put('updatepartner', 'PartnerController@updatePartner');

    //Category and News
    Route::post('insertcan', 'CategoryAndNewsController@insertCAN');
    Route::delete('deletecan', 'CategoryAndNewsController@deleteCAN');

    //Count
    Route::get('getcount', 'MaxCheckedValidationController@getCount');
});
