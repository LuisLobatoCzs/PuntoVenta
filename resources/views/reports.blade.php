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
        <div class="col-12 col-md-6 text-center">
            <h1>Saldo disponible $<?php echo $saldo; ?></h1>
        </div>
        <div class="col-12 col-md-3 text-center">
            <a href="/addExpenses"><button class="btn btn-warning col-10">Agregar gastos</button></a>
        </div> 
        <div class="col-12 col-md-3 text-center">
            <a href="/delete" class="row justify-content-center">
                <button type="button" class="btn btn-secondary col-10">Borrar registros</button>                                
            </a>
        </div>    
    </div>    
    <div class="row justify-content-center">
        <div class="col-12 col-md-11  align=center">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th>Concepto</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($i<$totalReportes){
                                echo '    
                                    <tr>
                                        <td>'.$reportes[$i]->concepto.'</td>
                                        <td>'.$reportes[$i]->fecha.'</td>
                                ';
                                if($reportes[$i]->venta == 1){
                                    echo '
                                        <td class=" text-right">$'.$reportes[$i]->importe.'</td>
                                    </tr>
                                    ';
                                }
                                else{
                                    echo '
                                        <td class="btn-secondary text-right">- $'.$reportes[$i]->importe.'</td>
                                    </tr>
                                    ';
                                }
                                
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
