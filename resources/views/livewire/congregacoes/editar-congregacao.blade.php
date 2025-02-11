<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white shadow-xl rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Editar Congregação</h2>

            <!-- Alerta de sucesso -->
            @if (session()->has('message'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="salvar">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Nome da Congregação -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Nome da Congregação</label>
                        <input type="text" wire:model="congregacao"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Ex: Jardim América">
                        @error('congregacao') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Responsável -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Responsável</label>
                        <input type="text" wire:model="responsavel"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Nome do responsável">
                        @error('responsavel') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Telefone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" wire:model="telefone" id="telefone"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="(62) 99999-9999">
                        @error('telefone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Dia da Reunião -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dia da Reunião</label>
                        <select wire:model="dia_reuniao_fds"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Selecione...</option>
                            <option value="Sabado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                        @error('dia_reuniao_fds') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Horário da Reunião -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Horário</label>
                        <input type="time" wire:model="hora_reuniao"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('hora_reuniao') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Endereço -->
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" wire:model="endereco"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Rua, número, bairro, cidade">
                        @error('endereco') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Coordenadas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Coordenadas</label>
                        <input type="text" wire:model="coordenadas"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="-16.6789, -49.2533">
                        @error('coordenadas') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Link Google Maps -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Link Google Maps</label>
                        <input type="text" wire:model="googlemaps"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               placeholder="https://maps.google.com/...">
                        @error('googlemaps') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex justify-end mt-6">
                    <!-- Botão para ir para a listagem de todas as congregações -->
                    <a href="{{ route('congregacoes.index') }}"
                       class="bg-gray-500 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
                        </svg>

                    </a>

                    <!-- Botão para atualizar -->
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-green-900 font-bold py-2 px-4 rounded-lg shadow transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                        </svg>


                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let telefoneInput = document.getElementById('telefone');
        telefoneInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) value = value.substring(0, 11);
            value = value.replace(/^(\d{2})(\d)/g, "($1) $2");
            value = value.replace(/(\d{5})(\d)/, "$1-$2");
            e.target.value = value;
        });
    });
</script>
