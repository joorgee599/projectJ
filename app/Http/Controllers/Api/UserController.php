<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\users\UpdateUserApiRequest;
use App\Http\Responses\ApiResponse;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
         $user = User::find($id);

        if (!$user) {
            return ApiResponse::error("Usuario no encontrado", 404);
        }

        return ApiResponse::success("Usuario encontrado", 200, $user);
    }

public function edit($id)
    {
       
       $user = User::find($id); 
        if (!$user) {
            return ApiResponse::error("Usuario no encontrado", 404);
        }

        return ApiResponse::success("Usuario encontrado", 200,$user);
    } 


    public function update(UpdateUserApiRequest $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return ApiResponse::error("Usuario no encontrado", 404);
        }

        $user->update($request->validated());

        return ApiResponse::success("Usuario actualizado exitosamente", 200, $user);
    }
    
}
