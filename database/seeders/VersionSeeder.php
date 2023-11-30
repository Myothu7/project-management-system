<?php

namespace Database\Seeders;

use App\Models\Version;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VersionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Version::create([
            'name' => 'v-1',
            'remark' => 'version one'
        ]);
        Version::create([
            'name' => 'v-2',
            'remark' => 'version two'
        ]);
        Version::create([
            'name' => 'v-3',
            'remark' => 'version three'
        ]);
    }
}
