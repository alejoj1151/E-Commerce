<?php

namespace Application\Http\Controllers;
use Application\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function ShowSolicitudesVendedor()
    {
        $user = auth()->user();
        $vendedores = User::where('vendedor_aprobado', false)->get(); // Lista de todos los productos
        return view('admin.AprobarVendedor', compact('vendedores'));
    }

    public function AceptarVendedor($id) {
        $user = auth()->user();
        $user -> authorizeRoles(['administrador']);
        $vendedor = User::where('identificacion', '=', $id)->first();
        if($vendedor-> vendedor_aprobado == false){
            if($vendedor -> empresa == null){
                return redirect('/solicitudes/vendedor')->with('message', 'No se puede aprobar esta solicitud, ya que no se cuenta con el nombre de la empresa');;
            }elseif($vendedor -> nit == null){
                return redirect('/solicitudes/vendedor')->with('message', 'No se puede aprobar esta solicitud, ya que no se cuenta con un NIT');;
            }
            else {
                $vendedor -> vendedor_aprobado = true;
                $vendedor -> save();
                return redirect('/solicitudes/vendedor')->with('message', 'El usuario fue aprobado con éxito');;
            }
        }
        else {
            return redirect('/solicitudes/vendedor')->with('message', 'Este usuario ya cuenta con rol de vendedor');;
        }
    }
}
