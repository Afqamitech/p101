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

//OrderHistory routs
Route::get('/admin/manage-order-history', 'OrderHistoryController@listOrderHistory')->middleware('auth');
Route::get('/admin/get-order-history-data', 'OrderHistoryController@orderHistoryData')->middleware('auth');

Route::get('/admin/manage-order-history/create-order-history', 'OrderHistoryController@createOrderHistory')->middleware('auth');
Route::post('/admin/manage-order-history/create-order-history', 'OrderHistoryController@createOrderHistory')->middleware('auth');
////
Route::get('/admin/manage-order-history/update/{id}', 'OrderHistoryController@updateOrderHistory')->middleware('auth');
Route::post('/admin/manage-order-history/update/{id}', 'OrderHistoryController@updateOrderHistory')->middleware('auth');

Route::get('/admin/manage-order-history/delete/{id}', 'OrderHistoryController@deleteOrderHistory')->middleware('auth');




