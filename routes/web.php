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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['beforelogin']], function(){
	Route::get('/home','HomeController@index')->name('home.index');
	Route::get('/signin','SigninController@index')->name('signin.index');
	Route::post('/signin','SigninController@signin');
	Route::get('/registration','RegistrationController@index')->name('registration.index');
	Route::post('/registration','RegistrationController@registration');
});

Route::group(['middleware'=>['sess']], function(){
	Route::group(['middleware'=>['adminsess']], function(){
		Route::get('/admin','AdminController@index')->name('admin.index');
	});

	Route::group(['middleware'=>['customersess']], function(){
		Route::get('/customerhome','CustomerHomeController@index')->name('customer.index');
	});
});

Route::get('/logout','LogoutController@index');