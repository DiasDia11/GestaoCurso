<?php

use App\Http\Controllers\AlunoCursoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno');
    Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.novo');
    Route::get('/aluno/lista', [AlunoController::class, 'list'])->name('aluno.lista');
    Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.cria');
    Route::get('/aluno/{aluno}/edit', [AlunoController::class, 'edit'])->name('aluno.edit');
    Route::put('/aluno/{aluno}', [AlunoController::class, 'update'])->name('aluno.update');
    Route::get('/aluno/{aluno}', [AlunoController::class, 'show'])->name('aluno.show');
    Route::delete('/aluno/{aluno}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

    Route::get('/curso', [CursoController::class, 'index'])->name('curso');
    Route::get('/curso/create', [CursoController::class, 'create'])->name('curso.cria');
    Route::post('/curso/create', [CursoController::class, 'store'])->name('curso.novo');
    Route::get('/curso/lista', [CursoController::class, 'list'])->name('curso.lista');
    Route::get('/curso/{curso}/edit', [CursoController::class, 'edit'])->name('curso.edit');
    Route::put('/curso/{curso}', [CursoController::class, 'update'])->name('curso.update');

    Route::get('/curso/lista/{curso}', [AlunoCursoController::class, 'list'])->name('curso.alunos');
});

require __DIR__.'/auth.php';
