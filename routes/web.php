<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
////new prescription start/////
Route::get('medicine/show','Medicine@show');
Route::get('medicine/add','Medicine@add');
Route::post('medicine/add_post','Medicine@add_post');
Route::post('medicine/getExcel', 'Medicine@getExcel');
Route::get('medicine/status_cahnge/{p_id}', 'Medicine@status_change');
Route::get('medicine/edit/{p_id}', 'Medicine@edit');
Route::post('medicine/edit_post', 'Medicine@edit_post');

Route::get('brand/show', 'Brand@show');
Route::get('brand/post', 'Brand@post');
Route::get('brand/edit/{p_id}', 'Brand@edit');
Route::post('brand/edit_post', 'Brand@edit_post');

Route::get('prescription/show','Prescription@show');
Route::get('prescription/add', 'Prescription@add');
Route::post('prescription/post', 'Prescription@post');
Route::any('medicine/get_medicine', 'Medicine@get_medicine');
Route::get('prescription/details/{p_id}', 'Prescription@details');

Route::get('prescription/known_case', 'Prescription@known_case');///
Route::get('prescription/known_case_add', 'Prescription@known_case_add');///
Route::any('prescription/add_known_case_post', 'Prescription@add_known_case_post');///
Route::any('prescription/update_known_case', 'Prescription@update_known_case');
Route::any('prescription/delete_known_case/{id}', 'Prescription@delete_known_case');///
Route::any('prescription/edit_data/{id}', 'Prescription@edit_data');
Route::any('prescription/update_data', 'Prescription@update_data');
// rakib
Route::get('/test', 'Test@test');
Route::get('/Test_add', 'Test@test_show');
Route::any('/add_test_post', 'Test@add_test_post');///
Route::any('/update_test', 'Test@update_test');///
Route::any('/delete_test/{id}', 'Test@delete_test');///

Route::get('client/add', 'Client@add');
Route::get('patient/show', 'Client@show');
Route::get('patient/edit/{id}', 'Client@edit');
Route::any('patient/update', 'Client@update');
Route::get('patient/details/{id}', 'Client@details');

Route::get('doctor/show', 'Doctor@show');
Route::get('doctor/edit/{id}', 'Doctor@edit');
Route::any('doctor/update', 'Doctor@update');

Route::get('prescription/pdf/{id}', 'Prescription@prescriptionPdf');
////new prescription ends/////

Route::any('/', 'Login@index');

Route::any('login', 'Login@index');
Route::any('login/login_check', 'Login@login_check');
Route::get('auth/logout', 'Auth\AuthController@logout');


Route::any('home/index', 'Home@index');
Route::get('home/dashboard', 'Home@dashboard')->middleware('admin');
Route::post('home/insert_company', 'Home@insert_company');
Route::post('home/update_profile_info', 'Home@update_profile_info');
Route::post('home/update_password', 'Home@update_password');
Route::any('home/db_backup', 'Home@db_backup');

