<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.create')->only('create');
        $this->middleware('can:admin.users.show')->only('show');
        $this->middleware('can:admin.users.edit')->only('edit');
        $this->middleware('can:admin.users.destroy')->only('destroy');
    }


    public function index()
    {
        $users=User::all();
        $permissions=[
            'show' => auth()->user()->can('admin.users.show'),
            'edit' => auth()->user()->can('admin.users.edit'),
            'destroy' => auth()->user()->can('admin.users.destroy'),
           
        ];
        return view('users.index',compact('users','permissions'));
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
