<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component{
    public $email = '';
    public $password = '';
    public $retorno = '';

    public function login(){
        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            return redirect()->route('dashboard');
        }else {        
            $this->retorno = 'Email ou senha não conferem.';
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
    public function render(){
        return view('livewire.login')->extends('layouts.app');
    }
}
