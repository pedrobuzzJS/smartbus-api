<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Imports\ImportPontos;
use App\Models\Ponto;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PontoController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Ponto::orderBy('id')->paginate(50),
        ], 200);
    }

    public function import()
    {
        $filePath = storage_path('app/public/pontos.xlsx');
        Excel::import(new ImportPontos, $filePath);
    }
}
