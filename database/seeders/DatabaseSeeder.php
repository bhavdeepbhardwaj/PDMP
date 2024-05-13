<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(IconWithPanelTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(PortSeeder::class);
        $this->call(PortCategorySeeder::class);
        $this->call(RolePermissionsSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(StateBoardTableSeeder::class);
        $this->call(CommoditiesTableSeeder::class);
    }
}
