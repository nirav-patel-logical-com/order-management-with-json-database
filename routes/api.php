<?php

use Illuminate\Http\Request;

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
Route::post('api_product_add',['as'=>'api_product_add','uses'=>'ProductController@api_product_add']);
Route::post('api_product_edit',['as'=>'api_product_edit','uses'=>'ProductController@api_product_edit']);
