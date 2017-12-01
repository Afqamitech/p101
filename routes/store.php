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

//Global Values routs
Route::get('/admin/manage-store', 'StoreController@listStore')->middleware('auth');
Route::get('/admin/get-store-data', 'StoreController@storeData')->middleware('auth');

Route::get('/admin/create-store', 'StoreController@createStore')->middleware('auth');
Route::post('/admin/create-store', 'StoreController@createStore')->middleware('auth');
////
Route::get('/admin/store/update/{id}', 'StoreController@updateStore')->middleware('auth');
Route::post('/admin/store/update/{id}', 'StoreController@updateStore')->middleware('auth');

Route::get('/admin/store/delete/{id}', 'StoreController@deleteStore')->middleware('auth');




