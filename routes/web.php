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

Route::get('/addEmployees','HomeController@addEmployees')->name('addEmployees');

Route::get('/addProducts','HomeController@addProducts')->name('addProducts');

Route::get('/addExpenses','HomeController@addExpenses')->name('addExpenses');

Route::get('/reports','HomeController@reports')->name('reports');

//Route::get('/productsJSON','HomeController@createJSON')->name('productsJSON');
Route::get('/productsJSON', function (){
    $consulta = DB::table('productos')->select('codigoBarras', 'nombre', 'precioVenta', 'stock', 'unidadMedida')->get();
    $total = $consulta->count();
    $productos='{ "productos": [';
    for($i=0; $i<$total; $i++){
        $productos = $productos.'{';
        $productos = $productos.'"codigoBarras": "'.$consulta[$i]->codigoBarras.'",';
        $productos = $productos.'"nombre": "'.$consulta[$i]->nombre.'",';
        $productos = $productos.'"precioVenta": "'.$consulta[$i]->precioVenta.'",';
        $productos = $productos.'"stock": "'.$consulta[$i]->stock.'",';
        $productos = $productos.'"unidadMedida": "'.$consulta[$i]->unidadMedida.'"';
        if($i == $total-1){
            $productos = $productos.'}';
        }
        else{
            $productos = $productos.'},';
        }
    }
    $productos = $productos.'] }';
    return $productos;
});



