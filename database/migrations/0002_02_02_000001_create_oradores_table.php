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
        Schema::create('oradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 300)->nullable(false);
            $table->string('telefone', 20)->nullable();
            $table->foreignId('congregacao_id')->constrained('congregacoes');
            $table->enum('privilegio', ['Anciao', 'Servo'])->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('nome');
            $table->index(['congregacao_id', 'privilegio']);
            $table->index(['congregacao_id', 'nome']);
        });

        Schema::create('historico_congregacoes_oradores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orador_id')->constrained('oradores');
            $table->foreignId('congregacao_id')->constrained('congregacoes');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();

            $table->index(['orador_id', 'data_inicio', 'data_fim']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_congregacoes_oradores');
        Schema::dropIfExists('oradores');
    }
};
