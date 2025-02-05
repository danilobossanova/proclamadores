<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Congregacao extends Model
{
    use HasFactory, SoftDeletes;


    /**
     * Nome da tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'congregacoes';

    /**
     * Atributos que podem ser preenchidos em massa
     *
     * @var array
     */
    protected $fillable = [
        'congregacao',
        'responsavel',
        'telefone',
        'dia_reuniao_fds',
        'hora_reuniao',
        'endereco'
    ];

    /**
     * Obtém os usuários associados a esta congregação
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(User::class, 'congregacao_id');
    }

    /**
     * Obtém os oradores desta congregação
     */
    public function oradores(): HasMany
    {
        return $this->hasMany(Orador::class, 'congregacao_id');
    }

    /**
     * Obtém as programações de discursos nesta congregação
     */
    public function programacoesDiscursos(): HasMany
    {
        return $this->hasMany(ProgramacaoDiscurso::class, 'congregacao_destino_id');
    }
}
