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
<div class="col-12" ng-init="export()">
    <div class="row centrarY">    
        <div class="col-12 col-md-8 text-center">
            <h3>Administrar productos</h3>
        </div>
        <div class="col-12 col-md-3 text-center">
        <a href="/addProducts"><button class="btn btn-warning col-10">Agregar producto</button></a>
        </div>   
        <br><br><br><br>
    </div>    

    <div class="row justify-content-center">
        <form class="col-12 cuadro cuadroP">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row centrarY ">
                        <input class="form-control col-10" type="text" placeholder="Ingresa un código de barras o nombre para buscar un producto" ng-model="barcode" autofocus="autofocus">
                        <button class="btn btn-info col-2" ng-click="buscador(1)">
                            <svg width="3vh" class="not_priority" viewBox="0 0 512 512"><path fill="currentColor" d="M505.04 442.66l-99.71-99.69c-4.5-4.5-10.6-7-17-7h-16.3c27.6-35.3 44-79.69 44-127.99C416.03 93.09 322.92 0 208.02 0S0 93.09 0 207.98s93.11 207.98 208.02 207.98c48.3 0 92.71-16.4 128.01-44v16.3c0 6.4 2.5 12.5 7 17l99.71 99.69c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.59.1-33.99zm-297.02-90.7c-79.54 0-144-64.34-144-143.98 0-79.53 64.35-143.98 144-143.98 79.54 0 144 64.34 144 143.98 0 79.53-64.35 143.98-144 143.98zm27.11-152.54l-45.01-13.5c-5.16-1.55-8.77-6.78-8.77-12.73 0-7.27 5.3-13.19 11.8-13.19h28.11c4.56 0 8.96 1.29 12.82 3.72 3.24 2.03 7.36 1.91 10.13-.73l11.75-11.21c3.53-3.37 3.33-9.21-.57-12.14-9.1-6.83-20.08-10.77-31.37-11.35V112c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v16.12c-23.63.63-42.68 20.55-42.68 45.07 0 19.97 12.99 37.81 31.58 43.39l45.01 13.5c5.16 1.55 8.77 6.78 8.77 12.73 0 7.27-5.3 13.19-11.8 13.19h-28.1c-4.56 0-8.96-1.29-12.82-3.72-3.24-2.03-7.36-1.91-10.13.73l-11.75 11.21c-3.53 3.37-3.33 9.21.57 12.14 9.1 6.83 20.08 10.77 31.37 11.35V304c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-16.12c23.63-.63 42.68-20.54 42.68-45.07 0-19.97-12.99-37.81-31.59-43.39z"></path></svg>
                            Buscar
                        </button>
                    </div>
                </div>
            </div>
        </form> 
        <br><br> 
    </div>

    <div class="row centrarXY">
        <div class="col-12 align=center">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th class="text-center" ng-click="setCategoria(1)"> <button class="btn btn-success">Bebidas</button> </th>
                            <th class="text-center" ng-click="setCategoria(2)"> <button class="btn btn-success">Embutidos</button> </th>
                            <th class="text-center" ng-click="setCategoria(3)"> <button class="btn btn-success">Lácteos</button> </th>
                            <th class="text-center" ng-click="setCategoria(4)"> <button class="btn btn-success">Dulcería</button> </th>
                            <th class="text-center" ng-click="setCategoria(5)"> <button class="btn btn-success">Semillas</button> </th>
                            <th class="text-center" ng-click="setCategoria(6)"> <button class="btn btn-success">Detergentes</button> </th>
                            <th class="text-center" ng-click="setCategoria(7)"> <button class="btn btn-success">Farmacia</button> </th>
                            <th class="text-center" ng-click="setCategoria(8)"> <button class="btn btn-success">Mascotas</button> </th>
                            <th class="text-center" ng-click="setCategoria(9)"> <button class="btn btn-success">Abarrotes</button> </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <?php
        if($c1 > 0){
            echo '     
                <br> 
                <div class="row justify-content-center" ng-show="catBebidas">
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
                <div class="row justify-content-center" ng-show="catEmbutidos">
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
                <div class="row justify-content-center" ng-show="catLacteos">
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
                <div class="row justify-content-center" ng-show="catDulceria">
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
                <div class="row justify-content-center" ng-show="catSemillas">
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
                <div class="row justify-content-center" ng-show="catDetergentes">
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
                <div class="row justify-content-center" ng-show="catMascotas">
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
                <div class="row justify-content-center" ng-show="catFarmacia">
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
                <div class="row justify-content-center" ng-show="catAbarrotes">
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
