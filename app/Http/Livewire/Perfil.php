<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;

class Perfil extends Component{
    public User $user;
    public $password = '';
    public $retorno = '';

    protected $rules = [
        'user.name' => 'required|string|max:100',
        'user.email' => 'required|string|min:6'
    ];

    
    public function mount(){
        $this->user = Auth::user();
    }

    public function update(){
        $this->validate();
        if($this->password != ''){
            $this->user->password = Hash::make($this->password);
            $this->user->save();
        }else{
            $this->user->save();
        }

        $this->retorno = 'Perfil atualizado com sucesso!';
    }

    public function render(){
        return view('livewire.perfil')->extends('layouts.app');
    }
}
