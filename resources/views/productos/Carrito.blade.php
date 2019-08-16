@extends('layouts.app')

@section('title', 'Productos disponibles')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
            <h1>Mi carrito</h1>
        </div>
        <div class="row justify-content-center">
            @if(session('message'))
                <div class="alert alert-warning">
                    {{ session('message') }}
                </div>
            @endif

        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Imágen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($carritos as $carrito)
                <tr>
                    <td><img src="imagenes/{{$carrito->imagen}}" alt="" width="100" height="100"></td>
                    <td>{{$carrito->nombre}}</td>
                    <td>${{number_format($carrito->precio, 0, '.', ',')}} COP</td>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection