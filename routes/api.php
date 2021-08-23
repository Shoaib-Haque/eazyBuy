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

Route::get('/customerhome/products', 'CustomerHomeController@index');
Route::get('/customer/product/{proId}', 'CustomerProductController@index');
Route::get('/product/price','CustomerProductController@getPrice')->name('customer.product.price');
Route::get('/product/optiontypes','CustomerProductController@getOptionTypes')->name('customer.product.optiontypes');
Route::get('/product/image','CustomerProductController@getImage')->name('customer.product.image');
