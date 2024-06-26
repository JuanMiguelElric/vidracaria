<?php

namespace App\Models;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = "fornecedor";
    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'telefone',
        'email',
           'ativo'
    ];
    public function endereco():BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }
    public function produtos():HasMany
    {
        return $this->hasMany(Produto::class);
        
    }
}
