<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Administrador',
            'slug'          => 'admin',
            'description'   => 'Tiene todos los permisos del sistema.',
        ]);
        Role::create([
            'name'          => 'Encargado',
            'slug'          => 'encargado',
            'description'   => 'Tiene los permisos necesarios para crear y gestionar una empresa.',
        ]);
    }
}
