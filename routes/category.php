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

//Category  routs
Route::get('/admin/manage-category', 'CategoryController@listCategory')->middleware('auth');
Route::get('/admin/get-category-data', 'CategoryController@categoryData')->middleware('auth');

Route::get('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
Route::post('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
////
Route::get('/admin/category/update/{id}', 'CategoryController@updateCategory')->middleware('auth');
Route::post('/admin/global-value/update/{id}', 'GlobalValuesController@updateGlobalValue')->middleware('auth');

Route::get('/admin/category/delete/{id}', 'CategoryController@deleteCategory')->middleware('auth');




