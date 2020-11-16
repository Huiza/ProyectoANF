<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// USERS
        DB::table('permissions')->insert([
            'name'          => 'Crear usuario',
            'slug'          => 'users.create',
            'description'   => 'Crea un registro',
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar usuarios',
            'slug'          => 'users.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de usuarios',
            'slug'          => 'users.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar usuarios',
            'slug'          => 'users.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar usuarios',
            'slug'          => 'users.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        //// PERMISSION_USER

        DB::table('permissions')->insert([
            'name'          => 'Crear permisos de usuario',
            'slug'          => 'permission_user.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en permisos de usuario',
            'slug'          => 'permission_user.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de permisos de usuario',
            'slug'          => 'permission_user.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar permisos de usuario',
            'slug'          => 'permission_user.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar permisos de usuario',
            'slug'          => 'permission_user.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        /// PERMISSION_ROLE

        DB::table('permissions')->insert([
            'name'          => 'Crear permiso a rol',
            'slug'          => 'permission_role.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar entre permisos a rol',
            'slug'          => 'permission_role.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de permisos a rol',
            'slug'          => 'permission_role.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar permisos a rol',
            'slug'          => 'permission_role.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar permisos a rol',
            'slug'          => 'permission_role.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        //// ROLE

        DB::table('permissions')->insert([
            'name'          => 'Crear roles',
            'slug'          => 'roles.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en roles',
            'slug'          => 'roles.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de roles',
            'slug'          => 'roles.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar roles',
            'slug'          => 'roles.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        ////////ROLE_USER

        DB::table('permissions')->insert([
            'name'          => 'Crear roles de usuario',
            'slug'          => 'role_user.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar entre roles de usuario',
            'slug'          => 'role_user.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de roles de usuario',
            'slug'          => 'role_user.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar roles de usuario',
            'slug'          => 'role_user.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar roles de usuario',
            'slug'          => 'role_user.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        /////////EMPRESAS

        DB::table('permissions')->insert([
            'name'          => 'Crear empresas',
            'slug'          => 'empresas.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en empresas',
            'slug'          => 'empresas.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de empresas',
            'slug'          => 'empresas.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar empresas',
            'slug'          => 'empresas.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar empresas',
            'slug'          => 'empresas.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        /////ESTADO_FINANCIEROS

        DB::table('permissions')->insert([
            'name'          => 'Crear estados financieros',
            'slug'          => 'estado_financieros.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en estados financieros',
            'slug'          => 'estado_financieros.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de estados financieros',
            'slug'          => 'estado_financieros.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);
    
        DB::table('permissions')->insert([
            'name'          => 'Editar estados financieros',
            'slug'          => 'estado_financieros.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar estados financieros',
            'slug'          => 'estado_financieros.destroy',
            'description'   => 'Elimina un registro',
            
        ]);
        


        ////////CATALOGO

        DB::table('permissions')->insert([
            'name'          => 'Crear catalogo',
            'slug'          => 'catalogo.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en catalogo',
            'slug'          => 'catalogo.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle de catalogo',
            'slug'          => 'catalogo.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Editar catalogo',
            'slug'          => 'catalogo.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar catalogo',
            'slug'          => 'catalogo.destroy',
            'description'   => 'Elimina un registro',
            
        ]);



        ///////////DETALLE_ESTADOS_FINANCIEROS
        DB::table('permissions')->insert([
            'name'          => 'Crear detalle de estados financieros',
            'slug'          => 'detalle_estados_financieros.create',
            'description'   => 'Crea un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Navegar en detalle de estados financieros',
            'slug'          => 'detalle_estados_financieros.index',
            'description'   => 'Navega todos los registros',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Ver detalle estados financieros',
            'slug'          => 'detalle_estados_financieros.show',
            'description'   => 'Ver detalles de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Editar detalle de estados financieros',
            'slug'          => 'detalle_estados_financieros.edit',
            'description'   => 'Edita los datos de un registro',
            
        ]);

        DB::table('permissions')->insert([
            'name'          => 'Eliminar detalle de estados financieros',
            'slug'          => 'detalle_estados_financieros.destroy',
            'description'   => 'Elimina un registro',
            
        ]);
            



    }
}
