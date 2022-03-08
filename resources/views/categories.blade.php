<style>
    .centrarXY {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .centrarY {
        align-items: center;
    }
    .cuadro{
        padding: 0px;
        padding-top: 15px;
    }
    .contorno {
        border-width: 2px;
        border-style: solid;
        border-color: black;
        border-radius: 10px;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12 pt-4">
    
    <div class="row justify-content-center">
        <div class="col-xl-6 cuadro">
            <div class="card border-primary mb-1">
                <div class="card-header">
                    <div class="row centrarY">
                        <div class="col-11">
                            <div class="row centrarY pl-3">
                                <span class="pr-4">
                                    Gestión de categorías
                                </span>
                                <button class="btn btn-success" ng-click="agregarCategoria()">
                                    <i class="fas fa-plus"></i>
                                    Agregar categoría
                                </button>
                            </div>
                        </div>
                        <div class="col-1">
                            <a href="/products" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body row">                  
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Categoría </th>
                                    <th class="text-center"> Opciones </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach($categorias as $c){
                                        echo '
                                            <tr>
                                                <th >'. $i .'</th>
                                                <td>'. $c->categoria .'</td>
                                                <td class="text-right">
                                                    <div>
                                                        <button class="btn btn-outline-info" ng-click="editarCategoria('; echo"$c->id".','."'$c->categoria'"; echo')">
                                                            <i class="fas fa-pen"></i>
                                                            Editar
                                                        </button>
                                                        <a href="/deleteCategorie?id='. $c->id .'">
                                                            <button class="btn btn-outline-secondary">
                                                                <i class="fas fa-trash-alt"></i>
                                                                Eliminar
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>            
    </div>
</div>

@endsection