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
Route::get('/admin/manage-coupon', 'CouponController@listCoupon')->middleware('auth');
Route::get('/admin/get-coupon-data', 'CouponController@couponData')->middleware('auth');

Route::get('/admin/create-coupon', 'CouponController@createCoupon')->middleware('auth');
Route::post('/admin/create-coupon', 'CouponController@createCoupon')->middleware('auth');
////
Route::get('/admin/coupon/update/{id}', 'CouponController@updateCoupon')->middleware('auth');
Route::post('/admin/coupon/update/{id}', 'CouponController@updateCoupon')->middleware('auth');

Route::get('/admin/coupon/delete/{id}', 'CouponController@deleteCoupon')->middleware('auth');




