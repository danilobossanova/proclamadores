<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Cabeçalho com busca e botão -->
        <div class="px-4 py-6 sm:px-0">
            <!-- Painel de filtros -->

            <div>
                <!-- Botões de Ação -->
                <div class="flex justify-between items-center mb-4">
                    <!-- Botão Novo -->
                    <a href="{{ route('congregacoes.create') }}"
                       class="flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nova Congregação
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

                        <!-- Botao Mostrar itens deletados  -->
                        <button wire:click="$toggle('mostrarDeletados')"
                                class="flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                <path d="M13 2.75v7.775L4.475 2h7.775a.75.75 0 0 1 .75.75ZM3 13.25V5.475l4.793 4.793L4.28 13.78A.75.75 0 0 1 3 13.25ZM2.22 2.22a.75.75 0 0 1 1.06 0l10.5 10.5a.75.75 0 1 1-1.06 1.06L2.22 3.28a.75.75 0 0 1 0-1.06Z" />
                            </svg>
                            {{ $mostrarDeletados ? 'Voltar para Ativos' : 'Mostrar Deletados' }}
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
                         class="mb-6 bg-gray-800 shadow-sm rounded-lg p-4">
                        <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
                            <!-- Campo de Busca -->
                            <div class="flex-1 min-w-[250px]">
                                <div class="relative">
                                    <input wire:model.debounce.500ms="search" type="search"
                                           class="w-full pl-8 pr-3 py-2 text-sm rounded-md border-gray-600 focus:ring-blue-500 bg-gray-900 text-black placeholder-gray-400"
                                           placeholder="Buscar...">
                                </div>
                            </div>

                            <!-- Filtros Específicos -->
                            <div class="min-w-[180px]">
                                <select wire:model.live="filterDia"
                                        class="w-full px-3 py-2 text-sm rounded-md border-gray-600 focus:ring-blue-500 bg-gray-900 text-black">
                                    <option value="">Selecione o dia...</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
                                </select>
                            </div>

                            <div class="min-w-[180px]">
                                <select wire:model.live="filterHorario"
                                        class="w-full px-3 py-2 text-sm rounded-md border-gray-600 focus:ring-blue-500 bg-gray-900 text-black">
                                    <option value="">Selecione o período...</option>
                                    <option value="manha">Manhã</option>
                                    <option value="tarde">Tarde</option>
                                    <option value="noite">Noite</option>
                                </select>
                            </div>

                            <!-- Limpar -->
                            <div class="ml-auto">
                                <button wire:click="limparFiltros"
                                        class="px-3 py-2 text-sm text-gray-400 hover:text-gray-200">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="flex justify-between mb-4">
                <!-- Botão de alternância -->

            </div>

            <!-- Tabela -->
            <div class="bg-white shadow-xl rounded-lg overflow-hidden">
                <!-- Tabela -->
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                    <table class="w-full divide-y divide-gray-300">
                        <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Congregação</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Responsável</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Telefone</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Dia/Horário</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Endereço</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($congregacoes as $congregacao)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-3 text-sm text-gray-800">{{ $congregacao->congregacao }}</td>
                                <td class="px-6 py-3 text-sm text-gray-800">{{ $congregacao->responsavel }}</td>
                                <td class="px-6 py-3 text-sm text-gray-800">{{ $congregacao->telefone }}</td>
                                <td class="px-6 py-3 text-sm text-gray-800">{{ $congregacao->dia_reuniao_fds }} - {{ $congregacao->hora_reuniao }}</td>
                                <td class="px-6 py-3 text-sm text-gray-800">{{ $congregacao->endereco }}</td>
                                <td class="px-6 py-3 text-center">

                                    <div class="flex justify-center space-x-4">
                                        @if($mostrarDeletados)
                                            <!-- Botão Restaurar -->
                                            <button wire:click="restaurar({{ $congregacao->id }})"
                                                    class="text-green-600 hover:text-green-900 relative group">
                                                🔄
                                                <span class="absolute bottom-full mb-2 w-24 bg-gray-900 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Restaurar
                                                </span>
                                            </button>
                                        @else

                                            <a href="{{ $congregacao->googlemaps }}" target="_blank"
                                               class="text-blue-600 hover:text-blue-900 relative group">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd" d="M5.37 2.257a1.25 1.25 0 0 1 1.214-.054l3.378 1.69 2.133-1.313A1.25 1.25 0 0 1 14 3.644v7.326c0 .434-.225.837-.595 1.065l-2.775 1.708a1.25 1.25 0 0 1-1.214.053l-3.378-1.689-2.133 1.313A1.25 1.25 0 0 1 2 12.354V5.029c0-.434.225-.837.595-1.064L5.37 2.257ZM6 4a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-1.5 0v-4.5A.75.75 0 0 1 6 4Zm4.75 2.75a.75.75 0 0 0-1.5 0v4.5a.75.75 0 0 0 1.5 0v-4.5Z" clip-rule="evenodd" />
                                                </svg>


                                                <span class="absolute bottom-full mb-2 w-32 bg-gray-900 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Ver no Google Maps
                                                </span>
                                            </a>
                                            <a href="{{ route('congregacoes.edit', $congregacao) }}"
                                               class="text-indigo-600 hover:text-indigo-900 relative group">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                    <path d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                                    <path d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                                                </svg>

                                                <span class="absolute bottom-full mb-2 w-24 bg-gray-900 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Editar
                                                </span>
                                            </a>
                                            <button wire:click="confirmarDelete({{ $congregacao->id }})"
                                                    class="text-red-600 hover:text-red-900 relative group">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                                                </svg>

                                                <span class="absolute bottom-full mb-2 w-24 bg-gray-900 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                                    Excluir
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                <!-- Paginação Compacta -->
                <div class="px-2 py-2 bg-gray-50 border-t border-gray-200 dark:border-gray-600 text-sm">
                    {{ $congregacoes->links('pagination::tailwind') }}
                </div>

                </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão -->
    @if($confirmingDelete)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-50">
            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white dark:bg-gray-800 px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900 dark:text-gray-100">Confirmar Exclusão</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Tem certeza que deseja excluir esta congregação? Esta ação não poderá ser desfeita.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button wire:click="deletar" type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                                Excluir
                            </button>
                            <button wire:click="$set('confirmingDelete', false)" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white dark:bg-gray-700 px-3 py-2 text-sm font-semibold text-gray-900 dark:text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 dark:ring-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 sm:mt-0 sm:w-auto">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

