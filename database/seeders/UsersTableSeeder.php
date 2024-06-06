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
            'state_id' => 0,
            'port_type' => 0,
            'state_board' => 0,
            'port_id' => 0,
            'role_id' => 1,
            'dep_id' => 1,
            'report_to' => 1,
            'status' => 1,
            'extra_module' => '0',
            'email' => 'superadmin@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'superadmin',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'NIC Super Admin',
            'state_id' => 0,
            'port_type' => 0,
            'state_board' => 0,
            'port_id' => 0,
            'role_id' => 1,
            'dep_id' => 1,
            'report_to' => 1,
            'status' => 1,
            'extra_module' => '0',
            'email' => 'nic@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'nic-superadmin',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Ministry Nodal Officer',
            'state_id' => 0,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => '1,2,3,4,5,6,7,8,9,10,11,12,13',
            'role_id' => 2,
            'dep_id' => 2,
            'report_to' => 1,
            'status' => 1,
            'extra_module' => '1,26',
            'email' => 'ministrynodalofficer@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'ministrynodalofficer',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Chennai Port Authority Port Nodal Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 1,
            'role_id' => 4,
            'dep_id' => 1,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '3,4,5,15,16,17,18,19',
            'email' => 'cpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Chennai Port Authority Port Manager',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 1,
            'role_id' => 5,
            'dep_id' => 1,
            'report_to' => 4,
            'status' => 1,
            'extra_module' => '15,16,17,18,19',
            'email' => 'cpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cpa-pm',
            'created_by' => 3,
        ]);

        User::create([
            'name' => 'Chennai Port Authority Data Entry Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 1,
            'role_id' => 6,
            'dep_id' => 1,
            'report_to' => 4,
            'status' => 1,
            'extra_module' => '15,16,17,18,19',
            'email' => 'cpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cpa-deo',
            'created_by' => 3,
        ]);

        User::create([
            'name' => 'Cochin Port Authority Port Nodal Office',
            'state_id' => 18,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 2,
            'role_id' => 4,
            'dep_id' => 2,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'cochinpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cochinpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Cochin Port Authority Port Manager',
            'state_id' => 18,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 2,
            'role_id' => 5,
            'dep_id' => 2,
            'report_to' => 7,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'cochinpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cochinpa-pm',
            'created_by' => 6,
        ]);

        User::create([
            'name' => 'Cochin Port Authority Data Entry Officer',
            'state_id' => 18,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 2,
            'role_id' => 6,
            'dep_id' => 2,
            'report_to' => 7,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'cochinpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'cochinpa-deo',
            'created_by' => 6,
        ]);

        User::create([
            'name' => 'Deendayal Port Authority Port Nodal Officer',
            'state_id' => 12,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 3,
            'role_id' => 4,
            'dep_id' => 3,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'dpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'dpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Deendayal Port Authority Port Manager',
            'state_id' => 12,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 3,
            'role_id' => 5,
            'dep_id' => 3,
            'report_to' => 10,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'dpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'dpa-pm',
            'created_by' => 9,
        ]);

        User::create([
            'name' => 'Deendayal Port Authority Data Entry Officer',
            'state_id' => 12,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 3,
            'role_id' => 6,
            'dep_id' => 3,
            'report_to' => 10,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'dpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'dpa-deo',
            'created_by' => 9,
        ]);

        User::create([
            'name' => 'Haldia Dock Complex Port Nodal Officer',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 4,
            'role_id' => 4,
            'dep_id' => 4,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'hdc-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'hdc-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Haldia Dock Complex Port Manager',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 4,
            'role_id' => 5,
            'dep_id' => 4,
            'report_to' => 13,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'hdc-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'hdc-pm',
            'created_by' => 12,
        ]);

        User::create([
            'name' => 'Haldia Dock Complex Data Entry Officer',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 4,
            'role_id' => 6,
            'dep_id' => 4,
            'report_to' => 1,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'hdc-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'hdc-deo',
            'created_by' => 12,
        ]);

        User::create([
            'name' => 'Jawaharlal Nehru Port Authority Port Nodal Officer',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 5,
            'role_id' => 4,
            'dep_id' => 5,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'jnpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'jnpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Jawaharlal Nehru Port Authority Port Manager',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 5,
            'role_id' => 5,
            'dep_id' => 5,
            'report_to' => 16,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'jnpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'jnpa-pm',
            'created_by' => 16,
        ]);

        User::create([
            'name' => 'Jawaharlal Nehru Port Authority Data Entry Officer',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 5,
            'role_id' => 5,
            'dep_id' => 5,
            'report_to' => 16,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'npa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'npa-deo',
            'created_by' => 16,
        ]);

        User::create([
            'name' => 'Kamarajar Port Authority Port Nodal Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 6,
            'role_id' => 4,
            'dep_id' => 5,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'kpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'kpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Kamarajar Port Authority Port Manager',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 6,
            'role_id' => 5,
            'dep_id' => 5,
            'report_to' => 19,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'kpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'kpa-pno',
            'created_by' => 19,
        ]);

        User::create([
            'name' => 'Kamarajar Port Authority Data Entry Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 6,
            'role_id' => 6,
            'dep_id' => 5,
            'report_to' => 19,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'kpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'kpa-deo',
            'created_by' => 19,
        ]);

        User::create([
            'name' => 'Mormugao Port Authority Port Nodal Officer',
            'state_id' => 11,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 7,
            'role_id' => 4,
            'dep_id' => 1,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'mpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Mormugao Port Authority Port Manager',
            'state_id' => 11,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 7,
            'role_id' => 5,
            'dep_id' => 1,
            'report_to' => 22,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'mpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mpa-pm',
            'created_by' => 22,
        ]);

        User::create([
            'name' => 'Mormugao Port Authority Data Entry Officer',
            'state_id' => 11,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 7,
            'role_id' => 6,
            'dep_id' => 1,
            'report_to' => 22,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'mpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mpa-deo',
            'created_by' => 22,
        ]);

        User::create([
            'name' => 'Mumbai Port Authority Port Nodal Officer',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 8,
            'role_id' => 4,
            'dep_id' => 2,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'mumbaipa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mumbaipa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Mumbai Port Authority Port Manager',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 8,
            'role_id' => 5,
            'dep_id' => 2,
            'report_to' => 25,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'mumbaipa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mumbaipa-pm',
            'created_by' => 25,
        ]);

        User::create([
            'name' => 'Mumbai Port Authority Data Entry Officer',
            'state_id' => 21,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 8,
            'role_id' => 6,
            'dep_id' => 2,
            'report_to' => 25,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'mumbaipa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'mumbaipa-deo',
            'created_by' => 25,
        ]);

        User::create([
            'name' => 'New Mangalore Port Authority Port Nodal Officer',
            'state_id' => 17,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 9,
            'role_id' => 4,
            'dep_id' => 3,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'nmpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'nmpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'New Mangalore Port Authority Port Manager',
            'state_id' => 17,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 9,
            'role_id' => 5,
            'dep_id' => 3,
            'report_to' => 28,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'nmpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'nmpa-pm',
            'created_by' => 28,
        ]);

        User::create([
            'name' => 'New Mangalore Port Authority Data Entry Officer',
            'state_id' => 17,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 9,
            'role_id' => 6,
            'dep_id' => 3,
            'report_to' => 28,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'nmpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'nmpa-deo',
            'created_by' => 28,
        ]);

        User::create([
            'name' => 'Paradip Port Authority Port Nodal Officer',
            'state_id' => 26,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 10,
            'role_id' => 4,
            'dep_id' => 4,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'ppa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'ppa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Paradip Port Authority Port Manager',
            'state_id' => 26,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 10,
            'role_id' => 5,
            'dep_id' => 4,
            'report_to' => 31,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'ppa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'ppa-pm',
            'created_by' => 31,
        ]);

        User::create([
            'name' => 'Paradip Port Authority Data Entry Officer',
            'state_id' => 26,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 10,
            'role_id' => 6,
            'dep_id' => 4,
            'report_to' => 31,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'ppa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'ppa-deo',
            'created_by' => 31,
        ]);

        User::create([
            'name' => 'Syama Prasad Mookerjee Kolkata Port Nodal Officer',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 11,
            'role_id' => 4,
            'dep_id' => 5,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'spmk-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'spmk-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Syama Prasad Mookerjee Kolkata Port Manager',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 11,
            'role_id' => 5,
            'dep_id' => 5,
            'report_to' => 35,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'spmk-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'spmk-pm',
            'created_by' => 35,
        ]);

        User::create([
            'name' => 'Syama Prasad Mookerjee Kolkata Data Entry Officer',
            'state_id' => 37,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 11,
            'role_id' => 6,
            'dep_id' => 5,
            'report_to' => 35,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'spmk-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'spmk-deo',
            'created_by' => 35,
        ]);

        User::create([
            'name' => 'V O Chidambaranar Port Authority Port Nodal Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 12,
            'role_id' => 4,
            'dep_id' => 5,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'vocpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vocpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'V O Chidambaranar Port Authority Port Manager',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 12,
            'role_id' => 5,
            'dep_id' => 5,
            'report_to' => 38,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'vocpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vocpa-pm',
            'created_by' => 38,
        ]);

        User::create([
            'name' => 'V O Chidambaranar Port Authority Data Entry Officer',
            'state_id' => 31,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 12,
            'role_id' => 6,
            'dep_id' => 5,
            'report_to' => 38,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'vocpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vocpa-deo',
            'created_by' => 38,
        ]);

        User::create([
            'name' => 'Visakhapatnam Port Authority Port Nodal Officer',
            'state_id' => 1,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 13,
            'role_id' => 4,
            'dep_id' => 1,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,3,4,5,15,16,17,18,19',
            'email' => 'vpa-pno@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vpa-pno',
            'created_by' => 1,
        ]);

        User::create([
            'name' => 'Visakhapatnam Port Authority Port Manager',
            'state_id' => 1,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 13,
            'role_id' => 5,
            'dep_id' => 1,
            'report_to' => 41,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'vpa-pm@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vpa-pm',
            'created_by' => 41,
        ]);

        User::create([
            'name' => 'Visakhapatnam Port Authority Data Entry Officer',
            'state_id' => 1,
            'port_type' => 1,
            'state_board' => 0,
            'port_id' => 13,
            'role_id' => 6,
            'dep_id' => 1,
            'report_to' => 41,
            'status' => 1,
            'extra_module' => '1,15,16,17,18,19',
            'email' => 'vpa-deo@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'vpa-deo',
            'created_by' => 41,
        ]);

        // IWAI Port Nodal Officer
        User::create([
            'name' => 'IWAI Port Nodal Officer',
            'state_id' => 0,
            'port_type' => 0,
            'state_board' => 0,
            'port_id' => 0,
            'role_id' => 4,
            'dep_id' => 1,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,21',
            'email' => 'iwai@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'iwai',
            'created_by' => 1,
        ]);

        // DG Shipping Port Nodal Officer
        User::create([
            'name' => 'DG Shipping Port Nodal Officer',
            'state_id' => 0,
            'port_type' => 0,
            'state_board' => 0,
            'port_id' => 0,
            'role_id' => 4,
            'dep_id' => 2,
            'report_to' => 3,
            'status' => 1,
            'extra_module' => '1,22,23',
            'email' => 'dg-shipping@gov.in',
            'password' => bcrypt('123456'),
            'username' => 'dg-shipping',
            'created_by' => 1,
        ]);



        // User::create([
        //     'name' => 'Super Admin',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '0',
        //     'email' => 'superadmin@gov.in',
        //     'username' => 'superadmin',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 1,
        //     'status' => '1',
        //     'dep_id' => '1',
        // ]);

        // User::create([
        //     'name' => 'NIC Super Admin',
        //     'port_type' => '0',
        //     'state_board' => '0',
        //     'port_id' => '0',
        //     'report_to' => '0',
        //     'email' => 'nic@gov.in',
        //     'username' => 'superadmin',
        //     'password' => bcrypt('123456'),
        //     'role_id' => 1,
        //     'status' => '1',
        //     'dep_id' => '1',
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
