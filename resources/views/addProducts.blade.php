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
        padding: 25px;
        padding-top: 70px;
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
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-xl-5 cuadro">
            <div class="card border-primary mb-3">
                <div class="card-header">
                    <div class="row centrarY">
                        <div class="col-11">
                            Agregar producto
                        </div>
                        <div class="col-1">
                            <a href="/products" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('addProducts') }}" method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="codigoBarras" class="col-lg-4 col-xl-4 text-right control-label">Código:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="codigoBarras" placeholder="Ingresa código del producto" type="text" class="form-control" name="codigoBarras" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="nombre" class="col-lg-4 col-xl-4 text-right control-label">Nombre:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="nombre" placeholder="Ingresa nombre del producto" type="text" class="form-control" name="nombre" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioCompra" class="col-lg-4 col-xl-4 text-right control-label">Precio compra:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="precioCompra" placeholder="Ingresa precio compra" type="number" step="0.01" min="0" class="form-control" name="precioCompra" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioVenta" class="col-lg-4 col-xl-4 text-right control-label">Precio venta:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="precioVenta" placeholder="Ingresa precio venta" type="number" step="0.01" min="0" class="form-control" name="precioVenta" required>
                                </div>
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="categoria" class="col-lg-4 col-xl-4 text-right control-label">Categoría:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <select name="categoria" class="form-control" id="categoria" required>
                                            <option>Selecciona una opción</option>
                                            <option value="Bebidas">Bebidas</option>
                                            <option value="Embutidos" >Embutidos</option>
                                            <option value="Lácteos/Quesos">Lácteos/Quesos</option>
                                            <option value="Frituras/Golosinas">Frituras/Golosinas</option>
                                            <option value="Comestibles">Comestibles</option>
                                            <option value="Higiene/Limpieza" >Higiene/Limpieza</option>
                                            <option value="Mascotas">Mascotas</option>
                                            <option value="Frutas/Verduras" >Frutas/Verduras</option>
                                            <option selected value="Miselaneos">Miselaneos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="stock" class="col-lg-4 col-xl-4 text-right control-label">Stock:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="stock" placeholder="Total de unidades disponibles" type="number" class="form-control" name="stock" required>
                                </div>
                            </div>
                        </div>               
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar producto</button>                                
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>            
    </div>
</div>

@endsection
