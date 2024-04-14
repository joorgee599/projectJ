<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(["name" => "app.users.index", "guard_name" => "web"]);
        Permission::create(["name" => "app.users.create", "guard_name" => "web"]);
        Permission::create(["name" => "app.users.show", "guard_name" => "web"]);
        Permission::create(["name" => "app.users.edit", "guard_name" => "web"]);
        Permission::create(["name" => "app.users.destroy", "guard_name" => "web"]);

        //Roles
        Permission::create(["name" => "app.roles.index", "guard_name" => "web"]);
        Permission::create(["name" => "app.roles.create", "guard_name" => "web"]);
        Permission::create(["name" => "app.roles.show", "guard_name" => "web"]);
        Permission::create(["name" => "app.roles.edit", "guard_name" => "web"]);
        Permission::create(["name" => "app.roles.destroy", "guard_name" => "web"]);
    }
}
