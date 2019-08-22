<?php

namespace Application\Http\Controllers;

use Illuminate\Http\Request;
use Application\Producto;
use Application\Carrito;
use Application\Compra;

class PagoController extends Controller
{
    public function PagoProductoCarrito()
    {
        $user = auth()->user();
        $carritos = Carrito::where('Carritos.emailUser',$user->email)
                            ->leftJoin('productos','carritos.IdProducto','=','productos.id')
            ->get();
        $total =0;
        foreach ($carritos as $carrito) {
            $total = ($carrito->precio)*$carrito->cantidad + $total;
        }
        return view('compras.MedioPagos', compact ('carritos','total'));

    }
    public function PagoProductoIndividual($producto)
    {
        $user = auth()->user();
        $producto = decrypt($producto);
        $carrito = new Carrito();
        $carrito->IdProducto=$producto->id;
        $carrito->emailUser = $user->email;
        $carrito->cantidad = 1;
        $carrito->total= $producto->precio;
        $carrito->save();
        $carritos = Carrito::where('Carritos.emailUser',$user->email)
                            ->leftJoin('productos','carritos.IdProducto','=','productos.id')
            ->get();
        $total =0;
        foreach ($carritos as $carrito){
            $total = ($carrito->precio)*$carrito->cantidad + $total;
        }
        return view('compras.MedioPagos', compact ('carritos','total'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();
        $validacion = $request -> validate([
            'medio_pago' => 'required|in:visa,master_card,efecty,paypal,baloto',
        ],['medio_pago.in'    => 'Tipo medio de pago no valido']);

        $carritos = Carrito::where('Carritos.emailUser',$user->email)
                            ->leftJoin('productos','carritos.IdProducto','=','productos.id')
            ->get();
        $total =0;
        foreach ($carritos as $carrito) {
            $total = ($carrito->precio)*$carrito->cantidad + $total;
        }
        $request->user()->authorizeRoles(['comprador']); // Rol Comprador único que puede hacer esta acción
        $compra = new Compra();
        $number = $this-> generateBuycodeNumber();
        $compra -> numero_transaccion = $number;
        $compra -> medio_pago = $request->get('medio_pago');
        $compra -> valor_compra = $total;
        $compra -> save();
        foreach ($carritos as $carrito) {
          $carrito->destroy($carrito->idCarrito);
        }
        return redirect('/productos')->with('message', 'Compra finalizada con éxito');;
        
    }

    function generateBuycodeNumber() {
        $number = mt_rand(100000000, 999999999); 
    
        if ($this->buycodeNumberExists($number)) {
            return generateBuycodeNumber();
        }
    
        return $number;
    }
    
    function buycodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Compra::where('numero_transaccion','=',$number)->exists();
    }
}
