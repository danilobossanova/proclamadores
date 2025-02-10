<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ativa a extensão pg_trgm caso ainda não esteja ativada
        DB::statement('CREATE EXTENSION IF NOT EXISTS pg_trgm');

        // Cria o índice na coluna 'congregacao' utilizando gin e trigram
        DB::statement('CREATE INDEX idx_congregacao ON congregacoes USING gin (congregacao gin_trgm_ops)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove o índice caso seja necessário um rollback
        DB::statement('DROP INDEX IF EXISTS idx_congregacao');
    }
};
