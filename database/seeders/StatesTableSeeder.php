<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        State::create([
            'name' => 'Andhra Pradesh',
        ]);

        State::create([
            'name' => 'Arunachal Pradesh',
        ]);

        State::create([
            'name' => 'Andaman and Nicobar Islands',
        ]);

        State::create([
            'name' => 'Assam',
        ]);

        State::create([
            'name' => 'Bihar',
        ]);

        State::create([
            'name' => 'Chandigarh',
        ]);

        State::create([
            'name' => 'Chhattisgarh',
        ]);

        State::create([
            'name' => 'Dadar and Nagar Haveli',
        ]);

        State::create([
            'name' => 'Daman and Diu',
        ]);

        State::create([
            'name' => 'Delhi',
        ]);

        State::create([
            'name' => 'Goa',
        ]);

        State::create([
            'name' => 'Gujarat',
        ]);

        State::create([
            'name' => 'Haryana',
        ]);

        State::create([
            'name' => 'Himachal Pradesh',
        ]);

        State::create([
            'name' => 'Jammu Kashmir',
        ]);

        State::create([
            'name' => 'Jharkhand',
        ]);

        State::create([
            'name' => 'Karnataka',
        ]);

        State::create([
            'name' => 'Kerala',
        ]);

        State::create([
            'name' => 'Lakshadeep',
        ]);

        State::create([
            'name' => 'Madhya Pradesh',
        ]);

        State::create([
            'name' => 'Maharashtra',
        ]);

        State::create([
            'name' => 'Manipur',
        ]);

        State::create([
            'name' => 'Meghalaya',
        ]);

        State::create([
            'name' => 'Mizoram',
        ]);

        State::create([
            'name' => 'Nagaland',
        ]);

        State::create([
            'name' => 'Odisha',
        ]);

        State::create([
            'name' => 'Pondicherry',
        ]);

        State::create([
            'name' => 'Punjab',
        ]);

        State::create([
            'name' => 'Rajasthan',
        ]);

        State::create([
            'name' => 'Sikkim',
        ]);

        State::create([
            'name' => 'Tamil Nadu',
        ]);

        State::create([
            'name' => 'Telangana',
        ]);

        State::create([
            'name' => 'Tripura',
        ]);

        State::create([
            'name' => 'Uttaranchal',
        ]);

        State::create([
            'name' => 'Uttar Pradesh',
        ]);

        State::create([
            'name' => 'Uttarakhand',
        ]);

        State::create([
            'name' => 'West Bengal',
        ]);
    }
}
