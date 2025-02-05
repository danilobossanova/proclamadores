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
        Schema::create('temas_preparados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orador_id')->constrained('oradores');
            $table->foreignId('discurso_id')->constrained('discursos');
            $table->string('versao_preparada', 7); // mes/ano que o orador preparou
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['orador_id', 'discurso_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas_preparados');
    }
};
