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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/products', [App\Http\Controllers\Api\ProductApiController::class, 'index']);
Route::get('/products/by/brand/{brand}', 
    [App\Http\Controllers\Api\ProductApiController::class, 'indexByBrand'])->where('brand', '[A-Za-z0-9]+');
Route::get('/products/by/series/{series}', 
    [App\Http\Controllers\Api\ProductApiController::class, 'indexBySeries'])->where('series', '[A-Za-z0-9]+');
Route::get('/product/{product}', [App\Http\Controllers\Api\ProductApiController::class, 'show'])->name('product.show');
Route::post('/product', [App\Http\Controllers\Api\ProductApiController::class, 'create']);
Route::put('/product/{product}', [App\Http\Controllers\Api\ProductApiController::class, 'update']);
Route::delete('/product/{product}', [App\Http\Controllers\Api\ProductApiController::class, 'delete']);

Route::get('/brand/{brand}', 
    [App\Http\Controllers\Api\BrandApiController::class, 'show'])->name('brand.show')->where('brand', '[A-Za-z0-9]+');

Route::get('/series/{series}', 
    [App\Http\Controllers\Api\SeriesApiController::class, 'show'])->name('sereies.show')->where('series', '[A-Za-z0-9]+');
