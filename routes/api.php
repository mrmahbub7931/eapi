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



Route::apiResource('/users','UserController');

Route::group(['namespace' => 'Products'], function () {
    Route::apiResource('/products','ProductController');
    Route::apiResource('/products/{product}/reviews','ReviewController');
});

Route::group(['namespace' => 'Category'], function () {
    Route::apiResource('/category','CategoryController');
    Route::apiResource('/subcategory','SubCategoryController');
});