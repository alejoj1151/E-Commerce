@extends('layouts.app')

@section('title', 'Productos disponibles')

@section('content')
    <div class="container" id="product-section">
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-5">
                <img src="../imagenes/{{$producto->imagen}}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-6">
                <h2>{{$producto->nombre}}</h2>
                <p class="h3">Descripcion</p>
                <p class="lead">
                    {{$producto->descripcion}}
                </p>
                <a class="btn btn-primary" href="/carrito/{{$producto->id}}">Añadir al carrito</a>
                <a class="btn btn-success" href="#">Comprar</a>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
@endsection

