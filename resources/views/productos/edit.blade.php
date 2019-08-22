@extends('layouts.app')

@section('title', 'Editar producto existente')

@section('content')

<form class="form-group" method="POST" action="/productos/{{$producto->slug}}" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        
        <div class="row justify-content-center mt-3 mb-3">
            <h1>Editar producto</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group">
                        <label for="Nombre">Nombre del producto</label>
                        <input type="text" class="form-control" name="nombre" value="{!! $producto->nombre !!}" required oninvalid="this.setCustomValidity('El campo Nombre es obligatorio')" onchange="this.setCustomValidity('')">
                        @error('nombre')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Precio">Precio (cop)</label>
                        <input type="number" class="form-control" name="precio" value={{$producto->precio}} required oninvalid="this.setCustomValidity('El campo Precio es obligatorio')" onchange="this.setCustomValidity('')">
                        @error('precio')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Categoria">Tipo</label>
                        <select type="text" class="form-control" name="tipo" value={{$producto->categoria}} required>
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
                        <input type="number" class="form-control" name="stock" value="{{$producto->stock}}" required oninvalid="this.setCustomValidity('El campo Stock es obligatorio')" onchange="this.setCustomValidity('')">
                        @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Desc">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="5" required oninvalid="this.setCustomValidity('El campo Descripción es obligatorio')" onchange="this.setCustomValidity('')">{{$producto->descripcion}}</textarea>
                        @error('descripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row justify-content-center m-3">
                        <div class="col d-flex justify-content-end">
                            <a class="btn btn-primary" href="/publicaciones">Regresar</a>
                        </div>
                        <div class="col d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary" href="#">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
    </form>
        
 
@endsection