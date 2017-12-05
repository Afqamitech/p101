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
Route::get('/admin/query', 'QueryController@listQuery')->middleware('auth');
Route::get('/admin/get-query-data', 'QueryController@queryData')->middleware('auth');
//
//Route::get('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
//Route::post('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
//////
//Route::get('/admin/category/update/{id}', 'CategoryController@updateCategory')->middleware('auth');
//Route::post('/admin/category/update/{id}', 'CategoryController@updateCategory')->middleware('auth');
//
//Route::get('/admin/category/delete/{id}', 'CategoryController@deleteCategory')->middleware('auth');




