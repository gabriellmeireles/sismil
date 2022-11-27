<?php

namespace Database\Seeders;

use App\Models\RankDegree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RankDegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RankDegree::create([
            'full_name' => 'Master',
            'short_name' => 'Master'
        ]);
    }
}
