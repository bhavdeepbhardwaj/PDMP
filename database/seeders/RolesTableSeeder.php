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
            'level'     => '1',
            'employee_role' => 'Super Admin',
            'access_role' => '1,2,3,4,5,6,7'
        ]);

        Role::create([
            'role_name' => 'Ministry Nodal Officer',
            'role_slug' => 'ministrynodalofficer',
            'level'     => '2',
            'employee_role' => 'Ministry Nodal Officer (Admin I)',
            'access_role' => '0'
        ]);

        Role::create([
            'role_name' => 'State Maritime Board Nodal Officer',
            'role_slug' => 'statemaritimeboardnodalofficer',
            'level'     => '3',
            'employee_role' => 'State Maritime Board Nodal Officer (Admin II)',
            'access_role' => '0'
        ]);

        Role::create([
            'role_name' => 'Port Nodal Officer',
            'role_slug' => 'portnodalofficer',
            'level'     => '4',
            'employee_role' => 'Port Nodal Officer (Admin II)',
            'access_role' => '5,6'
        ]);

        Role::create([
            'role_name' => 'Port Manager',
            'role_slug' => 'portmanager',
            'level'     => '5',
            'employee_role' => 'Port Manager ',
            'access_role' => '0'
        ]);

        Role::create([
            'role_name' => 'Data Entry Officer',
            'role_slug' => 'dataentryofficer',
            'level'     => '6',
            'employee_role' => 'Data Entry Officer (User)',
            'access_role' => '0'
        ]);

        Role::create([
            'role_name' => 'NIC',
            'role_slug' => 'nic',
            'level'     => '7',
            'employee_role' => 'NIC',
            'access_role' => '0'
        ]);
    }
}
