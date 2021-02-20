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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sell', 'HomeController@sell')->name('sell');

Route::get('/employees','HomeController@employees')->name('employees');

Route::get('/products','HomeController@products')->name('products');

Route::get('/modifyE','HomeController@modifyE')->name('modifyE');

Route::get('/modifyP','HomeController@modifyP')->name('modifyP');


