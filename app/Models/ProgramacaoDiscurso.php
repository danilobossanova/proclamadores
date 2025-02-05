<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramacaoDiscurso extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'programacao_discursos';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'data',
        'orador_id',
        'discurso_id',
        'status',
        'nova_data',
        'observacao',
        'cantico',
        'usa_imagem',
        'congregacao_origem_id'
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos
     *
     * @var array
     */
    protected $casts = [
        'data' => 'date',
        'nova_data' => 'date',
        'usa_imagem' => 'boolean'
    ];

    /**
     * Obtém o orador desta programação
     */
    public function orador(): BelongsTo
    {
        return $this->belongsTo(Orador::class, 'orador_id');
    }

    /**
     * Obtém o discurso desta programação
     */
    public function discurso(): BelongsTo
    {
        return $this->belongsTo(Discurso::class, 'discurso_id');
    }

    /**
     * Obtém a congregação destino desta programação
     */
    public function congregacaoDestino(): BelongsTo
    {
        return $this->belongsTo(Congregacao::class, 'congregacao_destino_id');
    }

    /**
     * Obtém o histórico de alterações desta programação
     */
    public function historicoAlteracoes(): HasMany
    {
        return $this->hasMany(HistoricoAlteracoesProgramacao::class, 'programacao_id');
    }

    /**
     * Verifica se a programação pode ser alterada
     */
    public function podeSerAlterada(): bool
    {
        return !in_array($this->status, ['Proferido', 'Cancelado']);
    }
}
