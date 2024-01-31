<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Viewer']);



        //permissions:

        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'users'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);


        Permission::create(['name' => 'categories'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'books'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'books.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'books.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'books.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'books.destroy'])->syncRoles([$role1]);


    }
}
