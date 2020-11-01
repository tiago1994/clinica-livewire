<div>
    @include('components.menu')
    <div class="container mx-auto">
        <h2>Perfil</h2>
        <form wire:submit.prevent="update">
            <input type="text" class="w-1/4 mt-2 px-4 leading-tight py-3 border-solid border-2 border-gray-300" wire:model="user.name" placeholder="Digite o seu nome..." required/>
            <input type="email" class="w-1/4 mt-2 px-4 leading-tight py-3 border-solid border-2 border-gray-300" wire:model="user.email" placeholder="Digite o seu email..." required/>
            <input type="password" class="w-1/4 mt-2 px-4 leading-tight py-3 border-solid border-2 border-gray-300" wire:model="password" placeholder="Digite a sua senha..."/>
            <button class="bg-purple-500 mt-2 bg-transparent hover:bg-purple-800 text-white font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                Atualizar
            </button>
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