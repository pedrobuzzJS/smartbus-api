<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => User::orderBy('id')->paginate(50),
        ], 200);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    public function store(UserRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!",
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuário não cadastrado!",
            ], 400);
        }
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        DB::beginTransaction();

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário editado com sucesso!",
            ], 200);
        } catch (Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuário não editado!",
            ], 400);
        }
    }

    public function destroy(User $user): JsonResponse
    {
        try {
            $user->delete();

            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário apagado com sucesso!",
            ], 200);


        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não apagado!",
            ], 400);
        }
    }
}
