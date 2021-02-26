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
                <h1>Total $3500</h1>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="/addExpenses"><button class="btn btn-warning col-10">Agregar gastos</button></a>
            </div>   
        
    </div>    
    <div class="row">
        <div class="col-1"></div>
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
                            <tr>
                                <td>Mariana G - venta</td>
                                <td>15/02/2021</td>
                                <td>$3000</td>
                            <tr>
                                <td>Luis L - venta</td>
                                <td>17/02/2021</td>
                                <td>$1000</td>
                            </tr>
                            <tr>
                                <td>Administrador - compra</td>
                                <td>17/02/2021</td>
                                <td>-$500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
        <div class="col-1"></div>  
    </div>
</div> 
@endsection
