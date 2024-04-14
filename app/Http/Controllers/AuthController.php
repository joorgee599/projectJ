<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        $credentials = request()->only('email', 'password');
        $user = User::where('email', $request->email)->get()->take(1);

        if (Auth::attempt($credentials)) {
            return redirect()->to('admin/dashboard')->with('message', 'Bienvenido a Project J');
        } else {
            return redirect()->to('/')->with('message', 'Credenciales incorrectas por favor valide');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/')->with('message','Cerro la sesión');
    }
}
