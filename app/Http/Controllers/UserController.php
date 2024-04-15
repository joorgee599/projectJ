<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginUserRequest;
use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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
        $roles= Role::all();
        return view('users.create',compact('roles'));
    }
    public function store(CreateUserRequest $request)
    {
        $user= User::create($request->all())->assignRole($request->rol);
         return redirect()->route('admin.users.index')->with('message', 'Se creo el usuario correctamente');
    }
    public function edit(string $id){
        $roles= Role::all();
        $user= User::find($id);
        //me trae el rol del usuario
        $roleUser = $user->getRoleNames()->first();
        return view('users.edit',compact('user','roles','roleUser'));
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $rol = $request->input('rol');
        $user->update($request->all());
        $user->syncRoles([$rol]);
        return redirect()->route('admin.users.edit', $user)->with(['message' => 'Usuario actualizado exitosamente']);
    }
    public function destroy()
    {
        return view('users.index');
    }

    
}
