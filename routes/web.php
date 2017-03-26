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

Route::group(['middleware'=>'auth'], function(){
  Route::get('/catalog','CatalogController@getIndex');
  Route::get('/catalog/show/{id}','CatalogController@getShow');
  Route::put('/catalog/rent/{id}','CatalogController@putRent');
  Route::put('/catalog/return/{id}','CatalogController@putReturn');
});

Route::group(['middleware'=>'AuthenticateAdmin'], function(){
  Route::get('/catalog/create','CatalogController@getCreate');
  Route::get('/catalog/edit/{id}','CatalogController@getEdit');
  Route::put('/catalog/edit/{id}','CatalogController@update');
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
