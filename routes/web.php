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

Auth::routes();


Route::middleware('auth')->group(function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create','HomeController@create');
    Route::post('/create','HomeController@store');
    Route::get('/like/{twit}','HomeController@like');
    Route::get('/dislike/{twit}','HomeController@dislike');
    Route::get('/twit/{twit}','HomeController@show');
    Route::post('/reply/{twit}','HomeController@reply');
});
