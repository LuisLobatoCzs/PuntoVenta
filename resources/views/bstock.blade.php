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
<!-- seleccion de productos -->
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
            <h3>Bajo inventario</h3>
        </div> 
        <br><br><br><br>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
                                        <th class="text-center">Stock</th>
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
                                                <td class="text-center">'.$productos[$i]->stock.'/'.$productos[$i]->stock_inicial.'</td>
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
