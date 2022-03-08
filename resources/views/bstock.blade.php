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
    $searchCategorias = Array();
    $i=0;
    foreach($categorias as $cat){
        $searchCategorias[$i] = 0;
        $i++;
    }
    $desclasificados = 0;
    foreach($productos as $p){
        if($p->categoria === "Sin clasificar"){
            $desclasificados++;
        }
        $i=0;
        foreach($categorias as $cat){
            if($cat->categoria == $p->categoria){
                $searchCategorias[$i] = $searchCategorias[$i]+1;
            }
            $i++;
        }
    }
?>

<div class="col-12" ng-init="exportLow()">
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
                            <?php
                                $i=0;
                                foreach($categorias as $c){
                                    if($searchCategorias[$i]>1){
                                        echo '
                                            <th class="text-center"> <button class="btn btn-success" ng-click="setCategoriaBaja('; echo"'$c->categoria'"; echo')">'.$c->categoria.'</button> </th>
                                        ';
                                    }
                                    $i++;
                                }
                                if($desclasificados > 0){
                                    echo '
                                        <th class="text-center"> <button class="btn btn-success" ng-click="setCategoriaBaja('; echo"'Sin clasificar'";echo')">Sin clasificar</button> </th>
                                    ';
                                }
                            ?>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <br> 
    <div class="row justify-content-center">
        <div class="col-12 text-center">
            <h2> @{{catActual}} </h2>
        </div>
        <div class="col-11 align=center">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th> # </th>
                            <th class="text-center">Código</th>
                            <th>Nombre</th>
                            <th class="text-center">Compra</th>
                            <th class="text-center">Venta</th>
                            <th class="text-center">Stock</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr ng-repeat="p in listaActual">
                            <th>@{{$index+1}}</th>
                            <td class="text-center">@{{p.codigoBarras}}</td>
                            <td class="text-center">@{{p.nombre}}</td>
                            <td class="text-center">@{{p.precioCompra}}</td>
                            <td class="text-center">@{{p.precioVenta}}</td>
                            <td class="text-center">@{{p.stock}}/@{{p.stock_inicial}}</td>
                            <td class="text-center">
                                <a href="/modifyP?id=@{{p.id_producto}}">
                                    <button class="btn btn-info">
                                        <i class="fas fa-pen"></i>
                                        Editar
                                    </button>
                                </a>
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div>
        </div>  
    </div>








</div>
@endsection
