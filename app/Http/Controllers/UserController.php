<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('users.index',compact('users'));
    }
    public function show()
    {
        return "";
    }
    public function create()
    {
        return view('users.create');
    }
    public function store()
    {
        return "";
    }
    public function update()
    {
        return "";
    }
    public function destroy()
    {
        return view('users.index');
    }

    
}
