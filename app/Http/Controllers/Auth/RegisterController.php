<?php

namespace Application\Http\Controllers\Auth;

use Application\User;
use Application\Role;
use Application\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string'],
            'telefono' => ['required', 'integer', 'min:0'],
            'identificacion' => ['required', 'integer', 'min:0'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'rol'=> ['required', 'string', 'in:comprador,vendedor'],
            "nit" => ["required_if:rol,==,vendedor"],
            "empresa" => ["required_if:rol,==,vendedor"],
        ],
        ['rol.in'    => 'tipo de vinculación  inválida']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Application\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'identificacion' => $data['identificacion'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nit' =>null,
            'empresa' =>null,
            'vendedor_aprobado' =>null,
            'puntuacion' =>null,
        ]);

        if($data['rol'] == 'vendedor') {
            $user -> nit = $data['nit'];
            $user -> empresa = $data['empresa'];
            $user -> num_ventas = 0;
            $user -> vendedor_aprobado = false;
            $user -> puntuacion = 0;
            $user
            ->roles()
            ->attach(Role::where('name', 'vendedor')->first());
            $user->save();
        }
        else {
            $user
            ->roles()
            ->attach(Role::where('name', 'comprador')->first());
        }
        return $user;
    }
}
