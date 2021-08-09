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
<?php 
    $c1 = $c2 = $c3 = $c4 = $c5 = $c6 = $c7 = $c8 = $c9 = 0;
    foreach($productos as $p){
        if($p->status == 1){
            switch($p->categoria){
                case "Bebidas":
                    $c1++;
                    break;
                case "Embutidos":
                    $c2++;
                    break;
                case "Lácteos":
                    $c3++;
                    break;
                case "Dulcería":
                    $c4++;
                    break;
                case "Semillas":
                    $c5++;
                    break;
                case "Detergentes":
                    $c6++;
                    break;
                case "Mascotas":
                    $c7++;
                    break;
                case "Farmacia":
                    $c8++;
                    break;
                case "Abarrotes":
                    $c9++;
                    break;
            }
        }
    }
?>
<div class="col-12">
    <div class="row centrarY">    
        <div class="col-12 col-md-8 text-center">
            <h3>Administrar productos</h3>
        </div>
        <div class="col-12 col-md-3 text-center">
        <a href="/addProducts"><button class="btn btn-warning col-10">Agregar producto</button></a>
        </div>   
        <br><br><br><br>
    </div>    


    <?php
        if($c1 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Bebidas</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){    
                                    if($productos[$i]->categoria == "Bebidas"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					 $conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>
    
    <?php 
        if($c2 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Embutidos</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Embutidos"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php
        if($c3 > 0){ 
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Lácteos</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Lácteos"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php 
        if($c4 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Dulcería</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Dulcería"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php
        if($c5 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Semillas</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Semillas"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php 
        if($c6 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Detergentes</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Detergentes"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php
        if($c7 > 0){ 
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Productos para mascotas</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Mascotas"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php 
        if($c8 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Farmacia</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Farmacia"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>

    <?php
        if($c9 > 0){ 
            echo '     
                <br> 
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2>Abarrotes</h2>
                    </div>
                    <div class="col-10 align=center">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
					<th> # </th>
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
                                ';
                                $i=0;
				$conta = 1;
                                while($i < $totalProductos){
                                    if($productos[$i]->categoria == "Abarrotes"){
                                        echo '
                                            <tr>
						<th>'.$conta.'</th>
                                                <td class="text-center">'.$productos[$i]->codigoBarras.'</td>
                                                <td>'.$productos[$i]->nombre.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioCompra.'</td>
                                                <td class="text-center">$'.$productos[$i]->precioVenta.'</td>
                                                <td class="text-center">'.$productos[$i]->categoria.'</td>
                                                <td class="text-center">'.$productos[$i]->stock.'</td>
                                                <td class="text-center"><a href="/modifyP?id='.$productos[$i]->id_producto.'"><button class="btn btn-info">Modificar</button></a></td>
                                            </tr>
                                        ';
					$conta++;
                                    }
                                    $i++;
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            ';
        }
    ?>








</div>
@endsection
