<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Admin
        $admin = User::create([
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'),
        ]);

        //get all permissions
        $permissions = Permission::all();

        //get role admin
        $role = Role::find(1);

        //assign permission to role
        $role->syncPermissions($permissions);

        //assign role to user
        $admin->assignRole($role);

        //create author
        $author = User::create([
            'name'      => 'Setiyono Ressly',
            'email'     => 'setiyono.ressly@gmail.com',
            'password'  => bcrypt('password'),
        ]);
        //get blog permission
        $permissionsauthor = Permission::where('name','like','%blog%')->get();

        //get role author
        $roleauthor = Role::find(2);
        $roleauthor->syncPermissions($permissionsauthor);
        $author->assignRole($roleauthor);
    }
}
