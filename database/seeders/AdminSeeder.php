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
            'war_name' => 'Sistema',
            'rank_degree_id' => 0,
            'combat_arm_id' => 0,
            'section_id' => 1,
            'user_id' => 1,
        ]);
    }
}
