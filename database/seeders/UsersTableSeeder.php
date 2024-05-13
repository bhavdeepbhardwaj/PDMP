<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'port_type' => '0',
            'state_board' => '0',
            'port_id' => '0',
            'report_to' => '0',
            'email' => 'superadmin@gov.in',
            'username' => 'superadmin',
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'status' => '1',
            'dep_id' => '1',
        ]);

        // User::create([
        //     'name' => 'Ministry of Admin (Admin)',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '1',
        //     'email' => 'madmin@gov.in',
        //     'username' => 'madmin',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 2,
        //     'status' => '1',
        //     'dep_id' => '1'
        // ]);

        // User::create([
        //     'name' => 'DG Shipping (Admin)',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '1',
        //     'email' => 'dgadmin@gov.in',
        //     'username' => 'dgamin',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 3,
        //     'status' => '1',
        //     'dep_id' => '1'
        // ]);

        // User::create([
        //     'name' => 'IWAI (Admin)',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '1',
        //     'email' => 'iwaiadmin@gov.in',
        //     'username' => 'iwaiadmin',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 4,
        //     'status' => '1',
        //     'dep_id' => '1'
        // ]);

        // User::create([
        //     'name' => 'Port Data entry officer (User)',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '0',
        //     'email' => 'user@gov.in',
        //     'username' => 'user',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 5,
        //     'status' => '1',
        //     'dep_id' => '1'
        // ]);

        // User::create([
        //     'name' => 'NIC',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '1',
        //     'email' => 'nic@gov.in',
        //     'username' => 'nic',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 6,
        //     'status' => '1',
        //     'dep_id' => '1'
        // ]);
    }
}
