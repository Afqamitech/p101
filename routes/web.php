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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/logout', function(){
    Auth::logout();
    return redirect('/admin/login')->with('success','Logout Successful');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/dashboard', 'AdminController@index')->middleware('auth');
Route::get('/admin/login', 'AdminController@login');
Route::get('admin/manage-pages', 'AdminController@listPages')->middleware('auth');

