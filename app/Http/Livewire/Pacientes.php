<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Paciente;

class Pacientes extends Component{
    use WithFileUploads;
    use WithPagination;

    public $pacientes;
    public Paciente $paciente;
    public $novo_paciente;
    public $foto;
    public $item_deletar;
    public $acao = '';
    public $modal_deletar = false;

    protected $rules = [
        'paciente.nome' => 'required|string|max:100',
        'paciente.data_nascimento' => 'required|string|max:100',
        'paciente.telefone' => 'string|max:100',
        'paciente.celular' => 'string|max:100',
        'paciente.primeira_consulta' => 'string|max:100',
        'paciente.genero' => 'required|string|max:100',
        'paciente.altura' => 'required|string|max:100',
        'paciente.peso' => 'required|string|max:100',
    ];

    public function mount(){
        $this->index();
    }

    public function index(){
        $this->acao = '';
        $this->novo_paciente = '';
        $this->foto = '';
        $this->item_deletar = '';
        $this->modal_deletar = false;
    }
    
    public function add(){
        $this->acao = 'add';
    }
    
    public function save(){
        $this->novo_paciente['data_nascimento'] = date('Y-m-d', strtotime($this->novo_paciente['data_nascimento']));
        $this->novo_paciente['primeira_consulta'] = date('Y-m-d', strtotime($this->novo_paciente['primeira_consulta']));
        $novo = Paciente::create($this->novo_paciente);
        if($this->foto){
            $nome_foto = md5($this->foto . microtime()).'.'.$this->foto->extension();
            $this->foto->storeAs('public', $nome_foto);
            $novo->foto = $nome_foto;
            $novo->save(); 
        }

        $this->index();
    }
    
    public function edit($id){
        $this->acao = 'edit';
        $this->paciente = Paciente::find($id);
        $this->paciente['data_nascimento'] = date('d/m/Y', strtotime($this->paciente['data_nascimento']));
        $this->paciente['primeira_consulta'] = date('d/m/Y', strtotime($this->paciente['primeira_consulta']));
    }
    
    public function update($id){
        $this->paciente['data_nascimento'] = date('Y-m-d', strtotime($this->paciente['data_nascimento']));
        $this->paciente['primeira_consulta'] = date('Y-m-d', strtotime($this->paciente['primeira_consulta']));
        if($this->foto){
            $nome_foto = md5($this->foto . microtime()).'.'.$this->foto->extension();
            $this->foto->storeAs('public', $nome_foto);
            $this->paciente['foto'] = $nome_foto;
        }
        $this->paciente->save();
        
        $this->index();
    }

    public function open_modal($id){
        $this->item_deletar = $id;
        $this->modal_deletar = true;
    }
    
    public function close_modal(){
        $this->item_deletar = '';
        $this->modal_deletar = false;
    }

    public function delete(){
        Paciente::find($this->item_deletar)->delete();
        $this->index();
    }

    public function render(){
        $lista_pacientes = Paciente::paginate(10);
        return view('livewire.pacientes', ['lista_pacientes' => $lista_pacientes])->extends('layouts.app');
    }
}
