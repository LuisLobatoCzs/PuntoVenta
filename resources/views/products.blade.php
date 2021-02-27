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
                            <th class="text-center">Código</th>
                            <th>Nombre</th>
                            <th class="text-center">Compra</th>
                            <th class="text-center">Venta</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($i < $totalProductos){
                                echo '
                                    <tr>
                                        <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                        <td>'.$productos[$i]->nombre.'</td>
                                        <td class="text-center">'.$productos[$i]->precioCompra.'</td>
                                        <td class="text-center">'.$productos[$i]->precioVenta.'</td>
                                        <td class="text-center">'.$productos[$i]->categoria.'</td>
                                        <td class="text-center">'.$productos[$i]->stock.'</td>
                                        <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
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
