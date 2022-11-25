<?php

namespace Database\Seeders;

use App\Models\CombatArm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CombatArmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CombatArm::create([
            'full_name' => 'Desenvolvedor',
            'short_name' => 'Dev',
        ]);
    }
}
