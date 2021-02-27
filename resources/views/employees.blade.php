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
    <br><br> 
    <div class="row justify-content-center">
        <div class="col-12 col-md-11  align=center">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i=0;
                        while($i < $totalEmpleados){
                            echo '
                                <tr>
                                    <td>'.$empleados[$i]->user.'</td>
                                    <td>'.$empleados[$i]->email.'</td>
                                    <td>'.$empleados[$i]->phone.'</td>
                                    <td class="text-center"><a href="/modifyE?id='.$empleados[$i]->id.'"><button class="btn btn-info">Modificar</button></a></td>
                                </tr>
                            ';
                            $i++;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
</div> 
@endsection
