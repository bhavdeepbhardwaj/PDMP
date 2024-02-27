<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Superadmin',
            'role_slug' => 'superadmin',
        ]);

        Role::create([
            'role_name' => 'Ministry of Admin (Admin)',
            'role_slug' => 'ministryofadmin',
        ]);

        Role::create([
            'role_name' => 'DG Shipping (Admin)',
            'role_slug' => 'dgshipping',
        ]);

        Role::create([
            'role_name' => 'IWAI (Admin)',
            'role_slug' => 'iwai',
        ]);

        Role::create([
            'role_name' => 'User',
            'role_slug' => 'user',
        ]);

        Role::create([
            'role_name' => 'NIC',
            'role_slug' => 'nic',
        ]);
    }
}
