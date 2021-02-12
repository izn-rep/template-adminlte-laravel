<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Author: IZN
| Created Date: 28/11/2020
|
*/

Route::get('/', 'WelcomeController@index');

Route::post('/', 'WelcomeController@index');

Route::get('change_password', 'WelcomeController@change_password');

Route::post('update_password', 'WelcomeController@update_password');

Route::get('signout', 'WelcomeController@signout');

Route::get('home', 'HomeController@index');

Route::get('users', 'AdministratorController@users');
Route::get('users/getuser', 'AdministratorController@getuser');

Route::get('menus', 'AdministratorController@menus');
Route::get('menus/getmenu', 'AdministratorController@getmenu');

Route::get('roles', 'AdministratorController@roles');
Route::get('roles/getrole', 'AdministratorController@getrole');

Route::get('dosp', 'ReferenceController@dosp');
Route::get('dosp/getdosp', 'ReferenceController@getdosp');

Route::get('faq', 'ReferenceController@FAQ');
Route::get('faq/getfaq', 'ReferenceController@getFAQ');

Route::get('peserta', 'KepesertaanController@peserta');
Route::get('peserta/list', 'KepesertaanController@peserta_list');
Route::get('peserta/getpeserta', 'KepesertaanController@getpeserta');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('admin-lte', function () {
	return view('admin-lte_template');
});
