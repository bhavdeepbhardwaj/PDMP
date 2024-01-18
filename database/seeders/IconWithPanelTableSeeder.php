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

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_4',
            'module_name' => 'Role',
            'url' => 'role',
            'mod_list_name' => 'role',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_5',
            'module_name' => 'Department',
            'url' => 'department',
            'mod_list_name' => 'department',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_6',
            'module_name' => 'Icon With Panels',
            'url' => 'icon-with-panels',
            'mod_list_name' => 'icon-with-panels',
            'icon' => 'fa-user-tag',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_7',
            'module_name' => 'Port',
            'url' => 'port',
            'mod_list_name' => 'port',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_8',
            'module_name' => 'Port Category',
            'url' => 'port-category',
            'mod_list_name' => 'port-category',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_9',
            'module_name' => 'BE',
            'url' => 'budget-estimate',
            'mod_list_name' => 'budget-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '9',
            'module' => 'mod_10',
            'module_name' => 'Add BE',
            'url' => 'add-budget-estimate',
            'mod_list_name' => 'add-budget-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '9',
            'module' => 'mod_11',
            'module_name' => 'View BE',
            'url' => 'view-budget-estimate',
            'mod_list_name' => 'view-budget-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_12',
            'module_name' => 'RE',
            'url' => 'revised-estimate',
            'mod_list_name' => 'revised-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '12',
            'module' => 'mod_13',
            'module_name' => 'Add RE',
            'url' => 'add-revised-estimate',
            'mod_list_name' => 'add-revised-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '12',
            'module' => 'mod_14',
            'module_name' => 'View RE',
            'url' => 'view-revised-estimate',
            'mod_list_name' => 'add-revised-estimate',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_15',
            'module_name' => 'Monthly Exp',
            'url' => 'monthly-exp',
            'mod_list_name' => 'monthly-exp',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '15',
            'module' => 'mod_16',
            'module_name' => 'View BE Monthly Exp',
            'url' => 'view-be-monthly-exp',
            'mod_list_name' => 'view-be-monthly-exp',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '15',
            'module' => 'mod_17',
            'module_name' => 'View RE Monthly Exp',
            'url' => 'view-re-monthly-exp',
            'mod_list_name' => 'view-re-monthly-exp',
            'icon' => 'fa-ship',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_18',
            'module_name' => 'Monthly Exp Add',
            'url' => 'monthly-exp-add',
            'mod_list_name' => 'monthly-exp-add',
            'icon' => 'fa-clipboard',
        ]);

        IconWithPanel::create([
            'parent_id' => '18',
            'module' => 'mod_19',
            'module_name' => 'BE Monthly Exp App',
            'url' => 'be-monthly-exp-add',
            'mod_list_name' => 'be-monthly-exp-add',
            'icon' => 'fa-clipboard',
        ]);

        IconWithPanel::create([
            'parent_id' => '18',
            'module' => 'mod_20',
            'module_name' => 'RE Monthly Exp App',
            'url' => 're-monthly-exp-add',
            'mod_list_name' => 're-monthly-exp-add',
            'icon' => 'fa-clipboard',
        ]);

        IconWithPanel::create([
            'parent_id' => '0',
            'module' => 'mod_21',
            'module_name' => 'Report',
            'url' => 'report',
            'mod_list_name' => 'report',
            'icon' => 'fa-clipboard',
        ]);

        IconWithPanel::create([
            'parent_id' => '21',
            'module' => 'mod_22',
            'module_name' => 'BE Report',
            'url' => 'be-report',
            'mod_list_name' => 'be-report',
            'icon' => 'fa-clipboard',
        ]);

        IconWithPanel::create([
            'parent_id' => '21',
            'module' => 'mod_23',
            'module_name' => 'RE Report',
            'url' => 're-report',
            'mod_list_name' => 're-report',
            'icon' => 'fa-clipboard',
        ]);
    }
}
