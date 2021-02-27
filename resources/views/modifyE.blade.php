<style>
    .centrarXY {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .centrarY {
        align-items: center;
    }
    .derecha {
        align-items: end;
        justify-content: end;
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
                            Modificar empleado 
                        </div>
                        <div class="col-1">
                            <a href="/employees" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('updateEmployee') }}" method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label hidden for="id" class="col-lg-4 col-xl-4 text-right control-label">ID:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input hidden id="id" type="text" class="form-control" name="id" value="<?php echo $empleado[0]->id;?>" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="user" class="col-lg-4 col-xl-4 text-right control-label">Usuario:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="user" placeholder="Modifica nombre de usuario" type="text" class="form-control" name="user" value="<?php echo $empleado[0]->user;?>" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="email" class="col-lg-4 col-xl-4 text-right control-label">Email:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="email" placeholder="Modifica email" type="text" class="form-control" name="email" value="<?php echo $empleado[0]->email;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="phone" class="col-lg-4 col-xl-4 text-right control-label">Telefono:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="phone" placeholder="Modifica Telefono" type="text" class="form-control" name="phone" value="<?php echo $empleado[0]->phone;?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" ng-model="pass">
                                    <label class="custom-control-label" for="customSwitch1">Cambiar contraseña</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" ng-show="pass">
                            <div class="row centrarY">
                                <label for="password" class="col-lg-4 col-xl-4 text-right control-label">Contraseña:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="password" placeholder="Escribe nueva contraseña" type="text" class="form-control" name="password">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <a href="/deleteEmployee?id=<?php echo $productos[$i]->id_producto; ?>">
                                        <button type="button" class="btn btn-danger btn-block">Eliminar empleado</button>                                
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
