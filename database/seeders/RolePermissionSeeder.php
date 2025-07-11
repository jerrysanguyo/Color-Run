<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {    
        $allPermissions = ['create', 'view', 'edit', 'delete'];

        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        $roles = [
            'user' => ['create', 'view', 'edit'],
            'admin' => ['create', 'view', 'edit'],
            'superadmin' => $allPermissions,
        ];

        foreach ($roles as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }
    }
}