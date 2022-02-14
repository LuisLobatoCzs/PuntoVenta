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
        <div class="col-12 col-md-3 text-center">
            <a href="/addExpenses"><button class="btn btn-warning col-10">Transacciones</button></a>
        </div> 
        <div class="col-12 col-md-2 text-center">
            <a href="/backup"><button class="btn btn-primary col-10">Descargar Excel</button></a>
        </div> 
        <div class="col-2 col-md-1 text-center">
            <button ng-click="deleteAll()" type="button" class="btn btn-secondary col-10">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-120 0 700 512"><path fill="currentColor" d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path></svg>
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
