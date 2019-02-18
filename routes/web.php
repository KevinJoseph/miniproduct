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

Route::get('/','HomeController@index');

Route::get('loadcategory','ProductController@loadcategory');
Route::get('loadbrand','ProductController@loadbrand');
Route::get('show/{id}', 'HomeController@showProducts');
Route::get('product/{id}','HomeController@productEspecifid');

Auth::routes();
Route::resource('products', 'ProductController');
Route::resource('categories', 'CategoryController');
Route::resource('promotions', 'PromotionController');
Route::resource('brands', 'BrandController');
Route::resource('subcategories', 'SubCategoryController');
Route::get('/home', 'HomeController@index')->name('home');
