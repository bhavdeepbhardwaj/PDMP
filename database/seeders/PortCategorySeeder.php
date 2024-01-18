<?php

namespace Database\Seeders;

use App\Models\PortCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PortCategory::create([
            'category_name' => 'Major Port',
            'slug' => 'majorport',
            'created_by' => '1',
        ]);

        PortCategory::create([
            'category_name' => 'Non Major Port',
            'slug' => 'nonmajorport',
            'created_by' => '1',
        ]);

        PortCategory::create([
            'category_name' => 'Shipping Sector',
            'slug' => 'shippingsector',
            'created_by' => '1',
        ]);

        PortCategory::create([
            'category_name' => 'Other Organisations',
            'slug' => 'otherorganisations',
            'created_by' => '1',
        ]);

        PortCategory::create([
            'category_name' => 'Sagarmala + ALHW Project',
            'slug' => 'sagarmala+alhwproject',
            'created_by' => '1',
        ]);
    }
}
