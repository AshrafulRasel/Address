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
Route::resource('contact','ContactController');
Route::resource('address','AddressController');
Route::resource('phone','PhoneController');



Route::get('addresslist/{id}', 'AddressController@addresslist')->name('addresslist');
Route::get('phonelist/{id}', 'PhoneController@phonelist')->name('phonelist');



