<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = User::create($input_data);
        // $users->assignRole($request->role);

        $user = User::create([
            'name'=>'alice','email'=>'alice@gmail.com',
            'password'=>'pass',
        ]);
        $user->assignRole('member');

        $user = User::create([
            'name'=>'admin','email'=>'admin@gmail.com',
            'password'=>'pass',
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'mmt','email'=>'mmt@gmail.com',
            'password'=>'pass',
        ]);
        $user->assignRole('Super admin');


    }
}
