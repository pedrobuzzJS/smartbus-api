<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PontoController;
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

Route::get('/pontos', [PontoController::class, 'index']);
Route::get('/ponto/import', [PontoController::class, 'import']);

Route::get('/onibus', [OnibusController::class, 'index']);
Route::get('/onibus/localizacao/{onibus}', [OnibusController::class, 'getLocalizacaoById']);
Route::put('/onibus/localizacao/{onibus}', [OnibusController::class, 'setLocalizacao']);
