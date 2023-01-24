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
            'id' => 1,
            'full_name' => 'Desenvolvedor',
            'short_name' => 'Dev',
        ]);
        CombatArm::create([
            'full_name' => 'Infantaria',
            'short_name' => 'INF',
        ]);
        CombatArm::create([
            'full_name' => 'Cavalaria',
            'short_name' => 'CAV',
        ]);
        CombatArm::create([
            'full_name' => 'Artilharia',
            'short_name' => 'ART',
        ]);
        CombatArm::create([
            'full_name' => 'Engenharia',
            'short_name' => 'ENG',
        ]);
        CombatArm::create([
            'full_name' => 'Comunicação',
            'short_name' => 'COM',
        ]);
        CombatArm::create([
            'full_name' => 'Quadro do Material Bélico',
            'short_name' => 'MAT BEL',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço Intendência',
            'short_name' => 'INT',
        ]);
        CombatArm::create([
            'full_name' => 'Quadro de Engenheiro Militar',
            'short_name' => 'QEM',
        ]);
        CombatArm::create([
            'full_name' => 'Aviação do Exército',
            'short_name' => 'AV EX',
        ]);
        CombatArm::create([
            'full_name' => 'Quadro Auxiliar de Oficiais',
            'short_name' => 'QAO',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Saúde - Médico',
            'short_name' => 'SAU',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Saúde - Dentista',
            'short_name' => 'SAU',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Saúde - Farmacêutico',
            'short_name' => 'SAU',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Saúde - Enfermagem',
            'short_name' => 'SAU',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Veterinária - Veterinário',
            'short_name' => 'VET',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Assistência Religiosa do Exército - Capelão Militar Católico',
            'short_name' => 'SAREX',
        ]);
        CombatArm::create([
            'full_name' => 'Serviço de Assistência Religiosa do Exército - Capelão Militar Protestante',
            'short_name' => 'SAREX',
        ]);
        CombatArm::create([
            'full_name' => 'Quadro Complementar de Oficiais',
            'short_name' => 'QCO',
        ]);
        CombatArm::create([
            'full_name' => 'Oficial Técnico Temporário',
            'short_name' => 'OTT',
        ]);
        CombatArm::create([
            'full_name' => 'Quadro Especial',
            'short_name' => 'QE',
        ]);
        CombatArm::create([
            'full_name' => 'Sargento Técnico Temporário',
            'short_name' => 'STT',
        ]);





        CombatArm::where('id', 1)->update(['id' => 0]);
    }
}
