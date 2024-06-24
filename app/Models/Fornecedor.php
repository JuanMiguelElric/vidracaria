<?php

namespace App\Models;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = "fornecedor";
    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
        'telefone',
        'email'
    ];
    public function endereco():BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }
}
