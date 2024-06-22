<?php

namespace App\Models\cliente;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "cliente";
    protected $fillable = [
            'nome',
            'sexo',
            'dataNascimento',
            'cpf',
            'endereco',
            'email',
            'status','telefone'
        

    ];

    public function endereco():BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }
}
