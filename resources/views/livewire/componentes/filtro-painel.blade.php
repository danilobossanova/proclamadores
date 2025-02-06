<div>
    <!-- Botões de Ação -->
    <div class="flex justify-between items-center mb-4">
        <!-- Botão Novo -->
        <a href="{{ $rotaNovo }}"
           class="flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            {{ $titulo }}
        </a>

        <div class="flex space-x-4">
            <!-- Botão "Filtros Avançados" -->
            <button wire:click="toggleFilters"
                    class="flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-gray-700 transition duration-200">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12A3 3 0 119 12a3 3 0 016 0zm6 0c0 4.418-7 8-7 8s-7-3.582-7-8 7-8 7-8 7 3.582 7 8z"/>
                </svg>
                Filtros Avançados
            </button>

            <!-- Botão "Exportar" -->
            <button wire:click="exportar"
                    class="flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m-4-4l4 4m0 0l4-4"/>
                </svg>
                Exportar
            </button>
        </div>
    </div>

    <!-- Painel de Filtros -->
    <div x-data="{ showFilters: @entangle('showFilters') }">
        <div x-show="showFilters"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             x-cloak
             class="mb-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4">
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                <!-- Campo de Busca -->
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input wire:model.debounce.500ms="search" type="search"
                               class="w-full pl-8 pr-3 py-2 text-sm rounded-md border-gray-300 focus:ring-blue-500"
                               placeholder="Buscar...">
                    </div>
                </div>

                @foreach($filters as $key => $placeholder)
                    <div class="min-w-[180px]">
                        <input wire:model.live="filters.{{ $key }}" type="text"
                               class="w-full px-3 py-2 text-sm rounded-md border-gray-300 focus:ring-blue-500"
                               placeholder="{{ $placeholder }}">
                    </div>
                @endforeach

                <!-- Limpar -->
                <div class="ml-auto">
                    <button wire:click="limparFiltros"
                            class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Exibição dos Resultados da Pesquisa -->
    <div>
        <ul>
            @foreach($resultados as $item)
                <li class="p-2 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                    {{ $item->congregacao ?? $item->nome ?? 'Registro' }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
