@extends('layouts.app')

@section('content')
<br>
<br>
<div class="row">
    
        <div class="col-9 text-center">
            <h3>Administración de empleados</h3>
        </div>
        <div class="col-3">
            <button class="btn btn-secondary">Agregar Empleado</button>
        </div>   
    <br><br><br><br>
 </div>    
<div class="row">
    <div class="col-1"></div>
        <div class="col-10" align="center">
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Contraseña<th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Mariana G</td>
                        <td>2214068655</td>
                        <td>marigoislas@gmail.com</td>
                        <td>*********</td>
                        <td><button class="btn btn-primary">Modificar</button></td>
                        <td><button class="btn btn-secondary">Eliminar</button></td>
                    </tr>
                    <tr>
                        <td>Luis L</td>
                        <td>2214068655</td>
                        <td>lalc@gmail.com</td>
                        <td>*********</td>
                        <td><button class="btn btn-primary">Modificar</button></td>
                        <td><button class="btn btn-secondary">Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
        </div> 
    <div class="col-1"></div>  
</div>
@endsection
