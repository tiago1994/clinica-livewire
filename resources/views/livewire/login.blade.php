<div class="h-full flex items-center justify-center">
    <div class="w-1/3 bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-purple-500 text-4xl text-center">Login</h1>
        <form wire:submit.prevent="login">
            <input type="email" class="w-full mt-2 px-4 leading-tight py-3 border-solid border-2 border-gray-300" wire:model="email" placeholder="Digite o seu email..." required/>
            <input type="password" class="w-full mt-2 px-4 leading-tight py-3 border-solid border-2 border-gray-300" wire:model="password" placeholder="Digite a sua senha..." required/>
            <button class="w-full bg-purple-500 mt-2 bg-transparent hover:bg-purple-800 text-white font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                Login
            </button>
            @if(!empty($retorno))
                <div class="bg-red-100 mt-2 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">
                        {{$retorno}}
                    </strong>
                </div>
            @endif
        </form>
    </div>
</div>