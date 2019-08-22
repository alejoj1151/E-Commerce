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
                <form class="form-group" method="POST" action="/carrito/{{$producto->id}}" enctype="multipart/form-data">

                    @csrf
                    <button type="submit" class="btn btn-primary" href="#">Añadir al carrito</button>
                    <a class="btn btn-success" href="/pago/{{encrypt($producto)}}">Comprar</a>
                    <p>&nbsp;</p>
                    @error('cantidad')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <p class="text-left">Cantidad
                        <input name="cantidad" type="number" value="1" min="1" max="10" step="1"/>
                    </p>
            </div>

        </div><!-- end row -->
    </div><!-- end container -->

    <script src="./src/bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner();
    </script>
@endsection

