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
            'telefono' => ['required', 'integer'],
            'identificacion' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Application\User
     */
    protected function create(array $data)
    {
        /*return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'identificacion' => $data['identificacion'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
        $user = User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'direccion' => $data['direccion'],
            'telefono' => $data['telefono'],
            'identificacion' => $data['identificacion'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'comprador')->first());
        return $user;
    }
}
