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
            'port_id' => '0',
            'report_to' => '0',
            'email' => 'superadmin@gov.in',
            'username' => 'superadmin',
            'password' => bcrypt('123456'),
            'role_id' => 1,
            'status' => '1',
            'dep_id' => '1',
        ]);

        User::create([
            'name' => 'Admin 1 Port nodal office',
            'port_type' => '1',
            'port_id' => '1,2',
            'report_to' => '1',
            'email' => 'admin1@gov.in',
            'username' => 'admin1',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 2 Port nodal office',
            'port_type' => '2',
            'port_id' => '8,9',
            'report_to' => '1',
            'email' => 'admin2@gov.in',
            'username' => 'admin2',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 3 Port nodal office',
            'port_type' => '3',
            'port_id' => '12,13',
            'report_to' => '1',
            'email' => 'admin3@gov.in',
            'username' => 'admin3',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 4 Port nodal office',
            'port_type' => '4',
            'port_id' => '15,16',
            'report_to' => '1',
            'email' => 'admin4@gov.in',
            'username' => 'admin4',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 5 Port nodal office',
            'port_type' => '5',
            'port_id' => '17',
            'report_to' => '1',
            'email' => 'admin5@gov.in',
            'username' => 'admin5',
            'password' => bcrypt('123456'),
            'role_id' => 2,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 1 User 1 Port Data entry officer',
            'port_type' => '1',
            'port_id' => '1',
            'report_to' => '2',
            'email' => 'user1@gov.in',
            'username' => 'user1',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 1 User 2 Port Data entry officer',
            'port_type' => '1',
            'port_id' => '2',
            'report_to' => '2',
            'email' => 'user2@gov.in',
            'username' => 'user2',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 2 User 3 Port Data entry officer',
            'port_type' => '2',
            'port_id' => '8',
            'report_to' => '3',
            'email' => 'user3@gov.in',
            'username' => 'user3',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 2 User 4 Port Data entry officer',
            'port_type' => '2',
            'port_id' => '9',
            'report_to' => '3',
            'email' => 'user4@gov.in',
            'username' => 'user4',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 3 User 5 Port Data entry officer',
            'port_type' => '3',
            'port_id' => '12',
            'report_to' => '4',
            'email' => 'user5@gov.in',
            'username' => 'user5',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 3 User 6 Port Data entry officer',
            'port_type' => '3',
            'port_id' => '82',
            'report_to' => '4',
            'email' => 'user6@gov.in',
            'username' => 'user6',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 4 User 7 Port Data entry officer',
            'port_type' => '4',
            'port_id' => '15',
            'report_to' => '5',
            'email' => 'user7@gov.in',
            'username' => 'user7',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 4 User 8 Port Data entry officer',
            'port_type' => '4',
            'port_id' => '83',
            'report_to' => '5',
            'email' => 'user8@gov.in',
            'username' => 'user8',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);

        User::create([
            'name' => 'Admin 5 User 9 Port Data entry officer',
            'port_type' => '5',
            'port_id' => '84',
            'report_to' => '6',
            'email' => 'user9@gov.in',
            'username' => 'user9',
            'password' => bcrypt('123456'),
            'role_id' => 3,
            'status' => '1',
            'dep_id' => '1'
        ]);
    }
}
