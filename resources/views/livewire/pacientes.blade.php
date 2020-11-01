<div>
    @include('componentes.menu')

    <div class="container mx-auto mb-5">
        {{-- Index, quando não existe ação só listagem --}}
        @if($acao == '')
            <div class="flex items-center mt-4 mb-1">
                <div class="flex-1">
                    <h2 class="text-3xl text-purple-600 font-semibold">Pacientes</h2>
                </div>
                <div>
                    <button wire:click="add" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">Adicionar</button>
                </div>
            </div>
            <table class="table-auto w-full mb-2">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-4 py-2 text-left">Paciente</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Data Nascimento</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Data Atendimento</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Genero</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Celular</th>
                        <th class="border border-gray-400 px-4 py-2 text-left">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista_pacientes as $paciente)
                        <tr>
                            <td class="border px-4 py-2">
                                <div class="flex items-center">
                                    <img class="rounded-full w-8 h-8 mr-2 object-cover" src="{{url('storage/'.(!empty($paciente->foto)?$paciente->foto:'sem_imagem.png'))}}" />
                                    {{$paciente->nome}}
                                </div>
                            </td>
                            <td class="border px-4 py-2">{{$paciente->formatarData($paciente->data_nascimento)}}</td>
                            <td class="border px-4 py-2">{{$paciente->formatarData($paciente->data_nascimento)}}</td>
                            <td class="border px-4 py-2 capitalize ">{{$paciente->genero}}</td>
                            <td class="border px-4 py-2">{{$paciente->celular}}</td>
                            <td class="border px-4 py-2">
                                <button wire:click="edit({{$paciente->id}})" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-1 px-2 border border-yellow-500 hover:border-transparent rounded">Editar</button>
                                <button wire:click="open_modal({{$paciente->id}})" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-1 px-2 border border-red-500 hover:border-transparent rounded">Deletar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$lista_pacientes->links()}}
        @endif

        {{-- Pagina para adicionar --}}
        @if($acao == 'add')
            <div class="flex items-center mt-4 mb-1">
                <div class="flex-1">
                    <h2 class="text-3xl text-purple-600 font-semibold">Adicionar Paciente</h2>
                </div>
                <div class="">
                    <button wire:click="index" class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">Voltar</button>
                </div>
            </div>
            <form class="w-full mt-3" wire:submit.prevent="save">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Nome
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o nome..." wire:model="novo_paciente.nome" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Data Nascimento
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a data de nascimento..." wire:model="novo_paciente.data_nascimento" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Telefone
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o telefone..." wire:model="novo_paciente.telefone">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Celular
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o celular..." wire:model="novo_paciente.celular">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Primeira Consulta
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a data da primeira consulta..." wire:model="novo_paciente.primeira_consulta">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Genero
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="novo_paciente.genero" required>
                                <option value="">Selecionar...</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outros">Outros</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Altura
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a altura..." wire:model="novo_paciente.altura" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Peso
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o peso..." wire:model="novo_paciente.peso" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-2/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Foto
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" wire:model="foto">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6 justify-center">
                    <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <button class="bg-green-500 w-full mt-2 bg-transparent hover:bg-green-800 text-white font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                            Adicionar
                        </button>
                    </div>
                </div>
            </form>
        @endif

        {{-- Pagina para editar item --}}
        @if($acao == 'edit')
            <div class="flex items-center mt-4 mb-1">
                <div class="flex-1">
                    <h2 class="text-3xl text-purple-600 font-semibold">Editar Paciente</h2>
                </div>
                <div class="">
                    <button wire:click="index" class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">Voltar</button>
                </div>
            </div>
            <form class="w-full mt-3" wire:submit.prevent="update({{$paciente->id}})">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Nome
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o nome..." wire:model="paciente.nome" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Data Nascimento
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a data de nascimento..." wire:model="paciente.data_nascimento" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Telefone
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o telefone..." wire:model="paciente.telefone">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Celular
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o celular..." wire:model="paciente.celular">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Primeira Consulta
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a data da primeira consulta..." wire:model="paciente.primeira_consulta">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Genero
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="paciente.genero" required>
                                <option value="">Selecionar...</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                                <option value="outros">Outros</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Altura
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite a altura..." wire:model="paciente.altura" required>
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Peso
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Digite o peso..." wire:model="paciente.peso" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-2/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Foto
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file" wire:model="foto">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6 justify-center">
                    <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <button class="bg-green-500 w-full mt-2 bg-transparent hover:bg-green-800 text-white font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                            Atualizar
                        </button>
                    </div>
                </div>
            </form>
        @endif

        {{-- Pagina delete item --}}
        @if($modal_deletar)
            @include('componentes.modal')
        @endif
    </div>
</div>