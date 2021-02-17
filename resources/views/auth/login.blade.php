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
                    Inicie sesión para continuar
                </div>
                <div class="card-body">
                    <form class="col-12" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }} 
                        
                        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <div class="row centrarY">
                                <label class="col-lg-4 col-xl-4 text-right" for="user">Usuario:</label>
                                <input class="col-lg-7 col-xl-7 form-control" name="user" type="text" placeholder="Ingrese su nombre de usuario" required autofocus>
                                @if ($errors->has('user'))
                                    <span class="help-block col-12 text-center">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row centrarY">
                                <label class="col-lg-4 col-xl-4 text-right" for="password">Contraseña:</label>
                                <input class="col-lg-7 col-xl-7 form-control" name="password" type="password" placeholder="Ingrese contraseña" required autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block col-12 text-center">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <div class="col-11 text-right">
                                    <button class="btn btn-info btn-block">Iniciar sesión</button>                                
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
