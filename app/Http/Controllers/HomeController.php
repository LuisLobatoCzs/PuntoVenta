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
        $empleados = DB::table('users')
                        ->where('rol','LIKE','1')
                        ->where('status',1)
                        ->orderBy('user')
                        ->get();
        $totalEmpleados = $empleados->count();
        return view('employees')->with(compact('empleados','totalEmpleados'));
    } 

    public function products(){
        $productos = DB::table('productos')
                        ->where('status',1)
                        ->orderBy('nombre')
                        ->get();
        $totalProductos = $productos->count();
        return view('products')->with(compact('productos','totalProductos'));
    } 

    public function modifyE(Request $request){
        $empleado = DB::table('users')
                        ->where('id',$request->id)
                        ->get();
        return view('modifyE')->with(compact('empleado'));
    }

    public function addEmployee(Request $request){
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
    
    public function modifyP(Request $request){
        $producto = DB::table('productos')
                        ->where('id_producto','like',$request->id)
                        ->get();
        return view('modifyP')->with(compact('producto'));
    }

    public function updateProduct(Request $request){
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

    public function addProduct(Request $request){
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
    public function deleteEmployee(Request $request){
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

    public function deleteProduct(Request $request){
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

    public function addEmployees(){
        return view('addEmployees');
    } 

    public function addProducts(){
        return view('addProducts');
    } 

    public function reports(){
        if(Auth::user()->status == 0){
            return view('locked');
        }
        else{
            return view('reports');
        }
    } 

    public function addExpenses(){
        return view('addExpenses');
    } 

    public function addExpense(){
        return view('reports');
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
        echo $productosVendidos = $request->articulos;
        return 'HOla';
    }

    public function updateUser(Request $request){
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
