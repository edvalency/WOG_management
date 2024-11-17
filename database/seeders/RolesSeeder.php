<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions

        $role = Role::create(['name' => 'attendance'],['name'=>'welfare']);
        // $permissiono = Permission::create(['name' => 'add attendance']);
        // $permissiont = Permission::create(['name' => 'view attendance']);
        // $permissiontr = Permission::create(['name' => 'delete']);

        $role->givePermissionTo(['add attendance','view attendance']);

        // Permission::create(['name' => 'add offertory']);
        // Role::where('name' , 'revenue')->first()->givePermissionTo(['add offertory', 'edit offertory']);
        // $del_off = Permission::create(['name' => 'delete offertory']);
        // $add_tithe = Permission::create(['0name' => 'add tithe']);
        // $edit_tithe = Permission::create(['name' => 'edit tithe']);
        // $del_tithe = Permission::create(['name' => 'delete tithe']);
        // $permissiontr = Permission::create(['name' => 'delete']);

        // $role->givePermissionTo(['add offertory', 'edit offertory']);
    }
}
