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

        $attendance = Role::create(['name' => 'attendance']);
        $welfare = Role::create(['name' => 'welfare']);
        $rev = Role::create(['name' => 'revenue']);
        $mem = Role::create(['name' => 'members']);

        $att_permissions = ['attendance.view', 'attendance.edit', 'attendance.save'];
        $wel_permissions = ['welfare.view', 'welfare.edit', 'welfare.save'];
        $rev_permissions = ['revenue.view', 'revenue.edit', 'revenue.save'];
        $mem_permissions = ['attendance.view', 'attendance.edit', 'attendance.save'];
        foreach ($att_permissions as $perm) {
            $permission = Permission::create(['name' => $perm]); // Create permission first
            $attendance->permissions()->save($permission); // Attach the permission to the role
        }
        foreach ($wel_permissions as $perm) {
            $permission = Permission::create(['name' => $perm]); // Create permission first
            $welfare->permissions()->save($permission); // Attach the permission to the role
        }
        foreach ($rev_permissions as $perm) {
            $permission = Permission::create(['name' => $perm]); // Create permission first

            $rev->permissions()->save($permission); // Attach the permission to the role
        }
        foreach ($mem_permissions as $perm) {
            $permission = new Permission(['name' => $perm]);
            $mem->permissions()->save($permission);
        }
    }
}
