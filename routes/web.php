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

Auth::routes();
Route::get('/', 'HomeController@index');

// Route::get('/login','LoginController@showLoginForm');
// Route::post('/login','LoginController@login');
// Route::post('/logout','LoginController@logout');
//
// Route::get('/register','RegisterController@showRegisterForm');
// Route::post('/register','RegisterController@register');
//
// Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail');
// Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm');
//
// Route::post('/password/email','ResetPasswordController@reset');
// Route::post('/password/email','ResetPasswordController@showResetForm');

Route::group(['middleware'=>'auth'], function(){
  Route::get('/catalog','CatalogController@getIndex');
  Route::get('/catalog/show/{id}','CatalogController@getShow');
  Route::get('/catalog/create','CatalogController@getCreate');
  Route::get('/catalog/edit/{id}','CatalogController@getEdit');
  Route::put('/catalog/rent/{id}','CatalogController@putRent');
  Route::put('/catalog/return/{id}','CatalogController@putReturn');
  Route::put('/catalog/delete/{id}','CatalogController@deleteMovie');
});

Route::get('/admin/catalog', function(){

})->middleware('auth');
Route::get('/profile','ProfileController@show')->middleware('auth');

Route::get('/api/user', function(){

})->middleware('auth.basic.once');
Route::get('/api/v1/catalog','APICatalogController@index');
Route::get('/api/v1/catalog/{id}','APICatalogController@show');
Route::post('/api/v1/catalog','APICatalogController@store')->middleware('auth.basic.once');
Route::put('/api/v1/catalog/{id}','APICatalogController@update')->middleware('auth.basic.once');
Route::delete('/api/v1/catalog/{id}','APICatalogController@destroy')->middleware('auth.basic.once');
Route::put('/api/v1/catalog/{id}/rent','APICatalogController@putRent')->middleware('auth.basic.once');
Route::put('/api/v1/catalog/{id}/return','APICatalogController@putRent')->middleware('auth.basic.once');
