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

    public $perPage = 10;

    public $mostrarDeletados = false;




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

        // Inicia a query
        $query = Congregacao::query();

        if ($this->mostrarDeletados) {
            $query->onlyTrashed(); // Mostra apenas os deletados
        }


        // Aplica a busca pelo nome da congregação (insensível a maiúsculas e minúsculas)
        if (!empty($this->search)) {
            $query->whereRaw("LOWER(congregacao) LIKE LOWER(?)", ["%{$this->search}%"]);
        }

        // Filtro pelo dia de reunião
        if (!empty($this->filterDia)) {
            $query->where('dia_reuniao_fds', $this->filterDia);
        }

        // Filtro por horário da reunião
        if (!empty($this->filterHorario)) {
            $query->when($this->filterHorario === 'manha', fn($q) =>
            $q->whereTime('hora_reuniao', '>=', '06:00:00')->whereTime('hora_reuniao', '<=', '11:59:59')
            )
                ->when($this->filterHorario === 'tarde', fn($q) =>
                $q->whereTime('hora_reuniao', '>=', '12:00:00')->whereTime('hora_reuniao', '<=', '17:59:59')
                )
                ->when($this->filterHorario === 'noite', fn($q) =>
                $q->whereTime('hora_reuniao', '>=', '18:00:00')
                );
        }

        $congregacoes = $query->paginate($this->perPage);



        return view('livewire.congregacoes.lista-congregacoes', compact('congregacoes'))->layout('layouts.app');
    }

    public function confirmarDelete(Congregacao $congregacao)
    {
        $this->congregacaoToDelete = $congregacao;
        $this->confirmingDelete = true;
    }

    public function deletar()
    {
        if (!$this->congregacaoToDelete) {
            session()->flash('error', 'Nenhuma congregação selecionada para exclusão.');
            return;
        }

        $this->congregacaoToDelete->delete();
        $this->confirmingDelete = false;
        session()->flash('message', 'Congregação excluída com sucesso.');
    }


    public function exportar()
    {
        $congregacoes = Congregacao::all();

        $csvHeader = ["congregacao", "Responsável", "Telefone", "Dia", "Horário", "Endereço"];
        $csvData = $congregacoes->map(fn($c) => [
            $c->congregacao,
            $c->responsavel,
            $c->telefone,
            $c->dia_reuniao_fds,
            $c->hora_reuniao,
            $c->endereco
        ]);

        $fileName = 'congregacoes_' . now()->format('Y-m-d_His') . '.csv';

        return response()->streamDownload(function () use ($csvHeader, $csvData) {
            $output = fopen('php://output', 'w');
            fputcsv($output, $csvHeader); // Cabeçalho do CSV

            foreach ($csvData as $row) {
                fputcsv($output, $row);
            }

            fclose($output);
        }, $fileName);
    }

    public function restaurar($id)
    {
        $congregacao = Congregacao::withTrashed()->find($id);

        if ($congregacao && $congregacao->trashed()) {
            $congregacao->restore();
            session()->flash('message', 'Congregação restaurada com sucesso.');
        } else {
            session()->flash('error', 'Congregação não encontrada ou já restaurada.');
        }
    }


}
