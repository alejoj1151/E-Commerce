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
}
