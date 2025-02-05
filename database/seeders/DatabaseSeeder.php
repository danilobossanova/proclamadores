<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CongregacoesSeed::class, // Primeiro o seeder de Congregações
            UserSeed::class,         // Depois o seeder de Usuários
            DiscursosSeeder::class  // Discursos
        ]);
    }
}
