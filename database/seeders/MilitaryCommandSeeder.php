<?php

namespace Database\Seeders;

use App\Models\MilitaryCommand as ModelsMilitaryCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MilitaryCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsMilitaryCommand::create([
            'id' => 1,
            'full_name' => 'Comando Militar do Planalto',
            'short_name' => 'CMP',
            'status' => 1,
        ]);
    }
}
