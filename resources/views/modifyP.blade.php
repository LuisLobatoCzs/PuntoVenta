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
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-xl-7 cuadro">
            <div class="card border-primary mb-1">
                <div class="card-header">
                    <div class="row centrarY">
                        <div class="col-11">
                            Modificar producto
                        </div>
                        <div class="col-1">
                            <a href="/products" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('updateProduct') }}" method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label hidden for="id" class="col-lg-4 col-xl-4 text-right control-label">ID:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input hidden id="id" type="text" class="form-control" name="id" value="<?php echo $producto[0]->id_producto;?>" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="codigoBarras" class="col-lg-4 col-xl-4 text-right control-label">Código:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="codigoBarras" placeholder="Modifica código del producto" type="text" class="form-control" name="codigoBarras" value="<?php echo $producto[0]->codigoBarras;?>" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="nombre" class="col-lg-4 col-xl-4 text-right control-label">Nombre:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="nombre" placeholder="Modifica nombre del producto" type="text" class="form-control" name="nombre" value="<?php echo $producto[0]->nombre;?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioCompra" class="col-lg-4 col-xl-4 text-right control-label">Precio compra:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="precioCompra" placeholder="Modifica precio compra" type="number" step="0.01" min="0" class="form-control" name="precioCompra" value="<?php echo $producto[0]->precioCompra;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioVenta" class="col-lg-4 col-xl-4 text-right control-label">Precio venta:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="precioVenta" placeholder="Modifica precio venta" type="number" step="0.01" min="0" class="form-control" name="precioVenta" value="<?php echo $producto[0]->precioVenta;?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioMedioMayoreo" class="col-lg-4 col-xl-4 text-right control-label">Medio-mayoreo:</label>       
                                <div class="col-lg-7 col-xl-7">
                                    <div class="row">
                                        <div class= "col-6"><input id="precioMedio" placeholder="Ingresa precio" type="number" step="0.01" min="0" class="form-control" name="precioMedio" value="<?php echo $producto[0]->precioMedio;?>"></div>
                                        <div class= "col-6"><input id="minimoMedio" placeholder="Mínimo piezas" type="number" step="1" min="0" class="form-control" name="minimoMedio" value="<?php echo $producto[0]->minimoMedio;?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="precioMayoreo" class="col-lg-4 col-xl-4 text-right control-label">Mayoreo:</label>       
                                <div class="col-lg-7 col-xl-7">
                                    <div class="row">
                                        <div class= "col-6"><input id="precioMayoreo" placeholder="Ingresa precio" type="number" step="0.01" min="0" class="form-control" name="precioMayoreo" value="<?php echo $producto[0]->precioMayoreo;?>"></div>
                                        <div class= "col-6"><input id="minimoMayoreo" placeholder="Mínimo piezas" type="number" step="1" min="0" class="form-control" name="minimoMayoreo" value="<?php echo $producto[0]->minimoMayoreo;?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="categoria" class="col-lg-4 col-xl-4 text-right control-label">Categoría:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <select id="categoria" name="categoria" class="form-control">
                                        <option selected value="<?php echo $producto[0]->categoria;?>"><?php echo $producto[0]->categoria;?></option>
                                        <option value="Bebidas">Bebidas</option>
                                        <option value="Embutidos" >Embutidos</option>
                                        <option value="Lácteos">Lácteos</option>
                                        <option value="Dulcería">Dulcería</option>
                                        <option value="Semillas">Semillas</option>
                                        <option value="Detergentes">Detergentes</option>
                                        <option value="Mascotas">Mascotas</option>
                                        <option value="Farmacia" >Farmacia</option>
                                        <option value="Abarrotes">Abarrotes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="stock" class="col-lg-4 col-xl-4 text-right control-label">Stock:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Stock" placeholder="Unidades disponibles" type="number" class="form-control" name="stock" value="<?php echo $producto[0]->stock;?>" required>
                                </div>
                            </div>
                        </div>               
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <a href="/deleteProduct?id=<?php echo $producto[0]->id_producto;?>">
                                        <button type="button" class="btn btn-danger btn-block">Eliminar producto</button>                                
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>                                
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
