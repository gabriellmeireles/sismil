<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador do Sistema',
            'cpf' => '00000000000',
            'email' => 'dev@11rm.eb.mil.br',
            'password' => Hash::make('123456'),
            'status' => 1,
            'user_type_id' => 1,
            'email_verified_at' => now(),
        ]);
    }
}
