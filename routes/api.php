<?php

use App\Http\Controllers\DocentesController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\MatriculaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/docentes')->group(function () {
    Route::get('/', [DocentesController::class, 'index']);
    Route::get('/{id}', [DocentesController::class, 'show']);
    Route::post('/', [DocentesController::class, 'store']);
    Route::put('/{id}', [DocentesController::class, 'update']);
    Route::delete('/{id}', [DocentesController::class, 'destroy']);
});

Route::prefix('/alumnos')->group(function () {
    Route::get('/', [AlumnosController::class, 'index']);
    Route::get('/{id}', [AlumnosController::class, 'show']);
    Route::post('/', [AlumnosController::class, 'store']);
    Route::put('/{id}', [AlumnosController::class, 'update']);
    Route::delete('/{id}', [AlumnosController::class, 'destroy']);
});

Route::prefix('/materias')->group(function () {
    Route::get('/', [MateriasController::class, 'index']);
    Route::get('/{id}', [MateriasController::class, 'show']);
    Route::post('/', [MateriasController::class, 'store']);
    Route::put('/{id}', [MateriasController::class, 'update']);
    Route::delete('/{id}', [MateriasController::class, 'destroy']);
});

Route::prefix('/matricula')->group(function () {
    Route::get('/', [MatriculaController::class, 'index']);
    Route::get('/{id}', [MatriculaController::class, 'show']);
    Route::post('/', [MatriculaController::class, 'store']);
    Route::put('/{id}', [MatriculaController::class, 'update']);
    Route::delete('/{id}', [MatriculaController::class, 'destroy']);
});

Route::prefix('/asistencia')->group(function () {
    Route::get('/', [AsistenciaController::class, 'index']);
    Route::get('/{id}', [AsistenciaController::class, 'show']);
    Route::post('/', [AsistenciaController::class, 'store']);
    Route::put('/{id}', [AsistenciaController::class, 'update']);
    Route::delete('/{id}', [AsistenciaController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
