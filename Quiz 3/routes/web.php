<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;

// Pagina principal: formulario de matricula
Route::get('/', [MatriculaController::class, 'create'])
    ->name('matriculas.create');

// Registrar matricula
Route::post('/matriculas', [MatriculaController::class, 'store'])
    ->name('matriculas.store');

// Mostrar confirmacion de matricula
Route::get('/matriculas/{matricula}', [MatriculaController::class, 'show'])
    ->name('matriculas.show');

// CRUD de cursos
Route::resource('cursos', CursoController::class)
    ->parameters(['cursos' => 'curso'])
    ->except(['show']);