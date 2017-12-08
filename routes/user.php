<?php

Route::get('/admin/users/manage-users', 'UserController@listUser')->middleware('auth');
Route::get('/admin/users/get-user-data', 'UserController@userData')->middleware('auth');




