<?php

namespace Database\Seeders;

use App\Models\IconWithPanel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IconWithPanelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_1',
            'module_name' => 'Dashboard',
            'url' => 'dashboard',
            'mod_list_name' => 'dashboard',
            'icon' => 'fa-th',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_2',
            'module_name' => 'Module',
            'url' => 'module',
            'mod_list_name' => 'module',
            'icon' => 'fa-user-shield',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_3',
            'module_name' => 'User Management',
            'url' => 'user',
            'mod_list_name' => 'user',
            'icon' => 'fa-users',
        ]);

        // Add user
        IconWithPanel::create([
            'parent_id' => '3',
            'module' => 'mod_4',
            'module_name' => 'Add User',
            'url' => 'add-user',
            'mod_list_name' => 'add-user',
            'icon' => 'fa-users',
        ]);

        // Edit user
        IconWithPanel::create([
            'parent_id' => '3',
            'module' => 'mod_5',
            'module_name' => 'Edit User',
            'url' => 'edit-user',
            'mod_list_name' => 'edit-user',
            'icon' => 'fa-users',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_6',
            'module_name' => 'Role',
            'url' => 'role',
            'mod_list_name' => 'role',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_7',
            'module_name' => 'Department',
            'url' => 'department',
            'mod_list_name' => 'department',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_8',
            'module_name' => 'Icon With Panels',
            'url' => 'icon-with-panels',
            'mod_list_name' => 'icon-with-panels',
            'icon' => 'fa-user-tag',
        ]);

        // Add Icon With Panels
        IconWithPanel::create([
            'parent_id' => '8',
            'module' => 'mod_9',
            'module_name' => 'Add Icon With Panels',
            'url' => 'add-icon-with-panels',
            'mod_list_name' => 'add-icon-with-panels',
            'icon' => 'fa-user-tag',
        ]);

        // Edit Icon With Panels
        IconWithPanel::create([
            'parent_id' => '8',
            'module' => 'mod_10',
            'module_name' => 'Edit Icon With Panels',
            'url' => 'edit-icon-with-panels',
            'mod_list_name' => 'edit-icon-with-panels',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_11',
            'module_name' => 'Port',
            'url' => 'port',
            'mod_list_name' => 'port',
            'icon' => 'fa-ship',
        ]);

        // Add Port
        IconWithPanel::create([
            'parent_id' => '11',
            'module' => 'mod_12',
            'module_name' => 'Add Port',
            'url' => 'add-port',
            'mod_list_name' => 'add-port',
            'icon' => 'fa-ship',
        ]);

        // Edit Port
        IconWithPanel::create([
            'parent_id' => '11',
            'module' => 'mod_13',
            'module_name' => 'Edit Port',
            'url' => 'edit-port',
            'mod_list_name' => 'edit-port',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_14',
            'module_name' => 'Port Category',
            'url' => 'port-category',
            'mod_list_name' => 'port-category',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_15',
            'module_name' => 'Major Non Major Ports and Capacities',
            'url' => 'view-major-non-major-port-capacity',
            'mod_list_name' => 'view-major-non-major-port-capacity',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_16',
            'module_name' => 'Berth Related Information',
            'url' => 'view-berth-related-information',
            'mod_list_name' => 'view-berth-related-information',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_17',
            'module_name' => 'Direct Port Entry Delivery Related Containers',
            'url' => 'view-direct-port-entry-delivery-related-containers',
            'mod_list_name' => 'view-direct-port-entry-delivery-related-containers',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_18',
            'module_name' => 'Employment Major Ports',
            'url' => 'view-employment-major-ports',
            'mod_list_name' => 'view-employment-major-ports',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_19',
            'module_name' => 'Employment Dock Labour Boards Major Port',
            'url' => 'view-employment-dock-labour-boards-major-port',
            'mod_list_name' => 'view-employment-dock-labour-boards-major-port',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_20',
            'module_name' => 'Cruise Tourism',
            'url' => 'view-cruise-tourism',
            'mod_list_name' => 'view-cruise-tourism',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_21',
            'module_name' => 'National Waterways Information',
            'url' => 'view-national-waterways-information',
            'mod_list_name' => 'view-national-waterways-information',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_22',
            'module_name' => 'Indian Tonnage',
            'url' => 'view-indian-tonnage',
            'mod_list_name' => 'view-indian-tonnage',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_23',
            'module_name' => 'Seafarers Information',
            'url' => 'view-seafarers-information',
            'mod_list_name' => 'view-seafarers-information',
            'icon' => 'fa-ship',
        ]);
    }
}
