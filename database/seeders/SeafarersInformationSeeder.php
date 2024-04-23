<?php

namespace Database\Seeders;

use App\Models\SeafarersInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeafarersInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SeafarersInformation::factory()->count(100)->create();
    }
}
