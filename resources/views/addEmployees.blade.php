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
                            Agregar empleado
                        </div>
                        <div class="col-1">
                            <a href="/employees" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('addEmployees') }}" method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="user" class="col-lg-4 col-xl-4 text-right control-label">*Usuario:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="user" placeholder="Ingresa nombre de usuario" type="text" class="form-control" name="user" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="password" class="col-lg-4 col-xl-4 text-right control-label">*Contraseña:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="password" placeholder="Ingresa contraseña" type="text" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="email" class="col-lg-4 col-xl-4 text-right control-label">Email:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="email" placeholder="Ingresa email" type="text" class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="phone" class="col-lg-4 col-xl-4 text-right control-label">Telefono:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="phone" placeholder="Ingresa Telefono" type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar empleado</button>                                
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
