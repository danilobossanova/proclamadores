<?php

namespace App\Livewire\Congregacoes;

use App\Models\Congregacao;
use Livewire\Component;

class EditarCongregacao extends Component
{
    public $congregacao_id;
    public $congregacao;
    public $responsavel;
    public $telefone;
    public $dia_reuniao_fds;
    public $hora_reuniao;
    public $endereco;
    public $coordenadas;
    public $googlemaps;

    public function mount($id)
    {
        $congregacao = Congregacao::findOrFail($id);

        // Popula as propriedades com os valores do banco de dados
        $this->congregacao_id = $congregacao->id;
        $this->congregacao = $congregacao->congregacao;
        $this->responsavel = $congregacao->responsavel;
        $this->telefone = $congregacao->telefone;
        $this->dia_reuniao_fds = $congregacao->dia_reuniao_fds;
        $this->hora_reuniao = $congregacao->hora_reuniao;
        $this->endereco = $congregacao->endereco;
        $this->coordenadas = $congregacao->coordenadas;
        $this->googlemaps = $congregacao->googlemaps;
    }

    public function salvar()
    {
        $this->validate([
            'congregacao' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'dia_reuniao_fds' => 'required|string',
            'hora_reuniao' => 'required',
            'endereco' => 'required|string|max:500',
            'coordenadas' => 'nullable|string',
            'googlemaps' => 'nullable|url'
        ]);

        $congregacao = Congregacao::findOrFail($this->congregacao_id);

        // Atualiza os dados no banco
        $congregacao->update([
            'congregacao' => $this->congregacao,
            'responsavel' => $this->responsavel,
            'telefone' => $this->telefone,
            'dia_reuniao_fds' => $this->dia_reuniao_fds,
            'hora_reuniao' => $this->hora_reuniao,
            'endereco' => $this->endereco,
            'coordenadas' => $this->coordenadas,
            'googlemaps' => $this->googlemaps,
        ]);

        session()->flash('message', 'Congregação atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.congregacoes.editar-congregacao')->layout('layouts.app');
    }
}
