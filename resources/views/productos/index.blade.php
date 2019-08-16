@extends('layouts.app')

@section('title', 'Productos disponibles')

@section('content')
    <div class="row justify-content-center">
        @if(session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center m-5">

        @foreach ($productos as $producto)
        <div class="card-deck col-sm-3 animated fadeIn p-4">
            <div class="card ">

                <img src="imagenes/{{$producto->imagen}}" class="card-img-top" alt="Card image cap">
               
                <div class="card-body">
                    <h5 class="card-title">{{$producto->nombre}}</h5>
                    <p class="card-text">{{$producto->descripcion}}</p>
                </div>
                
                <div class="card-footer">
                    <h5><span class="badge badge-success">Precio: $ {{number_format($producto->precio, 0, '.', ',')}} COP</span></h5>
                    <a class="btn btn-primary btn-block" href="ShowProduct/{{$producto->id}}">Ver producto</a>
                    <br><small class="text-muted">Este producto fué publicado el {{$producto->created_at}}</small></br>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection