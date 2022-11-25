<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'id' => 1,
            'name' => 'Super Admin',
        ]);
        UserType::create([
            'id' => 2,
            'name' => 'Administrador',
        ]);
        UserType::create([
            'id' => 3,
            'name' => 'Chefe',
        ]);
        UserType::create([
            'id' => 4,
            'name' => 'Adjunto',
        ]);
        UserType::create([
            'id' => 5,
            'name' => 'Avaliador',
        ]);
        UserType::create([
            'id' => 6,
            'name' => 'Auxiliar',
        ]);
        UserType::create([
            'id' => 7,
            'name' => 'Candidato',
        ]);

        

    }
}
