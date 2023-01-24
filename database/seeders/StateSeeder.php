<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'id' => 1,
            'full_name' => 'Acre',
            'short_name' => 'AC',
            'status' => 1,
        ]);
        State::create([
            'id' => 2,
            'full_name' => 'Alagoas',
            'short_name' => 'AL',
            'status' => 1,
        ]);
        State::create([
            'id' => 3,
            'full_name' => 'Amapá',
            'short_name' => 'AP',
            'status' => 1,
        ]);
        State::create([
            'id' => 4,
            'full_name' => 'Amazonas',
            'short_name' => 'AM',
            'status' => 1,
        ]);
        State::create([
            'id' => 5,
            'full_name' => 'Bahia',
            'short_name' => 'BA',
            'status' => 1,
        ]);
        State::create([
            'id' => 6,
            'full_name' => 'Ceará',
            'short_name' => 'CE',
            'status' => 1,
        ]);
        State::create([
            'id' => 7,
            'full_name' => 'Distrito Federal',
            'short_name' => 'DF',
            'status' => 1,
        ]);
        State::create([
            'id' => 8,
            'full_name' => 'Espírito Santo',
            'short_name' => 'ES',
            'status' => 1,
        ]);
        State::create([
            'id' => 9,
            'full_name' => 'Goiás',
            'short_name' => 'GO',
            'status' => 1,
        ]);
        State::create([
            'id' => 10,
            'full_name' => 'Maranhão',
            'short_name' => 'MA',
            'status' => 1,
        ]);
        State::create([
            'id' => 11,
            'full_name' => 'Mato Grosso',
            'short_name' => 'MT',
            'status' => 1,
        ]);
        State::create([
            'id' => 12,
            'full_name' => 'Mato Grosso do Sul',
            'short_name' => 'MS',
            'status' => 1,
        ]);
        State::create([
            'id' => 13,
            'full_name' => 'Minas Gerais',
            'short_name' => 'MG',
            'status' => 1,
        ]);
        State::create([
            'id' => 14,
            'full_name' => 'Pará',
            'short_name' => 'PA',
            'status' => 1,
        ]);
        State::create([
            'id' => 15,
            'full_name' => 'Paraíba',
            'short_name' => 'PB',
            'status' => 1,
        ]);
        State::create([
            'id' => 16,
            'full_name' => 'Paraná',
            'short_name' => 'PR',
            'status' => 1,
        ]);
        State::create([
            'id' => 17,
            'full_name' => 'Pernambuco',
            'short_name' => 'PE',
            'status' => 1,
        ]);
        State::create([
            'id' => 18,
            'full_name' => 'Piauí',
            'short_name' => 'PI',
            'status' => 1,
        ]);
        State::create([
            'id' => 19,
            'full_name' => 'Rio de Janeiro',
            'short_name' => 'RJ',
            'status' => 1,
        ]);
        State::create([
            'id' => 20,
            'full_name' => 'Rio Grande do Norte',
            'short_name' => 'RN',
            'status' => 1,
        ]);
        State::create([
            'id' => 21,
            'full_name' => 'Rio Grande do Sul',
            'short_name' => 'RS',
            'status' => 1,
        ]);
        State::create([
            'id' => 22,
            'full_name' => 'Rondônia',
            'short_name' => 'RO',
            'status' => 1,
        ]);
        State::create([
            'id' => 23,
            'full_name' => 'Roraima',
            'short_name' => 'RR',
            'status' => 1,
        ]);
        State::create([
            'id' => 24,
            'full_name' => 'Santa Catarina',
            'short_name' => 'SC',
            'status' => 1,
        ]);
        State::create([
            'id' => 25,
            'full_name' => 'São Paulo',
            'short_name' => 'SP',
            'status' => 1,
        ]);
        State::create([
            'id' => 26,
            'full_name' => 'Sergipe',
            'short_name' => 'SE',
            'status' => 1,
        ]);
        State::create([
            'id' => 27,
            'full_name' => 'Tocantins',
            'short_name' => 'TO',
            'status' => 1,
        ]);
    }
}
