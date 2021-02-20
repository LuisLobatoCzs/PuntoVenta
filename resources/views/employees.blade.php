<style>
    .c1{
        background: #5Cf600;
    }
    .c2{
        background: #4bc200;
    }
    .centrarY {
        align-items: center;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12">
    <br><br>
    <div class="row centraY">
        
            <div class="col-12 col-md-8 text-center">
                <h4>Administrar empleados</h4>
            </div>
            <div class="col-12 col-md-3 text-center">
                <button class="btn btn-warning col-10">Agregar Empleado</button>
            </div>   
        
    </div>    
    <div class="row">
        <div class="col-1"></div>
            <div class="col-12 col-md-11  align=center">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mariana G</td>
                                <td>2214068655</td>
                                <td>marigoislas@gmail.com</td>
                                <td><a href="/modifyE"><button class="btn btn-info">Modificar</button></a></td>
                                <td><button class="btn btn-secondary ">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Luis L</td>
                                <td>2214068655</td>
                                <td>lalc@gmail.com</td>
                                <td><a href="/modifyE"><button class="btn btn-info">Modificar</button></a></td>
                                <td><button class="btn btn-secondary">Eliminar</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        <div class="col-1"></div>  
    </div>
</div> 
@endsection
