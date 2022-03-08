<style>
    .centrarXY {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .centrarY {
        align-items: center;
    }
    .cuadro{
        padding: 25px;
        padding-top: 25px;
    }
    .contorno {
        border-width: 2px;
        border-style: solid;
        border-color: black;
        border-radius: 10px;
    }
    .limiteAltura {
        max-height: 75vh;
    }
    #cut {
        overflow: hidden;
    }
</style>
@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-xl-7 cuadro">
            <div class="card border-primary mb-3">
                <div class="card-header">
                    <div class="row centrarY">
                        <div class="col-11">
                            Generador de códigos de barras
                        </div>
                        <div class="col-1">
                            <a href="/" class="row justify-content-center">
                                <button type="button" class="btn btn-secondary"><b>X</b></button>                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="barcode" class="col-lg-4 col-xl-4 text-right control-label">Código:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input id="barcode" ng-model="barcode" placeholder="Ingresa el código de producto" type="text" class="form-control" name="barcode" autofocus="autofocus" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="barcodeSize" class="col-lg-4 col-xl-4 text-right control-label">Tamaño:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input type="range" min="20" max="150" step="1" ng-model="barcodeSize" class="form-control form-range" id="barcodeSize" name="barcodeSize" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="barcodeSizeFactor" class="col-lg-4 col-xl-4 text-right control-label">Espaciado:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <input type="range" min="1" max="3" step="0.1" ng-model="barcodeSizeFactor" class="form-control form-range" id="barcodeSizeFactor" name="barcodeSizeFactor" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY">
                                <label for="barcodeOrientation" class="col-lg-4 col-xl-4 text-right control-label">Orientación:</label>
                                <div class="col-lg-7 col-xl-7">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input ng-model="barcodeOrientation" type="radio" class="form-check-input" name="barcodeOrientation" id="optiobarcodeOrientation1" value="horizontal" checked="">
                                            Horizontal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input ng-model="barcodeOrientation" type="radio" class="form-check-input" name="barcodeOrientation" id="barcodeOrientation2" value="vertical">
                                            Vertical
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row centrarY justify-content-center">
                                <div class="custom-control custom-switch">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="barcodeName" ng-model="barcodeName">
                                    <label class="custom-control-label" for="barcodeName">
                                        Agregar leyenda
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row justify-content-center">
                            <div ng-cloak class="col-sm-8 col-md-6 col-10 centrarXY" ng-hide='barcode != null ? false : true'>
                                <a href="/barcode?text=@{{ barcode }}&size=@{{ barcodeSize }}&sizefactor=@{{ barcodeSizeFactor }}&orientation=@{{ barcodeOrientation }}&print=@{{ barcodeName }}&download=true">
                                    <button class="btn btn-success col-12 centrarXY">
                                        <i class="fas fa-save"></i> 
                                        Descargar
                                    </button>
                                </a>
                            </div>
                        </div>

                        <hr>

                        <!-- Vista previa -->
                        <div class="row justify-content-center centrarY"  id="cut">
                            <div class="col-11 centrarXY" id="cut">
                                <img src='/barcode?text=@{{ barcode }}&size=@{{ barcodeSize }}&sizefactor=@{{ barcodeSizeFactor }}&orientation=@{{ barcodeOrientation }}&print=@{{ barcodeName }}'>
                            </div>                            
                        </div>    
                    </div>
                    
                </div>
            </div>
        </div>            
    </div>
</div>

@endsection
