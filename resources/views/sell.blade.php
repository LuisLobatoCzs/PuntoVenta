<style>
    .cuadro{
        padding: 0px;
        text-align: center;
        border-width: 2px;
        border-style: solid;
        border-color: #5D6D7E;
        border-radius: 50px;
    }
    .cuadroP{
        padding: 4vh;
        align-items: center;
    }
    .etiqueta{
        text-align: right;
    }
    .altura{
        height: 87vh;
    }
    .centrarY {
        align-items: center;
    }
    .centrarXY {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .box{
        background: #5D6D7E;
        padding: 7px;
        color: #FFF;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 10px;
    }
    .lista{
        overflow: visible; 
        overflow-y: scroll;
    }
    .lista::-webkit-scrollbar {
        -webkit-appearance: none;
    }
    .lista::-webkit-scrollbar:vertical {
        width:7px;
    }
    .lista::-webkit-scrollbar:horizontal {
        width:7px;
    }
    .lista::-webkit-scrollbar-button:increment,.contenedor::-webkit-scrollbar-button {
        display: none;
    } 
    .lista::-webkit-scrollbar-thumb {
        background-color: #797979;
        border-radius: 20px;
    }
    .lista::-webkit-scrollbar-track {
        border-radius: 10px;  
        padding: 50px;
    }
    .margen{
        padding-left: 2.5vh;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12" ng-init="export()">
    <div class="row justify-content-center">
        <div class="col-11">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <br>
            <div class="row centrarXY">
                <div class="col-12 col-md-3">
                    <div class="row">
                        <form class="col-12 cuadro cuadroP">
                            <div class="row justify-content-center">
                                <label class="form col-10" for="product"><h6>Agregar productos:</h6></label>
                                <input class="form-control col-10" type="text" placeholder="Ingresa el código de barras" ng-model="codigoBarras">
                                <button class="btn btn-success col-10" ng-click="setArticulo()">Agregar</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <form class="col-12 cuadro cuadroP">
                            <div class="row justify-content-center">
                                <label for="" class="col-12"><h3>Total</h3></label>
                                <label for="" class="col-12"><h1 ng-cloak>$@{{ formatoDecimal(total) }}</h1></label>
                            </div>
                        </form>
                    </div>
                    <div class="row">  
                        <form method="POST" class="col-12 cuadro cuadroP">
                            {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <label class="col-10" for=""><h6>Ingrese pago:</h6></label>
                                <div class="col-10">
                                    <div class="row centrarY ">
                                        <div class="col-2 box">$</div>
                                        <input ng-model="pago" id="pago" type="text" class="col-10 form-control" placeholder="0.00 MXN">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger col-10" ng-click="setPago()">Cobrar</button>
                            </div>
                        </form>  
                    </div>                 
                </div>
                <div class="col-12 col-md-9">
                    <div class="row pl-md-4">
                        <div class="col-12 cuadro altura lista">
                            <br>
                            <h5>Lista de compras de compras</h5>
                            <hr>
                            <div class="table-reesponse">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                           
                                        <tr ng-repeat="articulo in articulos" ng-if="carrito">
                                            <td ng-cloak>
                                                <button class="btn btn-info" ng-click="less(articulo.codigoBarras)">-</button>
                                                <button class="btn btn-danger" ng-click="plus(articulo.codigoBarras)">+</button>
                                            </td>
                                            <td ng-cloak>@{{ articulo.producto }}</td>
                                            <td ng-cloak>$@{{ formatoDecimal(articulo.precioUnitario) }}</td>
                                            <td ng-cloak>@{{ articulo.cantidad }}</td>
                                            <td ng-cloak>$@{{ formatoDecimal(articulo.importe) }}</td>
                                        </tr>    
                                           
                                    </tbody>
                                </table>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
