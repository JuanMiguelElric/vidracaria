<?php

namespace App\Models;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionario';
    protected $fillable = [
        'nome',
        'dataNascimento',
        'cpf',
        'endereco',
        'telefone',
        'email',
        'funcao'
    ];
    public function endereco():BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }
}
