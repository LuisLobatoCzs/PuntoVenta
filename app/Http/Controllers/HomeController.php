<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use DB;
use Maatwebsite\Excel\Excel;
use App\Exports\Export;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Services\GitHub;
use Exception;

require '../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->status == 0){
            return view('locked');
        }
        else{
            if(Auth::user()->rol == 0){
                return view('admin');
            }
            else{
                return view('home');
            }
        }
    }
    
    public function sell(){
        if(Auth::user()->status == 0){
            return view('locked');
        }
        else{
            return view('sell');
        }
    }

    public function employees(){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $empleados = DB::table('users')
                            ->where('rol','LIKE','1')
                            ->where('status',1)
                            ->orderBy('user')
                            ->get();
            $totalEmpleados = $empleados->count();
            return view('employees')->with(compact('empleados','totalEmpleados'));
        }
    } 

    public function products(){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('categorias','productos','totalProductos'));
        }
    } 

    //// lo hice yop perdon si esta mal =(
    public function bstock(){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
            $totalCategorias = $categorias->count();
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->where('stock','<=',env('LOW_STOCK'))
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('bstock')->with(compact('categorias','totalCategorias','productos','totalProductos'));
        }
    }
    ////  pirdon =( 

    public function modifyE(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $empleado = DB::table('users')
                            ->where('id',$request->id)
                            ->get();
            return view('modifyE')->with(compact('empleado'));
        }
    }

    public function addEmployee(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $password = Hash::make($request->password);
            DB::table('users')->insert([
                'user' => $request->user,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => $password
            ]);
            $empleados = DB::table('users')
                            ->where('rol','LIKE','1')
                            ->where('status',1)
                            ->orderBy('user')
                            ->get();
            $totalEmpleados = $empleados->count();
            return view('employees')->with(compact('empleados','totalEmpleados'));
        }
    }
    
    public function modifyP(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $producto = DB::table('productos')
                            ->where('id_producto','like',$request->id)
                            ->get();
            $categorias = DB::table('categorias')
                            ->orderBy('categoria')
                            ->get();
            return view('modifyP')->with(compact('producto','categorias'));
        }
    }

    public function updateProduct(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            DB::table('productos')
                ->where('id_producto', $request->id)
                ->update([
                    'codigoBarras' => $request->codigoBarras,
                    'nombre' => $request->nombre,
                    'precioCompra' => $request->precioCompra,
                    'precioVenta' => $request->precioVenta,
                    'precioMedio' => $request->precioMedio,
                    'minimoMedio' => $request->minimoMedio,
                    'precioMayoreo' => $request->precioMayoreo,
                    'minimoMayoreo' => $request->minimoMayoreo,
                    'categoria' => $request->categoria,
                    'stock'=> $request->stock,
                    'stock_inicial'=> $request->stock
                ]);
            $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('categorias','productos','totalProductos'));
        }
    }

    public function addProduct(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $producto = DB::table('productos')
                            ->where('codigoBarras',$request->codigoBarras)
                            ->get();
            if($producto == "[]"){
                DB::table('productos')->insert([
                    'codigoBarras' => $request->codigoBarras,
                    'nombre' => $request->nombre,
                    'precioCompra' => $request->precioCompra,
                    'precioVenta' => $request->precioVenta,
                    'precioMedio' => $request->precioMedio,
                    'minimoMedio' => $request->minimoMedio,
                    'precioMayoreo' => $request->precioMayoreo,
                    'minimoMayoreo' => $request->minimoMayoreo,
                    'categoria' => $request->categoria,
                    'stock'=> $request->stock,
                    'stock_inicial'=> $request->stock
                ]);
            }
            else{
                DB::table('productos')
                        ->where('codigoBarras', $request->codigoBarras,)
                        ->update([
                            'nombre' => $request->nombre,
                            'precioCompra' => $request->precioCompra,
                            'precioVenta' => $request->precioVenta,
                            'precioMedio' => $request->precioMedio,
                            'minimoMedio' => $request->minimoMedio,
                            'precioMayoreo' => $request->precioMayoreo,
                            'minimoMayoreo' => $request->minimoMayoreo,
                            'categoria' => $request->categoria,
                            'stock'=> $request->stock,
                            'stock_inicial'=> $request->stock,
                            'status' => 1
                        ]);
            }
            $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('categorias','productos','totalProductos'));
        }
    }
    public function deleteEmployee(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'status' => 0,
                        ]);
            
            $empleados = DB::table('users')
                            ->where('rol', 1)
                            ->where('status', 1)
                            ->orderBy('user')
                            ->get();
            $totalEmpleados = $empleados->count();
            return view('employees')->with(compact('empleados','totalEmpleados'));
        }
    }

    public function deleteProduct(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            DB::table('productos')
                ->where('id_producto', $request->id)
                ->update([
                    'status' => '0',
                    'stock'=> '0'
                ]);
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('productos','totalProductos'));
        }
    }

    public function addEmployees(){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            return view('addEmployees');
        }
    } 

    public function addProducts(){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
            return view('addProducts')->with(compact('categorias'));
        }
    } 

    public function reports(){
        if(Auth::user()->rol == 0){
            $reportes = DB::table('transacciones')
                            ->orderBy('fecha','desc')
                            ->get();
            $totalReportes = $reportes->count();
            $i=0;
            $saldo=0;
            while($i<$totalReportes){
                if($reportes[$i]->corteCaja != 1){
                    if($reportes[$i]->venta == 1 || $reportes[$i]->deposito == 1){
                        $saldo = $saldo+$reportes[$i]->importe;
                    }
                    else if($reportes[$i]->gasto == 1 || $reportes[$i]->retiro == 1){
                        $saldo = $saldo-$reportes[$i]->importe;
                    }
                }
                $i++;
            }
            if($saldo < 0){
                $saldo = 0;
            }
            return view('reports')->with(compact('reportes','totalReportes', 'saldo'));
        }
        else{
            if(Auth::user()->status == 0){
                return view('locked');
            }
            else{
                date_default_timezone_set("America/Monterrey");
                $dia = date("Y-m-d");
                $hora_min = $dia.' 00:00:00';
                $hora_max = $dia.' 23:59:59' ;
                $reportes = DB::table('transacciones')
                            ->where('id_usuario',Auth::user()->id)

                            ->whereBetween('fecha', [$hora_min, $hora_max])
                            ->orderBy('fecha', 'desc')
                            ->get();
            $totalReportes = $reportes->count();
            $i=0;
            $saldo=0;
            while($i<$totalReportes){
                if($reportes[$i]->venta == 1 || $reportes[$i]->deposito == 1){
                    $saldo = $saldo+$reportes[$i]->importe;
                }
                else{
                    $saldo = $saldo-$reportes[$i]->importe;
                }
                $i++;
            }
            if($saldo < 0){
                $saldo = 0;
            }
            return view('corte')->with(compact('reportes','totalReportes', 'saldo'));
            }
        }
    } 

    public function addExpenses(){
        $reportes = DB::table('transacciones')
                            ->orderBy('fecha','desc')
                            ->get();
        $totalReportes = $reportes->count();
        $i=0;
        $saldo=0;
        while($i<$totalReportes){
            if($reportes[$i]->venta == 1 || $reportes[$i]->deposito == 1){
                $saldo = $saldo+$reportes[$i]->importe;
            }
            else if($reportes[$i]->gasto == 1 || $reportes[$i]->retiro == 1){
                $saldo = $saldo-$reportes[$i]->importe;
            }
            $i++;
        }
        if($saldo < 0){
            $saldo = 0;
        }
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            return view('addExpenses')->with(compact('saldo'));
        }
    } 

    public function addExpense(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            date_default_timezone_set("America/Monterrey");
            $hoy = date("Y-m-d");
            $fecha = $request->fecha;
            if($fecha == $hoy){
                $fecha = date("Y-m-d H:i:s");
            }
            if($request->tipo == "Gasto"){    
                DB::table('transacciones')->insert([
                    'id_usuario' => $request->id,
                    'gasto' => 1,
                    'importe' => $request->monto,
                    'concepto' => $request->concepto.' / Realizado por '.$request->user,
                    'fecha'=> $fecha
                ]);
            }
            else if($request->tipo == "Retiro"){
                DB::table('transacciones')->insert([
                    'id_usuario' => $request->id,
                    'retiro' => 1,
                    'importe' => $request->monto,
                    'concepto' => 'Retiro realizado por '.$request->user,
                    'fecha'=> $fecha
                ]);
            }
            else{
                DB::table('transacciones')->insert([
                    'id_usuario' => $request->id,
                    'deposito' => 1,
                    'importe' => $request->monto,
                    'concepto' => 'Depósito realizado por '.$request->user,
                    'fecha'=> $fecha
                ]);
            }
            
            $reportes = DB::table('transacciones')
                            ->orderBy('fecha','desc')
                            ->get();
            $totalReportes = $reportes->count();
            $i=0;
            $saldo=0;
            while($i<$totalReportes){
                if($reportes[$i]->venta == 1 || $reportes[$i]->deposito == 1){
                    $saldo = $saldo+$reportes[$i]->importe;
                }
                else if($reportes[$i]->gasto == 1 || $reportes[$i]->retiro == 1){
                    $saldo = $saldo-$reportes[$i]->importe;
                }
                $i++;
            }
            if($saldo < 0){
                $saldo = 0;
            }
            return view('reports')->with(compact('reportes','totalReportes', 'saldo'));
        }
    }

    public function createJSON(){
        $consulta = DB::table('productos')
                        ->select('codigoBarras', 'nombre', 'precioVenta', 'stock', 'categoria')
                        ->where('status',1)
                        ->get();
        $total = $consulta->count();
        
        $productos='{ "productos": [';
        for($i=0; $i<$total; $i++){
            $productos = $productos.'{';
            $productos = $productos.'"codigoBarras": "'.$consulta[$i]->codigoBarras.'",';
            $productos = $productos.'"nombre": "'.$consulta[$i]->nombre.'",';
            $productos = $productos.'"precioVenta": "'.$consulta[$i]->precioVenta.'",';
            $productos = $productos.'"stock": "'.$consulta[$i]->stock.'",';
            $productos = $productos.'"categoria": "'.$consulta[$i]->categoria.'"';
            if($i == $total-1){
                $productos = $productos.'}';
            }
            else{
                $productos = $productos.'},';
            }
        }
        $productos = $productos.'] }';
        return $productos;
    }

    public function sellreg(Request $request){
        $json = $request->data;
        $total = $request->total;
        $pago = $request->pago;
        $cambio = $request->cambio;
        $productos = json_decode($json);
        $totalProductos = count($productos);
        $i=0;
        while($i<$totalProductos){
            $s = DB::table('productos')
                    ->where('codigoBarras', $productos[$i]->codigoBarras)
                    ->get();
            $stock = $s[0]->stock;
            $stock = $stock - $productos[$i]->cantidad;
            if($stock < 0){
                $stock = 0;
            }
            DB::table('productos')
                    ->where('codigoBarras', $productos[$i]->codigoBarras)
                    ->update([
                        'stock'=> $stock
                    ]);

            $i++;
        }

        $i=0;
        $detalleVenta = "";
        while($i<$totalProductos){
            $productoT = DB::table('productos')
                    ->where('codigoBarras', $productos[$i]->codigoBarras)
                    ->get();

            $importe = $productos[$i]->cantidad * $productoT[0]->precioVenta;
            $importe = number_format($importe, 2, '.', '');
            $nombre = $productoT[0]->nombre;
            $tam = strlen($nombre);
            if($tam < 19){
                $j=0;
                while($j<19-$tam){
                    $nombre = $nombre." ";
                    $j++;
                }
            }
            else{
                $nombre = substr($nombre,0,19);
            }

            $cantidad = $productos[$i]->cantidad;
            if(strlen($cantidad)<2){
                $cantidad = "0".$cantidad;
            }

            $detalleVenta = $detalleVenta.$cantidad."  ".$nombre."   $".$importe."<br>";
            $i++;
        }

        date_default_timezone_set("America/Monterrey");
        $fecha = date("Y-m-d H:i:s");
        DB::table('transacciones')->insert([
            'id_usuario' => Auth::user()->id,
            'fecha' => $fecha,
            'importe' => $total,
            'venta' => 1,
            'concepto' => 'Venta realizada por '.Auth::user()->user,
            'detalle' => $detalleVenta,
        ]);

        //////////////////////////////////////////////////////
        //////          IMPRESIÓN DE TICKET             //////
        //////////////////////////////////////////////////////

        /******* NOTA. Máximo 32 caracteres por linea *******/

        /* Conexión con la impresora */
        $connector = new WindowsPrintConnector(env('PRINTER_NAME'));
        $printer = new Printer($connector);
    
        /* Imprime Isotipo */
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        try{
            $logo = EscposImage::load('img/'.env('PRINTER_LOGO'), false);
            $printer->bitImage($logo);
        }catch(Exception $e){}

        /* Espaciado */
        $printer->feed(3);

        /* Imprime detalles del ticket */
        $printer->text(date("Y-m-d H:i:s") . "\n");
        $printer->feed(1);
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("CANT.    DESCRIPCION    IMPORTE" . "\n");
        $printer->text("................................" . "\n");
        $i=0;
        while($i<$totalProductos){
            $productoT = DB::table('productos')
                    ->where('codigoBarras', $productos[$i]->codigoBarras)
                    ->get();

            $importe = $productos[$i]->cantidad * $productoT[0]->precioVenta;
            $importe = number_format($importe, 2, '.', '');
            $nombre = $productoT[0]->nombre;
            $tam = strlen($nombre);
            if($tam < 19){
                $j=0;
                while($j<19-$tam){
                    $nombre = $nombre." ";
                    $j++;
                }
            }
            else{
                $nombre = substr($nombre,0,19);
            }

            $cantidad = $productos[$i]->cantidad;
            if(strlen($cantidad)<2){
                $cantidad = "0".$cantidad;
            }

            $printer->text($cantidad."  ".$nombre."   $".$importe."\n");
            $i++;
        }

        $printer->text("................................" . "\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("TOTAL:       $".$total."\n");
        $printer->text("EFECTIVO:    $".$pago."\n");
        $printer->text("CAMBIO:      $".$cambio."\n");

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->feed(1);
        $printer->text("Gracias por su compra :)" . "\n");
        
        /* Apertura del cajón */
        $printer->pulse();
        /* Corte de papel */
        $printer->cut();
        /* Cerrar la conexión con la impresora */
        $printer->close();

        //////////////////////////////////////////////////////
        //////////////////////////////////////////////////////

        return view('sell');
    }

    public function updateUser(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            if($request->password == ""){
                DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'user' => $request->user,
                            'email'=> $request->email,
                            'phone' => $request->phone
                        ]);
            }
            else{
                $password = Hash::make($request->password);
                DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            'user' => $request->user,
                            'email'=> $request->email,
                            'phone' => $request->phone,
                            'password' => $password
                        ]);
            }
            
            $empleados = DB::table('users')
                            ->where('rol', 1)
                            ->where('status', 1)
                            ->orderBy('user')
                            ->get();
            $totalEmpleados = $empleados->count();
            return view('employees')->with(compact('empleados','totalEmpleados'));
        }
    }

    public function exportarExcel(){
        date_default_timezone_set("America/Monterrey");
        $fecha = date("Y-m-d");
        return ((new Export)->download("ReporteDeVentas_".$fecha.".xlsx"));
    }
    public function delete(){
        DB::table('transacciones')->delete();
        $reportes = [];
        $totalReportes = 0;
        $saldo = 0;
        return view('reports')->with(compact('reportes','totalReportes', 'saldo'));
        
        //$this->exportarExcel();
        //$e=HomeController::exportarExcel();
        
/*
        return response()->stream(function() {
            echo view('admin');
            /*header("Content-Description: Descargar imagen");
            header("Content-Disposition: attachment; filename=r.xlsx");
            header("Content-Type: application/force-download");
            header("Content-Length: " . filesize('img/r.xlsx'));
            header("Content-Transfer-Encoding: binary");
            readfile('img/r.xlsx');
            
          }
        );
*/
    }

    public function cashCut(){
        date_default_timezone_set("America/Monterrey");
                $dia = date("Y-m-d");
                $hora_min = $dia.' 00:00:00';
                $hora_max = $dia.' 23:59:59' ;
                
        $importes = DB::table('transacciones')
                        ->select('importe')
                        ->where('status',1)
                        ->where('venta',1)
                        ->where('id_usuario',Auth::user()->id)
                        ->whereBetween('fecha', [$hora_min, $hora_max])
                        ->get();
        $total = 0;
        foreach($importes as $importe){
            $total = $total + $importe->importe;
        }
        if($total > 0){
            DB::table('transacciones')
            ->insert([
                'id_usuario' => Auth::user()->id,
                'importe' => $total,
                'concepto' => "Corte de Caja realizado por ".Auth::user()->user,
                'corteCaja' => 1,
                'fecha' => date("Y-m-d H:i:s"),
            ]);
            DB::table('transacciones')
                    ->where('id_usuario', Auth::user()->id)
                    ->where('venta',1)
                    ->update([
                         'status' => 0,
                    ]);
    
        }
        return $this->reports();
    }

    public function cut(){
        if(Auth::user()->status == 0){
            return view('locked');
        }
        else{
            date_default_timezone_set("America/Monterrey");
            $dia = date("Y-m-d");
            $hora_min = $dia.' 00:00:00';
            $hora_max = $dia.' 23:59:59' ;
            $reportes = DB::table('transacciones')
                        ->where('id_usuario',Auth::user()->id)
                        ->where('retiro',null)
                        ->where('gasto',null)
                        ->where('deposito',null)
                        ->whereBetween('fecha', [$hora_min, $hora_max])
                        ->orderBy('fecha', 'desc')
                        ->get();
            $totalReportes = $reportes->count();
            $i=0;
            $saldo=0;
            while($i<$totalReportes){
                if($reportes[$i]->venta == 1 || $reportes[$i]->deposito == 1){
                    $saldo = $saldo+$reportes[$i]->importe;
                }
                else{
                    $saldo = $saldo-$reportes[$i]->importe;
                }
                $i++;
            }
            if($saldo < 0){
                $saldo = 0;
            }
            return view('corte')->with(compact('reportes','totalReportes', 'saldo'));
        }
    }

    public function shutdown () {
        return view('shutdown');
       // shell_exec("shutdown -s -f -t 60");
    }

    public function categories(){
        $categorias = DB::table('categorias')
                        ->orderBy('categoria')
                        ->get();
        if(Auth::user()->rol == 0){
            return view('categories')->with(compact('categorias'));
        }
        else{
            return view('home');
        }
    }

    public function addCategorie(Request $request){
        DB::table('categorias')
            ->insert([
                'categoria' => $request->categorie
            ]);
        $categorias = DB::table('categorias')
            ->orderBy('categoria')
            ->get();
        return view('categories')->with(compact('categorias'));
    }
    public function updateCategorie(Request $request){
        $actual = DB::table('categorias')
                    ->where('id', $request->id)
                    ->first();
        $actual = $actual->categoria;

        DB::table('productos')
            ->where('categoria', $actual)
            ->update([
                'categoria' => $request->categorie
            ]);

        DB::table('categorias')
            ->where('id', $request->id)
            ->update([
                'categoria' => $request->categorie
            ]);

        $categorias = DB::table('categorias')
            ->orderBy('categoria')
            ->get();

        return view('categories')->with(compact('categorias'));
    }
    public function deleteCategorie(Request $request){
        $categorie = DB::table('categorias')
                    ->where('id', $request->id)
                    ->first();
        $categorie = $categorie->categoria;

        DB::table('productos')
            ->where('categoria', $categorie)
            ->update([
                'categoria' => 'Sin clasificar'
            ]);

        DB::table('categorias')
            ->where('id', $request->id)
            ->delete();

        $categorias = DB::table('categorias')
            ->orderBy('categoria')
            ->get();

        return view('categories')->with(compact('categorias'));
    }
}
