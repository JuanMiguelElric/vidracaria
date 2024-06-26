<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Servico extends Model
{
    use HasFactory;
    protected $table = "servico";
    protected $fillable =[
        'nome',
        'descricao',
        'valor',
           'ativo'
    ];
    public function ordemdesericos():HasMany
    {
        return $this->hasMany(OrdemServico::class);
    }
}
