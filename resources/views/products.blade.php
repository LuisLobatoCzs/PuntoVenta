@extends('layouts.app')

@section('content')
<br>
<br>
<div class="row">
    
        <div class="col-9 text-center">
            <h3>Administrar productos</h3>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary">Agregar producto</button>
        </div>   
    <br><br><br><br>
 </div>    
<div class="row">
    <div class="col-1"></div>
        <div class="col-10 align=center">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Compra</th>
                        <th>Venta</th>
                        <th>Categoria</th>
                        <th>Stock</th>    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>015896354</td>
                        <td>Coca-cola</td>
                        <td>$10</td>
                        <td>$15</td>
                        <td>Refrescos</td>
                        <td>10</td>
                        <td><button class="btn btn-primary">Modificar</button></td>
                        <td><button class="btn btn-secondary">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
        </div> 
    <div class="col-1"></div>  
</div>
@endsection
