<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Onibus;
use App\Models\Ponto;
use App\Models\User;
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
}
