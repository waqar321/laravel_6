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

// Route::get('/', function () {
//     return view('welcome');
// });
	//=======================================FrontEnd=======================================
		
	/* | */ 	Route::get('/', 'IndexController@Index');
	/* | */ 	Route::get('waqar', 'ProductsController@waqar');
	/* | */
	/* | */ 	Route::match(['get', 'post'],'getting-product-price', 'ProductsController@gettingProductPrice'); //product attibute price
	/* | */ 	
	/* | */ 	
	/* | */ 	//login/Registers	
	/* | */ 	Route::match(['get', 'post'],'login-register', 'users_controller@register'); //product attibute price
	/* | */ 	
	/* | */		
	/* | */
	/* | */
	/* | */
	/* | */
	/* | */
	//=======================================FrontEnd=======================================
	/* | */	Route::match(['get', 'post'],'admin/check-pwd', 'AdminController@chkPassword');
	/* | */	Route::match(['get', 'post'],'admin/update-pwd', 'AdminController@UpdatePassword');	
	//-------------------------------Login----------------------------------
	/* | */	
	/* | */	Route::match(['get', 'post'],'admin', 'AdminController@login');
	/* | */	Route::get('admin/dashboard', 'AdminController@dashboard');
	/* | */	Route::get('admin/settings', 'AdminController@settings');
	/* | */	Route::get('logout', 'AdminController@logout');
	/* | */	
	//-------------------------------categories----------------------------------
	/* | */	
	/* | */	Route::match(['get', 'post'],'admin/add-category', 'category_controller@add_category');
	/* | */	Route::match(['get', 'post'],'admin/view-category', 'category_controller@view_category');
	/* | */	Route::match(['get', 'post'],'admin/edit-category/{id}', 'category_controller@edit_category');
	/* | */	Route::match(['get', 'post'],'admin/delete-category/{id}', 'category_controller@delete_category');
	/* | */	
	//-------------------------------products----------------------------------
	/* | */	
	/* | */	Route::match(['get', 'post'],'admin/add-products', 'ProductsController@addProduct');
	/* | */	Route::match(['get', 'post'],'admin/view-products', 'ProductsController@viewProduct');
	/* | */	Route::match(['get', 'post'],'admin/edit-products/{id}', 'ProductsController@editProduct');
	/* | */	Route::match(['get', 'post'],'admin/delete-productsImage/{id}', 'ProductsController@deleteProductImage');
	/* | */	Route::match(['get', 'post'],'admin/delete-products/{id}', 'ProductsController@deleteProduct');
	/* | */	Route::get('/products/{url}', 'ProductsController@products');
	/* | */	Route::get('/product/{id}', 'ProductsController@product');  //product detail page 
	/* | */	
	//-----------------------------------------------------------------
	/* | */	Route::match(['get', 'post'],'admin/add-attribute/{id}', 'ProductsController@AddAttribute');
	/* | */	Route::match(['get', 'post'],'admin/delete-attribute/{id}', 'ProductsController@DeleteAttribute');
	/* | */	
	//-----------------------------------------------------------------



Route::group(['middleware'=>['auth']], function(){

	//categries Routes

});






// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// RedirectIfAuthenticated
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
