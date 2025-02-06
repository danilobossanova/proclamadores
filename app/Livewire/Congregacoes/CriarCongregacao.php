<?php

namespace App\Livewire\Congregacoes;

use App\Models\Congregacao;
use Livewire\Component;

class CriarCongregacao extends Component
{

    public $congregacao;
    public $responsavel;

    public $telefone;
    public $endereco;
    public $dia_reuniao_fds;
    public $hora_reuniao;
    public $coordenadas;

    public $googlemaps;


    protected $rules = [
        'congregacao' => 'required|min:3|max:255|unique:congregacoes,congregacao',
        'responsavel' => 'required|min:2|max:100',
        'telefone' => 'required',
        'dia_reuniao_fds' => 'required',
        'hora_reuniao' => 'required',
        'endereco' => 'required|min:5|max:255',
        'coordenadas' => 'required',
        'googlemaps' => 'required'
    ];

    public function salvar()
    {
        $this->validate();

        Congregacao::create([
            'congregacao' => $this->congregacao,
            'responsavel' => $this->responsavel,
            'telefone' => $this->telefone,
            'dia_reuniao_fds'   => $this->dia_reuniao_fds,
            'hora_reuniao' => $this->hora_reuniao,
            'endereco' => $this->endereco,
            'coordenadas' => $this->coordenadas,
            'googlemaps' => $this->googlemaps

        ]);

        session()->flash('message', 'Congregação criada com sucesso!');
        return redirect()->route('congregacoes.index');
    }

    public function render()
    {
        return view('livewire.congregacoes.criar-congregacao')->layout('layouts.app');
    }
}
