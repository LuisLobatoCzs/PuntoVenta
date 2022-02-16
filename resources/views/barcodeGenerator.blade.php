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
</style>
@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-xl-5 cuadro">
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
                    <form class="col-12">
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
                                <div class="form-check">
                                    <input ng-model="barcodeName" class="form-check-input" type="checkbox" value="" id="barcodeName">
                                    <label class="form-check-label" for="barcodeName">
                                        Agregar leyenda
                                    </label>
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                    </form>

                    <div class="row centrarY">
                        <div class="col-9 centrarXY">
                            <img src='/barcode?text=@{{ barcode }}&size=@{{ barcodeSize }}&sizefactor=@{{ barcodeSizeFactor }}&orientation=@{{ barcodeOrientation }}&print=@{{ barcodeName }}'>
                        </div>
                        <div ng-cloak class="col-2 centrarXY" ng-hide='barcode != null ? false : true'>
                            <a href="/barcode?text=@{{ barcode }}&size=@{{ barcodeSize }}&sizefactor=@{{ barcodeSizeFactor }}&orientation=@{{ barcodeOrientation }}&print=@{{ barcodeName }}&download=true">
                                <button class="btn btn-success row centrarXY">
                                    <svg class="col-7 img-fluid" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"/></svg>
                                    Descargar
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>

@endsection
