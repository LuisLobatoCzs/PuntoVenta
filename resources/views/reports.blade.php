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
            <h1>Saldo disponible $<?php echo number_format($saldo, 2, '.', ','); ?></h1>
        </div>
        <div class="col-12 col-md-2 text-center">
            <a href="/addExpenses">
                <button class="btn btn-warning col-12">
                    <i class="fas fa-file-alt"></i>
                    Transacciones
                </button>
            </a>
        </div> 
        <div class="col-12 col-md-2 text-center">
            <a href="/backup">
                <button class="btn btn-primary col-12">
                    <i class="fas fa-file-download"></i>
                    Descargar Excel
                </button>
            </a>
        </div> 
        <div class="col-12 col-md-2 text-center">
            <button ng-click="deleteAll()" type="button" class="btn btn-secondary col-12">
                <i class="fas fa-trash-alt"></i>
                Eliminar
            </button>                                
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
                            <th>Hora</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($i<$totalReportes){
                                if($reportes[$i]->corteCaja == 1){
                                    echo'    
                                        <tr>
                                            <td class="btn-info">'.$reportes[$i]->concepto.'</td>
                                            <td class="btn-info">'.substr($reportes[$i]->fecha,0,11).'</td>
                                            <td class="btn-info">'.substr($reportes[$i]->fecha,11,5).'</td>
                                            <td class="btn-info text-right">Corte de Caja por $'.$reportes[$i]->importe.'</td>
                                        </tr>
                                    ';
                                }
                                else if($reportes[$i]->deposito == 1){
                                    echo '    
                                        <tr>
                                            <td>'.$reportes[$i]->concepto.'</td>
                                            <td>'.substr($reportes[$i]->fecha,0,11).'</td>
                                            <td>'.substr($reportes[$i]->fecha,11,5).'</td>
                                    ';
                                    if($reportes[$i]->venta == 1){
                                        echo '
                                            <td class="text-right">$'.$reportes[$i]->importe.'</td>
                                        </tr>
                                        ';
                                    }
                                    else{
                                        echo '
                                            <td class="btn-primary text-right">$'.$reportes[$i]->importe.'</td>
                                        </tr>
                                        ';
                                    }
                                }
                                else{
                                    echo '    
                                        <tr>
                                            <td ng-click="detail('.$i.')">
                                                '.$reportes[$i]->concepto.'<br>
                                                <div class="pl-5" ng-show="showArray['.$i.']">
                                                    '.$reportes[$i]->detalle.'
                                                </div>
                                            </td>
                                            <td>'.substr($reportes[$i]->fecha,0,11).'</td>
                                            <td>'.substr($reportes[$i]->fecha,11,5).'</td>
                                    ';
                                    if($reportes[$i]->venta == 1){
                                        echo '
                                            <td class="text-right">$'.$reportes[$i]->importe.'</td>
                                        </tr>
                                        ';
                                    }
                                    else{
                                        echo '
                                            <td class="btn-secondary text-right">- $'.$reportes[$i]->importe.'</td>
                                        </tr>
                                        ';
                                    }
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
