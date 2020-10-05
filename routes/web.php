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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/heading/{headingID}', 'HeadingController@show');
Route::get('/heading/{headingID}/edit', 'HeadingController@edit');
Route::post('/heading/{headingID}', 'HeadingController@update');
Route::get('/heading/{headingID}/delete', 'HeadingController@destroy');

Route::get('/word/{wordID}/edit', 'WordController@edit');
Route::post('/word/{wordID}/', 'WordController@update');
Route::get('/word/{wordID}/delete', 'WordController@destroy');
