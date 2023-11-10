<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'view user']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('view user');

        $role2 = Role::create(['name' => 'user']);

        $user = \App\Models\User::factory()->create([
            'name'=> 'khanh',
            'email'=> 'khanh@gmail.com',
            'password' => '123456',
            'gender' => 'Male',
            'phoneNumber' => '0987654321',
            'active_status' => 'Active',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name'=> 'khssanh',
            'email'=> 'khanssh@gmail.com',
            'password' => '123456',
            'gender' => 'Male',
            'phoneNumber' => '0987654320',
            'active_status' => 'Active',
        ]);
        $user->assignRole($role2);


    }
}
