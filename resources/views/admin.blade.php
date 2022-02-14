<style>
    .margen{
        margin-top:10vh;
    }
    .color1{
        background: #5DADE2;
    }
    .color2{
        background: #EC7063;
    }
    .color3{
        background: #AF7AC5;
    }
    .color4{
        background: #F5B041;
    }
    /* Verde */
    .color5{
        background: #5D6E; 
    }
    .colorGris{
        background: #5D6D7E;
    }
    .cuadro{
        padding: 35px;
        color: white;
        border-radius: 25px;
        text-align: center;
        font-size: 150%;
    }
    .cuadro:hover{
        animation: BGcolor 6s linear infinite alternate both;
    }
    @keyframes BGcolor{
        0%{
            background: #5D6D7E;
        }
        20%{
            background: #5DADE2;
        }
        40%{
            background: #EC7063;
        }
        60%{
            background: #AF7AC5;
        }
        80%{
            background: #F5B041;
        }
        100%{
            background: #5D6E;
        }
    }
    .contorno {
        border-width: 5px;
        border-style: solid;
        border-color: #5DADE2;
        border-radius: 10px;
    }
    .margen2{
        margin: 10px;
    }
</style>
@extends('layouts.app')

@section('content')
<?php
    //echo $_SERVER['REMOTE_ADDR'];
    $localIP = strval(shell_exec("ipconfig"));
    $localIP = substr($localIP,1249,14);
    $localIP = getHostByName(getHostName());
?>

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row margen justify-content-center">
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="/sell">
                        <div class="cuadro color1">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cash-register" class="svg-inline--fa fa-cash-register fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-65 0 640 512"><path fill="currentColor" d="M511.1 378.8l-26.7-160c-2.6-15.4-15.9-26.7-31.6-26.7H208v-64h96c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h96v64H59.1c-15.6 0-29 11.3-31.6 26.7L.8 378.7c-.6 3.5-.9 7-.9 10.5V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32v-90.7c.1-3.5-.2-7-.8-10.5zM280 248c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16zm-32 64h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16zm-32-80c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16zM80 80V48h192v32H80zm40 200h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16zm16 64v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16zm216 112c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h176c4.4 0 8 3.6 8 8v16zm24-112c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16zm48-80c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16z"></path></svg>
                            Vender
                        </div>
                    </a>
                </div>
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="/cut">
                        <div class="cuadro color3">
                        <svg width="60%" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="receipt" class="svg-inline--fa fa-receipt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M358.4 3.2L320 48 265.6 3.2a15.9 15.9 0 0 0-19.2 0L192 48 137.6 3.2a15.9 15.9 0 0 0-19.2 0L64 48 25.6 3.2C15-4.7 0 2.8 0 16v480c0 13.2 15 20.7 25.6 12.8L64 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L192 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L320 464l38.4 44.8c10.5 7.9 25.6.4 25.6-12.8V16c0-13.2-15-20.7-25.6-12.8zM320 360c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z"></path></svg>
                        <br>Corte de caja
                        </div>
                    </a>
                </div>
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="/employees">
                        <div class="cuadro color2">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" class="svg-inline--fa fa-users fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg>
                            Empleados
                        </div>
                    </a>
                </div>
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="/reports">
                        <div class="cuadro color5">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-contract" class="svg-inline--fa fa-file-contract fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-130 0 640 512"><path fill="currentColor" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 64c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm192.81 248H304c8.84 0 16 7.16 16 16s-7.16 16-16 16h-47.19c-16.45 0-31.27-9.14-38.64-23.86-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34a15.986 15.986 0 0 1-14.31 8.84c-.38 0-.75-.02-1.14-.05-6.45-.45-12-4.75-14.03-10.89L144 354.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.77-16.19 54.05-9.7 66 14.16 2.02 4.06 5.96 6.5 10.16 6.5zM377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z"></path></svg>
                        Reportes
                        </div>
                    </a>
                </div>
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="products">
                        <div class="cuadro color4">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box-open" class="svg-inline--fa fa-box-open fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M425.7 256c-16.9 0-32.8-9-41.4-23.4L320 126l-64.2 106.6c-8.7 14.5-24.6 23.5-41.5 23.5-4.5 0-9-.6-13.3-1.9L64 215v178c0 14.7 10 27.5 24.2 31l216.2 54.1c10.2 2.5 20.9 2.5 31 0L551.8 424c14.2-3.6 24.2-16.4 24.2-31V215l-137 39.1c-4.3 1.3-8.8 1.9-13.3 1.9zm212.6-112.2L586.8 41c-3.1-6.2-9.8-9.8-16.7-8.9L320 64l91.7 152.1c3.8 6.3 11.4 9.3 18.5 7.3l197.9-56.5c9.9-2.9 14.7-13.9 10.2-23.1zM53.2 41L1.7 143.8c-4.6 9.2.3 20.2 10.1 23l197.9 56.5c7.1 2 14.7-1 18.5-7.3L320 64 69.8 32.1c-6.9-.8-13.5 2.7-16.6 8.9z"></path></svg>
                            Inventario
                        </div>
                    </a>
                </div>
                <div class="col-10 col-sm-6 col-md-3  mt-4">
                    <a href="" ng-click="enlace('<?php echo $localIP; ?>')">
                        <div class="cuadro colorgris">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="laptop-house" class="svg-inline--fa fa-laptop-house fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M272,288H208a16,16,0,0,1-16-16V208a16,16,0,0,1,16-16h64a16,16,0,0,1,16,16v37.12C299.11,232.24,315,224,332.8,224H469.74l6.65-7.53A16.51,16.51,0,0,0,480,207a16.31,16.31,0,0,0-4.75-10.61L416,144V48a16,16,0,0,0-16-16H368a16,16,0,0,0-16,16V87.3L263.5,8.92C258,4,247.45,0,240.05,0s-17.93,4-23.47,8.92L4.78,196.42A16.15,16.15,0,0,0,0,207a16.4,16.4,0,0,0,3.55,9.39L22.34,237.7A16.22,16.22,0,0,0,33,242.48,16.51,16.51,0,0,0,42.34,239L64,219.88V384a32,32,0,0,0,32,32H272ZM629.33,448H592V288c0-17.67-12.89-32-28.8-32H332.8c-15.91,0-28.8,14.33-28.8,32V448H266.67A10.67,10.67,0,0,0,256,458.67v10.66A42.82,42.82,0,0,0,298.6,512H597.4A42.82,42.82,0,0,0,640,469.33V458.67A10.67,10.67,0,0,0,629.33,448ZM544,448H352V304H544Z"></path></svg>
                            Red local
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</div>
<script src="https://kit.fontawesome.com/abf0dd93d4.js" crossorigin="anonymous"></script>
@endsection
