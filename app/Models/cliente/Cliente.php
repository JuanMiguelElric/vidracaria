<?php

namespace App\Models\cliente;

use App\Models\endereco\Endereco;
use App\Models\Funcionario;
use App\Models\OrdemServico;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
            'status','telefone',
            'ativo'
        

    ];

    public function endereco():BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }
    public function ordemdeservicos():HasMany
    {
        return $this->hasMany(OrdemServico::class);
    }
}
