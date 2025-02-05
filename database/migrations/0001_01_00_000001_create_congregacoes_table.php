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
        Schema::create('congregacoes', function (Blueprint $table) {
            $table->id();
            $table->string('congregacao', 100);
            $table->string('responsavel', 100)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->enum('dia_reuniao_fds', ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado', 'Domingo']);
            $table->time('hora_reuniao')->nullable();
            $table->text('endereco')->nullable();
            $table->string('coordenadas', 50)->nullable();
            $table->string('googlemaps',200)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('congregacao');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('congregaçcaos');
    }
};
