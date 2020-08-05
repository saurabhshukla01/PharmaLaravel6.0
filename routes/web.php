<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){
	// All the Admin Routes will be defined here :-
	Route::match(['get','post'],'/','AdminController@login');
	Route::group(['middleware' => ['admin']],function(){
		Route::get('dashboard','AdminController@dashboard');
		Route::get('settings','AdminController@settings');
		Route::get('logout','AdminController@logout');
		Route::post('check-current-pwd','AdminController@check_current_pwd');
		Route::post('update-current-pwd','AdminController@update_current_pwd');
		Route::match(['get','post'],'update-admin-details','AdminController@UpdateAdminDetails');

		//sections Routes
		Route::get('sections','SectionController@sections');
		Route::post('update-section-status','SectionController@updateSectionStatus');

		//Brand Routes
		Route::get('brands','BrandController@Brands');
		Route::post('update-brand-status','BrandController@updateBrandStatus');
		Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
		Route::get('delete-brand/{id}','BrandController@deleteBrand');

		//categories Routes
		Route::get('categories','CategoryController@categories');
		Route::post('update-category-status','CategoryController@updateCategoryStatus');
		Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
		Route::post('append-categories-level','CategoryController@appendCategoryLevel');
		Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImage');
		Route::get('delete-category/{id}','CategoryController@deleteCategory');

		//products Routes
		Route::get('products','ProductsController@products');
		Route::post('update-product-status','ProductsController@updateProductStatus');
		Route::match(['get','post'],'add-edit-product/{id?}','ProductsController@addEditProduct');
		Route::get('delete-product/{id}','ProductsController@deleteProduct');
		Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');
		Route::get('delete-product-video/{id}','ProductsController@deleteProductVideo');
		
		// Attributes Routes
		Route::match(['get','post'],'add-attributes/{id}','ProductsController@addAttributes');
		Route::post('edit-attributes/{id}','ProductsController@editAttributes');
		Route::post('update-attribute-status','ProductsController@updateAttributeStatus');
		Route::get('delete-attribute/{id}','ProductsController@deleteAttribute');
		
		// Images Routes
		Route::match(['get','post'],'add-images/{id}','ProductsController@addImages');
		Route::post('update-image-status','ProductsController@updateImageStatus');
		Route::get('delete-image/{id}','ProductsController@deleteImage');

	});	
});

Route::namespace('Front')->group(function(){

	// UserLogin Auth Route
	Route::match(['get','post'],'user-login','UserCheckController@userLogin');
	Route::match(['get','post'],'user-register','UserCheckController@userRegister');
	Route::get('user-logout','UserCheckController@userLogout');
	Route::match(['get','post'],'contact','UserCheckController@contact');
	Route::match(['get','post'],'user-profile','UserCheckController@userProfile');
	Route::get('about','UserCheckController@about');
	
	
	// All the Front/User Routes will be defined here :-
	Route::get('/','IndexController@index');
	Route::get('featured_products','IndexController@featuredProducts');
	
	// User Products Route
	Route::get('products','ProductsController@index');
	Route::get('product_details/{id}','ProductsController@productDetails');
	Route::get('compair','ProductsController@productCompair');

	// Get product Attribute Price Route
	Route::get('get-product-price','ProductsController@getProductPrice');
	// Get product Attribute Stock Route
	Route::get('get-product-stock','ProductsController@getProductStock');



});


