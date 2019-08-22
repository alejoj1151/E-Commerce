<?php

use Illuminate\Database\Seeder;
use Application\Role;
use Application\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','comprador')->first();
        $role_admin = Role::where('name','administrador')->first();
        $role_vendedor = Role::where('name','vendedor')->first();

        $user = new User();
        $user->nombre = "Comprador";
        $user->apellido = "Comprador";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->identificacion = "11111";
        $user->email = "comprador@mail.com";
        $user->password = bcrypt("comprador");
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->nombre = "Admin";
        $user->apellido = "Admin";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->identificacion = "11112";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("admin");
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->nombre = "Vendedor";
        $user->apellido = "Vendedor";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->identificacion = "11113";
        $user->email = "vendedor@mail.com";
        $user->password = bcrypt("vendedor");
        $user->nit = 1234;
        $user->empresa = "La pruebita";
        $user->vendedor_aprobado = false;
        $user->save();
        $user->roles()->attach($role_vendedor);

        $user = new User();
        $user->nombre = "Vendedor";
        $user->apellido = "Vendedor";
        $user->direccion = "Calle 5234";
        $user->telefono = "5234";
        $user->identificacion = "51513";
        $user->email = "vendedor2@mail.com";
        $user->password = bcrypt("vendedor2");
        $user->nit = 1234;
        $user->empresa = "La pruebita";
        $user->vendedor_aprobado = true;
        $user->save();
        $user->roles()->attach($role_vendedor);
    }
}
