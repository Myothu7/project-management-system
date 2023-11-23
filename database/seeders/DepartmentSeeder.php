<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name'=>'Web Development',
            'remark'=>'php'
        ]);

        Department::create([
            'name'=>'Odoo Development',
            'remark'=>'python'
        ]);

        Department::create([
            'name'=>'Waddy Development',
            'remark'=>'python'
        ]);
        
    }
}
