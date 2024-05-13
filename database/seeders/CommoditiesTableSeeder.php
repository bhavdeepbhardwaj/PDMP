<?php

namespace Database\Seeders;

use App\Models\Commodities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commodities::create([
            'port_id' => 0,
            'name' => 'Root',
            'parent_id' => 0,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Liquid Bulk',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Dry Bulk',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Break Bulk',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Container',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Transhippment',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'POL-Crude',
            'parent_id' => 2,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'POL-Products',
            'parent_id' => 2,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'LPG or LNG',
            'parent_id' => 2,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Edible Oil',
            'parent_id' => 2,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'FRM-Liquid',
            'parent_id' => 2,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Iron Ore All',
            'parent_id' => 3,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Pellets',
            'parent_id' => 12,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Fine',
            'parent_id' => 12,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Ores',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Thermal Coal',
            'parent_id' => 3,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Coking Coal',
            'parent_id' => 3,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Coal',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Iron and Steel',
            'parent_id' => 4,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Timber and Log',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'TEUs',
            'parent_id' => 5,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Container Tonnes',
            'parent_id' => 6,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Transhipment',
            'parent_id' => 6,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Liquids',
            'parent_id' => 2,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Fertilizer',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'FRM-Dry',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Food Grains-excluding pulses',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Pulses',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Sugar',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Cement',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Salt',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Iron Scrap',
            'parent_id' => 3,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Dry Bulk',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Tea and Coffee',
            'parent_id' => 4,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Food Grains-excluding pulses',
            'parent_id' => 4,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Pulses',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Sugar',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Cement',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Project Cargo',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Fertilizer',
            'parent_id' => 4,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Automobiles-Tonnes',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Other Break Bulk',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Service rendered to ship',
            'parent_id' => 1,
            'type' => 'Header',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Fresh Water',
            'parent_id' => 43,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Tonnes',
            'parent_id' => 5,
            'type' => 'Principal Commodity',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Fuel',
            'parent_id' => 43,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Others',
            'parent_id' => 43,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Chemicals',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Building Materials',
            'parent_id' => 4,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'POL-Crude',
            'parent_id' => 6,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Container TEUs',
            'parent_id' => 6,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'POL-Products',
            'parent_id' => 6,
            'type' => 'Others',
            'status' => 0,
        ]);

        Commodities::create([
            'port_id' => 0,
            'name' => 'Scrap - LDT',
            'parent_id' => 3,
            'type' => 'Others',
            'status' => 0,
        ]);
    }
}
