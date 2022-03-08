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
    .icono{
        background-image: {{ asset('img/money.svg') }}
    }
    .margen2{
        margin: 10px;
    }

    .categoria{
        font-size: calc(.7em + 1vw);
    }

    .full-height {
        height: 90vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
</style>
@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-sm-11">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row justify-content-center margen">
                <div class="col-6 col-sm-6 col-md-3  mt-4">
                    <a href="/sell">
                        <div class="cuadro color1 categoria">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cash-register" class="svg-inline--fa fa-cash-register fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="-65 0 640 512"><path fill="currentColor" d="M511.1 378.8l-26.7-160c-2.6-15.4-15.9-26.7-31.6-26.7H208v-64h96c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16H48c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h96v64H59.1c-15.6 0-29 11.3-31.6 26.7L.8 378.7c-.6 3.5-.9 7-.9 10.5V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32v-90.7c.1-3.5-.2-7-.8-10.5zM280 248c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16zm-32 64h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16zm-32-80c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16zM80 80V48h192v32H80zm40 200h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16zm16 64v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16zm216 112c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h176c4.4 0 8 3.6 8 8v16zm24-112c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16zm48-80c0 8.8-7.2 16-16 16h-16c-8.8 0-16-7.2-16-16v-16c0-8.8 7.2-16 16-16h16c8.8 0 16 7.2 16 16v16z"></path></svg>
                            Vender
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-md-3  mt-4">
                    <a href="/reports">
                        <div class="cuadro color3 categoria">
                            <svg width="60%" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="receipt" class="svg-inline--fa fa-receipt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M358.4 3.2L320 48 265.6 3.2a15.9 15.9 0 0 0-19.2 0L192 48 137.6 3.2a15.9 15.9 0 0 0-19.2 0L64 48 25.6 3.2C15-4.7 0 2.8 0 16v480c0 13.2 15 20.7 25.6 12.8L64 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L192 464l54.4 44.8a15.9 15.9 0 0 0 19.2 0L320 464l38.4 44.8c10.5 7.9 25.6.4 25.6-12.8V16c0-13.2-15-20.7-25.6-12.8zM320 360c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H72c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h240c4.4 0 8 3.6 8 8v16z"></path></svg>
                            <br>Corte de caja
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    <br><br>
</div>
@endsection
