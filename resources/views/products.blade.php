<style>
    .c1{
        background: #5Cf600;
    }
    .c2{
        background: #4bc200;
    }
    .centrarY {
        align-items: center;
    }
</style>
@extends('layouts.app')

@section('content')
<br>
<br>
<div class="row centrarY">
    
        <div class="col-12 col-md-8 text-center">
            <h3>Administrar productos</h3>
        </div>
        <div class="col-12 col-md-3 text-center">
        <a href="/addProducts"><button class="btn btn-warning col-10">Agregar producto</button></a>
        </div>   
    <br><br><br><br>
 </div>    
<div class="row">
    <div class="col-1"></div>
        <div class="col-10 align=center">
            <div class="table-responsive">
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
                        <?php
                            $i=0;
                            while($i < $totalProductos){
                                echo '
                                    <tr>
                                        <td>'.$productos[$i]->codigoBarras.'</td>
                                        <td>'.$productos[$i]->nombre.'</td>
                                        <td>'.$productos[$i]->precioCompra.'</td>
                                        <td>'.$productos[$i]->precioVenta.'</td>
                                        <td>'.$productos[$i]->categoria.'</td>
                                        <td>'.$productos[$i]->stock.'</td>
                                        <td><a href="/modifyP"><button class="btn btn-info">Modificar</button></a></td>
                                        <td><button class="btn btn-secondary">Eliminar</button></td>
                                    </tr>
                                ';
                                $i++;
                            }
                        ?>
                    </tbody>
                </table>
             </div>
         </div> 
    <div class="col-1"></div>  
</div>
@endsection
