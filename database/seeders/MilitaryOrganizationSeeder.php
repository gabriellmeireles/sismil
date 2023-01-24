<?php

namespace Database\Seeders;

use App\Models\MilitaryOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MilitaryOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MilitaryOrganization::create([
            'full_name' => 'Comando da 11ª Região Militar',
            'short_name' => 'Cmdo 11ªRM',
            'status' => 1,
            'military_region_id' => 1,
        ]);
    }
}
