<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discurso extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'numero',
        'tema',
        'novo',
        'versao',
        'ultimo_proferimento',
        'situacao'
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos
     *
     * @var array
     */
    protected $casts = [
        'novo' => 'boolean',
        'ultimo_proferimento' => 'date'
    ];

    /**
     * Obtém os oradores que prepararam este discurso
     */
    public function oradoresPrepararam()
    {
        return $this->belongsToMany(Orador::class, 'temas_preparados', 'discurso_id', 'orador_id')
            ->withPivot('versao_preparada')
            ->withTimestamps();
    }

    /**
     * Obtém as programações deste discurso
     */
    public function programacoes(): HasMany
    {
        return $this->hasMany(ProgramacaoDiscurso::class, 'discurso_id');
    }

    /**
     * Verifica se o discurso está disponível para proferir
     */
    public function estaDisponivel(): bool
    {
        return $this->situacao === 'Disponivel';
    }
}
