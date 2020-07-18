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
Route::get('admin/', function () {
    return view('admin/index');
});

Route::get('admin/register', function () {
    return view('admin/auth/register');
});

Route::get('admin/login', function () {
    return view('admin/auth/login');
});


Route::get('/', function () {
    return view('userview/index');
});

Route::get('welcome', function () {
    return view('welcome');
});

*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){
	// All the Admin Routes will be defined here :-
	//Route::match(['get','post'],'/','AdminController@login');
	//Route::get('dashboard','AdminController@dashboard');
	Route::match(['get','post'],'/','AdminController@login');
	Route::group(['middleware' => ['admin']],function(){
		Route::get('dashboard','AdminController@dashboard');
		Route::get('logout','AdminController@logout');
	});	
});