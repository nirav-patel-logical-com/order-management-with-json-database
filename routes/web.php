<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',['as' => 'product_list', 'uses' => 'ProductController@product_list']);
Route::get('/add-product',['as' => 'add_product', 'uses' => 'ProductController@add_product']);
Route::get('/edit-product/{id}',['as' => 'edit_product', 'uses' => 'ProductController@edit_product']);