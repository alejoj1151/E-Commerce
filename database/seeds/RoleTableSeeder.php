<?php

use Illuminate\Database\Seeder;
use Application\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "administrador";
        $role->save();

        $role = new Role();
        $role->name = "comprador";
        $role->save();

        $role = new Role();
        $role->name = "vendedor";
        $role->save();
    }
}
