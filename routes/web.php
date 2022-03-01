<?php

use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
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

Route::get('/barcode', 'BarcodeController@make')->name('barcode');
Route::get('/generator', 'BarcodeController@view')->name('generator');

Route::get('/shutdown', 'HomeController@shutdown')->name('shutdown');

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

Route::get('/backup', function() {
    date_default_timezone_set("America/Monterrey");
    $fecha = date("Y-m-d");
    return (new Export)->download("ReporteDeVentas ".$fecha.".xlsx");
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

Route::get('/bstock','HomeController@bstock')->name('bstock');

//Route::get('/productsJSON','HomeController@createJSON')->name('productsJSON');
Route::get('/productsJSON', function() {
    $consulta = DB::table('productos')
                        ->select('codigoBarras', 'nombre', 'precioCompra', 'precioVenta', 'precioMedio', 'minimoMedio', 'precioMayoreo', 'minimoMayoreo', 'stock', 'unidadMedida')
                        ->where('status',1)
                        ->get();
    $total = $consulta->count();
    
    $productos='{ "productos": [';
    for($i=0; $i<$total; $i++){
        $productos = $productos.'{';
        $productos = $productos.'"codigoBarras": "'.$consulta[$i]->codigoBarras.'",';
        $productos = $productos.'"nombre": "'.$consulta[$i]->nombre.'",';
        $productos = $productos.'"precioCompra": "'.$consulta[$i]->precioCompra.'",';
        $productos = $productos.'"precioVenta": "'.$consulta[$i]->precioVenta.'",';
        $productos = $productos.'"precioMedio": "'.$consulta[$i]->precioMedio.'",';
        $productos = $productos.'"minimoMedio": "'.$consulta[$i]->minimoMedio.'",';
        $productos = $productos.'"precioMayoreo": "'.$consulta[$i]->precioMayoreo.'",';
        $productos = $productos.'"minimoMayoreo": "'.$consulta[$i]->minimoMayoreo.'",';
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

Route::post('/updateProduct', 'HomeController@updateProduct')->name('updateProduct');

Route::get('/deleteProduct', 'HomeController@deleteProduct')->name('deleteProduct');

Route::post('/finder', 'HomeController@buscador')->name('finder');

Route::get('/locked', function () {
    return view('locked');
});

Route::get('/delete', 'HomeController@delete')->name('delete');
//Route::get('/backup', 'HomeController@exportarExcel')->name('backup');
/*
Route::get('/delete', function(){
    $h = (new Export)->download('ReporteDeVentas.xlsx');
    return view('/admin')->with(compact('h'));
});
*/
Route::get('/cashCut', 'HomeController@cashCut')->name('cashCut');

Route::get('/cut', 'HomeController@cut')->name('cut');

Route::get('/preview', function () {
    return view('exports.reports');
});