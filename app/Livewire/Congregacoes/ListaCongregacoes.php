<?php

namespace App\Livewire\Congregacoes;

use App\Models\Congregacao;
use Livewire\Component;
use Livewire\WithPagination;

class ListaCongregacoes extends Component
{
    use WithPagination;

    public $search = '';
    public $confirmingDelete = false;
    public $congregacaoToDelete;

    public $showFilters = false;

    public $filterDia = '';
    public $filterHorario = '';


    public function toggleFilters()
    {
        $this->showFilters = !$this->showFilters;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function limparFiltros()
    {
        $this->reset(['search', 'filterDia', 'filterHorario']);
        $this->resetPage();
    }

    public function render()
    {


        $query = Congregacao::query();

        if ($this->search) {
            $query->where('congregacao', 'like', "%{$this->search}%");
        }

        if ($this->filterDia) {
            $query->where('dia_reuniao_fds', $this->filterDia);
        }

        if ($this->filterHorario) {
            $query->when($this->filterHorario === 'manha', function($q) {
                $q->whereTime('hora_reuniao', '>=', '06:00:00')
                    ->whereTime('hora_reuniao', '<=', '11:59:59');
            })->when($this->filterHorario === 'tarde', function($q) {
                $q->whereTime('hora_reuniao', '>=', '12:00:00')
                    ->whereTime('hora_reuniao', '<=', '17:59:59');
            })->when($this->filterHorario === 'noite', function($q) {
                $q->whereTime('hora_reuniao', '>=', '18:00:00');
            });
        }

        $congregacoes = $query->paginate(10);



        return view('livewire.congregacoes.lista-congregacoes', compact('congregacoes'))->layout('layouts.app');
    }

    public function confirmarDelete(Congregacao $congregacao)
    {
        $this->congregacaoToDelete = $congregacao;
        $this->confirmingDelete = true;
    }

    public function deletar()
    {
        $this->congregacaoToDelete->delete();
        $this->confirmingDelete = false;
        session()->flash('message', 'Congregação excluída com sucesso.');
    }


    public function exportar()
    {
        $congregacoes = Congregacao::all();

        // Criar a string de conteúdo no formato CSV
        $txt = "Nome,Responsavel,Telefone,Dia,Horario,Endereco\n";

        foreach ($congregacoes as $congregacao) {
            $linha = "{$congregacao->congregacao},{$congregacao->responsavel},{$congregacao->telefone},";
            $linha .= "{$congregacao->dia_reuniao_fds},{$congregacao->hora_reuniao},{$congregacao->endereco}\n";
            $txt .= $linha;
        }

        // Retornar um arquivo .txt para download
        return response()->streamDownload(function () use ($txt) {
            echo $txt;
        }, 'congregacoes.txt');
    }



}
