<div>
    @include('componentes.menu')
    <div class="container mx-auto mb-5">
        <div class="flex items-center mt-4 mb-1">
            <div class="flex-1">
                <h2 class="text-3xl text-purple-600 font-semibold">Perfil</h2>
            </div>
        </div>
        <form class="w-full mt-3" wire:submit.prevent="update">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Nome
                    </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="user.name" placeholder="Digite o seu nome..." required>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Email
                    </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="user.email" placeholder="Digite o seu email..." required>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Senha
                    </label>
                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="password" placeholder="Digite a sua senha...">
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
        
        @if(!empty($retorno))
            <div class="bg-retorno-100 mt-2 text-center border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">
                    {{$retorno}}
                </strong>
            </div>
        @endif
    </div>
</div>