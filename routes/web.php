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
	
	
	Route::get('/',function (){
		return view('welcome');
	})->middleware('isBlocked');
	
	Auth::routes();
	
	
	Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function (){
		Auth::routes();
		Route::middleware('auth:admin')->group(function (){
			Route::get('/home','HomeController@index')->name('home');
			Route::get('/create','HomeController@create');
			Route::post('/create','HomeController@store');
			Route::get('/unblock/{blocked}','HomeController@unblock');
			Route::get('/keyword/{keyword}','HomeController@delete');
			Route::get('/keywords','HomeController@keywords');
			Route::get('/keywords/create/keyword','HomeController@create');
			Route::post('/keywords/create/keyword','HomeController@store');
			
		});
		
		
	});
	
	
	Route::middleware(['auth:web','isBlocked'])->group(function (){
		Route::get('/home','HomeController@index')->name('home');
		Route::get('/create','HomeController@create');
		Route::post('/create','HomeController@store');
		Route::get('/like/{twit}','HomeController@like');
		Route::get('/dislike/{twit}','HomeController@dislike');
		Route::get('/twit/{twit}','HomeController@show');
		Route::post('/reply/{twit}','HomeController@reply');
	});
	
	
	// admin controllers
