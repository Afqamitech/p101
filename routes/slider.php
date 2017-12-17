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
Route::get('/admin/manage-slider', 'SliderController@listSlider')->middleware('auth');
Route::get('/admin/get-slider-data', 'SliderController@sliderData')->middleware('auth');

Route::get('/admin/create-slider', 'SliderController@createSlider')->middleware('auth');
Route::post('/admin/create-slider', 'SliderController@createSlider')->middleware('auth');
////
Route::get('/admin/slider/update/{id}', 'SliderController@updateSlider')->middleware('auth');
Route::post('/admin/slider/update/{id}', 'SliderController@updateSlider')->middleware('auth');

Route::get('/admin/slider/delete/{id}', 'SliderController@deleteSlider')->middleware('auth');




