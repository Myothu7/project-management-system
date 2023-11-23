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
            'user-list',
            'user-create',
            'user-edit',
            'user-detail',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
         ];
        //  $role = Role::create(['name'=>$request->name]);
        //  $role->syncPermissions($request->permission);

        $role = Role::create(['name'=>'member']);
        $role->syncPermissions(['user-list','role-list']);

        $role = Role::create(['name'=>'admin']);
        $role->syncPermissions(['user-list','role-list','user-create','user-detail','role-create','user-edit','role-edit']);

        $role = Role::create(['name'=>'Super admin']);
        $role->syncPermissions($permissions);

    }
}
