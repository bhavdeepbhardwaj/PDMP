<?php

namespace Database\Seeders;

use App\Models\Modules;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modules::create([
            'role_id' => '1',
            'module_id' => '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20',
            'permission' => '',
        ]);

        Modules::create([
            'role_id' => '2',
            // 'module_id' => '1,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23',
            'module_id' => '1,9,11,12,14,15,16,17,18,19,20',
            'permission' => '',
        ]);

        Modules::create([
            'role_id' => '3',
            // 'module_id' => '1,9,10,11,12,13,14,15,16,17,18,19,20',
            'module_id' => '1,9,11,12,14,15,16,17,18,19,20',
            'permission' => '',
        ]);
    }
}
