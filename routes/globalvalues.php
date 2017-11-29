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
Route::get('/admin/manage-global-value', 'GlobalValuesController@listGlobalValues')->middleware('auth');
Route::get('/admin/get-global-value-data', 'GlobalValuesController@globalValueData')->middleware('auth');
//
Route::get('/admin/global-value/update/{id}', 'GlobalValuesController@updateGlobalValue')->middleware('auth');
Route::post('/admin/global-value/update/{id}', 'GlobalValuesController@updateGlobalValue')->middleware('auth');




