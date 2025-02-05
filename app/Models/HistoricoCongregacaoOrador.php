<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoricoCongregacaoOrador extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'historico_congregacoes_oradores';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'orador_id',
        'congregacao_id',
        'data_inicio',
        'data_fim',
        'observacao'
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos
     *
     * @var array
     */
    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date'
    ];

    /**
     * Obtém o orador associado a este histórico
     */
    public function orador(): BelongsTo
    {
        return $this->belongsTo(Orador::class);
    }

    /**
     * Obtém a congregação associada a este histórico
     */
    public function congregacao(): BelongsTo
    {
        return $this->belongsTo(Congregacao::class);
    }
}
