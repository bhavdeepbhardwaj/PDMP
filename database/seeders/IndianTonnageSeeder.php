<?php

namespace Database\Seeders;

use App\Models\IndianTonnage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndianTonnageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IndianTonnage::factory()->count(100)->create();
    }
}
