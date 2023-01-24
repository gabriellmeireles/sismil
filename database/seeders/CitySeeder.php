<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'full_name' => 'Brasília',
            'status' => 1,
            'state_id' => 7,
        ]);
        City::create([
            'full_name' => 'Cristalina',
            'status' => 1,
            'state_id' => 9,
        ]);
        City::create([
            'full_name' => 'Goiânia',
            'status' => 1,
            'state_id' => 9,
        ]);
        City::create([
            'full_name' => 'Ipameri',
            'status' => 1,
            'state_id' => 9,
        ]);
        City::create([
            'full_name' => 'Jataí',
            'status' => 1,
            'state_id' => 9,
        ]);
        City::create([
            'full_name' => 'Formosa',
            'status' => 1,
            'state_id' => 9,
        ]);
        City::create([
            'full_name' => 'Araguari',
            'status' => 1,
            'state_id' => 13,
        ]);
        City::create([
            'full_name' => 'Uberlândia',
            'status' => 1,
            'state_id' => 13,
        ]);
        City::create([
            'full_name' => 'Palmas',
            'status' => 1,
            'state_id' => 27,
        ]);
    }
}
