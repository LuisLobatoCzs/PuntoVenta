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
        padding-top: 100px;
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
                    Agregar gastos
                </div>
                <div class="card-body">
                    <form class="col-12"  method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="user" class="col-lg-4 col-xl-4 text-right control-label">Usuario:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="user" placeholder="Ingresa nombre de usuario" type="text" class="form-control" name="user" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="Concepto" class="col-lg-4 col-xl-4 text-right control-label">Concepto:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="concepto" placeholder="Ingresa el tipo de gasto" type="text" class="form-control" name="concepto" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="fecha" class="col-lg-4 col-xl-4 text-right control-label">Fecha:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Fecha" placeholder="ingresa la fecha" type="date" class="form-control" name="fecha" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="monto" class="col-lg-4 col-xl-4 text-right control-label">Monto:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Monto" placeholder="ingresa el monto" type="text" class="form-control" name="monto" required>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button class="btn btn-primary btn-block">Agregar gasto</button>                                
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
