<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role1=Role::create(["name" => "Administrador"]);
        Permission::create(["name" => "admin.users.index"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.create"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.show"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.edit"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.destroy"])->syncRoles([$role1]);

        //Roles
        Permission::create(["name" => "admin.roles.index"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.create"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.show"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.edit"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.destroy"])->syncRoles([$role1]);
    }
}
