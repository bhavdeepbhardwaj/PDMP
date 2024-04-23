<?php

namespace Database\Seeders;

use App\Models\NationalWaterwaysInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalWaterwaysInformationSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NationalWaterwaysInformation::factory()->count(100)->create();
    }
}
