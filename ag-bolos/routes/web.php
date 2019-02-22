<?php
Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');
Route::get('/login/rrpp', 'Auth\LoginController@showRrppLoginForm');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm');
Route::get('/register/rrpp', 'Auth\RegisterController@showRrppRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/client', 'Auth\LoginController@clientLogin');
Route::post('/login/rrpp', 'Auth\LoginController@rrppLogin');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/client', 'Auth\RegisterController@createClient');
Route::post('/register/rrpp', 'Auth\RegisterController@createRrpp');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/client', 'client');
Route::view('/rrpp', 'rrpp');
