<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Onibus;
use App\Models\Ponto;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OnibusController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Onibus::with('users')->orderBy('id')->paginate(50)
        ], 200);
    }

    public function getLocalizacaoById(Onibus $onibus, Request $request)
    {
        try {
            return response()->json($onibus);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Onibus não encontrado.'], 404);
        }
    }

    public function setLocalizacao(Onibus $onibus, Request $request)
    {
        $onibus->latitude = $request->latitude;
        $onibus->longitude = $request->longitude;
        $onibus->save();
    }
}
