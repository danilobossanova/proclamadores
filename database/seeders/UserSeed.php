<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Danilo',
            'email' => 'danilo.bossanova@hotmail.com',
            'password' => Hash::make('Reino@1914'), // Criptografa a senha
            'congregacao_id' => 1,
            'email_verified_at' => now(), // Opcional: Define o email como verificado
        ]);

        User::create([
            'name' => 'Visitante',
            'email' => 'danilo.fernando@grupocopar.com.br',
            'password' => Hash::make('Reino@1914'), // Criptografa a senha
            'congregacao_id' => 1,
            'email_verified_at' => now(), // Opcional: Define o email como verificado
        ]);
    }
}
