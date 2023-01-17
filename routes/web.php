<?php

use App\Http\Controllers\TampilanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TampilanController::class, 'index']);
Route::get('/service_product', [TampilanController::class, 'service_product']);
Route::get('/detail_service_product', [TampilanController::class, 'detail_service_product']);
Route::get('/news', [TampilanController::class, 'news']);
Route::get('/contactus', [TampilanController::class, 'contactus']);

