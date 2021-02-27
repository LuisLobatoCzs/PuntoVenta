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
    $usuario = Auth::user();
    if($usuario != null){
        if(Auth::user()->rol == 0){
            return view('admin');
        }
        else{
            return view('home');
        }
    }
    else{
        return view('auth/login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sell', 'HomeController@sell')->name('sell');

Route::post('/sale', 'HomeController@sellreg')->name('sale');

Route::get('/employees','HomeController@employees')->name('employees');

Route::get('/products','HomeController@products')->name('products');

Route::get('/modifyE','HomeController@modifyE')->name('modifyE');

Route::get('/modifyP','HomeController@modifyP')->name('modifyP');

Route::post('/updateEmployee', 'HomeController@updateUser')->name('updateEmployee');

Route::get('/deleteEmployee', 'HomeController@deleteEmployee')->name('deleteEmployee');

Route::get('/addEmployees','HomeController@addEmployees')->name('addEmployees');

Route::post('/addEmployees', 'HomeController@addEmployee')->name('addEmployees');

Route::get('/addProducts','HomeController@addProducts')->name('addProducts');

Route::post('/addProducts', 'HomeController@addProduct')->name('addProducts');

Route::get('/addExpenses','HomeController@addExpenses')->name('addExpenses');

Route::post('/addExpenses', 'HomeController@addExpense')->name('addExpenses');

Route::get('/reports','HomeController@reports')->name('reports');

Route::get('/productsJSON','HomeController@createJSON')->name('productsJSON');

Route::post('/updateProduct', 'HomeController@updateProduct')->name('updateProduct');

Route::get('/deleteProduct', 'HomeController@deleteProduct')->name('deleteProduct');


