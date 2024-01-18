<?php

namespace Database\Seeders;

use App\Models\StateBoard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateBoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StateBoard::create([
            'state_id' => '1',
            'name' => 'Directorate Of Port Govt Of AP',
        ]);

        StateBoard::create([
            'state_id' => '3',
            'name' => 'Port Management Board A N',
        ]);

        StateBoard::create([
            'state_id' => '11',
            'name' => 'Capt of Ports GOVT OF GOA',
        ]);

        StateBoard::create([
            'state_id' => '12',
            'name' => 'Gujarat Maritime Board',
        ]);

        StateBoard::create([
            'state_id' => '17',
            'name' => 'Directorate Of Ports Karnataka',
        ]);

        StateBoard::create([
            'state_id' => '18',
            'name' => 'Director Of Ports Govt Kerala',
        ]);

        StateBoard::create([
            'state_id' => '21',
            'name' => 'Maharashtra Maritime Board',
        ]);

        StateBoard::create([
            'state_id' => '26',
            'name' => 'Directorate Of Ports Odisha',
        ]);

        StateBoard::create([
            'state_id' => '27',
            'name' => 'Director of Ports Puducherry',
        ]);

        StateBoard::create([
            'state_id' => '31',
            'name' => 'Tamil Nadu Maritime Board ',
        ]);

        StateBoard::create([
            'state_id' => '9',
            'name' => 'UT AD Of Daman',
        ]);

        StateBoard::create([
            'state_id' => '9',
            'name' => 'UT ADM Of Diu',
        ]);

        StateBoard::create([
            'state_id' => '19',
            'name' => 'Director Port Lakshadeep',
        ]);
    }
}
