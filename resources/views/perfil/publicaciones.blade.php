@extends('layouts.app')

@section('title', 'Mis publicaciones')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
            <h1>Mis Publicaciones</h1>
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
                @foreach ($productos as $producto)
                <tr>
                    <td>
                        <img src="imagenes/{{$producto->imagen}}" alt="" width="100" height="100">
                    </td>
                    <td>{{$producto->nombre}}</td>
                    <td>${{number_format($producto->precio, 0, '.', ',')}} COP</td>
                    
                    @if ($producto->stock == 1)
                        <td>{{$producto->stock}} Unidad</td>
                    @elseif ($producto->stock == 0)
                        <td>Sin unidades</td>
                    @else
                        <td>{{$producto->stock}} Unidades</td>
                    @endif
                    
                    <td><a href="#" class="btn btn-primary">Editar producto</a></td>
                    <td>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete">Eliminar producto</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection