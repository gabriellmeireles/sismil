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
            'id' => 1,
            'full_name' => 'Administrador',
            'short_name' => 'Admin'
        ]);
        RankDegree::create([
            'full_name' => 'Coronel',
            'short_name' => 'Cel',
        ]);
        RankDegree::create([
            'full_name' => 'Tenente Coronel',
            'short_name' => 'TC'
        ]);
        RankDegree::create([
            'full_name' => 'Major',
            'short_name' => 'Maj'
        ]);
        RankDegree::create([
            'full_name' => 'Capitão',
            'short_name' => 'Cap'
        ]);
        RankDegree::create([
            'full_name' => '1º Tenente',
            'short_name' => '1º Ten'
        ]);
        RankDegree::create([
            'full_name' => '2º Tenente',
            'short_name' => '2º Ten'
        ]);
        RankDegree::create([
            'full_name' => 'Aspirante',
            'short_name' => 'Asp Of'
        ]);
        RankDegree::create([
            'full_name' => 'Subtenente ',
            'short_name' => 'ST'
        ]);
        RankDegree::create([
            'full_name' => '1º Sargento ',
            'short_name' => '1º Sgt'
        ]);
        RankDegree::create([
            'full_name' => '2º Sargento ',
            'short_name' => '2º Sgt'
        ]);
        RankDegree::create([
            'full_name' => '3º Sargento ',
            'short_name' => '2º Sgt'
        ]);
        RankDegree::create([
            'full_name' => 'Cabo',
            'short_name' => 'Cb'
        ]);
        RankDegree::create([
            'full_name' => 'Soldado',
            'short_name' => 'Sd'
        ]);
        RankDegree::create([
            'full_name' => 'Taifeiro Mor',
            'short_name' => 'TM'
        ]);
        RankDegree::create([
            'full_name' => 'Taifeiro 1ª Classe',
            'short_name' => 'T1'
        ]);
        RankDegree::create([
            'full_name' => 'Taifeiro 2ª Classe',
            'short_name' => 'T2'
        ]);

        RankDegree::where('id', 1)->update(['id' => 0]);
    }
}
