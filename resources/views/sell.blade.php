<style>
    .cuadro{
        padding: 10px;
        text-align: center;
        border-radius: 15px;
    }
    .etiqueta{
        text-align: right;
    }
    .altura{
        height: 655px;
        width: 200px;
    }
    .altura2{
        height: 80px;
    } 
    .fondo{
        background-color: #ffffff;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-10">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
  
                punto de venta

            </div>
        </div>
    </div>
</div>
@endsection
