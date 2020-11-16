<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        $permisos = DB::select('SELECT * FROM permission_role WHERE role_id = 1');

        foreach ($permisos as $permiso) {
            DB::table('permission_user')->insert([
                'permission_id' => $permiso->permission_id,
                'user_id' => 1,
            ]);
        }
    }
}
