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
        $role2=Role::create(["name" => "Suplente"]);
        Permission::create(["name" => "admin.users.index", "description" =>"Listar usuarios"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.create", "description" =>"Crear usuarios"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.show", "description" =>"Ver usuarios"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.edit", "description" =>"Editar usuarios"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.users.destroy", "description" =>"Eliminar usuarios"])->syncRoles([$role1]);

        //Roles
        Permission::create(["name" => "admin.roles.index", "description" =>"Listar roles"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.create", "description" =>"Crear roles"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.show", "description" =>"Ver roles"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.edit", "description" =>"Editar roles"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.roles.destroy", "description" =>"Eliminar roles"])->syncRoles([$role1]);


        //Roles
        Permission::create(["name" => "admin.products.index", "description" =>"Listar productos"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.products.create", "description" =>"Crear productos"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.products.show", "description" =>"Ver productos"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.products.edit", "description" =>"Editar productos"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.products.destroy", "description" =>"Eliminar productos"])->syncRoles([$role1]);


        Permission::create(["name" => "admin.categories.index", "description" =>"Listar categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.create", "description" =>"Crear categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.show", "description" =>"Ver categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.edit", "description" =>"Editar categorias"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.categories.destroy", "description" =>"Eliminar categorias"])->syncRoles([$role1]);

        Permission::create(["name" => "admin.brands.index", "description" =>"Listar marcas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.brands.create", "description" =>"Crear marcas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.brands.show", "description" =>"Ver marcas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.brands.edit", "description" =>"Editar marcas"])->syncRoles([$role1]);
        Permission::create(["name" => "admin.brands.destroy", "description" =>"Eliminar marcas"])->syncRoles([$role1]);
    }
}
