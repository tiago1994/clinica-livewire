<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pacientes extends Component{
    public $pacientes = [];
    
    public function mount(){
        $this->pacientes = [0, 1, 2, 3, 4, 5, 6, 7];
    }

    public function render(){
        return view('livewire.pacientes')->extends('layouts.app');
    }
}
