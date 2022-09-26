<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = ["cpf","nome","carteira_trabalho","setor_id","telefone_1","telefone_2"];

    

    public function rules(){
        
        return [
            "nome" => "required|min:8|max:200",
            "cpf" => ["required","formato_cpf",Rule::unique('funcionarios')->ignore($this->id)],
            "carteira_trabalho" => "required|formato_pis",
            "setor_id" => "required|exists:setores,id",
            "telefone_1" => "required|celular_com_ddd",
            "telefone_2" => "nullable|celular_com_ddd"

        ];
    }

    public function feedback(){
        return [
            "nome.required" => "O nome não pode ser vazio",
            "cpf.required" => "O cpf não pode ser vazio",
            "carteira_trabalho.required" => "O PIS não pode ser vazio",
            "setor_id.required" => "O setor não pode ser vazio",
            "telefone_1.required" => "O telefone não pode ser vazio",
            "nome.min" => "O nome precisa conter no mínimo 8 caracteres",
            "telefone_1.celular_com_ddd" => "Insira um telefone válido",
            "telefone_2.celular_com_ddd" => "Insira um telefone válido",
            "nome.max" => "O nome só pode conter no máximo 200 caracteres",
            "cpf.formato_cpf" => "Insira um CPF válido",
            "carteira_trabalho.formato_pis" => "Insira um PIS válido",
            "cpf.unique" => "O CPF que você inseriu já está cadastrado",
            "setor_exists" => "Insira um setor existente"
        ];
    }

    public function setor(){
        return $this->belongsTo(Setor::class);
    }
}
