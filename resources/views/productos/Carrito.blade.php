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
                <th scope="col">Stock</th>
                <th scope="col"></th>
                <th class= "" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($carritos as $carrito)
                <tr>
                    <td><img src="imagenes/{{$carrito->imagen}}" alt="" width="100" height="100"></td>
                    <td>{{$carrito->nombre}}</td>
                    <td>${{number_format($carrito->precio, 0, '.', ',')}} COP</td>

                    @if ($carrito->stock == 1)
                        <td>{{$carrito->stock}} Unidad</td>
                    @elseif ($carrito->stock == 0)
                        <td>Sin unidades</td>
                    @else
                        <td>{{$carrito->stock}} Unidades</td>
                    @endif

                    <td><a href="/productos/{{$carrito->slug}}/edit" class="btn btn-primary">Editar producto</a></td>

                    {{-- <td>
                        {!! Form::open(['route'=> ['productos.destroy', $producto->slug],'method'=> 'DELETE']) !!}
                            {!! Form::submit('Eliminar producto', ['class' => 'btn btn-danger'])!!}
                        {!! Form::close()!!}
                    </td> --}}

            @endforeach
            </tbody>
        </table>
    </div>
@endsection