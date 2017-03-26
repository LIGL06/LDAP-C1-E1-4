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
  Route::get('/profile','ProfileController@show');
});

Route::group(['middleware'=>'admin'], function(){
  Route::get('/catalog/create','CatalogController@getCreate');
  Route::get('/catalog/edit/{id}','CatalogController@getEdit');
  Route::put('/catalog/edit/{id}','CatalogController@update');
  Route::put('/catalog/delete/{id}','CatalogController@deleteMovie');
});

Route::group(['middleware'=>'auth.basic'],function(){
  Route::get('/api/v1/user','APICatalogController@users');
  Route::get('/api/v1/catalog','APICatalogController@index');
  Route::get('/api/v1/catalog/{id}','APICatalogController@show');
});
