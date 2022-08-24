<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission Category
        Permission::create(['name' => 'category.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'category.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'category.Edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'category.destroy', 'guard_name' => 'web']);

        //permission Category
        Permission::create(['name' => 'blog.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'blog.Edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'blog.destroy', 'guard_name' => 'web']);
    }
}
