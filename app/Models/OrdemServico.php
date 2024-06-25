<?php

namespace App\Models;

use App\Models\cliente\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrdemServico extends Model
{
    use HasFactory;
    protected $table = "ordem_de_servico";
    protected $fillable = [
            'dataServico',
            'prazo',
            'valor',
            'servico',
            'funcionario',
            'cliente',
            'produto'
    ];
    public function funcionario():BelongsTo
    {
        return $this->belongsTo(Funcionario::class);
    }
    public function servico():BelongsTo
    {
        return $this->belongsTo(Servico::class);

    }
    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
    public function produto():BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
