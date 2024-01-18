<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Department 1',
        ]);
        Department::create([
            'name' => 'Department 2',
        ]);
        Department::create([
            'name' => 'Department 3',
        ]);
        Department::create([
            'name' => 'Department 4',
        ]);
        Department::create([
            'name' => 'Department 5',
        ]);
    }
}
