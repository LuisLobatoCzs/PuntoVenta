<style>
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
                <a href="/addEmployees"><button class="btn btn-warning col-10">Agregar Empleado</button></a>
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
                        <?php
                            $i=0;
                            while($i < $Empleados){
                                echo '
                                    <tr>
                                        <td>'.$empleados[$i]->name.'</td>
                                        <td>'.$empleados[$i]->email.'</td>
                                        <td>'.$empleados[$i]->phone.'</td>
                                        <td><a href="/modifyP"><button class="btn btn-info">Modificar</button></a></td>
                                        <td><button class="btn btn-secondary">Eliminar</button></td>
                                    </tr>
                                ';
                                $i++;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div> 
        <div class="col-1"></div>  
    </div>
</div> 
@endsection
