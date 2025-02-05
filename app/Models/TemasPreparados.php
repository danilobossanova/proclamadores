<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemasPreparados extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * Nome da tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'temas_preparados';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'orador_id',
        'discurso_id',
        'versao_preparada'
    ];

    /**
     * Obtém o orador que preparou o tema
     */
    public function orador(): BelongsTo
    {
        return $this->belongsTo(Orador::class);
    }

    /**
     * Obtém o discurso preparado
     */
    public function discurso(): BelongsTo
    {
        return $this->belongsTo(Discurso::class);
    }

    /**
     * Verifica se a versão preparada está atualizada com a versão atual do discurso
     */
    public function estaAtualizado(): bool
    {
        return $this->versao_preparada === $this->discurso->versao;
    }
}
