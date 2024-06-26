<?php

namespace App\Models;

use App\Models\endereco\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

use function PHPUnit\Framework\returnSelf;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produto';
    protected $fillable = [
        'nome',
        'fornecedor',
        'descricao',
        'categoria',
        'dataCompra',
        'qtdProduto',
        'preco',
        'unidadeMedida',
           'ativo'

    ];

    public function fornecedor():BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
        
    }
    public function ordemdeservicos():HasMany{
        return $this->hasMany(OrdemServico::class);
    }

}
