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
            'role_name' => 'Port nodal office (Admin)',
            'role_slug' => 'portnodaloffice',
        ]);

        Role::create([
            'role_name' => 'Port Data entry officer (User)',
            'role_slug' => 'portdataentryofficer',
        ]);

        Role::create([
            'role_name' => 'NIC',
            'role_slug' => 'nic',
        ]);
    }
}
