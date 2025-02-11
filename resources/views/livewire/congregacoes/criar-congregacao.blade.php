<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white shadow-xl rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Nova Congregação</h2>

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
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-blue-950 font-bold py-2 px-4 rounded-lg shadow">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para máscara de telefone -->
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
