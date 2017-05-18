<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'web'], function() {
    Route::auth();
});

#jika sudah login
/*
Route::group(['middleware' => ['web','auth']], function() {
    
	Route::get('/home', 'HomeController@index');
	Route::get('/', function() {
	    if(Auth::user()->admin == 1){
	    	return view('admin.home');

	    }else{
	    	# jika login user
	    	return view('home');
	    }
	});	
	Route::resource('/toko', 'TokosController');
	Route::resource('/sales', 'SalesController');
	Route::resource('/pelanggan', 'PelanggansController');
	Route::resource('/kasir', 'KasirsController');
	Route::resource('/barang', 'BarangsController');
	Route::resource('/user', 'UsersController');
});
*/
Route::get('/admin', 'AdminController@index');
Route::resource('/toko', 'TokosController');
Route::resource('/sales', 'SalesController');
Route::resource('/pelanggan', 'PelanggansController');
Route::resource('/kasir', 'KasirsController');
Route::resource('/barang', 'BarangsController');
Route::resource('/user', 'UsersController');