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
            <h1>Ventas del día $<?php echo $saldo; ?></h1>
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
