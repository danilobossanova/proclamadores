<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CongregacoesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('congregacoes')->insert([
            [
                'id'              => 1,
                'congregacao'     => 'Jardim America',
                'responsavel'     => 'Danilo de Paula',
                'telefone'        => '(62) 98177-4375',
                'dia_reuniao_fds' => 'Domingo',
                'hora_reuniao'    => '09:00',
                'endereco'        => 'Rua C-131, Qd 247 Lt 12, Jardim América, 74255-240 Goiânia/GO',
                'coordenadas'     => '-16.707694 -49.291577',
                'googlemaps'      => 'https://maps.app.goo.gl/tneEz3Zm7i39nXWS7',
                'created_at'      => now(),
                'updated_at'      => now(),
            ],


        ]);
    }

}
