<?php

namespace App\Livewire\Congregacoes;

use App\Models\Congregacao;
use Livewire\Component;

class EditarCongregacao extends Component
{
    public Congregacao $congregacao;

    protected function rules()
    {
        return [
            'congregacao' => 'required|min:3|max:255|unique:congregacoes,nome',
            'responsavel' => 'required|min:2|max:100',
            'telefone' => 'required',
            'dia_reuniao_fds' => 'required',
            'hora_reuniao' => 'required',
            'endereco' => 'required|min:5|max:255',
            'coordenadas' => 'required',
            'googlemaps' => 'required'
        ];
    }

    public function mount(Congregacao $congregacao)
    {
        $this->congregacao = $congregacao;
    }

    public function salvar()
    {
        $this->validate();
        $this->congregacao->save();

        session()->flash('message', 'Congregação atualizada com sucesso!');
        return redirect()->route('congregacoes.index');
    }

    public function render()
    {
        return view('livewire.congregacoes.editar-congregacao')->layout('layouts.app');
    }
}
