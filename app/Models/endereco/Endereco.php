<?php

namespace App\Models\endereco;

use App\Models\cliente\Cliente;
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
        'complemento'
    ];

    public function clientes():HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}
