<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage company',
            'manage jobs',
            'manage candidates',
            'apply job',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $employerRole = Role::firstOrCreate([
            'name' => 'employer'
        ]);

        $employerPermission = [
            'manage company',
            'manage jobs',
            'manage candidates',
        ];

        $employerRole->syncPermissions($employerPermission);

        $employeeRole = Role::firstOrCreate([
            'name' => 'employee'
        ]);

        $employeePermission = [
            'apply job',
        ];

        $employeeRole->syncPermissions($employeePermission);

        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'occupation' => 'Superadmin',
            'experience' => '100',
            'avatar' => 'images/default-avatar.png',
            'password' => bcrypt('admin123'),
        ]);
        $user->assignRole($superAdminRole);
    }
}
