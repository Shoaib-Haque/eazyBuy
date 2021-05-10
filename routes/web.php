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

		Route::get('/admin/catalog/departments','AdminDepartmentController@index')->name('admindepartment.index');
		Route::get('/admin/catalog/department/add','AdminDepartmentController@add')->name('admindepartment.add');
		Route::post('/admin/catalog/department/add','AdminDepartmentController@addDepartment');
		Route::get('/admin/catalog/department/edit/{did}','AdminDepartmentController@edit')->name('admindepartment.edit');
		Route::post('/admin/catalog/department/edit/{did}','AdminDepartmentController@editDepartment');

		Route::get('/admin/catalog/categories','AdminCategoryController@index')->name('admincategory.index');
		Route::get('/admin/catalog/category/add','AdminCategoryController@add')->name('admincategory.add');
		Route::post('/admin/catalog/category/add','AdminCategoryController@addCategory');
		Route::get('/admin/catalog/category/edit/{cid}','AdminCategoryController@edit')->name('admincategory.edit');
		Route::post('/admin/catalog/category/edit/{cid}','AdminCategoryController@editCategory');

		Route::get('/admin/catalog/products','AdminProductController@index')->name('adminproduct.index');
		Route::get('/admin/catalog/product/add','AdminProductController@add')->name('adminproduct.add');
		Route::post('/admin/catalog/product/add','AdminProductController@addproduct');

		Route::get('/admin/catalog/brands','AdminBrandController@index')->name('adminbrand.index');
		Route::get('/admin/catalog/brand/add','AdminBrandController@add')->name('adminbrand.add');
		Route::post('/admin/catalog/brand/add','AdminBrandController@addBrand');
		Route::get('/admin/catalog/brand/edit/{bid}','AdminBrandController@edit')->name('adminbrand.edit');
		Route::post('/admin/catalog/brand/edit/{bid}','AdminBrandController@editBrand');
	});

	Route::group(['middleware'=>['customersess']], function(){
		Route::get('/customerhome','CustomerHomeController@index')->name('customer.index');
	});
});

Route::get('/logout','LogoutController@index');