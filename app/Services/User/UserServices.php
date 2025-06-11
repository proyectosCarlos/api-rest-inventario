<?php

namespace App\Services\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class UserServices
{
    public function CreateUser(UserRequest $request)
    {
        try {
            $user = new User();
            $user->name =  $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $saved = $user->save();

            if ($saved == 1) {
                return response()->json([
                    'status' => 'ok',
                    'message' => 'Usuario creado correctamente',
                ], 201);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No se pudo guardar el usuario.'
                ], 400);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear el usuario: ' . $th->getMessage()
            ], 500);
        }
    }

    public function LoginUser(LoginRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                if ($user && Hash::check($request->password, $user->password)) {
                    return response()->json([
                        'status' => 'ok',
                        'message' => 'Login exitoso',
                        'token' => $user->createToken('api-web-token')->plainTextToken
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Credenciales incorrectas'
                    ], 400);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Usuario no encontrado'
                ], 404);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al iniciar sesión: ' . $th->getMessage()
            ], 500);
        }
    }


    public function Logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al cerrar sesión: ' . $th->getMessage()
            ], 500);
        }
    }
}
