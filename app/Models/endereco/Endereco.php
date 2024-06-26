<?php

namespace App\Models\endereco;

use App\Models\cliente\Cliente;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endereco extends Model
{
    use HasFactory;

    protected $table = "endereco";
    protected $fillable =[
        'rua',
        'numero',
        'estado',
        'cidade',
        'cep',
        'complemento',
           'ativo'
    ];

    public function clientes():HasMany
    {
        return $this->hasMany(Cliente::class);
    }
    public function fornecedores():HasMany
    {
        return $this->hasMany(Fornecedor::class);
    }
    public function funcionarios():HasMany
    {
        return $this->hasMany(Funcionario::class);
    }
}
