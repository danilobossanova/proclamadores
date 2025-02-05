<?php

namespace App\Console\Commands;

use App\Models\Congregacao;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {--admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Criar novo usuário no sistema';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Nome do usuário:');
        $email = $this->ask('Email:');
        $password = $this->secret('Senha:');

        $congregacoes = Congregacao::all();
        $congregacao = $this->choice(
            'Selecione a congregação:',
            $congregacoes->pluck('congregacao', 'id')->toArray()
        );

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'congregacao_id' => $congregacao ,
            'is_admin' => $this->option('admin')
        ]);

        $this->info('Usuário criado com sucesso!');
    }
}
