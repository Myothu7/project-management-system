<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
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
         
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}
