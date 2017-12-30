<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin/dashboard', 'AdminController@index')->middleware('auth');
Route::get('/admin/login', 'AdminController@login')->name('/admin');
Route::get('/admin/email', 'AdminController@email')->name('/admin');


//users routes

Route::get('/admin/users/manage-users', 'UserController@listUser')->middleware('auth');
Route::get('/admin/users/get-user-data', 'UserController@userData')->middleware('auth');
Route::get('/admin/users/view/{id}', 'UserController@viewDetail')->middleware('auth');



//Route order History
Route::get('/admin/manage-order-history', 'OrderHistoryController@listOrderHistory')->middleware('auth');
Route::get('/admin/get-order-history-data', 'OrderHistoryController@orderHistoryData')->middleware('auth');

Route::get('/admin/manage-order-history/create-order-history', 'OrderHistoryController@createOrderHistory')->middleware('auth');
Route::post('/admin/manage-order-history/create-order-history', 'OrderHistoryController@createOrderHistory')->middleware('auth');
////
Route::get('/admin/manage-order-history/update/{id}', 'OrderHistoryController@updateOrderHistory')->middleware('auth');
Route::post('/admin/manage-order-history/update/{id}', 'OrderHistoryController@updateOrderHistory')->middleware('auth');

Route::get('/admin/manage-order-history/delete/{id}', 'OrderHistoryController@deleteOrderHistory')->middleware('auth');
Route::post('/admin/manage-order-history/change-status', 'OrderHistoryController@changeStatus')->middleware('auth');


// Global Wallet
Route::get('/admin/manage-global-wallet', 'GlobalWalletController@listGlobalWallet')->middleware('auth');
Route::get('/admin/get-global-wallet-data', 'GlobalWalletController@globalWalletData')->middleware('auth');

////
Route::get('/admin/manage-global-wallet/update/{id}/{add}', 'GlobalWalletController@updateGlobalWallet')->middleware('auth');
Route::post('/admin/manage-global-wallet/update/{id}/{deduct}', 'GlobalWalletController@updateGlobalWallet')->middleware('auth');

//cms routes
Route::get('/admin/cms-page', 'CmspageController@listPages')->middleware('auth');
Route::get('/admin/get-cms-page-data', 'CmspageController@dataPages')->middleware('auth');

Route::get('/admin/cms-page/update/{id}', 'CmspageController@updatePage')->middleware('auth');
Route::post('/admin/cms-page/update/{id}', 'CmspageController@updatePage')->middleware('auth');

//Global Values routs
Route::get('/admin/global-value', 'GlobalValuesController@listGlobalValues')->middleware('auth');
Route::get('/admin/get-global-value-data', 'GlobalValuesController@globalValueData')->middleware('auth');
//
Route::get('/admin/global-value/update/{id}', 'GlobalValuesController@updateGlobalValue')->middleware('auth');
Route::post('/admin/global-value/update/{id}', 'GlobalValuesController@updateGlobalValue')->middleware('auth');


// store routes
Route::get('/admin/manage-store', 'StoreController@listStore')->middleware('auth');
Route::get('/admin/get-store-data', 'StoreController@storeData')->middleware('auth');

Route::get('/admin/create-store', 'StoreController@createStore')->middleware('auth');
Route::post('/admin/create-store', 'StoreController@createStore')->middleware('auth');
////
Route::get('/admin/store/update/{id}', 'StoreController@updateStore')->middleware('auth');
Route::post('/admin/store/update/{id}', 'StoreController@updateStore')->middleware('auth');

Route::get('/admin/store/delete/{id}', 'StoreController@deleteStore')->middleware('auth');

//Category  routs
Route::get('/admin/manage-category', 'CategoryController@listCategory')->middleware('auth');
Route::get('/admin/get-category-data', 'CategoryController@categoryData')->middleware('auth');

Route::get('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
Route::post('/admin/create-category', 'CategoryController@createCategory')->middleware('auth');
////
Route::get('/admin/category/update/{id}', 'CategoryController@updateCategory')->middleware('auth');
Route::post('/admin/category/update/{id}', 'CategoryController@updateCategory')->middleware('auth');

Route::get('/admin/category/delete/{id}', 'CategoryController@deleteCategory')->middleware('auth');


//Coupan  routs
Route::get('/admin/manage-coupon', 'CouponController@listCoupon')->middleware('auth');
Route::get('/admin/get-coupon-data', 'CouponController@couponData')->middleware('auth');

Route::get('/admin/create-coupon', 'CouponController@createCoupon')->middleware('auth');
Route::post('/admin/create-coupon', 'CouponController@createCoupon')->middleware('auth');
////
Route::get('/admin/coupon/update/{id}', 'CouponController@updateCoupon')->middleware('auth');
Route::post('/admin/coupon/update/{id}', 'CouponController@updateCoupon')->middleware('auth');

Route::get('/admin/coupon/delete/{id}', 'CouponController@deleteCoupon')->middleware('auth');

Route::get('/get-store', 'CouponController@getStores')->middleware('auth');


// reddem routes
Route::get('/admin/redeem-master', 'RedeemController@listRedeem')->middleware('auth');
Route::get('/admin/get-redeem-data', 'RedeemController@redeemData')->middleware('auth');
Route::get('/admin/set-status', 'RedeemController@setRedeemStatus')->middleware('auth');


// Cashback Reports
Route::get('/admin/query', 'QueryController@listQuery')->middleware('auth');
Route::get('/admin/get-query-data', 'QueryController@queryData')->middleware('auth');


//Slider
//Category  routs
Route::get('/admin/manage-slider', 'SliderController@listSlider')->middleware('auth');
Route::get('/admin/get-slider-data', 'SliderController@sliderData')->middleware('auth');

Route::get('/admin/create-slider', 'SliderController@createSlider')->middleware('auth');
Route::post('/admin/create-slider', 'SliderController@createSlider')->middleware('auth');
////
Route::get('/admin/slider/update/{id}', 'SliderController@updateSlider')->middleware('auth');
Route::post('/admin/slider/update/{id}', 'SliderController@updateSlider')->middleware('auth');

Route::get('/admin/slider/delete/{id}', 'SliderController@deleteSlider')->middleware('auth');

//Sub Category  routs
Route::get('/admin/manage-subcategory', 'SubCategoryController@listSubCategory')->middleware('auth');
Route::get('/admin/get-subcategory-data', 'SubCategoryController@subcategoryData')->middleware('auth');

Route::get('/admin/create-subcategory', 'SubCategoryController@createSubCategory')->middleware('auth');
Route::post('/admin/create-subcategory', 'SubCategoryController@createSubCategory')->middleware('auth');

Route::get('/admin/subcategory/update/{id}', 'SubCategoryController@updateSubCategory')->middleware('auth');
Route::post('/admin/subcategory/update/{id}', 'SubCategoryController@updateSubCategory')->middleware('auth');

Route::get('/admin/subcategory/delete/{id}', 'SubCategoryController@deleteSubCategory')->middleware('auth');