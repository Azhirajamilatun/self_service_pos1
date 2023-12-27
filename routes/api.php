<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('product', 'App\http\Controllers\ApiController@product_index');
Route::post('product/add', 'App\Http\Controllers\ApiController@product_store');
Route::get('product/{id}', 'App\Http\Controllers\ApiController@product_by_id');
Route::get('product/delete/{id}', 'App\Http\Controllers\ApiController@product_delete');
Route::put('produk/update/{id}', 'App\Http\Controllers\ApiController@produk_update'); // Adding the update route



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', 'App\http\Controllers\ApiController@category_index');
Route::post('category/add', 'App\Http\Controllers\ApiController@category_store');
Route::get('category/{id}', 'App\Http\Controllers\ApiController@category_by_id');
Route::get('category/delete/{id}', 'App\Http\Controllers\ApiController@category_delete');
Route::post('category/update/{id}', 'App\Http\Controllers\ApiController@category_update'); // Adding the update route

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

