<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoricoAlteracoesProgramacao extends Model
{
    use HasFactory;

    protected $table = 'historico_alteracoes_programacao';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'programacao_id',
        'campo_alterado',
        'valor_anterior',
        'valor_novo',
        'motivo'
    ];

    /**
     * Obtém a programação associada a esta alteração
     */
    public function programacao(): BelongsTo
    {
        return $this->belongsTo(ProgramacaoDiscurso::class, 'programacao_id');
    }
}
