<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=Permission::all();
        foreach($permissions as $permission){
            DB::table('permission_role')->insert([
                'permission_id'    =>$permission->id,
                'role_id'          =>1,
            ]);    
        }
        DB::table('permission_role')->insert([
            'permission_id'    =>26,
            'role_id'          =>2,
        ]);
            
        DB::table('permission_role')->insert([
            'permission_id'    =>27,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>28,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>31,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>32,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>33,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>41,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>42,
            'role_id'          =>2,
        ]);
        DB::table('permission_role')->insert([
            'permission_id'    =>43,
            'role_id'          =>2,
        ]);
        
    }
}
