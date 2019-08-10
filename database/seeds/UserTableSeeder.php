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
        $role_user = Role::where('name','usuario')->first();
        $role_admin = Role::where('name','administrador')->first();
        $role_vendedor = Role::where('name','vendedor')->first();

        $user = new User();
        $user->name = "User";
        $user->apellido = "User";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->email = "user@mail.com";
        $user->password = bcrypt("user");
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->apellido = "Admin";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->email = "admin@mail.com";
        $user->password = bcrypt("admin");
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = "Vendedor";
        $user->apellido = "Vendedor";
        $user->direccion = "Calle 1234";
        $user->telefono = "1234";
        $user->email = "vendedor@mail.com";
        $user->password = bcrypt("vendedor");
        $user->save();
        $user->roles()->attach($role_vendedor);
    }
}
