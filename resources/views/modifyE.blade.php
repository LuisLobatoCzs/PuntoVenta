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
                    Modificar empleado
                </div>
                <div class="card-body">
                    <form class="col-12"  method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="user" class="col-lg-4 col-xl-4 text-right control-label">Usuario:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="user" placeholder="Modifica nombre de usuario" type="text" class="form-control" name="user" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="password" class="col-lg-4 col-xl-4 text-right control-label">Contraseña:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="password" placeholder="Modifica contraseña" type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="Email" class="col-lg-4 col-xl-4 text-right control-label">Email:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Email" placeholder="Modifica email" type="text" class="form-control" name="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="password-confirm" class="col-lg-4 col-xl-4 text-right control-label">Telefono:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="Telefono" placeholder="Modifica Telefono" type="text" class="form-control" name="Telefono" required>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button class="btn btn-primary btn-block">Guardar</button>                                
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
