<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model{
    use HasFactory;

    protected $fillable = ['nome', 'data_nascimento', 'primeira_consulta', 'genero', 'altura', 'peso', 'telefone', 'celular'];

    public function formatarData($data){
        return date('d/m/Y', strtotime($data));
    }
}