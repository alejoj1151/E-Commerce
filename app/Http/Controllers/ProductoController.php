<?php

namespace Application\Http\Controllers;

use Illuminate\Http\Request;
use Application\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all(); // Lista de todos los productos
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            // Comprobar Imagen Cargada
            if($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $imagen = time().$file->getClientOriginalName();
            }
            //
            $validacion = $request -> validate([
                'nombre' => 'required|string',
                'precio' => 'required|integer',
                'tipo' => 'required|in:Tecnologia,Ropa,Calzado,Hogar',
                'stock' => 'required|integer',
                'descripcion' => 'required'
            ]);

            $producto = new Producto();

            $producto ->fill($request->all());
            $producto -> imagen       = $imagen;
            $producto -> slug         = time().Str_slug($producto->nombre);
            $producto -> save();

            // Guardar Imagen si el producto se registró exitosamente
            $file->move(public_path().'/imagenes/', $imagen);
            //

            $productos = Producto::all(); // Lista de todos los productos
            return view('perfil.publicaciones', compact('productos'));

        } catch (Exception $e) {
            report($e);
    
            return e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //return $producto;
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->fill($request->except('imagen'));

        // Comprobar Imagen Cargada
        if($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen = time().$file->getClientOriginalName();
        }
       // $producto -> imagen       = $imagen;
        //
        $validacion = $request -> validate([
            'nombre' => 'required|string',
            'precio' => 'required|integer',
            'tipo' => 'required|in:Tecnologia,Ropa,Calzado,Hogar',
            'stock' => 'required|integer',
            'descripcion' => 'required'
        ]);
        
        $producto->save();

        return redirect('/publicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
            $file_path = public_path().'/imagenes/'.$producto -> imagen;
            \File::delete($file_path);
            $producto->delete();
            $productos = Producto::all(); // Lista de todos los productos
            $message = 'Producto eliminado satisfactoriamente';
            return redirect('/publicaciones');
    
    }
}
