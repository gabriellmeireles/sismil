<?php

namespace Database\Seeders;

use App\Models\MilitaryRegion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MilitaryRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MilitaryRegion::create([
            'id' => 1,
            'full_name' => '11ª Região Militar',
            'short_name' => '11ªRM',
            'status' => 1,
            'military_command_id' => 1,
        ]);
    }
}
