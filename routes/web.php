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

	



 
	Route::get('admin/check-pwd', 'AdminController@chkPassword');
	//-------------------------------Login----------------------------------
	Route::match(['get', 'post'],'admin', 'AdminController@login');
	Route::get('admin/dashboard', 'AdminController@dashboard');
	Route::get('admin/settings', 'AdminController@settings');
	Route::get('logout', 'AdminController@logout');
	//-------------------------------categories----------------------------------
	Route::match(['get', 'post'],'admin/add-category', 'category_controller@add_category');
	Route::match(['get', 'post'],'admin/view-category', 'category_controller@view_category');
	Route::match(['get', 'post'],'admin/edit-category/{id}', 'category_controller@edit_category');
	Route::match(['get', 'post'],'admin/delete-category/{id}', 'category_controller@delete_category');
	//-------------------------------products----------------------------------
	Route::match(['get', 'post'],'admin/add-products', 'ProductsController@addProduct');
	Route::match(['get', 'post'],'admin/view-products', 'ProductsController@viewProduct');
	Route::match(['get', 'post'],'admin/edit-products/{id}', 'ProductsController@editProduct');
	Route::match(['get', 'post'],'admin/delete-products/{id}', 'ProductsController@deleteProduct');

	//-----------------------------------------------------------------



Route::group(['middleware'=>['auth']], function(){

	//categries Routes

});






// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// RedirectIfAuthenticated
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
