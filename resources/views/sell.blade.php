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
    .altura-old{
        height: 87vh;
    }
    .altura{
        height: 60vh;
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

    @media screen and (max-width: 800px) and (min-width: 0px) {
    .not_priority {
            display:none;
    }
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
                                <input class="form-control col-10" type="text" placeholder="Ingresa el código de barras" ng-model="codigoBarras" autofocus="autofocus">
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
                        <form class="col-12 cuadro cuadroP">
                            <div class="row justify-content-center">
                                <label class="col-10" for=""><h6>Buscador de productos:</h6></label>
                                <div class="col-10">
                                    <div class="row centrarY ">
                                        <input class="form-control col-10" type="text" placeholder="Ingresa un código de barras o nombre para buscar un producto" ng-model="barcode">
                                        <button class="btn btn-info col-2" ng-click="buscador(0)">
                                            <svg width="3vh" class="not_priority" viewBox="0 0 512 512"><path fill="currentColor" d="M505.04 442.66l-99.71-99.69c-4.5-4.5-10.6-7-17-7h-16.3c27.6-35.3 44-79.69 44-127.99C416.03 93.09 322.92 0 208.02 0S0 93.09 0 207.98s93.11 207.98 208.02 207.98c48.3 0 92.71-16.4 128.01-44v16.3c0 6.4 2.5 12.5 7 17l99.71 99.69c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.59.1-33.99zm-297.02-90.7c-79.54 0-144-64.34-144-143.98 0-79.53 64.35-143.98 144-143.98 79.54 0 144 64.34 144 143.98 0 79.53-64.35 143.98-144 143.98zm27.11-152.54l-45.01-13.5c-5.16-1.55-8.77-6.78-8.77-12.73 0-7.27 5.3-13.19 11.8-13.19h28.11c4.56 0 8.96 1.29 12.82 3.72 3.24 2.03 7.36 1.91 10.13-.73l11.75-11.21c3.53-3.37 3.33-9.21-.57-12.14-9.1-6.83-20.08-10.77-31.37-11.35V112c0-4.42-3.58-8-8-8h-16c-4.42 0-8 3.58-8 8v16.12c-23.63.63-42.68 20.55-42.68 45.07 0 19.97 12.99 37.81 31.58 43.39l45.01 13.5c5.16 1.55 8.77 6.78 8.77 12.73 0 7.27-5.3 13.19-11.8 13.19h-28.1c-4.56 0-8.96-1.29-12.82-3.72-3.24-2.03-7.36-1.91-10.13.73l-11.75 11.21c-3.53 3.37-3.33 9.21.57 12.14 9.1 6.83 20.08 10.77 31.37 11.35V304c0 4.42 3.58 8 8 8h16c4.42 0 8-3.58 8-8v-16.12c23.63-.63 42.68-20.54 42.68-45.07 0-19.97-12.99-37.81-31.59-43.39z"></path></svg>
                                            Buscar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>  
                    </div>
                   
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
