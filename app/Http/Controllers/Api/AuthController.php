<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginUserApiRequest;
use App\Http\Requests\auth\LoginUserRequest;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginUserApiRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return ApiResponse::error('Este usuario no existe en la base de datos', 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return ApiResponse::error('Contraseña incorrecta', 401);
        }
        $token = $user->createToken("auth_token")->plainTextToken;
        return ApiResponse::success('Login exitoso.', 200, ['token' => $token, "user" => $user]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return ApiResponse::success('Cerro sesión exitosamente', 200);
    }
}
