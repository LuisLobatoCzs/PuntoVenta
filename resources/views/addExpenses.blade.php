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
                    <div class="row centrarY">
                        <div class="col-11">
                            Agregar Gasto / Retiro
                        </div>
                        <div class="col-1">
                            <a href="/reports" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('addExpenses') }}"  method="POST">
                        {{ csrf_field() }} 
                        
                        <div hidden class="form-group">
                            <div class="row centrarY">
                                <label for="id" class="col-lg-4 col-xl-4 text-right control-label">Id:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="id" type="text" class="form-control" name="id" value="<?php echo Auth::user()->id; ?>" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div hidden class="form-group">
                            <div class="row centrarY">
                                <label for="user" class="col-lg-4 col-xl-4 text-right control-label">Usuario:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="user" placeholder="Ingresa nombre de usuario" type="text" class="form-control" name="user" value="<?php echo Auth::user()->user; ?>" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="fecha" class="col-lg-4 col-xl-4 text-right control-label">Fecha:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="fecha" placeholder="Ingresa la fecha" type="date" class="form-control" name="fecha" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="monto" class="col-lg-4 col-xl-4 text-right control-label">Monto:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="monto" placeholder="Ingresa el monto" type="number" step="0.01" min=".01" class="form-control" name="monto" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="tipo" class="col-lg-4 col-xl-4 text-right control-label">Tipo de gasto:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <select ng-model="tipo" class="form-control" id="tipo" name="tipo" required>
                                        <option value="Retiro">Retiro</option>
                                        <option value="Gasto">Gasto</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div ng-cloak ng-show="gasto()" class="form-group">
                            <div class="row">
                                <label for="Concepto" class="col-lg-4 col-xl-4 text-right control-label">Concepto:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <textarea placeholder="Ingresa el motivo del gasto" name="concepto" id="concepto" rows="3" class="form-control"></textarea>
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
