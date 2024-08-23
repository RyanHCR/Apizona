<?php

use App\Http\Controllers\CompetidorController;
use App\Http\Controllers\TreinadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalidadeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/minhas-informacoes', function () {
    return response()->json([
        'nome' => 'Ryan',
        'RM' => '2806'
    ]);
});

Route::apiResource('/Localidades', LocalidadeController::class);
Route::apiResource('/Treinadores', TreinadorController::class);
Route::apiResource('/Competidores', CompetidorController::class);