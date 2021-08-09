<?php

namespace App\Http\Controllers;
use DB;

$reports = DB::table('transacciones')
                ->orderBy('fecha','desc')
                ->get();

?>
<table border class="table" cellpadding="10" cellspacing="0" width="1200">
    <thead class="thead">
        <tr >
            <th style="background-color: #28B463; color:#FFFFFF;"><b>Concepto</b></th>
            <th style="background-color: #28B463; color:#FFFFFF;"><b>Fecha</b></th>
            <th style="background-color: #28B463; color:#FFFFFF;"><b>Monto</b></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($reports as $report){
                if($report->corteCaja !=1){
                    echo '
                        <tr>
                            <td>'.$report->concepto.'</td>
                            <td>'.$report->fecha.'</td>
                            ';
                            if($report->gasto == 1 || $report->retiro == 1){
                                echo '<td>-'.floatval($report->importe).'</td>';
                            }
                            else{
                                echo '<td>'.floatval($report->importe).'</td>';
                            }
                            echo'
                        </tr>                
                    ';
                }
            }
        ?>
    </tbody>
</table>
