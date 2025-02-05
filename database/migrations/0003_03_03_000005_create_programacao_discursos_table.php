<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('programacao_discursos', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable(false);
            $table->foreignId('orador_id')->constrained('oradores');
            $table->foreignId('discurso_id')->constrained('discursos');
            $table->foreignId('congregacao_origem_id')->constrained('congregacoes');
            $table->enum('status', [
                'Avisado',
                'Aguardando',
                'Confirmado',
                'Proferido',
                'Cancelado',
                'Adiado',
            ])->default('Avisado');
            $table->date('nova_data')->nullable();
            $table->text('observacao')->nullable();
            $table->integer('cantico')->nullable();
            $table->boolean('usa_imagem')->default(false);

            $table->timestamps();
            $table->softDeletes();

            $table->index(['data', 'status']);
            $table->index(['orador_id', 'data']);
            $table->index(['congregacao_origem_id', 'data']);
            $table->index(['data','discurso_id','orador_id','congregacao_origem_id']);
        });

        Schema::create('historico_alteracoes_programacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programacao_id')->constrained('programacao_discursos');
            $table->string('campo_alterado');
            $table->string('valor_anterior');
            $table->string('valor_novo');
            $table->text('motivo')->nullable();
            $table->timestamps();

            $table->index(['programacao_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_alteracoes_programacao');
        Schema::dropIfExists('programacao_discursos');
    }
};
