@extends('layouts.app')

@section('title', 'Publicar producto nuevo')

@section('content')

    <form class="form-group" method="POST" action="/productos" enctype="multipart/form-data">

        @csrf
        
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <h1>Publicar producto</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="Nombre">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombre" required>
                                @error('nombre')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Precio">Precio (cop)</label>
                                <input type="number" class="form-control" name="precio" required>
                                @error('precio')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="Categoria">Tipo</label>
                                <select type="text" class="form-control" name="tipo" required>
                                    <option type="text" selected="selected">Tecnologia</option>
                                    <option type="text">Ropa</option>
                                    <option type="text">Calzado</option>
                                    <option type="text">Hogar</option>
                                </select>
                                @error('tipo')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Stock">Stock</label>
                                <input type="number" class="form-control" name="stock" required>
                                @error('stock')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="Desc">Descripción</label>
                                <textarea type="text" class="form-control" name="descripcion" rows="5" required></textarea>
                                @error('descripcion')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imágen</label>
                                <input type="file" name="imagen" required>
                            </div>
                            <div class="row justify-content-center m-3">
                                <div class="col d-flex justify-content-end">
                                    <a class="btn btn-primary" href="/productos">Regresar</a>
                                </div>
                                <div class="col d-flex justify-content-start">
                                    <button type="submit" class="btn btn-primary" href="#">Publicar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection