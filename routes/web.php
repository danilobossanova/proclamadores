<?php

use App\Livewire\Congregacoes\{ListaCongregacoes, CriarCongregacao, EditarCongregacao};
use App\Http\Controllers\{DiscursoController, OradorController, ProgramacaoController};
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    // Rotas Congregações com Livewire
    Route::get('/congregacoes', ListaCongregacoes::class)->name('congregacoes.index');
    Route::get('/congregacoes/criar', CriarCongregacao::class)->name('congregacoes.create');
    Route::get('/congregacoes/{congregacao}/editar', EditarCongregacao::class)->name('congregacoes.edit');


    Route::resource('oradores', OradorController::class);
    Route::resource('discursos', DiscursoController::class);

    Route::prefix('programacao')->group(function () {
        Route::get('/', [ProgramacaoController::class, 'index'])->name('programacao.index');
        Route::get('/create', [ProgramacaoController::class, 'create'])->name('programacao.create');
        Route::post('/', [ProgramacaoController::class, 'store'])->name('programacao.store');
        Route::get('/{programacao}', [ProgramacaoController::class, 'show'])->name('programacao.show');
        Route::get('/{programacao}/edit', [ProgramacaoController::class, 'edit'])->name('programacao.edit');
        Route::put('/{programacao}', [ProgramacaoController::class, 'update'])->name('programacao.update');
        Route::delete('/{programacao}', [ProgramacaoController::class, 'destroy'])->name('programacao.destroy');
    });
});
