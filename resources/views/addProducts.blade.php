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
                    Modificar producto
                </div>
                <div class="card-body">
                    <form class="col-12"  method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="codigo" class="col-lg-4 col-xl-4 text-right control-label">Código:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="codigo" placeholder="Ingresa código del producto" type="text" class="form-control" name="codigo" required autofocus>
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
                                    <input id="precioCompra" placeholder="Ingresa precio compra" type="text" class="form-control" name="precioCompra" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioVenta" class="col-lg-4 col-xl-4 text-right control-label">Precio venta:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="precioVenta" placeholder="Ingresa precio venta" type="text" class="form-control" name="precioVenta" required>
                                </div>
                            </div>
                        </div>   
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="Categoria" class="col-lg-4 col-xl-4 text-right control-label">Categoría:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <select name="select" class="form-control">
                                            <option value="1">Selecciona una opción</option>
                                            <option value="2">Bebidas</option>
                                            <option value="3" >Embutidos</option>
                                            <option value="4">Lácteos</option>
                                            <option value="5">Frituras</option>
                                            <option value="6">Comestibles</option>
                                            <option value="7" >Detergente</option>
                                            <option value="8">Aceites</option>
                                            <option value="9">Papel</option>
                                            <option value="10">Mascotas</option>
                                            <option value="11" >Frutas</option>
                                            <option value="12">Verduras</option>
                                            <option value="13">Cereales</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="stock" class="col-lg-4 col-xl-4 text-right control-label">Stock:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Stock" placeholder="Ingresa stock" type="text" class="form-control" name="stock" required>
                                </div>
                            </div>
                        </div>               
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button class="btn btn-primary btn-block">Agregar producto</button>                                
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
