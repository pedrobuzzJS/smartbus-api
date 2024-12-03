<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PontoController;
use App\Http\Controllers\Api\BairroController;
use App\Http\Controllers\Api\OnibusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return response()->json([
//        'status' => 200,
//        'message' => 'Listar Usuarios',
//    ]);
//});
//    ->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/pontos', [PontoController::class, 'index']);
Route::get('/pontos/{id}', [PontoController::class, 'show']);
Route::post('/pontos', [PontoController::class, 'store']);
Route::put('/pontos/{id}', [PontoController::class, 'update']);
Route::delete('/pontos/{id}', [PontoController::class, 'destroy']);
Route::get('/ponto/import', [PontoController::class, 'import']);

Route::get('/bairro', [BairroController::class, 'index']);
Route::get('/bairro/{id}', [BairroController::class, 'show']);
Route::post('/bairro', [BairroController::class, 'store']);
Route::put('/bairro/{id}', [BairroController::class, 'update']);
Route::delete('/bairro/{id}', [BairroController::class, 'destroy']);

Route::get('/onibus', [OnibusController::class, 'index']);
Route::get('/onibus/{id}', [OnibusController::class, 'show']);
Route::post('/onibus', [OnibusController::class, 'store']);
Route::put('/onibus/{id}', [OnibusController::class, 'update']);
Route::delete('/onibus/{id}', [OnibusController::class, 'destroy']);
Route::get('/onibus/localizacao', [OnibusController::class, 'getLocalizacao']);
Route::get('/onibus/localizacao/{id}', [OnibusController::class, 'getLocalizacaoById']);
Route::put('/onibus/localizacao', [OnibusController::class, 'setLocalizacao']);
