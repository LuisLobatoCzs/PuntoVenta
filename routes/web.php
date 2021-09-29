<?php

use App\Exports\Export;
use Maatwebsite\Excel\Facades\Excel;
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

Route::get('/backup', function() {
<<<<<<< HEAD
    return (new Export)->download("ReporteDeVentas.xlsx");
=======
    date_default_timezone_set("America/Monterrey");
    $fecha = date("Y-m-d");
    echo "Se a descargado su reporte mensual programado";
    return ((new Export)->download("ReporteDeVentas_".$fecha.".xlsx"));
>>>>>>> 32dda2e9e737a3b3a6d2f65b3906478f118518ec
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

<<<<<<< HEAD
Route::post('/finder', 'HomeController@buscador')->name('finder');

=======
>>>>>>> 32dda2e9e737a3b3a6d2f65b3906478f118518ec
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
<<<<<<< HEAD

Route::get('/cut', 'HomeController@cut')->name('cut');
=======
>>>>>>> 32dda2e9e737a3b3a6d2f65b3906478f118518ec

Route::get('/preview', function () {
    return view('exports.reports');
});