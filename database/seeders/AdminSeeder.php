<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'war_name' => 'Adm Sistema',
            'rank_degree_id' => 1,
            'combat_arm_id' => 1,
            'section_id' => 1,
            'user_id' => 1,
        ]);
    }
}
