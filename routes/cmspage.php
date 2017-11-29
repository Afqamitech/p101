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

//CMS page routs
Route::get('/admin/manage-pages', 'CmspageController@listPages')->middleware('auth');
Route::get('/admin/get-cms-page-data', 'CmspageController@dataPages')->middleware('auth');

Route::get('/admin/cms-page/update/{id}', 'CmspageController@updatePage')->middleware('auth');
Route::post('/admin/cms-page/update/{id}', 'CmspageController@updatePage')->middleware('auth');




