<?php

namespace App\Livewire\Componentes;

use Livewire\Component;

class FiltroPainel extends Component
{
    public $titulo;
    public $rotaNovo;
    public $showFilters = false;
    public $filters = [];
    public $search = '';
    public $searchFields = []; // Define os campos onde a busca será aplicada
    public $queryModel; // O nome do modelo Eloquent que será usado na busca

    public function toggleFilters()
    {
        $this->showFilters = !$this->showFilters;
    }

    public function limparFiltros()
    {
        $this->search = ''; // Limpa a busca
        foreach ($this->filters as $key => $value) {
            $this->filters[$key] = ''; // Reseta os filtros
        }
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reseta a paginação ao mudar a busca
    }

    public function buscarResultados()
    {
        if (!$this->queryModel || empty($this->searchFields)) {
            return collect([]); // Se não houver modelo ou campos de busca, retorna uma coleção vazia
        }

        $query = $this->queryModel::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                foreach ($this->searchFields as $field) {
                    $q->orWhere($field, 'like', "%{$this->search}%");
                }
            });
        }

        return $query->get();
    }

    public function render()
    {
        return view('livewire.componentes.filtro-painel', [
            'resultados' => $this->buscarResultados(),
        ]);
    }
}
