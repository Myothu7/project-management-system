<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user-list','user-create','user-edit','user-detail','user-delete',
            'role-list','role-create','role-edit','role-delete',
            'permission-list','permission-create','permission-edit','permission-delete',
            'department-list','department-create','department-edit','department-delete',
            'employee-list','employee-create','employee-edit','employee-delete'
         ];

        $role = Role::create(['name'=>'member']);
        $role->syncPermissions([
            'user-list','role-list','permission-list','department-list','employee-list'
        ]);

        $role = Role::create(['name'=>'admin']);
        $role->syncPermissions([
            'user-list','role-list','permission-list','department-list',
            'user-create','user-detail','permission-create','employee-create',
            'role-create','user-edit','role-edit','permission-edit','employee-edit'
        ]);

        $role = Role::create(['name'=>'Super admin','guard_name'=>'web']);
        $role->syncPermissions($permissions);

    }
}
