@extends('layouts.app')

@section('title', 'Solicitudes')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3 mb-3">
            <h1>Aprobación de vendedores</h1>
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
                    <th scope="col">Correo</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Empresa</th>
                    <th scope="col"></th>
                    <th class= "" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendedores as $vendedor)
                <tr>
                    <td>{{$vendedor->email}}</td>
                    
                    <td>{{$vendedor->nit}}</td>

                    <td>{{$vendedor->empresa}}</td>
                    
                    <td><a href="/solicitudes/vendedor/{{$vendedor->identificacion}}/accept" class="btn btn-primary">Aprobar</a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection