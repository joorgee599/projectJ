<?php

namespace App\Http\Controllers;

use App\Http\Requests\roles\CreateRoleRequest;
use App\Http\Requests\roles\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\CreateRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create');
        $this->middleware('can:admin.roles.show')->only('show');
        $this->middleware('can:admin.roles.edit')->only('edit');
        $this->middleware('can:admin.roles.destroy')->only('destroy');
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = [
            'show' => auth()->user()->can('admin.roles.show'),
            'edit' => auth()->user()->can('admin.roles.edit'),
            'destroy' => auth()->user()->can('admin.roles.destroy'),

        ];
        return view('roles.index', compact('roles', 'permissions'));
    }
    public function show()
    {
        return "";
    }
    public function create()
    {
        
        $permissions = Permission::all();
        return view('roles.create',compact('permissions'));
    }
    public function store(CreateRoleRequest $request)
    {
        $role = role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('message', 'Se creo el rol correctamente');
    }
    public function edit(string $id)
{
    $role = Role::find($id);
    $permissions = Permission::all();
    $rolePermissions = $role->permissions()->pluck('id')->toArray();
    return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
}
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.edit', $role)->with(['message' => 'Rol actualizado exitosamente']);
    }
    public function destroy()
    {
        return view('roles.index');
    }

    public function keyPermissons(){
        return [
            'users' => 'Usuarios',
            'roles' => 'Roles',

        ];
    }
}
