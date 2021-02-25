<?php

namespace App\Http\Controllers;

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
        if(Auth::user()->rol == 0){
            return view('admin');
        }
        else{
            return view('home');
        }
    }
    
    public function sell(){
        return view('sell');
    }

    public function employees(){
        return view('employees');
    } 

    public function products(){
        return view('products');
    } 

    public function modifyE(){
        return view('modifyE');
    } 
    
    public function modifyP(){
        return view('modifyP');
    } 

    public function addEmployees(){
        return view('addEmployees');
    } 

    public function addProducts(){
        return view('addProducts');
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
}
