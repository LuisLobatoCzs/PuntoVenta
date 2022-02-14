<style>
    .centrarY {
        align-items: center;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12">
    <br><br>
    <div class="row justify-content-center centraY">
        <div class="col-12 col-md-8 text-center">
            <h1>Ventas actuales $<?php echo $saldo; ?></h1>
        </div>
        <div class="col-12 col-md-3 text-center">
            <button ng-click="corte()" class="btn btn-warning col-10">Corte de caja</button>
        </div>     
    </div>
    <?php 
        $sumCortes = 0;
        foreach($reportes as $reporte){
            if($reporte->corteCaja == 1){
                $sumCortes = $sumCortes + $reporte->importe;
            }
        }
    ?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-11 text-right">
            Suma de los cortes de hoy: $<?php echo $sumCortes;?> 
        </div>
    </div>
    
    <div class="row justify-content-center">
        <div class="col-12 col-md-11  align=center">
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead">
                        <tr>
                            <th>Concepto</th>
                            <th>Hora</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=0;
                            while($i<$totalReportes){
                                if($reportes[$i]->corteCaja == 1){
                                    echo '    
                                        <tr>
                                            <td class="btn-info">'.$reportes[$i]->concepto.'</td>
                                            <td class="btn-info">'.substr($reportes[$i]->fecha,11,5).'</td>
                                            <td class="btn-secondary text-right"> $'.$reportes[$i]->importe.'</td>
                                        </tr>
                                    ';
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
