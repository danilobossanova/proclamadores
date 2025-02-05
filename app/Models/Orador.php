<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orador extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'oradores';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'telefone',
        'congregacao_id',
        'privilegio'
    ];

    /**
     * Obtém a congregação do orador
     */
    public function congregacao(): BelongsTo
    {
        return $this->belongsTo(Congregacao::class, 'congregacao_id');
    }

    /**
     * Obtém os discursos preparados pelo orador
     */
    public function discursosPreparados()
    {
        return $this->belongsToMany(Discurso::class, 'temas_preparados', 'orador_id', 'discurso_id')
            ->withPivot('versao_preparada')
            ->withTimestamps();
    }

    /**
     * Obtém as programações de discursos do orador
     */
    public function programacoes(): HasMany
    {
        return $this->hasMany(ProgramacaoDiscurso::class, 'orador_id');
    }

    /**
     * Verifica se o orador está disponível para uma data específica
     */
    public function estaDisponivelPara($data): bool
    {
        // Verifica se já existe programação para o mês
        return !$this->programacoes()
            ->whereYear('data', '=', date('Y', strtotime($data)))
            ->whereMonth('data', '=', date('m', strtotime($data)))
            ->whereNotIn('status', ['Cancelado', 'Adiado'])
            ->exists();
    }

    /**
     * Histórico de congregações do orador
     */
    public function historicoCongregacoes(): HasMany
    {
        return $this->hasMany(HistoricoCongregacaoOrador::class, 'orador_id');
    }
}
