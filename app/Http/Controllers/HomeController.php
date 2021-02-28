<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use DB;

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
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('productos','totalProductos'));
        }
    } 

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
            return view('modifyP')->with(compact('producto'));
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
                    'categoria' => $request->categoria,
                    'stock'=> $request->stock
                ]);
            $productos = DB::table('productos')
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('productos','totalProductos'));
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
                    'categoria' => $request->categoria,
                    'stock'=> $request->stock
                ]);
            }
            else{
                DB::table('productos')
                        ->where('codigoBarras', $request->codigoBarras,)
                        ->update([
                            'nombre' => $request->nombre,
                            'precioCompra' => $request->precioCompra,
                            'precioVenta' => $request->precioVenta,
                            'categoria' => $request->categoria,
                            'stock'=> $request->stock
                        ]);
            }
            $productos = DB::table('productos')
                            ->where('status',1)
                            ->orderBy('nombre')
                            ->get();
            $totalProductos = $productos->count();
            return view('products')->with(compact('productos','totalProductos'));
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
            return view('addProducts');
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
                if($reportes[$i]->venta == 1){
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
                if($reportes[$i]->venta == 1){
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
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            return view('addExpenses');
        }
    } 

    public function addExpense(Request $request){
        if(Auth::user()->rol == 1){
            return view('home');
        }
        else{
            date_default_timezone_set("America/Monterrey");
            $hoy = date("Y-m-d");
            if($request->tipo == "Gasto"){    
                $fecha = $request->fecha;
                if($fecha == $hoy){
                    $fecha = date("Y-m-d H:i:s");
                }
                DB::table('transacciones')->insert([
                    'id_usuario' => $request->id,
                    'gasto' => 1,
                    'importe' => $request->monto,
                    'concepto' => $request->concepto.' / Realizado por '.$request->user,
                    'fecha'=> $fecha
                ]);
            }
            else if($request->tipo == "Retiro"){
                $fecha = $request->fecha;
                if($fecha == $hoy){
                    $fecha = date("Y-m-d H:i:s");
                }
                DB::table('transacciones')->insert([
                    'id_usuario' => $request->id,
                    'retiro' => 1,
                    'importe' => $request->monto,
                    'concepto' => 'Retiro realizado por '.$request->user,
                    'fecha'=> $fecha
                ]);
            }
            
            $reportes = DB::table('transacciones')
                            ->orderBy('fecha')
                            ->get();
            $totalReportes = $reportes->count();
            $i=0;
            $saldo=0;
            while($i<$totalReportes){
                if($reportes[$i]->venta == 1){
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
            return view('reports')->with(compact('reportes','totalReportes', 'saldo'));
        }
    }

    public function createJSON(){
        $consulta = DB::table('productos')
                        ->select('codigoBarras', 'nombre', 'precioVenta', 'stock', 'unidadMedida')
                        ->get();
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
    }

    public function sellreg(Request $request){
        $json = $request->data;
        $total = $request->total;
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
        date_default_timezone_set("America/Monterrey");
        $fecha = date("Y-m-d H:i:s");
        DB::table('transacciones')->insert([
            'id_usuario' => Auth::user()->id,
            'fecha' => $fecha,
            'importe' => $total,
            'venta' => 1,
            'concepto' => 'Venta realizada por '.Auth::user()->user
        ]);
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

    public function delete(){
        DB::table('transacciones')->delete();
        $reportes = [];
        $totalReportes = 0;
        $saldo = 0;
        return view('reports')->with(compact('reportes','totalReportes', 'saldo'));
    }
}
