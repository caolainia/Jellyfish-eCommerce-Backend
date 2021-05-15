<?php

use App\Http\Controllers\Api\ProductsApiController;
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



Route::get('/products', [ProductsApiController::class, 'index']);
Route::post('/products', [ProductsApiController::class, 'create']);
Route::put('/products/{product}', [ProductsApiController::class, 'update']);
Route::delete('/products/{product}', [ProductsApiController::class, 'delete']);

